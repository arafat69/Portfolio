<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class socialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social = Social::all();
        return view('backend.social_link',compact('social'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'icon'=>'required',
            'link'=>'required'
        ]);
        $social = new Social();
        $social->icon = $request->icon;
        $social->link = $request->link;
        $social->save();
        $request->session()->flash('message','Social link add successfull');
        return redirect()->route('social');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'icon'=>'required',
            'link'=>'required'
        ]);
        $social = Social::find($id);
        $social->icon = $request->icon;
        $social->link = $request->link;
        $social->save();
        $request->session()->flash('message','Social link update successfull');
        return redirect()->route('social');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Social::destroy($id);
        session()->flash('message','link Delete successfull');
        return redirect()->route('social');
    }
}
