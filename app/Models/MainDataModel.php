<?php namespace App\Models;

use CodeIgniter\Model;

class MainDataModel extends Model
{
    protected $table      = 'main_data';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'last_name', 'country', 'document_id', 'gender', 'birthday', 'email', 'phone', 'newsletter', 'view', 'user_id', 'chain', 'branch'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}