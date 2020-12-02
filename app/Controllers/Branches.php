<?php namespace App\Controllers;

class Branches extends BaseController
{

	public function list( $chain_id ){

		$branches = model('App\Models\ChainBranchModel')->where("chain_id", $chain_id)->findAll();

		return $this->response->setStatusCode(200)
               ->setJSON($branches);
	}

	//--------------------------------------------------------------------

}
