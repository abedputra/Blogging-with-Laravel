<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class FrontController extends Controller
{
  public function index()
  {
      return view('welcome');
  }

  public function showblog($slug)
  {
      $blog = Blog::where('slug', '=', $slug)->first();

      if(!$blog)
      abort(404);

      return view('viewblog', ['blog' => $blog]);
  }
}
