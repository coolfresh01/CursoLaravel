<?php namespace Curso\Http\Controllers\Admin;

use Curso\Http\Controllers\Controller;
use Curso\Http\Requests\CreateUserRequest;
use Curso\Http\Requests\EditUserRequest;
use Curso\User;
use function view;
use Illuminate\Http\Request;

class UserController extends Controller {
    
    /** Middleware´para restringir acceso **/
       public function __construct() {
           $this->middleware('auth');
           $this->beforeFilter('@findUser',['only' => ['show','edit','update','destroy']]);
       }
       
       public function findUser(Route $route) {
           $this->user = User::findOrFail($route->getParameter('users'));
       }

       /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $requets)
	{
            //dd($requets->get('name'));
            
            //$users = User::paginate();
            //dd($users);
            
            $users = User::filterAndPaginate($requets->get('name'), $requets->get('type'));
            
            return view('admin.users.index',  compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            return view('admin.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateUserRequest $request) {
            
            //dd($request->all());
            
            /* OTRAS DOS FORMAS DE ALMACENER EL USUARIO
             * 
             * $user = User::create($request->all());
             * 
             */
            // validacion
            //$data = \Request::all();
            
            /*$rules = array(
                'first_name'    => 'required', 
                'last_name'     => 'required', 
                'email'         => 'required', 
                'password'      => 'required',
                'type'          => 'required'
            );*/
            
            //$this->validate($request, $rules);
            
            /*$v = \Validator::make($data,$rules);
            
            if ($v->fails()) {
                return redirect()->back()
                        ->withErrors($v->errors())
                        ->withInput(\Request::except('password'));
            }*/
            
            /*$user = new User($request->all());
            $user->save();*/
            
            $user = User::create($request->all());
            return redirect()->route('admin.users.index');
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
	public function edit($id) {
            
            $user = User::findOrFail($id);
            return view('admin.users.edit',compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditUserRequest $request, $id) {
            $user = User::findOrFail($id);
            
            $user->fill(\Request::all());
            $user->save();
            
            return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request) {
            
            //abort(500);
            
            $this->user->delete();
            
            $message = 'El usuario '. $this->user->full_name .' fue eliminado correctamente';
            
            if ($request->ajax()) {
                return $message;
            }
            
           /* $user = User::findOrFail($id);
            $user->delete();*/
            //User::destroy($id);
            
            \Session::flash('message', $message );
            return redirect()->route('admin.users.index');
           
	}

}
