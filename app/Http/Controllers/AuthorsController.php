<?php

namespace App\Http\Controllers;

use App\Authors;
use App\Http\Requests\StoreAuthors;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $author = Authors::all();
        return view('authors.listauthors', ['author' => $author]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.addauthors');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthors $request)
    {
        $validated = $request->validated();
        $authors = new Authors();
        $authors->name = $request->name;
        $authors->sex = $request->gender;
        $authors->address = $request->quequan;
        $authors->images =  $request->select_file;
        $new_images = rand() . '.' .$authors->getClientOriginalExtension();
        $authors->save();
        $request->session()->flash('status', 'Bạn đã thêm thành công!');
        return redirect(route('author.manager'));
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
        $editauthors = Authors::find($id);
        return view ('authors.editauthors', ['editauthors'=> $editauthors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $updateauthors = Authors::find($id);
        $updateauthors->name = $request->name;
        $updateauthors->sex = $request->input('gender');
        $updateauthors->address = $request->quequan;
        $updateauthors->save();
        $request->session()->flash('message', 'Bạn đã sửa thành công !');
        return redirect(route('author.manager'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $authors = Authors::find($id)->delete();
        session()->flash('mess', 'Bạn đã xóa thành công!');
        return redirect(route('author.manager'));

    }
}
