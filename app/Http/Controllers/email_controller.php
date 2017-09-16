<?php

namespace App\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class email_controller extends Controller
{
    public function contactFormWebsite (Request $request){

        $userEmail = $request->input('email');
        $userEmailSubject = $request->input('subject');
        $userEmailContent = $request->input('content');

        Mail::send('emails.contactFormWebsite', ['userEmail' => $userEmail, 'emailSubject' => $userEmailSubject, 'emailContent' => $userEmailContent], function($message){
            $message->to('senouci.o@gmail.com')->from('contact@tic-tak.com')->subject('SiteWeb email');
        });
    }
}
