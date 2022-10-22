<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transportation;
use Illuminate\Http\Request;
use App\Http\Requests\TransportationRequest;

use Illuminate\Support\Str;


class TransportationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.transportation.index', [
            'transportations' => Transportation::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.transportation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransportationRequest $request)
    {
        $trans = $request->all();

        $trans['slug'] = Str::slug($request->company_name);
        $trans['image'] = $request->file('image')->store(
            'assets/gallery',
            'public'
        );

        try {
            Transportation::create($trans);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.transportation.index')->with('success', 'Data berhasil ditambahkan');
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
        return view('pages.admin.transportation.edit', [
            'transportation' => Transportation::findOrFail($id),
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
        $trans = $request->all();
        $trans['image'] = Str::slug($request->image);

        $data = Transportation::findOrFail($id);

        try {
            $data->update($trans);
        } catch (\Exception $e) {
            return redirect()->route('admin.transportation.index')->with('error', $e->getMessage());
        }

        return redirect()->route('admin.transportation.index')->with('success', 'Kendaraan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transgallery = Transportation::findOrFail($id);

        try {
            $transgallery->delete();
        } catch (\Exception $e) {
            return redirect()->route('admin.transportation.index')->with('error', $e->getMessage());
        }

        return redirect()->route('admin.transportation.index')->with('success', 'Data berhasil dihapus');
    }
}
