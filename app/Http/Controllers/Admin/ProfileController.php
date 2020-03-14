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
    public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          $posts = profile::where('title', $cond_title)->get();
      } else {
          $posts = profile::all();
      }
      return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
      
     public function edit()
    {
        // profile Modelからデータを取得する
      $profile = profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }

    public function update()
    {
       
      $this->validate($request, profile::$rules);
      
      $profile = profile::find($request->id);
      
      $profile_form = $request->all();
      if (isset($profile_form['image'])) {
        $path = $request->file('image')->store('public/image');
        $profile->image_path = basename($path);
        unset($profile_form['image']);
      } elseif (isset($request->remove)) {
        $profile->image_path = null;
        unset($profile_form['remove']);
      }
      unset($profile_form['_token']);
      $profile->fill($profile_form)->save();
      
        return redirect('admin/profile/edit');
    }
    
}

