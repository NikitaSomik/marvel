<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFormValidation;
use App\Http\Requests\EditFormValidation;
use Illuminate\Http\Request;
use File;
use Auth;
use App\SuperHero;


class HeroesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'show', 'edit', 'delete'] ]);
    }


    public function index()
    {
        //
        $heroes = SuperHero::orderBy('created_at', 'DESC')->paginate(4);
        return view('heroes/index', compact('heroes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('heroes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFormValidation $request)
    {

        if($request->hasFile('images')) {
            $pic = $request->file('images');
            $nameImage = time() . '-' . $pic->getClientOriginalName();
            $pic->move(public_path().'/images', $nameImage);
        } else{
            $nameImage = '';
        }

        $hero = new SuperHero;
        $hero->user_id = Auth::user()->id;
        $hero->nickname = $request->nickname;
        $hero->real_name = $request->real_name;
        $hero->origin_description = $request->origin_description;
        $hero->superpowers = $request->superpowers;
        $hero->catch_phrase = $request->catch_phrase;
        $hero->image = $nameImage;
        $hero->save();

        return back()->with('flash_message', 'Your post was created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $heroes = SuperHero::findOrFail($id);
        return view('heroes/show', compact('heroes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hero = SuperHero::findOrFail($id);
        return view('heroes/edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditFormValidation $request, $id)
    {
        $hero = SuperHero::findOrFail($id);

        if($request->hasFile('images')) {

                $prevImage = public_path("/images/{$hero->image}");
                if (File::exists($prevImage)) {
                    //unlink($prevImage);
                    File::delete($prevImage);
                }
                $file = $request->file('images');
                $name = time() . '-' . $file->getClientOriginalName();
                $file = $file->move((public_path().'/images'), $name);
                $request->image = $name;
        } else {

        }

        $hero->user_id = Auth::user()->id;
        $hero->nickname = $request->nickname;
        $hero->real_name = $request->real_name;
        $hero->origin_description = $request->origin_description;
        $hero->superpowers = $request->superpowers;
        $hero->catch_phrase = $request->catch_phrase;
        $hero->image = isset($request->image) ? $request->image : $hero->image;
        $hero->save();

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hero = SuperHero::findOrFail($id);
        $hero->delete();
        return redirect()->back();
    }
}
