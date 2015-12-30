<?php

namespace Bausch\LaravelCornerstone\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Routing\Controller as BaseController;

class CornerstoneController extends BaseController
{
    /**
     * User.
     *
     * @var \Illuminate\Contracts\Auth\Authenticatable
     */
    protected $user;

    /**
     * title for views.
     *
     * @var string
     */
    private $title;

    public function __construct()
    {
        // Check for authenticated User
        if (auth()->check()) {
            // Store User
            $this->user = auth()->user();

            // Share User to Views
            view()->share('user', auth()->user());
        }

        // Set Carbon locale
        Carbon::setLocale(app()->getLocale());

        // Share current locale to Views
        view()->share('locale', app()->getLocale());
    }

    /**
     * Get title.
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
     * Set title.
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;

        view()->share('title', $this->getTitle());
    }
}
