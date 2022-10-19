<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourRequest;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.tour.index', [
            'tours' => Tour::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.tour.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TourRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);


        try {
            Tour::create($data);
        } catch (\Exception $e) {
            return redirect()->route('admin.tour.index')->with('error', $e->getMessage());
        }

        return redirect()->route('admin.tour.index')->with('success', 'Destinasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.admin.tour.edit', [
            'tour' => Tour::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $tour = Tour::findOrFail($id);

        try {
            $tour->update($data);
        } catch (\Exception $e) {
            return redirect()->route('admin.tour.index')->with('error', $e->getMessage());
        }

        return redirect()->route('admin.tour.index')->with('success', 'Destinasi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tour = Tour::findOrFail($id);

        try {
            $tour->delete();
        } catch (\Exception $e) {
            return redirect()->route('admin.tour.index')->with('error', $e->getMessage());
        }

        return redirect()->route('admin.tour.index')->with('success', 'Destinasi berhasil dihapus');
    }
}
