<?php

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class CountrySeries{
 
    protected $db;
    protected $dbname = 'tours/countries';

    public function __construct()
    {
        $acc = ServiceAccount::fromJsonFile( dirname(dirname(__FILE__), 2).'/secret/probookingapp-0ffc2876f0e8.json' );
        $firebase = (new Factory)->withServiceAccount( $acc )->create();

        $this->db = $firebase->getDatabase();
    }


    public function insert( int $id, array $data )
    {
        $this->remove($id);
        if( empty($data) || !isset( $data )  ){ return false; }

        foreach ($data as $key => $value) {
            $this->db->getReference( $this->dbname )->getChild( "{$id}/series" )->getChild( $key )->set( $value );
        }

        return true;
    }

    public function remove(int $id)
    {
        $this->db->getReference( $this->dbname )->getChild( "{$id}/series" )->remove();
    }
}