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
     * Uplaod Path of media
     *
     * @var string
     */
    public $uploadPath = "uploads";

    /**
     * Folder name of media by year and month
     *
     * @var string
     */
    public $folderName;

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
     * Create folder upload if not exists
     *
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
     * For Handle Put File
     *
     * @param $file from request
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
     * @param $file from request
     * @return string
     */
    public function saveFile($file)
    {
        $data = '';
        if ($file) {
            $this->setFolderName();
            $this->createUploadFolder();
            $data = $this->putFile($file);
        }

        return $data;
    }

    /**
     * For Handle Delete Old File
     *
     * @param $file from request
     * @return bool
     */
    public function deleteOldFile($file)
    {
        if ($file) {
            Storage::disk('public')->delete($file);
        }

        return true;
    }
}
