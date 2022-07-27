<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function __invoke()
    {
        //$photoList = Photo::all()->orderByDesc('sort');
        $photoList = Photo::query()->orderBy('sort', 'desc')->orderBy('created_at', 'desc')->get();
        Log::debug('$photoList', [$photoList]);
        return view('dashboard', ['photoList' => $photoList]);
    }
}
