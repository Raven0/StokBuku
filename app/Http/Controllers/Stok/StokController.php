<?php

namespace App\Http\Controllers\Stok;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Stok;
use App\Buku;
use App\Penerbit;
use Illuminate\Http\Request;
use Session;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 8;

        if (!empty($keyword)) {
            $stok = Stok::where('penerbit_id', 'LIKE', "%$keyword%")
				->orWhere('buku_id', 'LIKE', "%$keyword%")
				->orWhere('masuk_date', 'LIKE', "%$keyword%")
				->orWhere('jumlah', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $stok = Stok::paginate($perPage);
        }

        return view('stok.stok.index', compact('stok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $penerbit = Penerbit::all();        
        $buku = Buku::all();        
        return view('stok.stok.create')->with('penerbit', $penerbit)->with('buku', $buku);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Stok::create($requestData);

        Session::flash('flash_message', 'Stok added!');

        return redirect('stok/stok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $stok = Stok::findOrFail($id);

        return view('stok.stok.show', compact('stok'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $bismillah = Stok::find($id);
        $bit = Penerbit::all();
        $ku = Buku::all();
        return view('stok.stok.edit')->with('stok', $bismillah)->with('penerbit', $bit)->with('buku', $ku);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $stok = Stok::findOrFail($id);
        $stok->update($requestData);

        Session::flash('flash_message', 'Stok updated!');

        return redirect('stok/stok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Stok::destroy($id);

        Session::flash('flash_message', 'Stok deleted!');

        return redirect('stok/stok');
    }
}
