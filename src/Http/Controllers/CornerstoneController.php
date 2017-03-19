<?php

namespace Bausch\LaravelCornerstone\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Container\Container;
use Illuminate\Contracts\Auth\Factory as AuthFactory;
use Illuminate\Contracts\View\Factory as ViewFactory;

class CornerstoneController extends BaseController
{
    /**
     * Title for views.
     *
     * @var string
     */
    protected $title;

    /**
     * CornerstoneController constructor.
     */
    public function __construct()
    {
        // Set Carbon locale
        Carbon::setLocale(Container::getInstance()->getLocale());

        // Share current locale to Views
        $this->getViewService()->share('locale', app()->getLocale());
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

        $this->getViewService()->share('title', $this->getTitle());
    }

    /**
     * Get.
     *
     * @param string $name
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function __get($name)
    {
        if ($name == 'user' && $this->getAuthManager()->user()) {
            return $this->getAuthManager()->user();
        }
    }

    /**
     * Get Auth manager.
     *
     * @return AuthFactory
     */
    protected function getAuthManager()
    {
        return $this->getContainerInstance()->make(AuthFactory::class);
    }

    /**
     * Get view service.
     *
     * @return ViewFactory
     */
    protected function getViewService()
    {
        return $this->getContainerInstance()->make(ViewFactory::class);
    }

    /**
     * Get Container.
     *
     * @return Container
     */
    protected function getContainerInstance()
    {
        return Container::getInstance();
    }
}
