<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Volunteer;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class SupervisorController extends Controller
{

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

    public function create()
    {
        return view('supervisor.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);
    
        // Create User
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'userLevel' => 1,  
            'userType' => null,
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

    public function show(Volunteer $Volunteer)
    {
        //
    }

    public function edit(Volunteer $Volunteer)
    {
        //
    }

    public function update(Request $request, Volunteer $Volunteer)
    {
        //
    }

    public function destroy(Volunteer $Volunteer)
    {
        //
    }
}
