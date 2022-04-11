<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\http\Request;
use Illuminate\Support\Facades\Log;
use  Illuminate\Support\Facades\Mail;
use App\Mail\Feedback;
use Illuminate\Mail\Mailable;
use Illuminate\Routing\ResponseFactory;

class ContactController extends Controller
{
    public function contactEmail()
    {
        $toEmail = "linamperi@gmail.com";  // адресс получателя
        Mail::to($toEmail)->send(new Feedback());
            return 'Сообщение отправлено на адрес ' .  $toEmail;

    }
}
