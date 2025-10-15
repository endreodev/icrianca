<?php



namespace App\Services;



use Carbon\Carbon;

use Illuminate\Support\Facades\Log;

use View;

use Illuminate\Support\Facades\Mail;

use App\Mail\GeneralEmail;



class SendGridService

{



    public $api_key;

    public $service_email;

    public $service_name;



    public function __construct()

    {

        //$this->api_key = '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';

      	$this->api_key = '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';

        $this->service_name = 'Instituto Desportivo da Criança';

        $this->service_email = 'alison@bckcode.com.br';



        // $this->api_key = config('app.sendgrid_api_key');

        // $this->service_name = config('app.service_sendgri_name');

        // $this->service_email = config('app.service_sendgri_email');

    }



    public function send(array $content, object $sender, string $template = 'blank')

    {

        $response = [];



        Log::warning($this->service_email);



        try {



            $content['date'] = Carbon::now()->format('d/m/Y \a\s H:i');





            $email = new \SendGrid\Mail\Mail();

            $email->setFrom('alison@bckcode.com.br', $this->service_name);

            $email->addTo(
            $sender->email,

            $sender->name,

            null,

            0

            );

            $email->setSubject($content['subject']);



            $email->addContent(

            'text/html',

            // '<strong>and fast with the PHP helper library.</strong>'

            View::make('mails.' . $template, ['data' => $content['content']])->render(),

            );





            $sendgrid = new \SendGrid($this->api_key);

            $response['result'] = $sendgrid->send($email);



            Log::alert('service log');

            Log::alert(print_r($response['result']));



            $response['success'] = true;



          //dd($response);



        } catch (\Exception $e) {

            $response['success'] = false;

            $response['error'] = $e->getMessage();

            Log::warning($e->getMessage());

        }



        return $response;

    }

}

