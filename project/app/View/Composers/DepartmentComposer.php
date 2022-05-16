<?php
 
namespace App\View\Composers;
 
use App\Repositories\DepartmentRepository;
use Illuminate\View\View;
 
class DepartmentComposer
{
    /**
     * The department repository implementation.
     *
     * @var \App\Repositories\DepartmentRepository
     */
    protected $departmentRepository;
 
    /**
     * Create a new profile composer.
     *
     * @param  \App\Repositories\DepartmentRepository  $departmentRepository
     * @return void
     */
    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }
 
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $departments = $this->departmentRepository->getSelectArray();
        $view->with('departments', $departments);
    }
}