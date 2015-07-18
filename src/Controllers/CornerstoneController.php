<?php

namespace Bausch\LaravelCornerstone\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class CornerstoneController extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    /**
     * User.
     *
     * @var User
     */
    protected $user;

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
        // check for authenticated User and store it for later use
        if (auth()->check()) {
            $this->user = &auth()->user();
        }
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
