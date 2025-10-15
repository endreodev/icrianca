<?php



namespace App\Mail;



use Illuminate\View\View;

use Illuminate\Bus\Queueable;

use Illuminate\Mail\Mailable;

use Illuminate\Queue\SerializesModels;

use Illuminate\Contracts\Queue\ShouldQueue;



class NewMail extends Mailable

{

    use Queueable, SerializesModels;



    /**

     * Create a new message instance.

     *

     * @return void

     */

    public $view;

    public $content;

  	public $sender;

  	public $template;

  	public $from;



    public function __construct($content, $view, $sender, $from)

    {

        

    }



    /**

     * Build the message.

     *

     * @return $this

     */

    public function build()

    {

        return $this->view('mails.'.$this->template, $this->content['content'])

            ->from($this->from, 'Instituto Desportivo da Criança')

            ->subject($this->content['subject'])

            ->tag('IDC');

    }

}

