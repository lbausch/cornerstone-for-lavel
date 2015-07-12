<?php

namespace Bausch\LaravelCornerstone\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class CornerstoneController extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

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

    }

    /**
     * get Title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
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