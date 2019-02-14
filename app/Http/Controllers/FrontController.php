<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thumbnail;

class FrontController extends Controller
{
    public function index()
    {
        $thumbnails = Thumbnail::all();

        return view('front.index', ['thumbnails' => $thumbnails]);
    }

    public function show($id)
    {
        $thumbnail = Thumbnail::find($id);

        return view('front.show', ['thumbnail' => $thumbnail]);
    }
}
