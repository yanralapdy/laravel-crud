<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all item
        return [
            "success" => true,
            "data" => Item::all()
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate body before create
        $request->validate([
            'name'=> ['required', 'unique']
        ]);
        // Create a new item
        return [
            "success" => true,
            "message"=> "New Item successfully added",
            "data"=> Item::create($request->all())
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get a single item
        return [
            "success"=> true,
            "data" => Item::find($id)
        ];
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
        // Update a single item
        $item = Item::find($id);
        $item -> update($request->all());
        return [
            "success"=> true,
            "message"=> "Update Success",
            "data"=> $item
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete an item
        return [
            "success"=> true,
            "data"=> Item::destroy($id)
        ];
    }
}
