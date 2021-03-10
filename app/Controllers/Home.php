<?php namespace App\Controllers;

class Home extends BaseController
{

	var $fields;
	var $record_type;

	function __construct(){

		$this->fields = "tipo_documento__c, IdNumber__c, SuppliedName, Telefono_de_Contacto__c, CaseNumber, Origin, Subject, Description, Status, Comments, Informacion_de_Cierre__c, FORMAT(CreatedDate) CreatedDate";

		$this->searchables = [
			"CaseNumber",
			"tipo_documento__c",
			"Telefono_de_Contacto__c",
			// "Motivo__c",
			// "Priority",
			"IdNumber__c",
			"SuppliedName",
			"Origin",
			"Subject",
			"Status",
			"Informacion_de_Cierre__c",
			// "Fecha_de_Compra__c"
		];

		$this->record_type = ENVIRONMENT == 'production' ? "0122S0000002U0IQAU" : "0126C0000008fkOQAQ";
	}

	public function index( $country = "", $chain = "", $branch = "" )	{

		if( empty($country) || empty($chain) || empty($branch) ){
			$this->response->setStatusCode(400, "Faltan parametros en la url");
			return;
		}

		$data = [
			"chain" => $chain,
			"country" => $country,
			"branch" => $branch
		];

		return view('welcome_message', $data);
	}

	// public function save(){

	// 	$dataModel = model('App\Models\MainDataModel');

	// 	$info = [
	// 	    'name' => $this->request->getPost("name"), 
	// 	    'last_name'  => $this->request->getPost("last_name"), 
	// 	    'country'  => $this->request->getPost("country"), 
	// 	    'document_id'  => $this->request->getPost("document_id"), 
	// 	    'gender'  => $this->request->getPost("gender"), 
	// 	    'birthday'  => $this->request->getPost("birthday"), 
	// 	    'email'  => $this->request->getPost("email"), 
	// 	    'phone'  => $this->request->getPost("celphone"), 
	// 	    'newsletter'  => $this->request->getPost("newsletter"), 
	// 	    'chain'  => $this->request->getPost("chain"), 
	// 	    'branch'  => $this->request->getPost("branch"), 
	// 	    'view'  => $this->request->getPost("view"), 
	// 	    'user_id' => 1
	// 	];

	// 	$dataModel->insert($info);


	// 	return redirect()->to("thanks/{$info["country"]}/{$info["chain"]}/{$info["branch"]}");
	// }

	public function save(){

		$dataModel = model('App\Models\CaseModel');

		$date = $this->request->getPost("shop_date");
		$date = str_replace('/', '-', $date);
		$shop_date = empty($date) ? NULL : date('Y-m-d', strtotime($date));

		$info = [
            'name' => $this->request->getPost("name"), 
            'subject' => $this->request->getPost("case_subject"), 
            'document_id' => $this->request->getPost("document_id"), 
            'phone' => $this->request->getPost("phone"), 
	        'description' => $this->request->getPost("case_description"), 
	        'email'  => $this->request->getPost("email"), 
	        'shop_detail' => $this->request->getPost("shop_detail"), 
	        'shop_date' => $shop_date, 
	        'shop_store' => $this->request->getPost("shop_store"), 
	        'item_description' => $this->request->getPost("item_description"), 
	        'brand' => $this->request->getPost("brand"), 
	        'model' => $this->request->getPost("model"), 
	        'serie' => $this->request->getPost("serie"), 
	        'invoice' => $this->request->getPost("invoice"), 
	        'price' => $this->request->getPost("price"), 
	        'warranty' => $this->request->getPost("warranty"), 
	        'warranty_status_provider' => empty($this->request->getPost("warranty_status_provider")) ? NULL : $this->request->getPost("warranty_status_provider"),
	        'repair_service_contract' => $this->request->getPost("repair_service_contract"),
	        'warranty_contract' => empty($this->request->getPost("warranty_contract")) ? NULL : $this->request->getPost("warranty_contract"),
	        'warranty_status' => empty($this->request->getPost("warranty_status")) ? NULL : $this->request->getPost("warranty_status"),
	        'warranty_provider' => empty($this->request->getPost("warranty_provider")) ? NULL : $this->request->getPost("warranty_provider"),
	        'country_code' => session("country_code"),
	        'chain' => session("chain"),
	        'branch' => session("branch"),
	        'case_origin' => $this->request->getPost("case_origin"),
	        'case_priority_id' => $this->request->getPost("priority"),
	        'case_reason_id' => $this->request->getPost("case_reason"),
	        'claims_origin_id' => $this->request->getPost("claims_origin"),
	        'repair_service_contract_type_id' => empty($this->request->getPost("repair_service_contract_type")) ? NULL : $this->request->getPost("repair_service_contract_type"),
	        'document_type_id' => $this->request->getPost("document_type"),
	        'promissory_note' => $this->request->getPost("promissory_note"),
	        'shop_type_id' => empty($this->request->getPost("shop_type")) ? NULL : $this->request->getPost("shop_type"),
	        'user_id' => session("id")
		];

		$dataModel->insert($info);

		$id = $dataModel->insertID();

		return redirect()->to("sync/{$id}");
	}

	// public function cases(){
	// 	helper("form");
	// 	// $pager = \Config\Services::pager();

	// 	$dataModel = model('App\Models\CaseModel');
	// 	$cases = $dataModel->where(["branch" => session("branch")]);
	// 	$search = $this->request->getVar("search");

	// 	if( !empty($search) ){
	// 		$cases
	// 			->groupStart()
	// 			->where(["document_id" => $search])
	// 			->orWhere(["case_number" => $search])
	// 			->orLike(["name" => $search])
	// 			->groupEnd();
	// 	}

	// 	$cases->orderBy("created_at desc");

	// 	$data = [
	// 		"cases" => $cases->paginate(),
	// 		"pager" => $cases->pager,
	// 		"section" => "cases"
	// 	];

	// 	return view("home/cases", $data);
	// }

	public function cases(){
		helper("form");
		// $pager = \Config\Services::pager();

		$types = model('App\Models\DocumentTypeModel')->select("code, name")->findAll();
		$document_types = array_combine(array_column($types, "code"), array_column($types, "name"));

		// print_r($document_types);

		$data = [
			// "sc_cases" => $this->_get_cases_sc( $where ),
			"documents" => $document_types,
			"section" => "cases"
		];

		return view("home/cases", $data);
	}

	public function dt_cases(){
		$search = $this->request->getVar("search[value]");
		$limit = $this->request->getVar("length");
		$offset = $this->request->getVar("start");
		$draw = $this->request->getVar("draw");

		$where = "";

		if( !empty($search) ){
			$fWhere = [];
			foreach ($this->searchables as $key => $field) {
				$fWhere[] = "{$field} LIKE '%{$search}%'";
			}

			$where = "AND (" . implode(" OR ", $fWhere) . ")";
			// echo $where;
			// die();
		} else {
			return json_encode([
				"draw" => $draw,
				"recordsTotal" => 0,
				"recordsFiltered" => 0,
				"data" => []
			]);
		}

		$cases = $this->_get_cases_sc( $where, $limit, $offset );
		$total = $this->_get_count_cases_sc("");
		$totalFilter = empty($where) ? $total : $this->_get_count_cases_sc( $where );
		// print_r($cases);
		return json_encode([
			"draw" => $draw,
			"recordsTotal" => $total,
			"recordsFiltered" => $totalFilter,
			"data" => array_map(function($valor) {
									array_shift($valor);
								    return array_values( $valor );
								}, $cases["records"])
		]);
	}

	private function _get_cases_sc($search = '', $limit = 25, $offset = 0){
		$client = $this->_build_client();
		$token = $this->_get_token_for_sync($client);

		$response = $client->get('services/data/v49.0/query/', [
			'headers' => ['Authorization' => "Bearer {$token["access_token"]}"],
			'query' => 
				[ "q" => "SELECT {$this->fields} 
					FROM case WHERE recordTypeId = '{$this->record_type}' {$search} ORDER BY CreatedDate DESC LIMIT {$limit} OFFSET {$offset}" ]
		]);

		if (strpos($response->getHeader('content-type'), 'application/json') !== false) {			
		    $sc_case = json_decode($response->getBody(), true);

		    if( isset($sc_case["totalSize"]) ){
		    	return $sc_case;
			} else {

				$message = "Gateway error " . print_r($sc_case, true);

				throw new \Exception($message, 1);
			}

		} else {
			throw new Exception("not a valid json response", 1);
		}
	}

	private function _get_count_cases_sc($search = ''){
		$client = $this->_build_client();
		$token = $this->_get_token_for_sync($client);

		$response = $client->get('services/data/v49.0/query/', [
			'headers' => ['Authorization' => "Bearer {$token["access_token"]}"],
			'query' => 
				[ "q" => "SELECT COUNT() FROM case WHERE recordTypeId = '{$this->record_type}' {$search}" ]
		]);


		if (strpos($response->getHeader('content-type'), 'application/json') !== false) {			
		    $sc_case = json_decode($response->getBody(), true);

		    if( isset($sc_case["totalSize"]) ){
		    	return $sc_case["totalSize"];
			} else {

				$message = "Gateway error " . print_r($sc_case, true);

				throw new \Exception($message, 1);
			}

		} else {
			throw new Exception("not a valid json response", 1);
		}
	}

	public function create_case(){

		//todo: filter document types based on users country code

		$priorities = model('App\Models\CasePriorityModel');
		$case_types = model('App\Models\CaseTypeModel');
		$doc_types = model('App\Models\DocumentTypeModel');
		$claims_origins = model('App\Models\ClaimsOriginModel');
		$contract_types = model('App\Models\RepairServiceContractTypeModel');
		$shop_types = model('App\Models\ShopTypesModel');
		$branches = model('App\Models\ChainBranchModel');

		$data = [
			"warranty_months" => [3,6,12,24,36,60],
			"case_priorities" => $priorities->findAll(),
			"case_types" => $case_types->findAll(),
			"document_types" => $doc_types->findAll(),
			"claims_origins" => $claims_origins->findAll(),
			"contract_types" => $contract_types->findAll(),
			"shop_types" => $shop_types->findAll(),
			"branches" => $branches->where(["chain_id" => session("chain_id")])->findAll(),
			"section" => "create_case"
		];

		return view("home/index", $data);
	}

	public function reasons( $type = '' ) {
		$reasons = model('App\Models\CaseReasonModel');

		$body = $reasons->where('case_type_id', $type)
					->findAll();

		return $this->response->setStatusCode(200)
               ->setJSON($body);

       	// return $this->response->setJSON($data);
	}

	public function thanks($country = "", $chain = "", $branch = ""){

		$data = [
			"chain" => $chain,
			"country" => $country,
			"branch" => $branch
		];

		return view('thanks', $data);
	}

	private function _build_client() {

		$options = [
	        'baseURI' => ENVIRONMENT == 'production' ? 'https://unicomer.my.salesforce.com/' : 'https://unicomer--servicesv.my.salesforce.com/',
	        'http_errors' => false,
	        'verify' => false,
	        'headers' => [
	        	'Accept' => 'application/json',
	        	'Content-Type' => 'application/json',
	        ]
	        // 'timeout'  => 3
		];

		return \Config\Services::curlrequest($options);
	}

	public function batch_sync($from, $to){

		$client = $this->_build_client();

		$queries = model('App\Models\MiscQueriesModel');
		$cases = model('App\Models\CaseModel');

		// $syncs = $queries->data_to_sync();
		// print_r($syncs);
		// echo json_encode($syncs);
		// foreach ($syncs as $record) {
		for ($i = $from; $i <= $to;  $i++) {
			$record = $queries->data_to_sync($i);
			echo "Sync {$record["id"]}<br />";
			$sc_case = $this->_send_data_for_sync($client, $this->_parse_body($record));
			$cases->update($i, ["case_id" => $sc_case]);
		}
	}

	public function sync( $id, $debug = false ){

		$client = $this->_build_client();

		$queries = model('App\Models\MiscQueriesModel');
		$cases = model('App\Models\CaseModel');

		$record = $queries->data_to_sync( $id, $debug );

		if( $debug ){
			print_r( $record );
			die();
		}

		$sc_case = $this->_send_data_for_sync($client, $this->_parse_body($record));

		$cases->update($id, ["case_id" => $sc_case]);

		return redirect()->to(base_url("home/case_info/{$sc_case}"));
	}

	public function case_info( $sc_case_id ){

		$case_model = model('App\Models\CaseModel');
		$case = $case_model->where("case_id", $sc_case_id)->first();
		$types = model('App\Models\DocumentTypeModel')->select("code, name")->findAll();
		$document_types = array_combine(array_column($types, "code"), array_column($types, "name"));

		// print_r($case);

		$all = [
			"tipo_documento__c",
			"IdNumber__c",
			"SuppliedName",
			"Telefono_de_Contacto__c",
			"SuppliedEmail",
			"Cadena__c",
			"Tienda__c",
			"Type",
			"Motivo__c",
			"Priority",
			"Origen_del_Reclamo__c",
			"Origin",
			"Subject",
			"Description",
			"Tienda_de_Compra__c",
			"Fecha_de_Compra__c",
			"Descripcion_Producto__c",
			"Marca__c",
			"Modelo__c",
			"Serie__c",
			"Invoice__c",
			"Tipo_de_Compra__c",
			"Precio__c",
			"Pagare__c",
			"Garantia_Proveedor__c",
			"Garantia_Contrato__c",
			"Contrato_Servicio_Reparacion__c",
			"No_CSR__c",
			"Estado_Garantia__c",
			"Estado_Garant_a_Prov__c",
			"recordTypeId",
			"Id",
			"CaseNumber",
		];

		$client = $this->_build_client();

		$token = $this->_get_token_for_sync($client);

		$response = $client->get('services/data/v49.0/query/', [
			'headers' => ['Authorization' => "Bearer {$token["access_token"]}"],
			'query' => 
				[ "q" => "SELECT " . implode(",", $all) . " FROM case Where Id = '{$sc_case_id}'" ]
		]);

		if (strpos($response->getHeader('content-type'), 'application/json') !== false) {
		    // $body = json_decode($body);

		    $body = json_decode($response->getBody());

		    $info = isset($body->records) ? $body->records : array();

		    if( count($info) > 0 ){
		    	$case_model->update($case["id"], ["case_number" => $info[0]->CaseNumber]);
		    }

		    return view("home/case_info", ["info" => $info, "doc_types" => $document_types, "section" => "case_info"]);

		}
	}

	private function _get_token_for_sync( $client ){
		
		if( session("sc_token") )
			return session("sc_token");

		if( ENVIRONMENT == 'production' ){
			$query = [
				"grant_type" => "password",
				"client_id" => "3MVG9QBLg8QGkFerR.7VoKURp08AzNQyhB1GC1VO5GcQ271NtBZjO0RPeYbc_ZOz8JVcrdHfs1ftlfag9T_gm",
				"client_secret" => "4D2C2789198824C464BC5427B80603677D50DE4284E05E708F7624779F8606AD",
				"username" => "carlos_bonilla@unicomer.com",
				"password" => "C@r1it0\$gKyi7fNmAq4Lte51GrnUHvpQc"
			];
		} else {
			$query = [
				"grant_type" => "password",
				"client_id" => "3MVG9QBLg8QGkFerR.7VoKURp08AzNQyhB1GC1VO5GcQ271NtBZjO0RPeYbc_ZOz8JVcrdHfs1ftlfag9T_gm",
				"client_secret" => "4D2C2789198824C464BC5427B80603677D50DE4284E05E708F7624779F8606AD",
				"username" => "mauricio_mendez@unicomer.com.servicesv",
				"password" => "Unicomer2020pgEMWmf1hrVh6KMYT1X6CUJ4"
			];
		}

		$response = $client
			// ->setBody( $body )
			->post('services/oauth2/token', ['query' => $query]);

		if (strpos($response->getHeader('content-type'), 'application/json') !== false) {
		    // $body = json_decode($body);

		    $token = json_decode($response->getBody(), true);

		    session()->set(["sc_token" => $token]);

		    return session("sc_token");

		}
	}

	private function _send_data_for_sync( $client, $body ){

		$token = $this->_get_token_for_sync($client);

		$response = $client
			->setJson( $body )
			->post('services/data/v49.0/sobjects/Case', [
				'headers' => ['Authorization' => "Bearer {$token["access_token"]}"]
			]);

		if (strpos($response->getHeader('content-type'), 'application/json') !== false) {			
		    $sc_case = json_decode($response->getBody());

		    if( isset($sc_case->success) && $sc_case->success ){
		    	return $sc_case->id;
			} else if( isset($sc_case[0]->message) ) {
				$fields = isset($sc_case[0]->fields) && is_array($sc_case[0]->fields) ? implode(",", $sc_case[0]->fields) : "";

				$message = "Gateway error {$sc_case[0]->message} - ({$fields})";

				throw new \Exception($message, 1);
			}

		} else {
			throw new Exception("not a valid json response", 1);
		}
	}

	private function _parse_body( $data ){
		return [
			"tipo_documento__c" => $data["document_type"],
			"IdNumber__c"  => $data["document_id"],
			"SuppliedName"  => $data["name"],
			"Telefono_de_Contacto__c"  => $data["phone"],
			"SuppliedEmail"  => $data["email"],
			"Cadena__c"  => $data["chain"],
			"Tienda__c"  => $data["branch"],
			"Type"  => $data["case_type"],
			"Motivo__c"  => $data["reason"],
			"Priority"  => $data["priority"],
			"Origen_del_Reclamo__c"  => $data["claims_origin"],
			"Origin"  => $data["case_origin"],
			"Subject"  => $data["subject"],
			"Description"  => $data["description"],
			"Tienda_de_Compra__c"  => $data["shop_store"],
			"Fecha_de_Compra__c"  => $data["shop_date"],
			"Descripcion_Producto__c"  => $data["item_description"],
			"Marca__c"  => $data["brand"],
			"Modelo__c"  => $data["model"],
			"Serie__c"  => $data["serie"],
			"Invoice__c"  => $data["invoice"],
			"Tipo_de_Compra__c"  => $data["shop_type"],
			"Precio__c"  => $data["price"],
			"Pagare__c"  => $data["promissory_note"],
			"Garantia_Proveedor__c"  => $data["warranty_provider"],
			"Garantia_Contrato__c"  => $data["warranty_contract"],
			"Contrato_Servicio_Reparacion__c"  => $data["repair_service_contract_type"],
			"No_CSR__c"  => $data["repair_service_contract"],
			"Estado_Garantia__c"  => $data["warranty_status"],
			"Estado_Garant_a_Prov__c"  => $data["warranty_status_provider"],
			"recordTypeId" => $this->record_type
		];
	}

	//--------------------------------------------------------------------

}
