<?php

namespace App\Http\Controllers;

use App\Models\Sondage;
use Illuminate\Http\Request;

class SondageController extends Controller
{
    public function index()
    {
        $sondages = Sondage::all();

        return view('pages.sondage.index', compact('sondages'));
    }
}
