<?php namespace App\Models;

use CodeIgniter\Model;

class CaseModel extends Model
{
    protected $table      = 'case';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'name', 
        'case_id', 
        'case_number', 
        'sent', 
        'subject', 
        'document_id', 
        'phone', 
        'email', 
        'description', 
        'shop_detail', 
        'shop_date', 
        'shop_store', 
        'item_description', 
        'brand', 
        'model', 
        'serie', 
        'invoice', 
        'price', 
        'warranty', 
        'warranty_status_provider',
        'repair_service_contact',
        'warranty_contract',
        'warranty_status',
        'warranty_provider',
        'country_code',
        'chain',
        'branch',
        'case_priority_id',
        'case_reason_id',
        'claims_origin_id',
        'repair_service_contract',
        'repair_service_contract_type_id',
        'document_type_id',
        'shop_type_id',
        'promissory_note',
        'case_origin',
        'user_id'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}