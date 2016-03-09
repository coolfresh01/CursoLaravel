<?php namespace Curso\Http\Controllers;

use Curso\Http\Requests;
use Curso\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Curso\User;

class UserController extends Controller {
    
    public function getOrm() {
        
        //$user = User::first();
        /*$users = User::select('id','first_name')
                ->with('profile')
                ->where('first_name','<>','Carlos')
                ->orderBy('first_name','ASC')
                ->get();*/
        $users = User::all();
        
        dd($users->toArray());
        //dd($user->profile);
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
            $result = \DB::table('users')
                    ->select(['users.first_name','users.last_name','user_profiles.bio'])
                    ->where('users.first_name','<>','Carlos')
                    ->orderBy('users.first_name','ASC')
                    ->join('user_profiles','users.id','=','user_profiles.user_id')
                    ->get();
            
            dd($result);
            
            return $result;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
