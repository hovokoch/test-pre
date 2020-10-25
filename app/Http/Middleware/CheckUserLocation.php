<?php

namespace App\Http\Middleware;

use App\Http\Helpers\GeolocationAPI;
use Closure;
use Illuminate\Http\Request;

class CheckUserLocation
{
    use GeolocationAPI;

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var object $location */
        $location = $this->getGeoData();
        if ($location->country_code && !in_array($location->country_code, ['CO', 'AU'])) {
            return $next($request);
        }
        return redirect()->route('home')->withErrors('Sorry! You can\'t access this feature.');
    }
}
