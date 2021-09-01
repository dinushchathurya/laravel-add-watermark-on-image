<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class ImageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function imageFileUpload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:4096',
        ]);

        $image = $request->file('file');
        $input['file'] = time().'.'.$image->getClientOriginalExtension();

        $imgFile = Image::make($image->getRealPath());

        $imgFile->text('© 2021 codingtricks.io', 50, 50, function($font) { 
            $font->size(60);  
            $font->color('#FF0000');  
            $font->align('center');  
            $font->align('bottom');  
        })->save(public_path('/upload').'/'.$input['file']);          

        return back()
        	->with('success','File uploaded successfully ')
        	->with('fileName',$input['file']);         
    }
}
