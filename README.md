# Laravel Cornerstone

Some helper functions for Laravel

## Documentation

### Helper functions

#### redact

For use in controller methods. Replaces the `redirect(action('SomeController@someMethod'))` construct.

`function redact($name, $parameters = array(), $status = 302, $headers = array(), $secure = null)`

Added bonus: Use `_self` to refer to the Controller the function is called in. For example: `redact('_self@index')`.