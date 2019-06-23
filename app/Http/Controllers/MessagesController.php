<?php


namespace SP\Http\Controllers;


use Illuminate\Http\Request;

class MessagesController extends Controller
{

    public function index(Request $request){
        return response()->view('messages.index')
            ->header("Refresh", "5;url=".urldecode($request->input('redirect')));
    }

}