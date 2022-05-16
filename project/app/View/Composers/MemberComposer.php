<?php
 
namespace App\View\Composers;
 
use App\Repositories\MemberRepository;
use Illuminate\View\View;
 
class MemberComposer
{
    /**
     * The member repository implementation.
     *
     * @var \App\Repositories\MemberRepository
     */
    protected $memberRepository;
 
    /**
     * Create a new profile composer.
     *
     * @param  \App\Repositories\MemberRepository  $memberRepository
     * @return void
     */
    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }
 
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $members = $this->memberRepository->getSelectArray();
        $view->with('members', $members);
    }
}