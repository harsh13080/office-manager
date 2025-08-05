<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Company;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('company', 'manager')->get();
    return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
           $companies = Company::all();
    $managers = Employee::all(); // All existing employees for dropdown

    return view('employees.create', compact('companies', 'managers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
    'name' => 'required',
    'email' => 'nullable|email',
    'phone' => 'required',
    'position' => 'required',
    'company_id' => 'required|exists:companies,id',
    'manager_id' => 'nullable|exists:employees,id',
]);

Employee::create($request->all());
    return redirect()->route('employees.index')->with('success', 'Employee created successfully.');

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
    public function edit(Employee $employee)
    {
         $companies = Company::all();
    $managers = Employee::where('id', '!=', $employee->id)->get(); // avoid self-manager
    return view('employees.edit', compact('employee', 'companies', 'managers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  Employee $employee)
    {
        $request->validate([
        'name' => 'required|string',
        'email' => 'nullable|email',
        'phone' => 'nullable|string',
        'position' => 'nullable|string',
        'company_id' => 'required|exists:companies,id',
                'manager_name' => 'nullable|string|max:255',
                'country' => 'required|string',
        'state' => 'required|string',
        'city' => 'required|string',
    ]);

    $employee->update($request->all());
    return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
         $employee->delete();
    return redirect()->route('employees.index')->with('success', 'Employee deleted.');
    }
}
