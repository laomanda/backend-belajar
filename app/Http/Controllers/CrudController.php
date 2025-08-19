<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Crud::all();

        return view('crud.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Crud::all();

        return view('crud.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'text' => 'required|string|max:255',
            'radio_group' => 'required',
            'checkbox' => 'required|array',
            'select_field' => 'required',
            'date' => 'required|date',
            'file' => 'required|file|mimes:jpg,png,jpeg|max:2048',
            'textarea' => 'required|string'
        ]);

        if($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public');
            $validated['file'] = $filePath;
        }

        $validated['checkbox'] = implode(',', $validated['checkbox']);

        Crud::create($validated);

        $data = Crud::all();
        return redirect()->route('crud.index')->with('success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $crud = Crud::find($id);
        $crud->checkbox = explode(',', $crud->checkbox);

        return view('crud.edit', compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $crud = Crud::findOrFail($id);

        $validated = $request->validate([
            'text' => 'required|string|max:255',
            'radio_group' => 'required',
            'checkbox' => 'required|array',
            'select_field' => 'required',
            'date' => 'required|date',
            'file' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
            'textarea' => 'required|string'
        ]);

        if($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public');
            $validated['file'] = $filePath;
        }

        $validated['checkbox'] = implode(',', $validated['checkbox']);

        $crud->update($validated);

        return redirect()->route('crud.index')->with('succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $crud = Crud::findOrfail($id);

        if(!empty($crud->file) && Storage::exists('public/' . $crud->file)) {
            Storage::delete('public/' . $crud->file);
        }

        $crud->delete();

        return redirect()->route('crud.index')->with('success');
    }
}
