<?php



namespace App\Http\Controllers\Frontend;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Models\Definition;

use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Log;





class FormsController extends Controller

{



    protected $email_form_helped_institute;

    protected $email_form_contact;



    public function __construct()

    {

        $definitions = Definition::find(1);

        $this->email_form_helped_institute = $definitions->email_form_helped_institute;

        $this->email_form_contact = $definitions->email_form_contact;

    }





    public function send(Request $request, $form)

    {

        if ($form === 'how-to-support') {

            return $this->sendHowToSupport($request);

        }

        if ($form === 'contact') {

            return $this->sendContact($request);

        }

    }



    public function sendHowToSupport(Request $request)

    {

        try {



            if (request()->attention) {

                // throw new \Exception("Erro ao enviar mensagem");

            }



            $request->validate([

                'name' => 'required',

                'email' => 'required',

                'phone' => 'required',

                'message' => 'required',

                'captcha' => 'required|captcha',

                'g-recaptcha-response' => (!App::environment('local')) ? 'required|recaptchav3:register,0.5' : '',

            ]);



            $data =

                [

                    'subject'       => 'Quero ajudar o Projeto!',

                    'name'          => request()->name,

                    'content' => [

                        'name'                  => request()->name,

                        'email'                 => request()->email,

                        'phone'                 => request()->phone,

                        'message'               => request()->message,

                    ],

                ];

            $sender = (object) [

                'name' => 'Instituto Desportivo da Criança',

                //'email' => $this->email_form_helped_institute,

              	'email' => 'originalalison@gmail.com'

            ];



            $send = app('App\Services\SendGridService')->send($data, $sender, 'contact');



            if (!$send) {

                throw new \Exception("Erro ao enviar mensagem");

            }



            request()->session()->flash('alert', [

                'code' => 'success',

                'strong' => 'Legal',

                'message'  => 'E-mail enviado com sucesso, aguarde nosso retorno!'

            ]);



            return redirect(route('frontend.home'));

        } catch (\Exception $e) {

            request()->session()->flash('alert', [

                'code' => 'danger',

                'strong' => 'Ops!',

                'message'  => 'Ops, Houve um erro!' . $e->getMessage(),

            ]);



            return redirect()->back()->withInput();

        }

    }



    public function sendContact(Request $request)

    {
        try {
            // if (request()->attention) {
            //     echo 'error ao enviasr'; exit;
            //     throw new \Exception("Erro ao enviar mensagem");
            // }

            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                // 'subject_message' => 'required',
                // 'captcha' => 'required|captcha',
                'message' => 'required',
                // 'g-recaptcha-response' => (!App::environment('local')) ? 'required|recaptchav3:register,0.5' : '',

            ]);

            $data = [
                    'subject'       => 'Contato',
                    'name'          => request()->name,
                    'content' => [
                        'name'                  => request()->name,
                        'email'                 => request()->email,
                        'phone'                 => request()->phone,
                        'subject_message'       => request()->subject_message,
                        'message'               => request()->message,
                    ],
                ];

            $sender = (object) [
                'name' => 'Instituto Desportivo da Criança',
                'email' => $this->email_form_contact,
            ];

            $send = app('App\Services\SendGridService')->send($data, $sender, 'contact');

            Log::alert('LOG ENVIO DE EMAIL');

            Log::alert(print_r($send));

            if (!$send) {
                echo 'deu erro'; exit;
                throw new \Exception("Erro ao enviar mensagem");

            }

            request()->session()->flash('alert', [
                'code' => 'success',
                'strong' => 'Legal',
                'message'  => 'E-mail enviado com sucesso, aguarde nosso retorno!'
            ]);


            return redirect(route('frontend.home'));

        } catch (\Exception $e) {

            request()->session()->flash('alert', [

                'code' => 'danger',

                'strong' => 'Ops!',

                'message'  => 'Ops, Houve um erro!' . $e->getMessage(),

            ]);



            return redirect()->back()->withInput();

        }

    }



    public function reloadCaptcha()

    {

        return response()->json(['captcha' => captcha_img()]);

    }

}

