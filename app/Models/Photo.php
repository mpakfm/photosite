<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Photo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'sort',
        'published',
        'path',
        'tag',
    ];

    /**
     * Get all tags.
     */
    public static function getTags()
    {
        $stmt = DB::table('photos')->select('tag')->groupBy('tag')->get();
        $tags = [];
        foreach ($stmt as $item) {
            $tags[] = $item->tag;
        }
        return $tags;
    }
}
