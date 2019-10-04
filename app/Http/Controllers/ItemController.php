<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Session;

class ItemController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function attributes()
    {
        return [
            'amount' => 'price',
        ];
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $message = Session::get('message');
        // Show item listing page
        $items = Item::orderBy('created_at','desc')->paginate(2);

        return view('items.index', compact('items', 'message'));
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function list()
    {
        $message = Session::get('message');
        // Show item listing page
        $items = Item::orderBy('created_at','desc')->paginate(2);

        return view('items.list', compact('items', 'message'));
    }*/


    /**
     * Display form to create item.
     *
     */
    public function create() {

        // Show item listing page            
        return view('items.create_edit');
    }    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'detail' => 'required',
            'brand' => 'required',            
            'amount' => 'required|max:5',            
        ]);

        $item = new Item ();
        $item->name = $request->name;
        $item->detail = $request->detail;
        $item->brand = $request->brand;
        $item->amount = $request->amount;
        $item ->save();
        return redirect('admin/items')->with('message', 'Successfully Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item, $id)
    {
        
        $item = Item::find($id);
        return view('items.create_edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',            
            'detail' => 'required',
            'brand' => 'required',            
            'amount' => 'required|max:5',            
        ]);

        $item = Item::find($id);
        $item->name = $request->name;
        $item->detail = $request->detail;
        $item->brand = $request->brand;
        $item->amount = $request->amount;
        $item ->save();
        return redirect('admin/items')->with('message', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect('admin/items')->with('message', 'Successfully Deleted');
    }
}
