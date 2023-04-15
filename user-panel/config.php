<?php


//  session_start();

    $conn=new mysqli("localhost","root","","ceegee");

     //check whether on localhost or online
    //  $localhost = array(
    //     '127.0.0.1',
    //     '::1'
    // );
    // ("localhost","Makingmoney#001","","settmuug_church");
    // if(in_array($_SERVER['REMOTE_ADDR'], $localhost)){
    //     $conn=new mysqli("localhost","root","","2021batchb");
    // }
    // else {
    //     $conn=new mysqli("localhost","bitrrenc_test","@admin100@","bitrrenc_test");
    // }

    function cleanInputField($data){
        GLOBAL $conn;
            
        $data = $_REQUEST[$data];    
        $data = trim($data);
        $data = strip_tags($data);
        $data = htmlentities($data);
        $data = $conn->real_escape_string($data);

    
        return $data;
    }

    function cleanInput($data){
        GLOBAL $conn;
               
        $data = trim($data);
        $data = strip_tags($data);
        $data = htmlentities($data);
        $data = $conn->real_escape_string($data);

    
        return $data;
    }

    function cleanCK($data){
        GLOBAL $conn;
            
        $data = $_REQUEST[$data];    
        $data = trim($data);
        $data = $conn->real_escape_string($data);

        return $data;
    }

    function formQuery($data){
        GLOBAL $conn;
        return $conn->query($data);
    }

    function limit_text_btn($text, $link){
        if(str_word_count($text)>25){
           $text = substr($text, 0, 150). '... '. "<a href='$link' class='mx-3 btn-default btn'>Read More</a>";
        }
        return $text;
    }

    function limit_text($text){
        if(str_word_count($text)>25){
           $text = substr($text, 0, 150). '... ';
        }
        return $text;
    }