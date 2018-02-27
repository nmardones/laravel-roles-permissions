<?php

namespace App\Http\Controllers;

use App\Role;
use Auth;
use Request;
use Hashids;
use DB;

class RoleController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles','permission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $role    = new Role;
        $formAction = action('RoleController@store');
        return view("roles.form", compact('role', 'formAction','permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        try{
            $this->saveData();
            return redirect("roles")->with('success', 'Registro guardado correctamente');
        } catch (Exception $ex) {
            return redirect('roles')->with('errors', $ex->getMessage());
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function edit($id)
    {
        $roles = new Role;
    	$decode = Hashids::decode($id)[0];
        $role = Role::find($decode);
        $formAction = action('RoleController@update', $id);
        return view("roles/form", compact('role', 'formAction','permission','permissionRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        try{
    	$decode = Hashids::decode($id)[0];
        $this->saveData($decode);

        return redirect("roles")->with('success', 'Registro guardado correctamente');
        }catch (Exception $ex) {
            return redirect('roles')->with('errors', $ex->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
    	$decode = Hashids::decode($id)[0];
        $roles = Role::findOrFail($decode);
        $roles->delete();
        return redirect("roles")->with('success', 'Registro borrado correctamente');
    }

    /**
     * Save the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function saveData($id = null)
    {
        $roles          = ($id) ? Role::find($id) : new Role;
        $roles->name    = Request::get('name');
        $roles->display_name =Request::get('display_name');
        $roles->description = Request::get('description');
        $roles->save();
    }

}
