<?php

namespace App\Http\Controllers;
use App\Role;
use App\User;
use Datatables;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();  
        $roles = Role::all();

        return view('admin.user.index')
        ->with('users', $users)
        ->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = New User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt(str_random(8));
        $user->save();
        $user->attachRole($request->role);

        if($user->save()){
            return redirect()->back();
        }
        else{
            return redirect()->back();
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
        $user = User::with('roles')->find($id);
        return json_encode($user);
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id)->first();

        return view('admin.user.edit')
        ->with('user', $user);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = bcrypt($request->password);     
       
       $user->detachRoles($user->roles);
       $user->attachRole($request->role);

       if($user->save()){

           return redirect()->back();

       };

   }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        if(!$user->delete()){
            return redirect()->route('user.index')->withSuccess('YeaH mothafaka');
        }

    }


    public function data(Datatables $datatables)
    {

        $super = User::with('roles');

        return Datatables::eloquent($super)

        ->editColumn('roles', function(User $user){

            return $user->roles->map(function($roles) {

                return str_limit($roles->display_name, 30, '...');

            })->implode(' ');



        }) ->addColumn('action', function($users){

           $acciones = 

           '<button class="btn btn-warning btn-xs" data-toggle="modal"  onclick="editEntry('. $users->id  .')">
           <i class="fa fa-pencil-square-o"></i> Editar </button>  

           ' . '<button class="btn btn-success btn-xs" onclick="getInfo(\''. $users->id .'\')"><span class="glyphicon glyphicon-eye-open"></span> Ver </button>


           <button class="btn btn-danger btn-xs" onclick="deleteEntry(\'' .   $users->id . ' \',\'' . $users->name .  '\' )" > 
            <i class="fa fa-trash"></i> Borrar </button>' ;

            return $acciones;
        })
        ->make(true);

    }


    public function getDataTable(Datatables $datatables) {

        $users = User::select('id', 'name', 'email', 'created_at')->with('roles')->get();
        
        return Datatables::of($users)
        ->editColumn('roles', function($users){

            $test = '';

            foreach ($users->roles as $rol) {

             $test .=  $rol->display_name;
         }

         return $test;

     })


        ->addColumn('action', function($users){

           $acciones = 

           '<button class="btn btn-warning btn-xs" data-toggle="modal"  onclick="edit_entry()">
           <i class="fa fa-pencil-square-o"></i> Editar </button>  

           ' . '<button class="btn btn-success btn-xs" onclick="show_entry()"><span class="glyphicon glyphicon-eye-open"></span> Ver </button>


           <button class="btn btn-danger btn-xs" onclick="delete_entry()" > 
            <i class="fa fa-trash"></i> Borrar </button>' ;

            return $acciones;
        })

        ->make(true);

    }
}

