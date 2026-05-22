<?php

namespace App\Http\Controllers;

use App\Models\Supporter;

class SupporterController extends Controller
{
    public function index()
    {
        $supporters = Supporter::active()->get();

        return view('frontend.supporter', compact('supporters'));
    }
}
