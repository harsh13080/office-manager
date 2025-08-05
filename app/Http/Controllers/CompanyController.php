<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'nullable|email',
        'location' => 'nullable|string|max:255',
        'website' => 'nullable|url',
       'phone' => 'nullable|string|max:20',

    ]);

    // Save to DB
    Company::create($validated);

    // Redirect back with success message
    return redirect()->route('companies.index')->with('success', 'Company added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.view folder edit
     */
    public function edit(string $id)
    {
         $company = Company::findOrFail($id);
    return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'nullable|email',
        'location' => 'nullable|string|max:255',
        'website'  => 'nullable|url',
        'phone'    => 'nullable|string|max:20',
    ]);

   $company = Company::findOrFail($id);
    $company->update($validated);

    return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
    $company->delete();

    return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }








// public function viewOnly()
// {
    
    
    
    
    
    
    // $companies = Company::all();  // ya koi filter applied ho to wo
    // return view('companies.view-only', compact('companies'));
// }




// public function viewOnly()
// {
//             $companies = Company::all();

//     return view('companies.view-only', compact('companies'));
// }


    
}
