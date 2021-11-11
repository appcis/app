<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sondage;
use Illuminate\Http\Request;

class SondageController extends Controller
{
    public function index()
    {
        $sondages = Sondage::all();

        return view('pages.admin.sondage.index', compact('sondages'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'libelle' => 'required',
            'description' => 'nullable'
        ]);

        Sondage::create($data);

        return redirect()->route('admin.sondage.index');
    }

    public function create()
    {
        return view('pages.admin.sondage.create');
    }
}
