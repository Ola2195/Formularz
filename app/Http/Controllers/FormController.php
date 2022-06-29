<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FormController extends Controller
{
    public function index() {
        return view('index');
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $request->hasFile('file');
        $image = $request->file('file');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('uploads', $filename);
        
        $validatedData['file'] = $filename;

        $show = User::create($validatedData);
        return redirect('/form')->with('success', 'Datas are successfully saved');
    }
}

