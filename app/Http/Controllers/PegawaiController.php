<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function index()
    {
        $json = Pegawai::all();
        $json = json_encode($json, JSON_HEX_QUOT);
        return view('admin.pegawai.index', compact('json'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
          if ($request->hasFile('foto')) {
          
          
        $gambar = pathinfo($request->file('foto')->getClientOriginalName(), PATHINFO_FILENAME) . "_" . time() . "." . $request->file('foto')->getClientOriginalExtension();
        
        $request->file('foto')->move(public_path('media'), $gambar);
        
        $linkGambar = asset('media/' . $gambar);
        
          
        }
        
       Pegawai::create([
           
            'nama_beserta_gelar' => $request->name,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'foto' => $linkGambar

            
        ]);
        
       return redirect()->route('pegawai.index');
        
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' => ['required', 'string']
        ]);
        
        $data = Pegawai::find($id);

        if (!$data) {
            return redirect()->route('buku');
        }
    
        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $data->password,
            'role' => $request->role
        ]);
        
        return redirect()->route('users.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pegawai::findOrFail($id);
        $data->delete();

        return redirect()->route('users.index');
        
    }
    
    public function tampilan_user()
    {
        $json = Pegawai::all();
        $json = json_encode($json, JSON_HEX_QUOT);
        return view('tampilan_user.pegawai', compact('json'));
    }

}
