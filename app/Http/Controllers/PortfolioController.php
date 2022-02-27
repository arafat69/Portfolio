<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Portfolio::all();
        return view('backend.portfolio',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file_url = '';
        if ($request->photo != '') {
            $uploadPath = public_path('uploads/');
            // $fileName = $request->photo->getClientOriginalName();
            $fileExtension = $request->photo->getClientOriginalExtension();
            $newFileName = date('d_m_Y').'_'.time().'.'.$fileExtension;
            $file_url = $newFileName;
            $request->photo->move($uploadPath,$newFileName);
        }

        $portfolio = new Portfolio();
        $portfolio->category = $request->category;
        $portfolio->title = $request->title;
        $portfolio->link = $request->link;
        $portfolio->photo = $file_url;
        $portfolio->save();
        $request->session()->flash('message','Portfolio Add successfull');
        return redirect()->route('portfolio');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::find($id);

        if ($request->photo != '') {
            $uploadPath = public_path('uploads/');
            $fileExtension = $request->photo->getClientOriginalExtension();
            $newFileName = date('d_m_Y').'_'.time().'.'.$fileExtension;
            $file_url = $newFileName;
            $request->photo->move($uploadPath,$newFileName);
            unlink($uploadPath.$portfolio->photo);
            $portfolio->photo = $file_url;
        }

        $portfolio->category = $request->category;
        $portfolio->title = $request->title;
        $portfolio->link = $request->link;
        $portfolio->save();
        $request->session()->flash('message','Portfolio Update successfull');
        return redirect()->route('portfolio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        $path = public_path('uploads/'.$portfolio->photo);
        unlink($path);
        Portfolio::destroy($id);
        session()->flash('message','Delete successfull');
        return redirect()->route('portfolio');
    }
}
