<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Room;
use App\Models\Penjamin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasiens = Pasien::select('pasiens.*', 'rooms.name as room_id', 'dokters.name as dokter_id', 'penjamins.name as penjamin_id')
            ->leftJoin('rooms', 'pasiens.room_id', '=', 'rooms.id')
            ->leftJoin('dokters', 'pasiens.dokter_id', '=', 'dokters.id')
            ->leftJoin('penjamins', 'pasiens.penjamin_id', '=', 'penjamins.id')
            ->latest()
            ->paginate(10);
        return view('pasien.index', compact('pasiens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dokters = Dokter::all();
        $penjamins = Penjamin::all();
        $rooms = Room::all();
        return view('pasien.create', compact('dokters', 'penjamins', 'rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  =>  'required',
            'address' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'dokter_id' => 'required',
            'room_id' => 'required',
            'penjamin_id' => 'required',
            'tgl_keluar' => 'required',
        ]);
        $pasiens = new Pasien();
        $pasiens->no_rm = Str::random(5);
        $pasiens->name = $request->name;
        $pasiens->address = $request->address;
        $pasiens->phone = $request->phone;
        $pasiens->gender = $request->gender;
        $pasiens->dokter_id = $request->dokter_id;
        $pasiens->room_id = $request->room_id;
        $pasiens->penjamin_id = $request->penjamin_id;
        $pasiens->tgl_keluar = $request->tgl_keluar;
        $pasiens->save();

        return redirect()->route('pasien.index')->with('success', 'Data berhasil ditambahan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasien $pasien)
    {
        $dokters = Dokter::all();
        $penjamins = Penjamin::all();
        $rooms = Room::all();
        return view('pasien.edit', ['pasien' => $pasien], compact('dokters', 'penjamins', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {
        $data = $request->validate([
            'name'  =>  'required',
            'address' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'dokter_id' => 'required',
            'room_id' => 'required',
            'penjamin_id' => 'required',
            'tgl_keluar' => 'required',
        ]);

        $pasien->update($data);
        return redirect()->route('pasien.index')->with('success', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
        Pasien::destroy($pasien->id);
        return redirect()->route('pasien.index')->with('success', 'Data berhasil dihapus');
    }
}
