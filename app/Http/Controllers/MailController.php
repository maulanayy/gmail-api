<?php

namespace App\Http\Controllers;

use Dacastro4\LaravelGmail\Facade\LaravelGmail;
use Dacastro4\LaravelGmail\Services\Message\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Testing\Fakes\MailFake;

class MailController extends Controller
{
    public function SendMail(Request $request) {
        try {

            $mail = new Mail;
            // $auth = LaravelGmail::getAuthUrl();
            // print_r($auth);
            // $token = "1//0g9g1D8bLk1zqCgYIARAAGBASNwF-L9Ir2uPpIvMGVYTOpYPlpsitAH1Yhtk9upKSEYahHSFliKCU3H00vDye12wVG85T3R4mI0M";
            // $mail->using($token);
            $mail->to($request->to,$name=null);
            $mail->from($request->from,$name=null);
            $mail->subject($request->subject);
            $mail->message($request->body);
            $mail->priority(1);
            $mail->send();



            return response()->json([
                'message' => "Send mail Success",
                'data' => (object)[]
            ]);
        }catch(\Exception $err) {
            return response()->json([
                'message' => "error",
                'data' => $err->getMessage()
            ],500);
        }
    }

    public function Inbox(){
        try {

            return response()->json([
                'message' => "Get Inbox mail Success",
                'data' => LaravelGmail::message()
                ->in( $box = 'inbox' )
                ->all()
            ]);
        }catch(\Exception $err) {
            return response()->json([
                'message' => "error",
                'data' => $err->getMessage()
            ],500);
        }
    }

    public function DetailEmail($id){
        try {
            
            return response()->json([
                'message' => "Get Inbox mail Success",
                'data' => LaravelGmail::message()->get($id)
            ]);
        }catch(\Exception $err) {
            return response()->json([
                'message' => "error",
                'data' => $err->getMessage()
            ],500);
        }
    }

    public function Sent(){
        try {
            return response()->json([
                'message' => "Get Sent mail Success",
                'data' =>  LaravelGmail::message()
                ->in( $box = 'sent' )
                ->all()
            ]);
        }catch(\Exception $err) {
            return response()->json([
                'message' => "error",
                'data' => $err->getMessage()
            ],500);
        }
    }
}
