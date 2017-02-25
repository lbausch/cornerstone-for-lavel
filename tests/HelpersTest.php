<?php

namespace Tests;

class FooTest extends TestCase
{
    public function test_redact()
    {
        $url = redact(\Bausch\LaravelCornerstone\Http\Controllers\KeepAliveController::class.'@keepalive');

        $this->assertEquals($url->getTargetUrl(), 'http://localhost/lbausch/laravel-cornerstone/keepalive');

        $url = redact(\Bausch\LaravelCornerstone\Http\Controllers\KeepAliveController::class.'@keepalive', [
            'foo' => 'bar',
        ]);

        $this->assertEquals($url->getTargetUrl(), 'http://localhost/lbausch/laravel-cornerstone/keepalive?foo=bar');

        $url = redact(\Bausch\LaravelCornerstone\Http\Controllers\KeepAliveController::class.'@keepalive', null, 301);

        $this->assertEquals($url->getStatusCode(), 301);

        $url = redact(\Bausch\LaravelCornerstone\Http\Controllers\KeepAliveController::class.'@keepalive', null, 302, [
            'foo' => 'bar',
        ]);

        $this->assertEquals($url->headers->get('foo'), 'bar');
    }
}
