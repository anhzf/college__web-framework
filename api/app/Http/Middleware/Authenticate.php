<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\URL;

class Authenticate extends Middleware
{
  /**
   * Get the path the user should be redirected to when they are not authenticated.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return string|null
   */
  protected function redirectTo($request)
  {
    if (!$request->expectsJson()) {
      if ($definedRedirect = request()->query('authenticate_url')) {
        parse_str(parse_url($definedRedirect, PHP_URL_QUERY), $query);

        $merged = $query + [
          'call' => request()->fullUrl(),
          'action' => 'verify'
        ];

        [
          'scheme' => $scheme,
          'host' => $host,
          'port' => $port,
          'path' => $path,
        ] = parse_url($definedRedirect) + ['port' => 80, 'path' => '/'];
        $port = $scheme === 'https' ? 443 : $port;
        $url = "{$scheme}://{$host}:{$port}{$path}?" . Arr::query($merged);

        return $url;
      }

      return route('login');
    }
  }
}
