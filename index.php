<?php

require_once './vendor/autoload.php';
require_once './config/Fn.php';

$base_url = 'https://api.japanpackage.co/v2';

// die( $base_url );
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
    

    // if( !empty( $res->data ) ){

    //     require_once './app/Models/Country.php';
    //     $refCountry = New Country();
    //     $refCountry->insert( $res->data );


    //     echo 'Country results successfully<br>';
    // }
    // else{
    //     echo 'Country Not found<br>';
    // }

   

    foreach ($res->data as $key => $value) {
        
         # countries/flashsale
        // $url = "{$base_url}/tours/series";
        // $res = Fn::http_response($url, 'GET', ['limit'=>24, 'sort'=>'period-asc', 'country_id'=>$value->id]);

        // if( $res ){
        //     $res = json_decode($res);

        //     if( !empty( $res->data ) ){
        //         require_once './app/Models/CountryFlashsale.php';

        //         $refCountryFlashsale = New CountryFlashsale();
        //         $refCountryFlashsale->insert( $value->id, $res->data );
        //         echo 'CountryFlashsale results successfully<br>';
        //     }
        // }

        # countries/series
        // $url = "{$base_url}/tours/series";
        // $res = Fn::http_response($url, 'GET', ['limit'=>24, 'sort'=>'recent', 'country_id'=>$value->id]);

        // if( $res ){
        //     $res = json_decode($res);

        //     if( !empty( $res->data ) ){
        //         require_once './app/Models/CountrySeries.php';

        //         $refCountrySeries = New CountrySeries();
        //         $refCountrySeries->insert( $value->id, $res->data );
        //         echo 'CountrySeries results successfully<br>';
        //     }
        // }
    }
}

# tours/recent
// $url = "{$base_url}/tours/series";
// $res = Fn::http_response($url, 'GET', ['limit'=>'8', 'sort'=>'recent']);
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
// $url = "{$base_url}/tours/series";
// $res = Fn::http_response($url, 'GET', ['limit'=>'8', 'sort'=>'period-asc']);
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
$url = "{$base_url}/tours/series";
$res = Fn::http_response($url, 'GET', ['limit'=>24]);
if( $res ){
    $res = json_decode($res);
    // print_r($res); die;
    if( !empty( $res->data ) ){
        
        require_once './app/Models/Series.php';
        $ref = New Series();

        $ref->reset();
        $ref->insert( $res->data );

        echo 'Series results successfully<br>';

        // foreach ($res->data as $key => $value) {
        //     # tours/pe
        //     $url = "{$base_url}/tours/periods";
        //     $res = Fn::http_response($url, 'GET', ['limit'=>24, 'series_id'=>$value->id]);
        //     if( $res ){
        //         $res = json_decode($res);
        //         // print_r($res); die;
        //         if( !empty( $res->data ) ){
    
        //             require_once './app/Models/SeriesPeriods.php';
        //             $ref = New SeriesPeriods();
        //             $ref->insert($value->id, $res->data );
    
        //             echo 'SeriesPeriods results successfully<br>';
        //         }
        //         else{
        //             echo 'SeriesPeriods Not found<br>';
        //         }
        //     }
        // }
    }
    else{
        echo 'Series Not found<br>';
    }

}


