<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class NameModel extends Model {
        protected $table = 'names'; //consider other level of security for this..???
        protected $primaryKey = 'id';
        protected $allowedFields = ['name', 'email'];
    }


    
//>
