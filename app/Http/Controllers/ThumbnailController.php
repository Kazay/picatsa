<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Thumbnail;

class ThumbnailController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thumbnails = Thumbnail::all();

        return view('admin.index', ['thumbnails' => $thumbnails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateForm($request);
        
        $visible = ($request->visible) ? 1 : 0;

        $thumbnail = Thumbnail::create([
            'caption' => $request->caption,
            'url' => $request->url,
            'description' => $request->description,
            'visible' => $visible,
        ]);

        if($thumbnail->save())
        {
            $status = 'success';
            $message = 'Yeah, thumbnail created !';
        }
        else
        {
            $status = 'error';
            $message = 'Damn, something went wrong...';
        }
        
        return redirect()->route('thumbnail.index')->with($status, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Thumbnail $thumbnail)
    {
        //$thumbnail = Thumbnail::find($id);

        return view('admin.edit', ['thumbnail' => $thumbnail]);
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
        $message = '';
        $status = '';

        $visible = ($request->visible) ? 1 : 0;

        $this->validateForm($request);

        $thumbnail = Thumbnail::find($id);

        $thumbnail->fill([
            'caption' => $request->caption,
            'url' => $request->url,
            'description' => $request->description,
            'visible' => $visible,
        ]);

        if($thumbnail->save())
        {
            $status = 'success';
            $message = 'Yeah, thumbnail updated !';
        }
        else
        {
            $status = 'error';
            $message = 'Damn, something went wrong...';
        }
        
        return redirect()->route('thumbnail.index')->with($status, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thumbnail = Thumbnail::find($id);
        $thumbnail->delete();

        return redirect()->route('thumbnail.index');
    }

    private function validateForm($request)
    {
        return Validator::make($request->all(), [
            'caption' => 'required|max:75',
            'url' => 'required|max:255',
            'description' => 'required'
        ])->validate();
    }
}
