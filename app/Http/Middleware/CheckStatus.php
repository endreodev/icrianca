<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

      
		if (Auth::user()->status === 3) {

    if ((!\Route::is('backend.profile')) && (!\Route::is('backend.auth.logout')) && (!\Route::is('backend.profile.update'))) {

        $request->session()->flash('alert', [
            'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>',
            'code' => 'danger',
            'strong' => 'Ops, atenção!',
            'message' => 'Seu cadastro não está completo, por favor preencha com o restante das informações necessárias. Após isso, seu acesso será liberado.',
        ]);

        return redirect()->intended(route('backend.profile'));
    }
    // return redirect()->intended(route('backend.login'));
}
        
        return $next($request);
    }
}
