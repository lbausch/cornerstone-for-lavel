<?php

use Illuminate\Container\Container;

if (!function_exists('redact')) {
    /**
     * Redirect to action.
     *
     * @param string $name
     * @param array  $parameters
     * @param int    $status
     * @param array  $headers
     * @param bool   $secure
     *
     * @return Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    function redact($name, $parameters = [], $status = 302, $headers = [], $secure = null)
    {
        if (preg_match('/^_self@/', $name)) {
            $controller = explode('\\', strtok(Route::currentRouteAction(), '@'));

            $name = preg_replace('/^_self@/', end($controller).'@', $name);
        }

        $container = Container::getInstance();

        $action = $container->make('url')->action($name, $parameters);

        return $container->make('redirect')->to($action, $status, $headers, $secure);
    }
}

if (!function_exists('alert')) {
    /**
     * Alert view.
     *
     * @param string $type
     * @param string $message
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    function alert($type, $message)
    {
        $alerts = [
            'info',
            'warning',
            'error',
            'success',
        ];

        if (!in_array($type, $alerts)) {
            return;
        }

        return view('cornerstone::alerts.'.$type)
            ->with('message', $message);
    }
}

if (!function_exists('is_active')) {
    /**
     * Returns the string "active" if the given Controller name or action matches the current Route. Useful for Views.
     *
     * @param string|array $needles
     * @param string|array $css_classes
     *
     * @return string
     */
    function is_active($needles, $css_classes = ['active'])
    {
        // Convert $needles to array
        if (!is_array($needles)) {
            $needles = [$needles];
        }

        // Convert $css_classes to array
        if (!is_array($css_classes)) {
            $css_classes = [$css_classes];
        }

        // Iterate over given needle
        foreach ($needles as $needle) {
            // Detect mode
            $mode = 'action';

            if (strpos($needle, '@') === false) {
                $mode = 'controller';
            }

            // Get current Route and Action
            $route = Route::getCurrentRoute();
            $action = $route->getAction();

            $controller_namespaced = $action['controller']; // e.g. App\Http\Controllers\FooController@index
            $namespace = $action['namespace']; // e.g. App\Http\Controllers

            // Remove namespace from controller (+ 1 also removes leading backslash)
            $controller = substr($controller_namespaced, strspn($namespace, $controller_namespaced) + 1);

            switch ($mode) {
                case  'action':
                    // If $needle matches $controller return whitespace glued $css_classes
                    if ($needle === $controller) {
                        return implode(' ', $css_classes);
                    }
                    break;
                case 'controller':
                    // Remove the action part from $controller "...@index"
                    $controller_name = explode('@', $controller);

                    // If $needle matches $controller_name return whitespace glued $css_classes
                    if (isset($controller_name[0]) && $controller_name[0] == $needle) {
                        return implode(' ', $css_classes);
                    }
                    break;
            }
        }

        // Return empty string by default
        return '';
    }
}

if (!function_exists('link_back')) {
    /**
     * Generate back link.
     *
     * @param string|null $target
     *
     * @return string
     */
    function link_back($target = null)
    {
        return '<a href="'.($target ? $target : '/').'" '.(!$target ? 'onclick="window.history.back();return false;"' : '').'>&larr; '.trans('cornerstone::helpers.link_back').'</a>';
    }
}
