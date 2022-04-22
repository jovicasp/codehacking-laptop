<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminMediasController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
        return view('admin.media.index', compact('photos'));
    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $name = time() . "-" . $file->getClientOriginalName();
        $file->move('images', $name);
        $photo = Photo::create([
            'path' => $name,
            'imageable_id' => Auth::user()->id,
            'imageable_type' => 'App\Models\User']);

        Session::flash('created_photo', 'The photo ' . $photo->path . ' has been created!');

//        return redirect(route('users.create'));
    }

    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        $photo->delete();                                       //DELETE FROM DB-TABLE-PHOTOS
        $path = public_path() . $photo->path;
        if (File::exists($path)) {
            unlink(public_path() . $photo->path);       //DELETE FILE FROM PUBLIC/IMAGES FOLDER
        }
        Session::flash('deleted_photo', 'The photo ' . $photo->path . ' has been deleted!');
        return redirect(route('media.index'));
    }
}
