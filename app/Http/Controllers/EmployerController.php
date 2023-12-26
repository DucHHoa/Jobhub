<?php

namespace App\Http\Controllers;

use App\Models\Employers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{

    // public function __construct(){
    //     $this->authorizeResource(Employers::class);
    // }
    
    public function create()
    {      
        return view('employer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {      
        auth()->user()->employer()->create(
            $request->validate([
                'company_name' => 'required|unique:employers,company_name'
            ])
        );
        return redirect()->route('jobs.index')
            ->with('success','Complete');
    }

}
