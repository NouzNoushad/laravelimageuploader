<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Upload;

class UploadController extends Controller
{
    public function CreateImage(Request $request){

        $request->validate([
            'file' => 'required | mimes:jpeg,jpg,png | max:20000',
            'name' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'story' => ['nullable'],
        ]);
        $gallery = new Upload;
        if($request->hasFile('file')){
            $destination = 'public/uploads';
            $image = uniqid('', true) . '.' . $request->file('file')->guessClientExtension();
            $request->file('file')->storeAs($destination, $image);
            $gallery->file = $image;
        }
        $gallery->name = $request->name;
        $gallery->story = $request->story;
        $gallery->save();
        back()->with('status', 'Image has been uploaded successfully');
        return redirect('/gallery');
    }

    public function displayAllImages(){

        $images = Upload::all();
        return view('Gallery', ['images' => $images]);
    }

    public function updateImage($id){

        $image = Upload::find($id);
        return view('Update', ['image' => $image]);
    }

    public function postUpdateImage(Request $request){

        $request->validate([
            'file' => 'mimes:jpg,jpeg,png | max:20000',
            'name' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'story' => 'nullable',
        ]);
        $gallery = Upload::find($request->id);
        if($request->hasFile('file')){
            $destination = 'public/uploads';
            $image = uniqid('', true) . '.' . $request->file('file')->guessClientExtension();
            Storage::disk('public')->delete('uploads/' . $gallery->file);
            $request->file('file')->storeAs($destination, $image);
            $gallery->file = $image;
        }
        $gallery->name = $request->name;
        $gallery->story = $request->story;
        $gallery->save();
        back()->with('status', 'Image has been updated successfully');
        return redirect('/gallery');
    }

    public function deleteImage($id){

        $image = Upload::find($id);
        $image->delete();
        back()->with('status', 'Image has been deleted successfully');
        return redirect('/gallery');
    }

    public function searchImage(Request $request){

        $images = Upload::where('name', 'like', '%' . $request->search . '%')->get();
        return view('Gallery', ['images' => $images]);
    }
}
