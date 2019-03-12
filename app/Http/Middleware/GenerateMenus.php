<?php

namespace App\Http\Middleware;

use Closure;
use Menu;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Menu::make('mainMenu', function ($menu) {
            //DASHBOARD
            $menu->add('Dashboard', 'home')
                 ->data('icon', 'dashboard');

            //Master     
            $menu->add('Profil')
                 ->data('icon', 'computer');
            //Provider
            $menu->profil->add('Sejarah', 'profil/sejarah');
        });

        return $next($request);
    }
}
