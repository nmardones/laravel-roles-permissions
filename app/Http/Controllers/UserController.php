<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use App\Role;
use Auth;
use Illuminate\Http\Request;
use Hashids;
use DB;

class UserController extends Controller {

    public function index(Request $request)
    {
        try{
            $users = User::all();
            $roles = Role::all();
            return view('users.index',compact('users','roles'));
        } catch (Exception $ex) {
            return redirect('users')->with('errors', $ex->getMessage());
        }
    }

    /**
     * Create
     */
    public function create()
    {
        try{
            $users = User::all();
            $roles = Role::all();
            return view('users.create',compact('roles','users'));
        }catch ( Exception $ex){
            return redirect('users')->with('errors', $ex->getMessage());
        }

    }

    /**
     * Show
     */
    public function show(){
        return view('users.edit');
    }
    /**
     * Store
     */
    public function store(UserRequest $request)
    {
        try{
            $user = new User;
            $user->name   = $request->get('name');
            $user->email  = $request->get('email');
            $user->password = bcrypt($request->get('password'));
            $roles = $request->get('role');
            $user->save();
            if ($roles) {
                $user->attachRoles($roles);
            }
            return redirect('users')->with('success','Usuario creado correctamente');
        } catch (Exception $ex) {
            return redirect('users')->with('errors', $ex->getMessage());
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function edit(Request $request,$id)
    {
        try{
            $allUser = User::all();
            $users = new User;
            $decode = Hashids::decode($id)[0];
            $user = User::find($decode);
            $roles = Role::all();
            $rolUser = $users->getRolById($decode);
            $formAction = action('UserController@update', $id);
            return view("users/form", compact('user','allUser','formAction','roles','rolUser'));
        }catch (Exception $ex) {
            return redirect('users')->with('errors', $ex->getMessage());
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        try{
            $decode = Hashids::decode($id)[0];
            $users          = ($id) ? User::find($decode) : new User;
            $users->name    = $request->get('name');
            $users->email	= $request->get('email');
            $users->detachRoles($users->roles);
            $users->save();
            $roles = $request->get('role');
            if ($roles) {
                $users->attachRoles($roles);
            }
            return redirect("users")->with('success', 'Registro guardado correctamente');
        }catch (Exception $ex) {
            return redirect('users')->with('errors', $ex->getMessage());
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
        try{
            $decode = Hashids::decode($id)[0];
            $users = User::findOrFail($decode);
            $users->delete();
            return redirect("users")->with('success', 'Registro borrado correctamente');
        }catch (Exception $ex) {
            return redirect('users')->with('errors', $ex->getMessage());
        }

    }

    /**
     * Save the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function saveData(Request $request, $id)
    {
        try{
            $users          = ($id) ? User::find($id) : new User;
            $users->name    = $request->get('name');
            $users->detachRoles($users->roles);
            $users->save();
        }catch (Exception $ex) {
            return redirect('users')->with('errors', $ex->getMessage());
        }
    }

}

