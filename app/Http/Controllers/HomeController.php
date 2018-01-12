<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function showadd()
    {
        return view('add');
    }

    public function storeadd(Request $request)
    {
        $blog = new Blog;
        $blog->title   = $request->title;
        $blog->content = $request->content;
        $blog->author = $request->author;
        $blog->slug = Str::slug($request->title);
        $blog->save();

        return redirect('admin/blog');
    }

    public function blog()
    {
        $allblog = Blog::all();
        return view('blog', compact('allblog', $allblog));
    }

    public function showedit($id)
    {
        $blog = Blog::find($id);

        if(!$blog)
        abort(404);

        return view('edit', ['blog' => $blog]);
    }

    public function storeedit(Request $request, $id)
    {
        $blog = Blog::find($id);

        $blog->title   = $request->title;
        $blog->content = $request->content;
        $blog->author = $request->author;
        $blog->slug = Str::slug($request->slug);
        $blog->save();

        return redirect('admin/blog');
    }

    public function deleteblog($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        return redirect('admin/blog');
    }

    public function profileid($id)
    {
        $user = User::where('id', '=', $id)->first();
        $email = $user->email;

        return view('profile', ['user' => $user, 'email' => $email]);
    }

    public function profile()
    {
        $user = User::where('email', '=', Auth::user()->email)->first();
        $email = Auth::user()->email;

        return view('profile', ['user' => $user, 'email' => $email]);
    }

    public function profileedit()
    {
        $user = User::where('email', '=', Auth::user()->email)->first();
        return view('profileedit', ['user' => $user]);
    }

    public function profileeditstore(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'string|max:255',
            'email' => 'string|email|max:255',
            'password' => 'string|min:6|confirmed',
        ]);

        $user = User::find($id);

        if($validator->passes())
        {
          $user->name     = $request->name;
          $user->email    = $request->email;
          if (!empty($request->password))
          {
            $user->password = Hash::make($request->password);
          }

          $user->save();

          return redirect('admin/profile');
        }
        else
        {
          return Redirect::to('admin/profile/edit')
            ->withErrors($validator)
            ->withInput();
        }
    }

    public function user()
    {
        $allUser = User::all();
        return view('user', compact('allUser', $allUser));
    }

    public function deleteuser($id)
    {
        $blog = User::find($id);
        $blog->delete();

        return redirect('admin/user');
    }
}
