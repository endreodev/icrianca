<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;

class NewsletterController extends Controller
{
    public function save(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'email' => 'required|unique:newsletter,email',
                'g-recaptcha-response' => (!App::environment('local')) ? 'required|recaptchav3:register,0.5' : '',
            ]);

            if ($validator->fails()) {
                return redirect(route('frontend.home'))
                    ->withErrors($validator)
                    ->withInput();
            }

            $request->merge([
                'status' => TRUE,
            ]);

            Newsletter::create($request->all());

            $request->session()->flash('alert', [
                'code' => 'success',
                'strong' => 'Legal',
                'message'  => 'Operação realizada com sucesso!'
            ]);

            return redirect(route('frontend.home'));
        } catch (\Exception $e) {
            $request->session()->flash('alert', [
                'code' => 'danger',
                'strong' => 'Ops!',
                'message'  => 'Ops, Houve um erro!' . $e->getMessage(),
            ]);

            // dd($e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
