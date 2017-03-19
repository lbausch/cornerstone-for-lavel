<?php

namespace Bausch\LaravelCornerstone\Providers;

use Illuminate\Container\Container;
use Illuminate\Contracts\Auth\Factory as AuthFactory;
use Illuminate\View\View;

class ViewComposerServiceProvider
{
    /**
     * Compose.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $user = Container::getInstance()->make(AuthFactory::class)->user();

        if ($user) {
            $view->with([
                'user', $user,
            ]);
        }
    }
}
