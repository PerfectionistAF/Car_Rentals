<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class MessageController extends Controller
{
    //show all messages
    public function index(){
        $messages = Message::all();//ADMIN VIEW
        return view("admin.messages", ["messages" => $messages]);//view, merge data
    }
    //create message
    public function create(){
        return view("mainpage.index");
    }
    //store message
    public function store(Request $request){
        $messages = new Message();
        $messages->name = $request->name;
        $messages->email = $request->email;
        $messages->message = $request->message;
        $messages->save();

        return redirect()->back();
    }
    //delete message
    public function destroy(Request $request):RedirectResponse{
        $id=$request->id;
        Message::where('id', $id)->delete();
        return redirect()->route('messages.html')->with('deleted_success', 'Message Deleted Successfully');
    }
    //show message details
    public function show(string $id){
        $message = Message::findOrFail($id);
        return view('admin.showMessage', compact('message'));
    }
}
