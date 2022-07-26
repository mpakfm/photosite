<?php
/**
 * Created by PhpStorm
 * Project: photo
 * User:    mpak
 * Date:    24.07.2022
 * Time:    22:45
 */

namespace App\View\Components;

use App\Models\Photo;
use Illuminate\View\Component;

class UmbrellaLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $photoList = Photo::all();
        return view('layouts.umbrella', ['photoList' => $photoList]);
    }
}
