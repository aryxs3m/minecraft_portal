<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SimpleRCONElement;
use Illuminate\Http\Request;

class RCONEditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $simpleRCONElements = SimpleRCONElement::all();

        return view('portal.admin.simpleRCONElements.index', compact('simpleRCONElements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portal.admin.simpleRCONElements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            "value" => "required|string|min:1|max:255"
        ]);

        SimpleRCONElement::create($validated);

        return back()->with('message', 'item stored successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SimpleRCONElement $simpleRCONElement
     * @return \Illuminate\Http\Response
     */
    public function show(SimpleRCONElement $simpleRCONElement)
    {
        return view('portal.admin.simpleRCONElements.show', compact('simpleRCONElement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SimpleRCONElement $simpleRCONElement
     * @return \Illuminate\Http\Response
     */
    public function edit(SimpleRCONElement $simpleRCONElement)
    {
        return view('portal.admin.simpleRCONElements.edit', compact('simpleRCONElement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\SimpleRCONElement $simpleRCONElement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SimpleRCONElement $simpleRCONElement)
    {
        $validated = $this->validate($request, [
            "value" => "required|string|min:1|max:255"
        ]);

        $simpleRCONElement->update($validated);

        return back()->with('message', 'item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SimpleRCONElement $simpleRCONElement
     * @return \Illuminate\Http\Response
     */
    public function destroy(SimpleRCONElement $simpleRCONElement)
    {
        $simpleRCONElement->delete();

        return back()->with('message', 'item deleted successfully');
    }
}
