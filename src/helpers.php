<?php

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

        return redirect(action($name, $parameters), $status, $headers, $secure);
    }
}

if (!function_exists('alert')) {

    /**
     * Alert view.
     *
     * @param string $type
     * @param string $message
     *
     * @return Response
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
