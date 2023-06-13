<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Surat;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $json = Surat::all();
        $json = json_encode($json, JSON_HEX_QUOT);
        return view('admin.surat.index', compact('json'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'fileSurat' => ['required']
        ]);

    if ($request->hasFile('fileSurat')) {

    $gambar = pathinfo($request->file('fileSurat')->getClientOriginalName(), PATHINFO_FILENAME) . "_" . time() . "." . $request->file('fileSurat')->getClientOriginalExtension();

 $request->file('fileSurat')->move(public_path('surat'), $gambar);

 $linkGambar = asset('surat/' . $gambar);
    }

Surat::create([
    'nama' => $request->nama,
    'deskripsi' => $request->deskripsi,
    'linkSurat' => $linkGambar
]);

return redirect()->route('surats.index');


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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
   'nama' => ['required', 'string', 'max:255'],

 'deskripsi' => ['required', 'string'],
 'fileSebelumnya' => ['required']

  ]);
        $data = Surat::find($id);
        if (!$data) {
            return redirect()->route('surat.index');
        }

        $data->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);

 if ($request->hasFile('fileSurat')) {

    $gambar = pathinfo($request->file('fileSurat')->getClientOriginalName(), PATHINFO_FILENAME) . "_" . time() . "." . $request->file('fileSurat')->getClientOriginalExtension();

 $request->file('fileSurat')->move(public_path('surat'), $gambar);

 $linkGambar = asset('surat/' . $gambar);

 $data->update(['linkSurat' => $linkGambar]);
 File::delete(public_path('surat/' . basename($request->fileSebelumnya)));
        
    }

    return redirect()->route('surats.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        
        $data = Surat::findOrFail($id);
        $data->delete();
        File::delete(public_path('surat/' . basename($request->fileSebelumnya)));

        return redirect()->route('surats.index');
    }

    public function listArtikel()
    {
        $json = Surat::all();
        $json = json_encode($json, JSON_HEX_QUOT);
        return view('tampilan_user.surat', compact('json'));
    }
    
    /*
    public function upload(Request $request)
{
    if ($request->hasFile('upload')) {
        $file = $request->file('upload');
        $namaAsli = $file->getClientOriginalName();
        $namaGambar = pathinfo($namaAsli, PATHINFO_FILENAME);
        $format = $file->getClientOriginalExtension();
        $namaGambar = $namaGambar . "_" . time() . "." . $format;
        $file->move(public_path('media'), $namaGambar);
        $link = asset('media/' . $namaGambar);

        return response()->json([
            'default' => $link,
        ]);
    }
}
    
    public function hapusGambar(Request $request) {
    return response()->json(['tes'=>$request->namaGambar]);
}


*/

}
