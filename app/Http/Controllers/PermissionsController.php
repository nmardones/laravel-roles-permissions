<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Permission;
use Auth;
use Request;
use Hashids;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $permissions = Permission::all();
            return view('permissions.index',compact('permissions'));
        } catch (Exception $ex) {
            return redirect('admin/permissions')->with('errors', $ex->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $permissions    = new Permission;
            $formAction = action('PermissionsController@store');
            return view("permissions.form", compact('permissions', 'formAction'));
        } catch (Exception $ex) {
            return redirect('admin/permissions')->with('errors', $ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        try {
            $this->saveData();
            return redirect("admin/permissions")->with('success', 'Registro guardado correctamente');
        } catch (Exception $ex) {
            return redirect('admin/permissions')->with('errors', $ex->getMessage());
        }
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
        try {
            $decode = Hashids::decode($id)[0];
            $permissions = Permission::find($decode);
            $formAction = action('PermissionsController@update', $id);
            return view("permissions/form", compact('permissions', 'formAction'));
        } catch (Exception $ex) {
            return redirect('admin/permissions')->with('errors', $ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
    {
        try {
            $decode = Hashids::decode($id)[0];
            $this->saveData($decode);
            return redirect("admin/permissions")->with('success', 'Registro guardado correctamente');
        } catch (Exception $ex) {
            return redirect('admin/permissions')->with('errors', $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $decode = Hashids::decode($id)[0];
            $permissions = Permission::findOrFail($decode);
            $permissions->delete();
            return redirect("admin/permissions")->with('success', 'Registro borrado correctamente');
        } catch (Exception $ex) {
            return redirect('admin/permissions')->with('errors', $ex->getMessage());
        }
    }

    public function saveData($id = null)
    {
        try {
            $permissions          = ($id) ? Permission::find($id) : new Permission;
            $permissions->name    = Request::get('name');
            $permissions->display_name =Request::get('display_name');
            $permissions->description = Request::get('description');
            $permissions->save();
        } catch (Exception $ex) {
            return redirect('admin/permissions')->with('errors', $ex->getMessage());
        }
    }
}
