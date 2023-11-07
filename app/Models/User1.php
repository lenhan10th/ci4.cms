<?php

namespace App\Models;

use CodeIgniter\Model;

class User1 extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'uname' => 'required',
        'password' => 'required|min_length[10]',
        'email'    => 'required|valid_email',
    ];
    protected $validationMessages   = [
        'uname' => 'username required',
        'password' => 'password required',
        'email' => 'email required',
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function createUser($param = array())
    {
        $password = password_hash($param['password'], PASSWORD_BCRYPT);
        $data = ['name' => $param['name'], 'email' => $param['email'], 'password' => $password];
        $this->save($data);

        return true;
    }

    public function verifyUser($email, $password)
    {
        return $this->table($this->table)->where('email', $email)->get();
    }
}
