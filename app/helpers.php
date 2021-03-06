<?php

function assets_diff( $asset ){
    if(!Config::get('app.assets_diff')){
        return $asset;
    }

    return cdnPath(Config::get('app.assets_diff'), $asset);
}

function assets_diff_js(){
    $f = 'asset => ';

    if(!Config::get('app.assets_diff')){
        $f.'asset';
    }

    $f = $f.cdnPathJs(Config::get('app.assets_diff'));

    return $f;
}

//// global CDN link helper function
//function cdn( $asset ){
//
//    // Verify if KeyCDN URLs are present in the config file
//    if( !Config::get('app.cdn') )
//        return asset( $asset );
//
//    // Get file name incl extension and CDN URLs
//    $cdns = Config::get('app.cdn');
//    $assetName = basename( $asset );
//
//    // Remove query string
//    $assetName = explode("?", $assetName);
//    $assetName = $assetName[0];
//
//    // Select the CDN URL based on the extension
//    foreach( $cdns as $cdn => $types ) {
//        if( preg_match('/^.*\.(' . $types . ')$/i', $assetName) )
//            return cdnPath($cdn, $asset);
//    }
//
//    // In case of no match use the last in the array
//    end($cdns);
//    return cdnPath( key( $cdns ) , $asset);
//
//}

function cdnPathJs($cdn){
    return '"//" + rtrim("'.Config::get('app.assets_diff').'", "/") + "/" + ltrim(asset, "/")';
}

function cdnPath($cdn, $asset) {
    return  "//" . rtrim($cdn, "/") . "/" . ltrim( $asset, "/");
}