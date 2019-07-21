<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.listuser', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.adduser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $validated = $request->validated();
        if (isset($request->level)) {
            $request->level = 1;
        } else {
            $request->level = 0;
        }
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->level = $request->level;
        $users->save();
        $request->session()->flash('status', 'Bạn đã thêm thành công !');
        return redirect(route('user.manager'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editusers = User::find($id);
        return view('users.edituser', ['editusers'=>$editusers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, $id)
    {
        $validated = $request->validated();
        if (isset($request->level)) {
            $request->level = 1;
        } else {
            $request->level = 0;
        }
        $users = User::find($id);
        $users->name = $request->name;
        if ($request->password != '') {
            $users->password  = bcrypt($request->password);
        } else {
            $users-> password  = $users -> password;
        }
        $users->level = $request->level;
        $users->save();
        $request->session()->flash('message', 'Bạn đã sửa thành công !');
        return redirect(route('user.manager'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        session()->flash('mess', 'Bạn đã xóa thành công!');
        return redirect(route('user.manager'));
    }
}
