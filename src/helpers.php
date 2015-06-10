<?php

if (!function_exists('redact')) {

    /**
     * redirect to action.
     *
     * @param string $name
     * @param array  $parameters
     * @param int    $status
     * @param array  $headers
     * @param bool   $secure
     *
     * @return Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    function redact($name, $parameters = array(), $status = 302, $headers = array(), $secure = null)
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
     * alert view.
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

if (!function_exists('trans_choice')) {

    /**
     * trans choice.
     *
     * @param string $key
     * @param int    $count
     * @param string $locale
     *
     * @return string
     */
    function trans_choice($key, $count = 0, $locale = null)
    {
        return Lang::choice($key, $count, $locale);
    }
}
