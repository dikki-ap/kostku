<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Kost;
use App\Models\KostGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardKostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.kosts.index', [
            "title" => "Kost List",
            "kosts" => Kost::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        return view('dashboard.kosts.create', [
            "title" => "Add New Kost",
            "categories" => Category::where('id', '>', 1)->get()
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
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'price' => 'required|max:4',
            'period_time' => 'required',
            'rating' => 'required',
            'districts' => 'required|max:25',
            'city' => 'required|max:25',
            'address' => 'required',
            'url_location' => 'required|max:255',
            'phone_number' => 'required|max:13',
            'bathroom' => 'required',
            'bed' => 'required',
            'ac' => 'required',
            'category_id' => 'required',
        ]);

        // $phoneNumberFormat = 'tel:';
        // $validatedData['phone_number'] = $phoneNumberFormat . $validatedData['phone_number'];

        Kost::create($validatedData);

        return redirect('/dashboard/kosts')->with('success', 'Kost baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kost  $kost
     * @return \Illuminate\Http\Response
     */
    public function show(Kost $kost)
    {
        $this->authorize('admin');
        return view('dashboard.kosts.show', [
            "title" => "Kost Details",
            "kost" => $kost,
            "images" => KostGallery::select('url')->where('kost_id', '=', $kost->id)->get(),
            "i" => 1
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kost  $kost
     * @return \Illuminate\Http\Response
     */
    public function edit(Kost $kost)
    {
        $this->authorize('admin');
        return view('dashboard.kosts.edit', [
            "title" => "Edit Kost",
            "kost" => $kost,
            "categories" => Category::where('id', '>', 1)->get()

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kost  $kost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kost $kost)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'price' => 'required|max:4',
            'period_time' => 'required',
            'rating' => 'required',
            'districts' => 'required|max:25',
            'city' => 'required|max:25',
            'address' => 'required',
            'url_location' => 'max:255',
            'phone_number' => 'max:13',
            'bathroom' => 'required',
            'bed' => 'required',
            'ac' => 'required',
            'category_id' => 'required',
        ]) ;

        Kost::where('id', $kost->id)->update($validated);

        return redirect('/dashboard/kosts')->with('success', 'Kost berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kost  $kost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kost $kost)
    {
        $galleries = KostGallery::select('*')->where('kost_id', '=', $kost->id)->get();
        foreach($galleries as $gallery){
            $fileName = explode(config('app.url') . '/storage/', $gallery->url);
            KostGallery::destroy($gallery->id);
            Storage::delete($fileName[1]);
        }
        Kost::destroy($kost->id);
        // foreach($galleries as $gallery){
        //     KostGallery::destroy($gallery->id);
        // }

        return redirect('/dashboard/kosts')->with('success', 'Kost berhasil dihapus');
    }
}
