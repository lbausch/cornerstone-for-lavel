# Laravel Cornerstone

Some helper functions for Laravel

## Documentation

### Helper functions

#### alert

Create a simple alert message.

`function alert($type, $message)`

`$type` can be one of `info`, `warning`, `error` or `success`. Requires Twitter Bootstrap to be displayed correctly.
  
Example usage: `alert('error', 'This didn\'t work');`

#### is_active

Checks if current request matches certain controllers and returns the string `active` if so. Useful for highlighting corresponding navigation items.

`function is_active($needles, $css_classes = ['active'])`

Example usage: `is_active('SomeController')` or `is_active(['SomeController', 'OtherController'])`. You may also specify the css classes to return with `$css_classes`.

#### link_back

Renders a back link. Takes an optional link or tries to use JavaScript.

`function link_back($target = null)`

Example usage: `link_back()` or `link_back(action('SomeController@someMethod'))`

#### redact

For use in controller methods. Replaces the `redirect(action('SomeController@someMethod'))` construct.

`function redact($name, $parameters = array(), $status = 302, $headers = array(), $secure = null)`

Added bonus: Use `_self` to refer to the Controller the function is called in. For example: `return redact('_self@index');`.

### Repositories

#### BaseRepositoryInterface

An interface for Repositories. See `src/Repositories/BaseRepositoryInterface.php` for methods you need to implement.

#### EloquentAbstractRepository

Abstract implementation for Eloquent of the above interface. Provides default implementation to extend on. See `src/Repositories/EloquentAbstractRepository.php` for actual implementation.


### Keep alive

Prevent the CSRF token from timing out. Simple send an AJAX GET request every 5 minutes to the route `bausch/laravel-cornerstone/keepalive`. Of course this is only necessary on pages which contain a `_token` field. To achieve this with jQuery use the following snippet:

```js
if ($('input[name=_token]').length > 0) {
    setInterval(function () {
        $.get('lbausch/laravel-cornerstone/keepalive');
    }, 3e5);
}
```
