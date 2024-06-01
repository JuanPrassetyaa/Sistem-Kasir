<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{

    public function handle(Request $request, Closure $next, $role)
    {
        //INI DI GUNAKAN UNTUK AUTHENTIKASI AGAR YANG BERBEDA ROLE TIDAK BISA MENGAKSES HALAMAN 1 SAMA LAINNYA
                if(auth()->user()->role == $role){
                return $next($request);
                }
                if(auth()){
                    if(auth()->user()->role == 'admin'){
                        return redirect('dashboard');
                    }
                    elseif(auth()->user()->role == 'petugas'){
                        return redirect('dashboard-petugas');
                    }
                };
    }
}


