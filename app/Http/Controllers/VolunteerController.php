<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        return view('volunteer.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('volunteer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'ic_no' => 'required',
            'address' => 'required',
            'contact_info' => 'required',
        ]);
        Member::create($validated);
        return redirect()->route('volunteer.index');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $Member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $Member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $Member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $Member)
    {
        //
    }
}
