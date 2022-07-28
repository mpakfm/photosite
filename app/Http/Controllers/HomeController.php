<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $isProduction = false;
        if (env('APP_ENV') == 'production') {
            $isProduction = true;
        }

        $tags      = Photo::getTags();
        $photoList = Photo::query()->where('published', '=', '1')
            ->orderBy('sort', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('home', ['isProduction' => $isProduction, 'tag' => $tags[0], 'photoList' => $photoList]);
    }
}
