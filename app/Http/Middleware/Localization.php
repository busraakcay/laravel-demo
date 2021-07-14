<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    /**
     * bu aşamada middleware'den dinamik olarak
     * dropdown'dan dil seçeneğini alabilmek için oluşturduk.
     * şimdi bunları kernel.php de web routelarına eklmemiz gerekmekte
     * çünkü global olarak ayarlamamız gerekmekte.
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has("locale")){
            App::setLocale(session()->get("locale"));
        }

        return $next($request);
    }
}
