<?php
namespace App\Http\Middleware;

use App\Models\Tenant;
use Closure;

class IdentifyTenant
{
    public function handle($request, Closure $next)
    {
        $tenant = Tenant::where('domain', $request->getHost())->first();

        if (!$tenant) {
            abort(404, 'Tenant not found');
        }

        $tenant->makeCurrent();

        return $next($request);
    }
}

