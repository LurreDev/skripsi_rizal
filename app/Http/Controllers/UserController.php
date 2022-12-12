<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $data = User::all();
        return view('backand.users.index',compact('data'))
           ;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'is_permission'=>'1',
        ]);


        $input = $request->all();
        $input['password'] = Hash::make($input['email']);
        $user = User::create($input);
        return redirect()->route('kelola-users.index')
                        ->with('success','User created successfully');
    }

    public function update(Request $request, $id)
    {

        $users = User::findOrFail($id);
        $users->jenis_kelamin     = $request->jenis_kelamin;
        $users->usia     = $request->usia;
        $users->berat_badan     = $request->berat_badan;
        $users->berat_badan_target     = $request->berat_badan_target;
        $users->tinggi_badan     = $request->tinggi_badan;
        $users->save();
        return redirect('setting-data')
                        ->with('success','User updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('kelola-users.index')
                        ->with('success','User deleted successfully');
    }

    public function settingakun(){
        $id = Auth::user()->id;
        $getuser = User::find($id);
        return view('backand.users.setting_akun',compact('getuser'));
        
    }
    public function show($id)
    {
    // $exitCode = \Artisan::call('cache:clear');/
        $user = User::find($id);
        Auth::login($user);
         return redirect('home');
    }
}
