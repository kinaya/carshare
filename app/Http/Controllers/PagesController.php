<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PagesController extends Controller
{
    public function index() {
      return view('pages.index');
    }

    public function about() {
      return view('pages.about');
    }

    public function calendar() {
      return view('pages.calendar');
    }

/*    public function user($id) {
      $user = User::find($id);
      return view('users.user')->with('user', $user);
    }*/
}
