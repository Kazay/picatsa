<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thumbnail;

class FrontController extends Controller
{
    public function index()
    {
        $thumbnails = Thumbnail::all()->where('visible', 1);

        return view('front.index', ['thumbnails' => $thumbnails]);
    }

    public function show(Thumbnail $id)
    {
        //$thumbnail = Thumbnail::find($id);

        return view('front.show', ['thumbnail' => $id]);
    }
}
