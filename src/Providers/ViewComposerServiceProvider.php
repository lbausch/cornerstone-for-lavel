<?php

namespace Bausch\LaravelCornerstone\Providers;

use Illuminate\View\View;

class ViewComposerServiceProvider
{
    public function __construct()
    {
        // stub
    }

    /**
     * Compose.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $user = auth()->user();

        if ($user) {
            $view->with([
                'user', $user,
            ]);
        }
    }
}
