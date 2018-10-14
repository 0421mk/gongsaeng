<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\like;
use DB;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class mainController extends Controller
{
    public function index() {
        return view('main.index');
    }

    public function mail(Request $request) {
        $userName = $request->name;
        $userEmail = $request->email;
        $userMessage = $request->message;

        Mail::to('0421mk@gmail.com')->send(new SendMailable($userName, $userEmail, $userMessage));

        return response()->json(['msg' => '문의를 완료했습니다.']);
    }
}
