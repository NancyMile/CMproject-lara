<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\Company;
use App\Mail\CompanyEmails;
use Intervention\Image\Image;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    public  function index(){
        $companies = Company::where('created_at','like','%202%')->paginate(10);
       return view('companies.index')->with('companies',$companies); 
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'website' => 'required|url',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:10240'
        ]);

        //validation image
        if($_FILES['logo']['type']=='image/jpeg' or $_FILES['logo']['type']=='image/png' ){
            //rename the file to a unic name
            switch($_FILES['logo']['type']){
                case 'image/jpeg':
                    $archivo = time().".jpeg";
                break;
                case 'image/png':
                    $archivo = time().".png";
                break;
            }
            copy($_FILES['logo']['tmp_name'],storage_path("app/public/".$archivo));
        }else{
            return redirect()->route('companies.create');
        }
        Company::create([
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $archivo,
            'website' => $request->website,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        Mail::send(new CompanyEmails());
        Session::flash('success','The record was created!');
        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show')->with('company',$company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit')->with('company',$company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Company $company)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'website' => 'required|url',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:10240'
        ]);
        //validation image
        if(empty($_FILES['logo']['tmp_name'])){
            Session::flash('message','There is no image');
            return redirect()->back();
        }
        if($_FILES['logo']['type']=='image/jpeg' or $_FILES['logo']['type']=='image/png' ){
            //rename the file to a unic name
            switch($_FILES['logo']['type']){
                case 'image/jpeg':
                    $archivo = time().".jpeg";
                break;
                case 'image/png':
                    $archivo = time().".png";
                break;
            }
            copy($_FILES['logo']['tmp_name'],storage_path("app/public/".$archivo));
        }else{
            return redirect()->route('companies.index');
        }
        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $archivo,
            'website' => $request->website,
            'updated_at' => now()
        ]);
        $request->session()->flash('css','success');
        Session::flash('success','The record was edited!');
        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        unlink(storage_path("app/public/".$company->logo));
        return redirect()->route('companies.index');
    }
}
