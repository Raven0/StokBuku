<?php

namespace App\Http\Controllers\Buku;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Buku;
use Illuminate\Http\Request;
use Session;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 4;

        if (!empty($keyword)) {
            $buku = Buku::where('title', 'LIKE', "%$keyword%")
				->orWhere('harga_jual', 'LIKE', "%$keyword%")
				->orWhere('harga_dasar', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $buku = Buku::paginate($perPage);
        }

        return view('buku.buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('buku.buku.create');
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
        
        Buku::create($requestData);

        Session::flash('flash_message', 'Buku added!');

        return redirect('buku/buku');
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
        $buku = Buku::findOrFail($id);

        return view('buku.buku.show', compact('buku'));
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
        $buku = Buku::findOrFail($id);

        return view('buku.buku.edit', compact('buku'));
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
        
        $buku = Buku::findOrFail($id);
        $buku->update($requestData);

        Session::flash('flash_message', 'Buku updated!');

        return redirect('buku/buku');
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
        Buku::destroy($id);

        Session::flash('flash_message', 'Buku deleted!');

        return redirect('buku/buku');
    }
}
