<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Models\Photo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Monolog\Logger;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePhotoRequest  $request
     */
    public function store(StorePhotoRequest $request)
    {
        Log::debug('[PhotoController::store]', ['$request' => $request]);
        Log::debug('[PhotoController::store] all', [$request->all()]);

        if ($request->hasFile('photo-file') && $request->file('photo-file')->isValid()) {
            $fileName = $request->file('photo-file')->getClientOriginalName();
            $extension = $request->file('photo-file')->extension();
            $fileName = sha1($fileName) . '.' . $extension;
            $savePath = $request->file('photo-file')->storeAs('public/images', $fileName);
            Log::debug('[PhotoController::store] $savePath', [$savePath]);
            $photo = new Photo();
            $photo->name = $request->input('photo-name');
            $photo->sort = (int) $request->input('photo-sort');
            $photo->published = (int) $request->input('photo-published');
            $photo->tag  = $request->input('photo-tag');
            $photo->path = $savePath;
            $photo->save();
        }
        return Redirect::to('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePhotoRequest  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePhotoRequest $request, Photo $photo)
    {
        //
    }

    public function destroy(int $id)
    {
        $photo = Photo::findOrFail($id);
        Storage::delete($photo->path);
        Photo::destroy([$id]);
        return Redirect::to('/dashboard');
    }
}
