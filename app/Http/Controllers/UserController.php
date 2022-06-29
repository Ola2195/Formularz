<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show() {
        $users = User::all();
        return view('table', compact('users'));
    }

    public function edit($id) {
        $users = User::findOrFail($id);
        return view('edit', compact('users'));
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        unlink("uploads/{$user->file}");
        
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

        User::whereId($id)->update($validatedData);
        return redirect('users/table')->with('success', 'Datas are successfully updated');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        unlink("uploads/{$user->file}");
        $user->delete();
        return redirect('users/table')->with('success', 'Datas are successfully deleted');
    }
}
