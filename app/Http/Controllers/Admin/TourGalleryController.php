<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourGallery as RequestsTourGallery;
use App\Http\Requests\TourGalleryRequest;
use App\Models\Tour;
use App\Models\TourGallery;
use Illuminate\Http\Request;

class TourGalleryController extends Controller
{

    public function index()
    {
        return view('pages.admin.tour-galleries.index', [
            'galleries' => TourGallery::with('tour')->get()
        ]);
    }

    public function create()
    {
        return view('pages.admin.tour-galleries.create', [
            'tours' => Tour::all()
        ]);
    }


    public function store(TourGalleryRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery',
            'public'
        );

        try {
            TourGallery::create($data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.tour-gallery.index')->with('success', 'Data berhasil ditambahkan');
    }


    public function destroy($id)
    {
        $gallery = TourGallery::findOrFail($id);

        try {
            $gallery->delete();
        } catch (\Exception $e) {
            return redirect()->route('admin.tour-gallery.index')->with('error', $e->getMessage());
        }

        return redirect()->route('admin.tour-gallery.index')->with('success', 'Data berhasil dihapus');
    }
}
