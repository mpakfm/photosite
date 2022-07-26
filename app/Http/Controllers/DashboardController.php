<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $photoList = Photo::all();
        return view('dashboard', ['photoList' => $photoList]);
    }
}
