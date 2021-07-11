<?php

// require_once './vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class ToursRecent{
 
    protected $db;
    protected $dbname = 'tours/recent';

    public function __construct()
    {
        $acc = ServiceAccount::fromJsonFile( dirname(dirname(__FILE__), 2).'/secret/probookingapp-0ffc2876f0e8.json' );
        $firebase = (new Factory)->withServiceAccount( $acc )->create();

        $this->db = $firebase->getDatabase();
    }


    public function insert( array $data )
    {
        $this->remove();

        if( empty($data) || !isset( $data )  ){ return false; }

        foreach ($data as $key => $value) {
            $this->db->getReference( $this->dbname )->getChild( $key )->set( $value );
        }

        return true;
    }

    public function remove()
    {
        $this->db->getReference( $this->dbname )->remove();
    }
}
