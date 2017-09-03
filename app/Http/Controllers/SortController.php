<?php

namespace App\Http\Controllers;

use App\SortUtil;
use Illuminate\Http\Request;

class SortController extends Controller
{
    public function bubble()
    {
        $numbers = range(0, 99);
        shuffle($numbers);
        return SortUtil::bubbleSort($numbers);
    }
}
