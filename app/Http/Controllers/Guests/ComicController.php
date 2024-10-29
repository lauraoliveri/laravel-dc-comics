<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::get();

        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:64',
            'type' => 'required|min:3|max:16',
            'price' => 'required|integer',
            'description' => 'required|min:1|max:4096',
            'sale_date'=> 'nullable',
            'img'=> 'nullable'
        ]);

        $data = $request->all();
        // \Log::debug($data);

        $comic = Comic::create($data);

        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Display the specified resource.
     */
    /*public function show(string $id)
    {
        $comic = Comic::find($id);
        return view('comics.show', compact('comic'));
    }*/

    public function show(Comic $comic)
    {
        
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        $request->validate([
            'title' => 'required|min:3|max:64',
            'type' => 'required|min:3|max:16',
            'series'=> 'required|min:3|max:64|',
            'price' => 'required|integer',
            'description' => 'required|min:1|max:4096',
            'sale_date'=> 'nullable',
            'thumb'=> 'nullable|url'
        ]);

        $data = $request->all();

        

        $comic->update($data);


        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index');
    }
}
