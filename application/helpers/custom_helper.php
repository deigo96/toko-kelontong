<?php

    function setFlashData($class, $message, $url)
    {
        $CI = get_instance();
        $CI->load->library('session');
        $CI->session->set_flashdata('class', $class);
        $CI->session->set_flashdata('message', $message);
        redirect($url);
    }

    function userLog(){
        $CI = get_instance();
        $CI->load->library('session');

        if($CI->session->userdata('idLogin')){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    function adminLog(){
        $CI = get_instance();
        $CI->load->library('session');

        if($CI->session->userdata('adminLog')){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    function getAdminId(){
        $CI = get_instance();
        $CI->load->library('session');

        if($CI->session->userdata('adminLog')){
            return $CI->session->userdata('adminLog');
        }
        else{
            return FALSE;
        }
    }