<?php

namespace App\Http\Controllers\admin;

use App\Models\Cars;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Cars::all();
        return view('dashboard', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createcar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Cars::create($request->all());
        return redirect('dashboard');
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
        $data = Cars::where('id', $id)->first();
        return view('admin.editcar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'id' => $request->id,
            'brand' => $request->brand,
            'type' => $request->type,
            'price' => $request->price,
        ];

        Cars::where('id', $data['id'])->update($data);
        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cars::where('id', $id)->delete();
        return back();
    }
}
