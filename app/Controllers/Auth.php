<?php namespace App\Controllers;

class Auth extends BaseController
{

	public function index() {

		$data = [
		];

		return view('layout_login', $data);
	}

	public function login(){

		$queries = model('App\Models\MiscQueriesModel');

		$user = $queries->auth($this->request->getPost("user"), $this->request->getPost("password"));

		if( $user == null )
			return redirect()->to("index");

		$permissions = $queries->permissions($user);

		$session = session();
		$session->set([
			"logged_in" => true, 
			"chain" => $user->chain, 
			"chain_id" => $user->chain_id,
			"branch" => $user->branch, 
			"branch_id" => $user->branch_id, 
			"country_code" => $user->country_code, 
			"permissions" => is_array($permissions) ? $permissions : array(), 
			"is_admin" => $user->full_access, 
			"id" => $user->id, 
			"role_id" => $user->role_id, 
			"username" => $user->username
		]);

		return redirect()->to(base_url("home/create_case"));
	}

	public function logout(){
		session()->destroy();

		return redirect()->to("index");
	}

	//--------------------------------------------------------------------

}
