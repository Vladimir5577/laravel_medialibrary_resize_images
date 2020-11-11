<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;

use App\Models\User;


use Spatie\MediaLibrary\MediaCollections\Models\Media;


class HomeController extends Controller
{
    public function index () {
    	$user = User::first();
    	$data = $user->getMedia('images_another');
    	return view('index', ['data' => $data]);
    }

    public function save_resize (ImageRequest $request) {
    	$user = new User();
    	switch ($request->size) {
    		case 1:
    			$user->image_size(1280, 720);
    			break;
    		case 2:
    			$user->image_size(640, 360);
    			break;
    		case 3:
    			$user->image_size(320, 180);
    			break;
    		case 4:
    			$user->image_size(160, 90);
    			break;
    	}

    	$user = User::first();
    	$file = $request->file('image');
    	$user->addMedia($file)->toMediaCollection('images_another');

    	return redirect()->route('home')->with('success', 'Record added successfully');
    }

    public function delete ($id) {
        $media = Media::find($id);
        $media->delete();

        return redirect()->route('home')->with('success', 'Record deleted successfully');
    }
}
