<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebpagesLink;

class WebpagesLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'webpage_link' => 'required|url',
        ]);

        $existingLink = WebpagesLink::firstWhere('link', $request->webpage_link);

        if ($existingLink) {
            return back()->with('info', 'Link already in database.');
        } else {
            $link = new WebpagesLink;
            $link->link = $request->webpage_link;
            $link->save();
    
            return back()->with('success', 'Link added successfully.');
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
