<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class UserController extends BaseController
{
 public function listUser(Request $req)
 {
     $limit = 4;
     $page            = $req->query('page');
     $numberOfRecords = User::query()->count();
     $numberOfPage    = $numberOfRecords > 0 ? ceil($numberOfRecords / $limit) : 1;
     $users         = DB::table('user')
         ->join('', '', '=', '')
         ->skip(($page - 1) * $limit)
         ->take($limit)
         ->get();
     return view('users/user', [
         'users' => $users,
         'page'         => $page,
         'numberOfPage' => $numberOfPage,
         'username' => $req->session()->get('username')
     ]);
 }
 public function CreateUser(Request $req)
 {

 }
}
