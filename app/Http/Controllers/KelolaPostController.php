<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Buku;

class KelolaPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $json = Buku::all();
        
      //  $json = $json->toJson(JSON_HEX_QUOT);
        
        $json = json_encode($json, JSON_HEX_QUOT);
        
        return view('admin.buku.index', compact('json'));
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
        $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'gambar' => ['required'],
            'buku' => ['required'],
        ]);
        
       

        
        if ($request->hasFile('gambar') && $request->hasFile('buku')) {
          
          
        $gambar = pathinfo($request->file('gambar')->getClientOriginalName(), PATHINFO_FILENAME) . "_" . time() . "." . $request->file('gambar')->getClientOriginalExtension();
        
        $request->file('gambar')->move(public_path('media'), $gambar);
        
        $linkGambar = asset('media/' . $gambar);
        
        $buku = pathinfo($request->file('buku')->getClientOriginalName(), PATHINFO_FILENAME) . "_" . time() . "." . $request->file('buku')->getClientOriginalExtension();
        
        $request->file('buku')->move(public_path('media'), $buku);
        
        $linkBuku = asset('media/' . $buku);
        
        Buku::create([
            'judul' => $request->judul,
            'linkGambar' => $linkGambar,
            'linkBuku' => $linkBuku
        ]);
        
        return redirect()->route('buku');
        
        }
        
       
        
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
            'judul' => ['required', 'string', 'max:255'],
        ]);
                
        $data = Buku::find($id);

        if (!$data) {
            return redirect()->route('buku');
        }
        
        $data->update([
            'judul' => $request->judul
        ]);
        
        if ($request->hasFile('gambar')) {
          
          
        $gambar = pathinfo($request->file('gambar')->getClientOriginalName(), PATHINFO_FILENAME) . "_" . time() . "." . $request->file('gambar')->getClientOriginalExtension();
        
        $request->file('gambar')->move(public_path('media'), $gambar);
        
        $linkGambar = asset('media/' . $gambar);
        
        $data->update([
            'linkGambar' => $linkGambar
        ]);
        
        Storage::delete('public/media/' . basename($request->linkGambar));
        
        }
        
        if($request->hasFile('buku')){
        
        $buku = pathinfo($request->file('buku')->getClientOriginalName(), PATHINFO_FILENAME) . "_" . time() . "." . $request->file('buku')->getClientOriginalExtension();
        
        $request->file('buku')->move(public_path('media'), $buku);
        
        $linkBuku = asset('media/' . $buku);
    
        $data->update([
            'linkBuku' => $linkBuku
        ]);
        
        Storage::delete('public/media/' . basename($request->linkBuku));
        
        }
        
        return redirect()->route('buku');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Buku::findOrFail($id);
        $data->delete();

        return redirect()->route('buku');
    }
}
