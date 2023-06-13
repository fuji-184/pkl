<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use response;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $json = Post::all();
        $json = json_encode($json, JSON_HEX_QUOT);
        return view('post.index', compact('json'));
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
            'judul' => ['required', 'string', 'max:255'],
            'isi' => ['required', 'string'],
        ]);

    if ($request->hasFile('gambar')) {

    $gambar = pathinfo($request->file('gambar')->getClientOriginalName(), PATHINFO_FILENAME) . "_" . time() . "." . $request->file('gambar')->getClientOriginalExtension();

 $request->file('gambar')->move(public_path('media'), $gambar);

 $linkGambar = asset('media/' . $gambar);
    }

Post::create([
    'judul' => $request->judul,
    'konten' => $request->isi,
    'gambar' => $linkGambar,
    'user_id' => Auth::id()
]);

return redirect()->route('artikel.index');


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
   'judul' => ['required', 'string', 'max:255'],

 'isi' => ['required', 'string'],

  ]);
        $data = Post::find($id);
        if (!$data) {
            return redirect()->route('post.index');
        }

        $data->update([
            'judul' => $request->judul,
            'konten' => $request->isi
        ]);

 if ($request->hasFile('gambar')) {

    $gambar = pathinfo($request->file('gambar')->getClientOriginalName(), PATHINFO_FILENAME) . "_" . time() . "." . $request->file('gambar')->getClientOriginalExtension();

 $request->file('gambar')->move(public_path('media'), $gambar);

 $linkGambar = asset('media/' . $gambar);

 $data->update(['gambar' => $linkGambar]);
 Storage::delete('public/media/' . basename($request->gambar));
        
    }

    return redirect()->route('artikel.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $data = Post::findOrFail($id);
        $data->delete();

        return redirect()->route('artikel.index');
    }

    public function listArtikel()
    {
        $json = Post::all();
        $json = json_encode($json, JSON_HEX_QUOT);
        return view('tampilan_user.post', compact('json'));
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
