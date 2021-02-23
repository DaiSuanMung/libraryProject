<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class booksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $bookks = Books::all();
        return view('index', compact('bookks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|max:50',
            'author'=> 'required|max:50',
            'description'=> 'required|max:255',
            'kinds'=> 'required',
            'locations'=> 'required',
        ]);
        Books::create([
            'name' => $request->name,
            'author'=> $request->author,
            'description' => $request->description,
            'kinds' => $request->kinds,
            'locations' => $request->locations,
        ]);
        session()->flash('success', 'you created your books');
        return redirect()->route('books.index');
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
       $book = Books::findOrFail($id);
       return view('edit', compact('book'));
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
     Books::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'kinds' => $request->kinds,
            'locations' => $request->locations,
        ]);


        session()->flash('success', 'you updated your books');
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Books::findOrFail($id)->delete();
        session()->flash('delete', 'your books has deleted');
        return redirect()->back();
    }
}
