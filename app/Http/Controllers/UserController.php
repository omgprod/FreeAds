<?php
/**
 * Created by PhpStorm.
 * User: omg-p
 * Date: 21/10/2018
 * Time: 12:09
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Annonce;
use App\Message;
use App\Flash;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $user;
    protected $message;

    public function __construct()
    {
        $this->message;
        $this->user;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $id = Auth::user()->id;
        $num = Message::where('receiver_id', '=', $id)->count();
        return view('users.index', compact('users', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo asset('storage/file.txt');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, Request $request)
    {
        $image = $request->file('picture');
        $input['picture'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/storage/user');
        $image->move($destinationPath.Auth::user()->id, $input['picture']);
        DB::table('users')->where('id', Auth::user()->id)->update(['picture' => $destinationPath.Auth::user()->id]);


        return back();

/*        if ($request->hasFile('picture')) {
            $filename = $request['picture'];
            $extension = $request->file('picture')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('picture')
                ->storeAs('public/storage/', $fileNameToStore);
            $user->save();
        } else {
            echo 'error';
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $messages = Message::all();
        $user = Auth::user();
        $id = Auth::user()->id;
        $num = Message::where('receiver_id', '=', $id)->count();
        Flash::set('success', 'User edited');
        return view('users/edit', compact('user', 'messages', 'num'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $messages = Message::all();
        $users = User::all();
        $user = Auth::user();
        $id = Auth::user()->id;
        $num = Message::where('receiver_id', '=', $id)->count();
        return view('users/edit', compact('users', 'messages', 'num', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        $user->save();
        return redirect('users/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return 'Utilisateur supprimé !';
    }

    public function destroyForm(User $user)
    {
        return view('destroy', compact('user'));
    }
}
