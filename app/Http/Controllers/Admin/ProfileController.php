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
      $cond_title = $request->cond_name;
      if ($cond_name != '') {
          $posts = profile::where('name', $cond_name)->get();
      } else {
          $posts = profile::all();
      }
      return view('admin.profile.index', ['posts' => $posts, 'cond_name' => $cond_name]);
  }
      
     public function edit()
    {
      $profile = profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }

    public function update()
    {
    $this->validate($request, Profile::$rules);
        
        $profiles = Profile::find($request->id); 
        $profiles_form = $request->all();
        
        unset($profiles_form['_token']);
        
        $profiles->fill($profiles_form)->save();
        return redirect('admin/profile/');
    }
    
public function delete(Request $request)
  {
      
      $profile = profile::find($request->id);
      $profile->delete();
      return redirect('admin/profile/');
  }  


}