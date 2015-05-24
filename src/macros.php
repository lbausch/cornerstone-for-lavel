<?php

/**
 * alert
 */
Html::macro('alert', function($type, $message) {
    return alert($type, $message);
});


/**
 * back button
 */
Html::macro('back', function($action = null) {
    if (is_null($action)) {
        $href = '/';
        $onclick = 'window.history.back();return false;';
    } else {
        $href = $action;
        $onclick = '';
    }

    return '<a href="' . $href . '" onclick="' . $onclick . '">&larr; ' . trans('cornerstone::macros.back') . '</a>';
});


/**
 * CSS class for active menu items
 */
Html::macro('is_active', function($controllers, array $css_classes = ['active']) {
    if (!is_array($controllers)) {
        $controllers = [$controllers];
    }

    // remove namespace from Controller class name
    $info = explode('\\', strtok(Route::currentRouteAction(), '@'));
    $controller_name = end($info);

    if (in_array($controller_name, $controllers)) {
        return implode(' ', $css_classes);
    }
});
