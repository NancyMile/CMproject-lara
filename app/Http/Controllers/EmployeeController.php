<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Employee;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\Company;
use Illuminate\Support\Facades\DB;




class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $employees = DB::table('employees')
        //     ->join('companies', 'companies.id', '=', 'employees.company_id')
        //     ->select('employees.*', 'companies.name')
        //     ->get()->paginate(3);

        // Student::where('id', 1)->update([
        //     'email' => 'johndoe@gmail.com'
        //     ]);


        // $employees = DB::table('employees')
        //     ->join('companies', 'employees.company_id', '=', 'companies.id')
        //     ->select('employees.*', 'companies.name')->paginate(10);
        // $employees = json_decode( json_encode($employees), true);

            //dd($employees);
        $employees = Employee::where('created_at','like','%202%')->paginate(10);
        return view('employees.index')->with('employees',$employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|numeric'
        ]);

        Employee::create([
            'uuid' => Str::uuid(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_id' => $request->company_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => now(),
            'updated_at' => now()
        ]);
       return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employees.show')->with('employee',$employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {   
        return view('employees.edit')->with('employee',$employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Employee $employee)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|numeric'
        ]);

        $employee->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_id' => $request->company_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'updated_at' => now()
        ]);

        return redirect()->route('employees.show', $employee);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
