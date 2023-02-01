<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Resume extends Controller
{
    public function index()
    {
        $resume = Resume::orderBy('id','desc')->paginate(5);
        return view('resume.index', compact('resume'));
    }
    public function create()
    {
        return view('resume.create');

    }
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'Email' => 'required',
            'Address' => 'required',
            'Obective' => 'required',
            'Education History' => 'required',
            'Skills' => 'required',
        ]);

        Resume::create($request->post());

        return redirect()->route('resume.index')->with('success','Resume has been created successfully.');
    }


    public function show(Resume $resume)
    {
        return view('resume.show',compact('resume'));
    }


    public function edit(Resume $resume)
    {
        return view('resume.edit',compact('resume'));
    }


    public function update(Request $request, Resume $resume)
    {
        $request->validate([
            'Name' => 'required',
            'Email' => 'required',
            'Address' => 'required',
            'Obective' => 'required',
            'Education History' => 'required',
            'Skills' => 'required',
        ]);

        $resume->fill($request->post())->save();

        return redirect()->route('resume.index')->with('success','Resume Has Been updated successfully');
    }

}





