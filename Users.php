<?php

require_once './vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class Users 
{
    protected $db;
    protected $dbname = 'users';

    public function __construct()
    {
        $acc = ServiceAccount::fromJsonFile( __DIR__.'/secret/probookingapp-0ffc2876f0e8.json' );
        $firebase = (new Factory)->withServiceAccount( $acc )->create();

        $this->db = $firebase->getDatabase();
    }

    public function get(int $id = null)
    {
        if( empty($id) || isset($id) ){ return false; }

        if( $this->db->getReference( $this->dbname )->getSnapshop()->hasChild($id) ){
            return $this->db->getReference( $this->dbname )->getChild( $id )->getValue();
        }
    }

    public function insert( array $data )
    {
        if( empty($data) || !isset( $data )  ){ return false; }

        foreach ($data as $key => $value) {
            $this->db->getReference( $this->dbname )->getChild( $key )->set( $value );
        }

        return true;
    }

    public function delete(int $id)
    {
        if( empty($id) || isset($id) ){ return false; }

        if( $this->db->getReference( $this->dbname )->getSnapshop()->hasChild($id) ){
            $this->db->getReference( $this->dbname )->getChild( $id )->remove();

            return true;
        }
        else{
            return false;
        }

    }
}


$users = New Users();

var_dump( $users->insert([
    '1' => 'Chong',
    '2' => 'Top'
]) ); 