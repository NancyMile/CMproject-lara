<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    public  function index(){
        $companies = Company::where('created_at','like','%202%')->paginate(10);
       return view('companies.index')->with('companies',$companies); 
        // foreach($companies as $company){
        //     echo $company->name;
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(request());
        //valoidate  logo dimention if uploaded
        //'logo' => ['required',Rule::dimensions()->width(100)->height(100),],
        $request->validate([
            'name' => 'required',
            'email' => 'required:rfc,dns',
            'website' => 'required' //URL
        ]);

        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $request->logo,
            'website' => $request->website,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
