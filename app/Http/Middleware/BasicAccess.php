<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BasicAccess
{
    private const AUTH_REALM = 'Pinball Friends requires authentication';

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (app()->environment('testing')) {
            return $next($request);
        }

        $username = config('app.security.username');
        $password = config('app.security.password');

        if (!$username || !$password) {
            return $next($request);
        }

        $authorization = $request->header('Authorization');
        if ($authorization !== $this->expectedHeader($username, $password)) {
            return response()
                ->json(['message' => 'Unauthorized'], 401)
                ->header('WWW-Authenticate', sprintf('Basic realm="%s"', self::AUTH_REALM));
        }

        return $next($request);
    }

    private function expectedHeader(string $username, string $password): ?string
    {
        return sprintf('Basic %s', base64_encode($username. ':' . $password));
    }
}
