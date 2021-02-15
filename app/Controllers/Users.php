<?php namespace App\Controllers;

class Users extends BaseController
{

	public function index() {
		return view("users/index", ["section" => "users_list"]);
	}

	public function dt_users(){

		$search = $this->request->getVar("search[value]");
		$limit = $this->request->getVar("length");
		$offset = $this->request->getVar("start");
		$draw = $this->request->getVar("draw");
		
		$users = model('App\Models\UserModel');

		$total = $users->countAllResults();
		$totalFilter = $users->countAllResults();

		return json_encode([
			"draw" => $draw,
			"recordsTotal" => $total,
			"recordsFiltered" => $totalFilter,
			"data" => array_map(function($user) {
								    return [
								    	$user["username"],
								    	$user["chain"],
								    	$user["branch"],
								    	anchor(base_url("users/edit/{$user["id"]}"), 'Editar', ['class' => 'btn btn-primary'])
								    ];
								}, $users->limit($limit, $offset)->find())
		]);
	}

	public function edit( $id = 0 ){

		helper('form');

		$user = model('App\Models\UserModel')->find( $id );
		$roles = model('App\Models\RoleModel')->findAll();

		if( $user == null ){
			$user = ["chain_id" => 0, "id" => null, "username" => "", "password" => "", "role_id" => null];
		}

		$chains = model('App\Models\ChainModel')->findAll();
		$branches = model('App\Models\ChainBranchModel')->where("chain_id", $user["chain_id"])->findAll();

		return view("users/edit", 
			[
				"section" => "users_edit", 
				"user" => $user,
				"roles" => $roles,
				"branches" => $branches,
				"chains" => $chains,
			]);
	}

	public function save( $id = null ){
		$user = model('App\Models\UserModel');

		$info = [
			"chain" => $this->request->getPost("chain_name"),
			"chain_id" => $this->request->getPost("chain"),
			"branch" => $this->request->getPost("branch_name"),
			"branch_id" => $this->request->getPost("branch"),
			"username" => $this->request->getPost("username"),
			"password" => $this->request->getPost("password"),
			"role_id" => $this->request->getPost("role"),
			"country_code" => "sv"
		];

		if( $id == null ){
			$user->insert($info);
			$id = $user->getInsertID();
		} else {
			$user->update($id, $info);
		}

		return redirect()->to("edit/{$id}");

	}

	//--------------------------------------------------------------------

}
