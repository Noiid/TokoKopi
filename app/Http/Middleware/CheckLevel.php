<?php

namespace App\Http\Middleware;

use Closure;

class CheckLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,...$id_lvl)
    {
        if(in_array($request->user()->level->deskripsi_level,$id_lvl)){
            
            return $next($request);
        }else{
            return back()->with('error','Maaf anda tidak mempunyai hak akses!');
        }

        // return redirect('/');
    }
}
