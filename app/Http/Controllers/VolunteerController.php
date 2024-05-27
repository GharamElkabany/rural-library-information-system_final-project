<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class VolunteerController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('volunteer.index', compact('members'));
    }

    public function create()
    {
        return view('volunteer.create');
    }

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

    public function show(Member $Member)
    {
        //
    }

    public function edit(Member $Member)
    {
        //
    }

    public function update(Request $request, Member $Member)
    {
        //
    }

    public function destroy(Member $Member)
    {
        //
    }
}
