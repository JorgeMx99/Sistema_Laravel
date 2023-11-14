<?php

namespace App\Http\Controllers;

use App\Mail\Testmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(){

    
    $details=[
        'title' =>'Corre de sus amigo y servidor',
        'body' => 'Este es un ejemplo'

    ];
Mail::to('soporte.sco.sotop@gmail.com')->send(new Testmail($details));
return 'Correo Electronico Enviado';

}
}
