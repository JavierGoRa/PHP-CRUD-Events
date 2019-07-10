<?php

    function text_input($data){
        $data = htmlspecialchars(addslashes(stripslashes(strip_tags(trim($data)))));
        return $data;
    }

    function sec_session_start(){
        
    }

?>