<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $tags      = Photo::getTags();
        $photoList = Photo::query()->where('published', '=', '1')
            ->orderBy('sort', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
        Log::debug('[HomeController::__invoke]', ['$tags[0]' => $tags[0]]);
        return view('home', ['tag' => $tags[0], 'photoList' => $photoList]);
    }
}
