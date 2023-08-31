<?php

namespace Ayat\Crud\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ayat\Crud\Http\Requests\CrudRequest;
use Ayat\Crud\Models\CrudPackage;
use Illuminate\Support\Facades\Session;


class CrudController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | CONSTRUCTOR
    |--------------------------------------------------------------------------
    | Define your won
    |
    */
    public function __construct()
    {
    }


    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    | Index method
    |
    */
    public function index()
    {
        $fetchRecords = CrudPackage::get();
        return view('package::index', ['data' => $fetchRecords]);
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE PAGE
    |--------------------------------------------------------------------------
    | Return the create form
    |
    */
    public function create()
    {
        return view('package::create');
    }


    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    | Store the data into the database
    |
    */
    public function store(CrudRequest $request)
    {
        CrudPackage::create($request->all());
        Session::flash('success', 'Data inserted successfully.');
        return redirect()->back();
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    | Open edit page
    |
    */
    public function edit($id)
    {
        $fetchRecord = CrudPackage::find(base64_decode(base64_decode($id)));
        return view('package::edit', ['data' => $fetchRecord]);
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    | Update record
    |
    */
    public function update(CrudRequest $request)
    {
        $fetchRecord = CrudPackage::find(base64_decode(base64_decode($request->uuid)));

        if ($fetchRecord) {
            $fetchRecord->entry_by = $request->entry_by;
            $fetchRecord->name     = $request->name;
            $fetchRecord->phone    = $request->phone;
            $fetchRecord->email    = $request->email;

            $fetchRecord->save();
        }
        return redirect('package')->with('success','User has been updated successfully');
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    | Destroy record
    |
    */
    public function destroy(Request $request)
    {
        $fetchRecord = CrudPackage::find(base64_decode(base64_decode($request->uuid)));

        if ($fetchRecord) {

            $fetchRecord->delete();
        }
        return redirect('package')->with('success','User has been deleted successfully');
    }
}
