<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }
    function all_users(){
        $user=User::paginate(15);
        return view('admin.user.all_user',compact('user'));
    }
    function delete_user($id){
        $user=User::where('id',$id)->first();
        $user->delete();
        return redirect()->back()->with('success','Data has been deleted successfully');
    }
    function update_user($id){


        $user=User::where('id',$id)->first();
    return view('admin.user.update-user',compact('user'));
    }
    function view_user($id){
        $user=User::where('id',$id)->first();
    return view('admin.user.view-user',compact('user'));

    }

}
