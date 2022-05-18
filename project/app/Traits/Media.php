<?php 
namespace App\Traits;

use Carbon\Carbon;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait Media
{
    /**
     * @var string
     */
    public $uploadPath = "uploads";

    /**
     * @var
     */
    public $folderName;

    /**
     * @var string
     */
    public $rule = 'image|max:200';

    /**
     * Set options.
     *
     * @return $this
     */
    private function setFolderName()
    {
        $this->folderName = Carbon::now()->format('Y-m');
        return $this;
    }

    /**
     * @return bool
     */
    private function createUploadFolder(): bool
    {
        $folderPath = config('filesystems.disks.public.root') . '/' . $this->uploadPath . '/' . $this->folderName;
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777);

            return true;
        }

        return false;
    }

    /**
     * For handle validation file action
     *
     * @param $file
     * @return Media|\Illuminate\Http\RedirectResponse
     */
    private function validateFileAction($file)
    {
        $rules = array('fileupload' => $this->rule);
        $file = array('fileupload' => $file);
        $fileValidator = Validator::make($file, $rules);

        if ($fileValidator->fails()) {
            $messages = $fileValidator->messages();

            return redirect()->back()->withInput(request()->all())
                ->withErrors($messages);
        }
    }

    /**
     * For Handle Put File
     *
     * @param $file
     * @return string
     */
    public function putFile($file)
    {
        if ($file) {
            $fileName = preg_replace('/\s+/', '_', time() . ' ' . $file->getClientOriginalName());
            $path = $this->uploadPath . '/' . $this->folderName . '/';

            if (Storage::putFileAs('public/' . $path, $file, $fileName)) {
                return $path . $fileName;
            }

            return '';
        }
    }

    /**
     * For Handle Save File Process
     *
     * @param $file
     * @return $data
     */
    public function saveFile($file)
    {
        $data = '';
        if ($file) {
            $this->setFolderName();
            $this->validateFileAction($file);
            $this->createUploadFolder();
            $data = $this->putFile($file);
        }

        return $data;
    }

    /**
     * For Handle Delete Old File
     *
     * @param $file
     *@return bool
     */
    public function deleteOldFile($file)
    {
        if ($file) {
            Storage::disk('public')->delete($file);
        }

        return true;
    }
}