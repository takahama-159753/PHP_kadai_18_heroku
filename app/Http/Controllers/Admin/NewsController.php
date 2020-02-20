<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function add()
  {
      return view('admin.news.create');
  }

}


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
  // 以下を追記
  public function add()
  {
      return view('admin.news.create');
  }

}

//Controllerの役割について、説明してください。
//Controllerは、ViewからのアクションをもとにModelにアクセスしたりするなど両者を取り持っています。

//ControllerとRoutingの役割について、説明してください。

//Controllerは、ViewからのアクションをもとにModelにアクセスしたりするなど両者を取り持っています。
//RoutingはURLとコントローラーのアクションの対応ルールのことです。

//【応用】 artisanを使って、Admin/ProfileControllerを作成しましょう。
// 作成済み

//応用】 Admin/ProfileControllerに、以下のadd, create, edit, update それぞれのActionを追加してみましょう。
//追加済み