<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\Picture;
use App\Models\User;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class AdController extends Controller
{
    public function index()
    {
        return view('ads.index',[
            'ads' => Ad::all(),
            'categories' => Category::all(),
            'pictures' => Picture::all()->where('ad_id', 'like','1')
        ]);
    }

    public function show(Ad $ad)
    {
        return view('ads.show',[
            'ad' => $ad,
            'pictures' => Picture::all()->where('ad_id', 'like','1')

        ]);
    }
}
