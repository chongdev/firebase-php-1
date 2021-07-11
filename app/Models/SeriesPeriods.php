<?php

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class SeriesPeriods{
 
    protected $db;
    protected $dbname = 'tours/series';

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

            // if( !empty($value->images[0]) ){
            //     $value->image = $value->images[0];
            // }

            // if( !empty($value->docs[0]) ){
            //     $value->doc_word = $value->docs[0];
            // }

            // if( !empty($value->docs[1]) ){
            //     $value->doc_pdf = $value->docs[1];
            // }

            $this->db->getReference( $this->dbname )->getChild( "{$id}/periods" )->getChild( $key )->set( $value );
        }

        return true;
    }

    public function remove(int $id)
    {
        $this->db->getReference( $this->dbname )->getChild( "{$id}/periods" )->remove();
    }
}