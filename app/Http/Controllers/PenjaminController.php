<?php

namespace App\Http\Controllers;

use App\Models\Penjamin;
use Illuminate\Http\Request;

class PenjaminController extends Controller
{
    public function _construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjamins = Penjamin::all();
        return view('penjamin.index', compact('penjamins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penjamin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        Penjamin::create($data);

        return redirect()->route('penjamin.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjamin $penjamin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjamin $penjamin)
    {
        return view('penjamin.edit', ['penjamin' => $penjamin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjamin $penjamin)
    {
        $data = $request->validate([
            'name'  =>  'required',
        ]);

        $penjamin->update($data);
        return redirect()->route('penjamin.index')->with('success', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjamin $penjamin)
    {
        Penjamin::destroy($penjamin->id);
        return redirect()->route('penjamin.index')->with('success', 'Data berhasil dihapus');
    }
}
