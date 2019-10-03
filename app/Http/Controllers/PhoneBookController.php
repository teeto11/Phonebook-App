<?php

namespace App\Http\Controllers;

use App\PhoneBook;
use Illuminate\Http\Request;

class PhoneBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('phonebook');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'name' => 'required',
             'phone' => 'required',
             'email' => 'required|unique:phone_books'
        ]);
        $phonebook = new PhoneBook;
        $phonebook->name = $request->name;
        $phonebook->email = $request->email;
        $phonebook->phone =  $request->phone;
        $phonebook->save();
        return $phonebook;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PhoneBook  $phoneBook
     * @return \Illuminate\Http\Response
     */
    public function show(PhoneBook $phoneBook)
    {
        //
    }

    public function getdata(){
        return PhoneBook::orderby('name','asc')->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PhoneBook  $phoneBook
     * @return \Illuminate\Http\Response
     */
    public function edit(PhoneBook $phoneBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PhoneBook  $phoneBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhoneBook $phoneBook)
    {
        $this->validate($request,[
            'name' => 'required',
             'phone' => 'required',
             'email' => 'required|unique:phone_books,email,'.$request->id
        ]);
        $phonebook = PhoneBook::find($request->id);
        $phonebook->name = $request->name;
        $phonebook->email = $request->email;
        $phonebook->phone =  $request->phone;
        $phonebook->save();
        return $request->all();
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PhoneBook  $phoneBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhoneBook $phoneBook)
    { 
        //return $phoneBook->id;
        PhoneBook::where('id',$phoneBook->id)->delete();
    }
    public function delete($id)
    { 
        //return $phoneBook->id;
        PhoneBook::where('id',$id)->delete();
    }

}
