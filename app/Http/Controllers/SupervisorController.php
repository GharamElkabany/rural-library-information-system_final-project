<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Volunteer;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // This will apply the 'isSupervisor' gate to all actions in this controller
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('isSupervisor')) {
                abort(403, 'Unauthorized access.');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $volunteers = Volunteer::all();
        return view('supervisor.index', compact('volunteers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supervisor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            // Add validation for other Volunteer fields
        ]);
    
        // Create User
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            // You might want to assign a specific role or permissions here
        ]);
    
        // Create Volunteer and link to User
        $volunteer = new Volunteer();
        $volunteer->user_id = $user->id;
        $volunteer->name = $validatedData['name'];
        $volunteer->email = $validatedData['email'];
        $volunteer->password = $validatedData['password'];
        $volunteer->save();
    
        return redirect()->route('supervisor.index')->with('success', 'Volunteer added successfully');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Volunteer $Volunteer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Volunteer $Volunteer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Volunteer $Volunteer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Volunteer $Volunteer)
    {
        //
    }
}
