<?php

namespace Bausch\LaravelCornerstone\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class CornerstoneController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * User.
     *
     * @var Authenticatable
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
        // check for authenticated User
        if (auth()->check()) {
            // store User
            $this->user = auth()->user();

            // share User to Views
            view()->share('user', auth()->user());
        }

        // set Carbon locale
        Carbon::setLocale(app()->getLocale());

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
