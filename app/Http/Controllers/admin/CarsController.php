<?php

namespace App\Http\Controllers\admin;

use App\Models\Cars;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
        $image = $request->image;
        if ($request->hasFile('image')) {
            $extension  = request()->file('image')->getClientOriginalExtension(); //This is to get the extension of the image file just uploaded
            $image_name = time() .'_' . $request->type . '.' . $extension;
            $path = $request->file('image')->storeAs(
                'images',
                $image_name,
                's3'
            );
            $image -> move(public_path() . '/images/', $image_name);
        }
            Cars::create([
                'id' => $request->id,
                'brand' => $request->brand,
                'type' => $request->type,
                'price' => $request->price,
                'image'=>$path
            ]);
        
           
        return redirect('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show()
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
