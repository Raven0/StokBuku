<?php

namespace App\Http\Controllers\Penerbit;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Penerbit;
use Illuminate\Http\Request;
use Session;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 2;

        if (!empty($keyword)) {
            $penerbit = Penerbit::where('nama', 'LIKE', "%$keyword%")
				->orWhere('alamat', 'LIKE', "%$keyword%")
				->orWhere('kontak', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $penerbit = Penerbit::paginate($perPage);
        }

        return view('penerbit.penerbit.index', compact('penerbit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('penerbit.penerbit.create');
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
        
        Penerbit::create($requestData);

        Session::flash('flash_message', 'Penerbit added!');

        return redirect('penerbit/penerbit');
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
        $penerbit = Penerbit::findOrFail($id);

        return view('penerbit.penerbit.show', compact('penerbit'));
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
        $penerbit = Penerbit::findOrFail($id);

        return view('penerbit.penerbit.edit', compact('penerbit'));
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
        
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->update($requestData);

        Session::flash('flash_message', 'Penerbit updated!');

        return redirect('penerbit/penerbit');
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
        Penerbit::destroy($id);

        Session::flash('flash_message', 'Penerbit deleted!');

        return redirect('penerbit/penerbit');
    }
}
