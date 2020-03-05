<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;

class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
      $this->validate($request,Profile::$rules);
      $Profile = new Profile;
      $form = $request->all();
      unset($form['_token']);
      $Profile->fill($form);
      $Profile->save();
      return redirect('admin/profile/create');

    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update()
    {
        return redirect('admin/profile/edit');
    }
    
}

