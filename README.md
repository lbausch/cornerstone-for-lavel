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