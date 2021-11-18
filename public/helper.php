<?php

    function formatDate($data=NULL){
        if($data){
        $data = explode('-', $data);

            return $data[0] .'/'. $data[1] .'/' .$data[2];
        }
    }

?>