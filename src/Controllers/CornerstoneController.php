<?php

namespace Bausch\LaravelCornerstone\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class CornerstoneController extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    /**
     * User.
     *
     * @var Authenticatable
     */
    protected $User;

    /**
     * title for views.
     *
     * @var string
     */
    private $title;

    /**
     * CornerstoneController constructor.
     */
    public function __construct()
    {
        // check for authenticated User
        if (auth()->check()) {
            // store User
            $this->User = auth()->user();

            // share User to Views
            view()->share('User', auth()->user());
        }

        // share current Locale to Views
        view()->share('locale', app()->getLocale());
    }

    /**
     * get Title.
     *
     * @return string
     */
    public function getTitle()
    {
        $title = $this->title;

        if (isset($this->title_suffix)) {
            $title = $title.$this->title_suffix;
        }

        if (isset($this->title_prefix)) {
            $title = $this->title_prefix.$title;
        }

        return $title;
    }

    /**
     * set Title.
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;

        view()->share('title', $this->getTitle());
    }
}
