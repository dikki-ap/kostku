<?php

namespace App\Http\Controllers;

use App\Models\KostGallery;
use App\Models\Kost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardGalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.galleries.index', [
            "title" => "Gallery List",
            "kosts" => Kost::all(),
            "images" => KostGallery::select('url')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(KostGallery $kostGallery)
    {
        $this->authorize('admin');
        $kost_id = $_GET['kost_id'];
        return view('dashboard.galleries.delete', [
            "title" => "Delete Gallery",
            "galleries" => $kostGallery,
            "kost_id" => $kost_id,
            "kost_name" => Kost::where('id', '=', $kost_id)->pluck('name'),
            "images" => $kostGallery::select('*')->where('kost_id', '=', $kost_id)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kost_name = $_POST["kost_name"];

        $validatedData = $request->validate([
            "kost_id" => 'required',
            "url" => 'image|file|max:2048|mimes:png,jpg,jpeg',
        ]);

        // Jika Imagenya ada di upload
        if($request->file('url')){
            // Upload Image, dan masukkan di folder post-images
            $validatedData['url'] = $request->file('url')->store('kost-img');
        }else{
            return redirect('/dashboard/galleries')->with('failed', 'Wajib upload gambar!');
        }

        KostGallery::create($validatedData);

        return redirect('/dashboard/galleries')->with('success', 'Gambar baru berhasil ditambahkan ke '. $kost_name);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KostGallery  $kostGallery
     * @return \Illuminate\Http\Response
     */
    public function show(KostGallery $kostGallery)
    {
        $this->authorize('admin');
        $kost_id = $_GET['kost_id'];
        return view('dashboard.galleries.show', [
            "title" => "Gallery List",
            "kost_id" => $kost_id,
            "kost_name" => Kost::where('id', '=', $kost_id)->pluck('name'),
            "images" => $kostGallery::select('url')->where('kost_id', '=', $kost_id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KostGallery  $kostGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(KostGallery $kostGallery)
    {
        $this->authorize('admin');
        $kost_id = $_GET['kost_id'];
        return view('dashboard.galleries.edit', [
            "title" => "Edit Gallery",
            "galleries" => $kostGallery,
            "kost_id" => $kost_id,
            "kost_name" => Kost::where('id', '=', $kost_id)->pluck('name'),
            "images" => $kostGallery::select('*')->where('kost_id', '=', $kost_id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KostGallery  $kostGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KostGallery $kostGallery)
    {
        $image_id = $_POST['image_id'];
        $rules = [
            "url" => 'image|file|max:2048|mimes:png,jpg,jpeg',
        ];

        $validatedData = $request->validate($rules);

        // Jika ada gambar baru yang diupload
        if($request->file('url')){
            // Jika gambar lama ada
            if($request->oldImage){
                $fileName = explode(config('app.url') . '/storage/', $request->oldImage);
                // Hapus Gambar lama
                Storage::delete($fileName[1]);
            }
            // Upload Image baru, dan masukkan di folder post-images
            $validatedData['url'] = $request->file('url')->store('kost-img');
        } // Jika tidak ada, biarkan gunakan image lama atau image yang telah disediakan "DEFAULT"

        $kostGallery::where('id', $image_id)->update($validatedData);

        return redirect('/dashboard/galleries')->with('success', 'Image berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KostGallery  $kostGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, KostGallery $kostGallery)
    {
        $image_id = $_POST['image_id'];
        
        // Jika ada gambar yang lama
        if($request->image_url){
            $fileName = explode(config('app.url') . '/storage/', $request->image_url);
            // Hapus Gambar dari direktori
            Storage::delete($fileName[1]);
        }

        $kostGallery::destroy($image_id);

        return redirect('/dashboard/galleries')->with('success', 'Image berhasil dihapus');
    }
}
