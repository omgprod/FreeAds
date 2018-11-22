<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\User;
use App\Annonce;
use App\Message;

class AnnonceController extends Controller
{

    protected $user;

    public function __construct()
    {

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
        $id = Auth::user()->id;
        $num = Message::where('receiver_id', '=', $id)->count();
        $ads = Annonce::all()
            ->sortByDesc("id");
        return view('home', compact('ads', 'num'));
    }

    /**
     * Display Page for create new post
     *
     * @return \Illuminate\Http\Response
     */
    public function newAd()
    {
        $id = Auth::user()->id;
        $num = Message::where('receiver_id', '=', $id)->count();
        return view('ad.index',compact('num'));
    }

    /**
     * Display Page whit Query Params
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $id = Auth::user()->id;
        $num = Message::where('receiver_id', '=', $id)->count();
        $query = $request->get('searchbar');
        $type = $request->get('title');
            $ads = Annonce::where($type, 'LIKE', "%$query%")
                ->orWhere('content', 'LIKE', "%$query%")
                ->paginate(25);
        return view('search', compact('ads', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Annonce $ads, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'picture1' => 'nullable',
            'picture2' => 'nullable',
            'picture3' => 'nullable',
            'price' => 'required',
            'category' => 'required'
        ]);

        $ads->title = request('title');
        $ads->content = request('content');
        $ads->picture1 = request('picture1');
        $ads->picture2 = request('picture2');
        $ads->picture3 = request('picture3');
        $ads->price = request('price');
        $ads->category = request('category');
        $ads->user_id = Auth::user()->id;
        $ads->save();
        flash('Welcome Aboard!');
        return redirect('home');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user;
        $num = Message::where('receiver_id', '=', $id)->count();
        $ads = Annonce::where('user_id', '=', $id)
                                    ->with("User")
                                    ->get();
        return view('ad.show', compact('ads', 'user', 'num'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('ad.create');
    }


    public function Modify(Request $request)
    {
        $id = $request['id'];
        Annonce::find($id)->update($request->all());

        return redirect('/Myads/'.Auth::user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ads = Annonce::find($id);
        $ads->delete();
        return redirect('home');
    }
}
