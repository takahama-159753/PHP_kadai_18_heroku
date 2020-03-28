<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        '氏名(name)' => 'required',
        '性別(gender)' => 'required',
        '趣味(hobby)' => 'required',
        '自己紹介欄(introduction)' => 'required',
    );
    public function histories()
    {
    return $this->hasMany('App\History');

    }
}