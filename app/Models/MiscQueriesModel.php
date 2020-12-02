<?php namespace App\Models;

// use CodeIgniter\Model;

class MiscQueriesModel {
    
    public function auth($user, $password) {
        $db = \Config\Database::connect();
        $builder = $db->table('user u');

        $builder->select("u.chain, u.branch, u.username, u.id, u.country_code, u.chain_id, u.branch_id, u.role_id, r.full_access");
        $builder->join("role r", "r.id = u.role_id");
        $builder->where(["username" => $user, "password" => $password]);

        return $builder->get()->getRow();

    }

    public function permissions($user) {
        $db = \Config\Database::connect();
        $builder = $db->table('permission_x_role pr');

        $builder->select("p.url");
        $builder->join("permission p", "p.id = pr.permission_id", "right");
        $builder->where(["pr.role_id" => $user->role_id]);
        $builder->orWhere(["p.is_public" => 1]);

        return array_column($builder->get()->getResultArray(), "url");

    }

    public function data_to_sync( $case_id = '', $debug = false ){
    	$db = \Config\Database::connect();
        $builder = $db->table('case c');

        $builder->select("c.id, d.code document_type, c.document_id, c.name, c.phone, c.shop_store, c.warranty_provider");
        $builder->select("c.email, c.chain, c.branch, ct.name case_type, sct.value repair_service_contract_type");
        $builder->select("cr.name reason, p.value priority, co.value claims_origin, c.warranty_contract");
        $builder->select("c.case_origin, c.subject, c.description, c.branch, DATE_FORMAT(c.shop_date, '%Y-%m-%d') shop_date");
        $builder->select("c.item_description, c.brand, c.model, c.serie, c.invoice, st.name shop_type");
        $builder->select("c.price, c.promissory_note, wsp.name warranty_status_provider, c.repair_service_contract, ws.name warranty_status");
        $builder->join("document_type d", "d.id = c.document_type_id");
        $builder->join("case_reason cr", "cr.id = c.case_reason_id");
        $builder->join("case_type ct", "ct.id  = cr.case_type_id");
        $builder->join("case_priority p", "p.id = c.case_priority_id");
        $builder->join("claims_origin co", "co.id = c.claims_origin_id");
        $builder->join("shop_type st", "st.id = c.shop_type_id", "left");
        $builder->join("repair_service_contract_type sct", "sct.id = c.repair_service_contract_type_id", "left");
        $builder->join("warranty_status ws", "ws.id = c.warranty_status", "left");
        $builder->join("warranty_status wsp", "ws.id = c.warranty_status_provider", "left");
        $builder->where("sent is null");

        if( !empty($case_id) )
        	$builder->where("c.id", $case_id);

        if( $debug )
            echo $builder->getCompiledSelect();

        if( empty($case_id) )
        	return $builder->get()->getResultArray();
        else
        	return $builder->get()->getRowArray();
    }

}