<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    public function index(User $users)
    {
        $users = $users::all();
        return view('home',compact('users'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
         $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        
        if($request->has('id'))
        {
            $user =  User::find($request->get('id'));           
        }else{
             $user = new User;
        }            
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request['password']);
        $user->save();

        return redirect('/home');
    }

    public function edit(Request $request , $id)
    {
        $user = User::find($id);
        $user->name = $user['name'] ? $user->name:'' ;
        $user->email = $user['email'] ? $user->email:'';
        $user->password = $user['password'] ? $user->password :'';
        $user->save();
//        var_dump($user);die;
        return view('edit',compact('user'));
    }

    public function update(Request $request , $id)
    {
        dd($id); echo "bhavin";
        $post = User::find($id);
        $post->name = update($request->name);
        $post->email = $request->email;
        $post->password = $request->password;
        $post->save();
        
        return redirect('/home')->withMessage('status', 'Updated successfuly!');
    }
    
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return redirect('/home')->withMessage('message', "Successfully deleted.");
    }

}
