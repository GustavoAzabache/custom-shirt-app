<?php

namespace App\Http\Controllers;

use App\Models\Desing;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DesingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('design_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|max:4096'
        ]);

        $nombre = $request->input('name');
        $imagen = $request->file('image');
        $publico = $request->boolean('is_public');
        $user_id = $request->user()->id;

        $nombreImagen = uniqid() . '.' . $imagen->extension();
        $imagen->storeAs('designs', $nombreImagen);

        Desing::create([
            'name' => $nombre,
            'route' => 'designs/' . $nombreImagen,
            'is_public' => $publico,
            'user_id' => $user_id
        ]);

        return redirect()->route('home')->with('success', 'Diseño subido correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Desing $desing)
    {
        $designs = Desing::where('user_id', auth()->id)->latest()->get();

        return view('designs.my-designs', compact('designs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Desing $design) : View
    {
        return view('edit_design', compact('design'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Desing $design)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:4096',
        ]);

        $design->name = $request->input('name');
        $design->is_public = $request->boolean('is_public');

        if ($request->hasFile('image')) {
            $nombreImagen = uniqid() . '.' . $request->file('image')->extension();
            $request->file('image')->storeAs('designs', $nombreImagen);
            $design->route = 'designs/' . $nombreImagen;
        }

        $design->save();

        return redirect()->route('dashboard')->with('success', 'Diseño actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Desing $design)
    {
        $design->delete();

        return redirect()->route('dashboard')->with('success', 'Diseño eliminado correctamente.');
    }

}
