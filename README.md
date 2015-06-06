# Laravel Cornerstone

Some helper functions for Laravel

## Documentation

### Helper functions

#### redact

For use in controller methods. Replaces the `redirect(action('SomeController@someMethod'))` construct.

`function redact($name, $parameters = array(), $status = 302, $headers = array(), $secure = null)`

Added bonus: Use `_self` to refer to the Controller the function is called in. For example: `return redact('_self@index');`.

#### alert

Create a simple alert message.

`function alert($type, $message)`

`$alert` can be one of `info`, `warning`, `error` or `success`. Requires Twitter Bootstrap to be displayed correctly.
  
Example usage: `alert('error', 'This didn\'t work');`

#### trans_choice

Helper function for pluralization. Actually a wrapper for `Lang::choice`.

`function trans_choice($key, $count = 0, $locale = null)`

Example usage: `echo trans_choice('messages.apples', 10);`


### Macros

#### alert

Wrapper for `alert()` (see above) to use in Views.

`Html::macro('alert', function($type, $message)`

Example usage: `Html::alert('error', 'This didn\'t work')`

#### back

Renders a back link. Takes an optional action or tries to use JavaScript.

`Html::macro('back', function($action = null)`

Example usage: `Html::back()` or `Html::back('SomeController@someMethod')`

#### is_active

Checks if current request matches certain controllers and returns `active` if so. Useful for highlighting corresponding navigation items.

`Html::macro('is_active', function($controllers, array $css_classes = ['active'])`

Example usage: `Html::is_active('SomeController')` or `Html::is_active(['SomeController', 'OtherController'])`. You may also specify the css classes to return with `$css_classes`.


### Repositories

#### BaseRepositoryInterface

An interface for Repositories. See `src/Repositories/BaseRepositoryInterface.php` for methods you need to implement.

#### EloquentAbstractRepository

Abstract implementation for Eloquent of the above interface. Provides default implementation to extend on. See `src/Repositories/EloquentAbstractRepository.php` for actual implementation.