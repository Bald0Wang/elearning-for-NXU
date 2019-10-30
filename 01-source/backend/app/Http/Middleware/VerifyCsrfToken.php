<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        'api/v1/noequipments/1/loan',    //对维修员借出工具不加token验证
        'api/v1/noequipments/1/control'    //对维修员控制led灯不加token验证
    ];
}
