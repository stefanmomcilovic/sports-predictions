<?php

if(!function_exists('dumpData')):
    function dumpData($data){
        echo "<pre>";
            print_r($data);
        echo "</pre>";
    }
endif;