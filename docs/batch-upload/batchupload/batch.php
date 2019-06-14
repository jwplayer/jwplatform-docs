<?php

require_once('botr_php/api.php');

$jwplatform = new BotrAPI('API_KEY', 'API_SECRET');

// you can hardcode a file path
$csv_filepath = 'test.csv'; 

// or upload a CSV through a form 
// $csv_filepath = $_FILES['file']['tmp_name'];

if(!empty($csv_filepath) && file_exists($csv_filepath)) {
    $csv_rows = array_map('str_getcsv', file($csv_filepath));    
    $fields = array_shift($csv_rows); //parse the header line

    foreach($csv_rows AS $idx => $video) {   
        $video_meta = array_combine($fields, $video);                
        $upload_params = array();        
        
        if(!empty($video_meta['download_url'])) $upload_params['download_url'] = $video_meta['download_url'];
        if(!empty($video_meta['title'])) $upload_params['title']               = html_entity_decode($video_meta['title']);
        if(!empty($video_meta['tags'])) $upload_params['tags']                 = html_entity_decode($video_meta['tags']);
        if(!empty($video_meta['description'])) $upload_params['description']   = html_entity_decode($video_meta['description']);                    
        if(!empty($video_meta['custom'])) $upload_params['custom']             = html_entity_decode($video_meta['custom']);
        if(!empty($video_meta['date'])) $upload_params['date']                 = is_int($video_meta['date']) ? $video_meta['date'] : strtotime($video_meta['date']);

        foreach($video_meta AS $field => $val) {            
            if(strpos($field, 'custom.') !== FALSE) {
                $upload_params[$field] = $val;
            }
        }    

        $response = $jwplatform->call("/videos/create", $upload_params);
        if($response['status'] === 'ok') {
            echo $upload_params['title'] . " upload success. key = " . $response['video']['key'] . "\n";
        }
        else {
            echo $upload_params['title'] . " upload failed.\n"; 
        }
    }        
}

?>