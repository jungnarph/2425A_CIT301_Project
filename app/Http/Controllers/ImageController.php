<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ImageController extends Controller
{
    public function index(): View {
        return view('image');
    }

    public function imageUpload(Request $request) : RedirectResponse {
        $request->validate([
            'image.*' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:5120',
        ]);
        
        foreach ($request->image as $value){
            $imageName = time().'_'.$value->getClientOriginalName();
            $value->move(public_path('images/imagez'),$imageName);

            $imageNams[]= $imageName;
        }

        return redirect()->back()->withSuccess('You have succefully uploaded images.')->with('image',$imageNams);
    }
}
