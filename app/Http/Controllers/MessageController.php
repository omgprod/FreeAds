<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Annonce;
use App\Message;

class MessageController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $num = Message::where('receiver_id', '=', $id)->count();
        $list = User::all();
        $users = User::select('id')->get();
        $messages = Message::with(['User'])->where('receiver_id', '=', Auth::user()->id)->get();
        $receive = Message::where('receiver_id', $id)->get();
        $sender = Message::where('sender_id', $users)->get();
        return view('messages.index', compact('users', 'messages', 'receive', 'sender', 'list', 'num'));
    }

    public function send(Request $request)
    {
        $message = new Message;
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'poster_id' => 'required',
            'sender_id' => 'required',
        ]);

        $message->title = request('title');
        $message->content = request('content');
        $message->poster_id = request('poster_id');
        $message->sender_id = request('sender_id');
        $message->save();
        dd($message);
        return redirect('messages');
    }


    public function create(Request $request)
    {
        $message = new Message;
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'sender_id' => 'required',
            'receiver_id' => 'required',
        ]);
        $message->title = request('title');
        $message->content = request('content');
        $message->receiver_id = request('receiver_id');
        $message->sender_id = request('sender_id');
        $message->save();
        return redirect('messages');
    }


    public function store(Request $request)
    {
        //
    }

    public function read(Request $request)
    {
        $this->validate($request->all());
        $id = Auth::user()->id;
        $num = Message::where('receiver_id', '=', $id)->count();
        $list = User::all();
        $users = User::select('id')->get();
        $messages = Message::with(['User'])->where('receiver_id', '=', Auth::user()->id)->get();
        $receive = Message::where('receiver_id', $id)->get();
        $sender = Message::where('sender_id', $users)->get();
        return view('messages.index', compact('users', 'messages', 'receive', 'sender', 'list', 'num'));
    }


    public function show($id)
    {
        $id = Auth::user()->id;
        $num = Message::where('receiver_id', '=', $id)->count();
        $list = User::all();
        $users = User::select('id')->get();
        $messages = Message::with(['User'])->where('receiver_id', '=', Auth::user()->id)->get();
        $receive = Message::where('receiver_id', $id)->get();
        $sender = Message::where('sender_id', $users)->get();
        return view('messages.index', compact('users', 'messages', 'receive', 'sender', 'list', 'num'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        Message::destroy($id);
        $id = Auth::user()->id;
        $num = Message::where('receiver_id', '=', $id)->count();
        $list = User::all();
        $users = User::select('id')->get();
        $messages = Message::with(['User'])->where('receiver_id', '=', Auth::user()->id)->get();
        $receive = Message::where('receiver_id', $id)->get();
        $sender = Message::where('sender_id', $users)->get();
        return view('messages.index', compact('users', 'messages', 'receive', 'sender', 'list', 'num'));
    }
}
