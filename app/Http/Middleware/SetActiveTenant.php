<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Tenant;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class SetActiveTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->getHost();
        $tenant = Tenant::where("domain", '127.0.0.1:8000')->firstOrFail();
        //$tenant = Tenant::where("domain", $tenant)->firstOrFail();
        App::instance('tenant.active', $tenant);
        //in run time -> change name db
        //to switch into database tenent when calling this middleware
        $db = $tenant->db_name;
        Config::set('database.connections.mysql.database', $db);//change name db from the old into the new
        return $next($request);

    }
}
