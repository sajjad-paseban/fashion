<?php

namespace App\Http\Middleware;

use App\Models\Section;
use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InitialMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $setting = Setting::count();
        $section = Section::count();

        if($setting == 0)
            Setting::create([]);
    
        if($section == 0)
            Section::create([]);
    
    
        return $next($request);
    }
}
