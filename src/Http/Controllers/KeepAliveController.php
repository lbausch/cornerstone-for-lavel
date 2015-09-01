<?php

namespace Bausch\LaravelCornerstone\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class KeepAliveController extends BaseController
{
    /**
     * Keep alive (204 No Content).
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function keepalive()
    {
        return response('', 204);
    }
}
