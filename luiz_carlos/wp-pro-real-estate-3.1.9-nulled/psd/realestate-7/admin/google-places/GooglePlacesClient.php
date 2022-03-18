<?php

namespace joshtronic;

class GooglePlacesClient
{
    public function get($url)
    {
        $response = "";
        
        if ( class_exists('CT_RealEstate7_Helper') ) {
            $response = CT_RealEstate7_Helper::google_places_client( $url );
        }

        return $response;
        
    }
}

