<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Buku;

class BukuController extends Controller
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
        
        $request->file('gambar')->move(public_path('buku/sampul/'), $gambar);
        
        $linkGambar = asset('buku/sampul/' . $gambar);
        
        $buku = pathinfo($request->file('buku')->getClientOriginalName(), PATHINFO_FILENAME) . "_" . time() . "." . $request->file('buku')->getClientOriginalExtension();
        
        $request->file('buku')->move(public_path('buku/file/'), $buku);
        
        $linkBuku = asset('buku/file/' . $buku);
        
        Buku::create([
            'judul' => $request->judul,
            'linkGambar' => $linkGambar,
            'linkBuku' => $linkBuku
        ]);
        
        return redirect()->route('buku_buku.index');
        
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
        
        $request->file('gambar')->move(public_path('buku/sampul/'), $gambar);
        
        $linkGambar = asset('buku/sampul/' . $gambar);
        
        $data->update([
            'linkGambar' => $linkGambar
        ]);
        
        File::delete(public_path('buku/sampul/' . basename($request->linkGambar)));
        
        }
        
        if($request->hasFile('buku')){
        
        $buku = pathinfo($request->file('buku')->getClientOriginalName(), PATHINFO_FILENAME) . "_" . time() . "." . $request->file('buku')->getClientOriginalExtension();
        
        $request->file('buku')->move(public_path('buku/file/'), $buku);
        
        $linkBuku = asset('buku/file/' . $buku);
    
        $data->update([
            'linkBuku' => $linkBuku
        ]);
        
        File::delete(public_path('buku/file/' . basename($request->linkBuku)));
        
        }
        
        return redirect()->route('buku_buku.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
      dd($request->linkGambar);
        $data = Buku::findOrFail($id);
        $data->delete();
        
        File::delete(public_path('buku/sampul/' . basename($request->linkGambar)));
        File::delete(public_path('buku/file/' . basename($request->linkBuku)));
        
        return redirect()->route('buku_buku.index');
    }

    public function tampilan_user()
    {
        $json = Buku::all();
        
      //  $json = $json->toJson(JSON_HEX_QUOT);
        
        $json = json_encode($json, JSON_HEX_QUOT);
        
        return view('tampilan_user.buku', compact('json'));
    }

}
