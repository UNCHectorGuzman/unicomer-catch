<?php namespace App\Controllers;

class Profile extends BaseController
{

	public function index() {

		if( $this->request->getMethod() == "post" ){
			$user_model = model("App\Models\UserModel");
			$user_model->update( session("id"), ["password" => $this->request->getPost("password")] );
		}


		$data = [
			"section" => "profile"
		];

		return view('profile/index', $data);
	}


	//--------------------------------------------------------------------

}
