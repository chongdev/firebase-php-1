<?php

require_once './vendor/autoload.php';
require_once './config/Fn.php';

$base_url = 'https://api.japanpackage.co/v2';
// $supports = array();
// if (function_exists("pcntl_fork")) $supports[] = "pcntl";
// echo implode(",", $supports);
// $pid = pcntl_fork();


# banners
// require_once './app/Models/Banner.php';
// $refBanner = New Banner();

// $dataBanner = [];
// $dataBanner[] = [
//     'id' => 1,
//     'image'  => "https://probookingcenter.com/img/banners/hero/pro-incentive.jpg",
//     'name' => "PRO INCENTIVE"
// ];

// $dataBanner[] = [
//     'id' => 2,
//     'image'  => "https://probookingcenter.com/img/banners/hero/pro-banner-1.jpg",
//     'name' => "Let's Go Travel"
// ];

// $dataBanner[] = [
//     'id' => 3,
//     'image'  => "https://probookingcenter.com/img/banners/hero/pro-banner-2.jpg",
//     'name' => "Let's Go Travel"
// ];
// $refBanner->insert($dataBanner);
// echo 'Banner results successfully<br>';


# tours/countries
$url = "{$base_url}/tours/countries";
$res = Fn::http_response($url, 'GET');
if( $res ){

    $res = json_decode($res);
    

    if( !empty( $res->data ) ){

        require_once './app/Models/Country.php';
        $refCountry = New Country();
        $refCountry->insert( $res->data );


        echo 'Country results successfully<br>';
    }
    else{
        echo 'Country Not found<br>';
    }
}

# tours/recent
// $url = "{$base_url}/tours/series";
// $res = Fn::http_response($url, 'GET', ['limit'=>'5']);
// if( $res ){

//     $res = json_decode($res);
    

//     if( !empty( $res->data ) ){

//         require_once './app/Models/ToursRecent.php';
//         $ref = New ToursRecent();
//         $ref->insert( $res->data );

//         echo 'ToursRecent results successfully<br>';
//     }
//     else{
//         echo 'ToursRecent Not found<br>';
//     }
// }


# tours/flashsale
// $url = "{$base_url}/tours/periods";
// $res = Fn::http_response($url, 'GET', ['limit'=>'5']);
// if( $res ){

//     $res = json_decode($res);
    

//     if( !empty( $res->data ) ){

//         require_once './app/Models/ToursFlashsale.php';
//         $ref = New ToursFlashsale();
//         $ref->insert( $res->data );

//         echo 'ToursFlashsale results successfully<br>';
//     }
//     else{
//         echo 'ToursFlashsale Not found<br>';
//     }
// }


# tours/series
// $url = "{$base_url}/tours/series";
// $res = Fn::http_response($url, 'GET', ['limit'=>'5']);
// if( $res ){

//     $res = json_decode($res);
//     if( !empty( $res->data ) ){

//         require_once './app/Models/Series.php';
//         $ref = New Series();
//         $ref->insert( $res->data );

//         echo 'Series results successfully<br>';
//     }
//     else{
//         echo 'Series Not found<br>';
//     }
// }