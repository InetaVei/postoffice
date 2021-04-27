<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use Illuminate\Http\Request;

class ParcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->post_id) && $request->post_id !== 0)
         $parcels = \App\Models\Parcel::where('post_id', $request->post_id)->orderBy('recipient')->get();
        else
        $parcels = \App\Models\Parcel::orderBy('recipient')->get();
        $posts = \App\Models\Post::orderBy('code')->get();
        return view('parcels.index', ['parcels' => $parcels, 'posts' => $posts]);

        // return view('parcels.index', ['parcels' => Parcel::orderBy('weight')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = \App\Models\Post::orderBy('town')->get();
        return view('parcels.create', ['posts' => $posts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'recipient' => 'required|max:30',
            'weight' => 'required',
            'phone' => 'required|max:20',
            'info' => 'required|max:30'

        ]);

        $parcel = new Parcel();
        // can be used for seeing the insides of the incoming request
         // dd($request->all()); die();
         $parcel->fill($request->all());
         return ($parcel->save() == 1)
        ? redirect('parcels')->with('status_success', 'New post added!')
        : redirect('parcels/create')->with('status_error', 'New post was not created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function show(Parcel $parcel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function edit(Parcel $parcel)
    {
        $posts = \App\Models\Post::orderBy('town')->get();
        return view('parcels.edit', ['parcel' => $parcel, 'posts' => $posts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parcel $parcel)
    {
        $parcel->fill($request->all());
        $parcel->save();
        return redirect()->route('parcels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parcel $parcel, Request $request)
    {
        $parcel->delete();
        return redirect()->route('parcels.index', ['post_id' => $request->input('post_id')]);
    }
}
