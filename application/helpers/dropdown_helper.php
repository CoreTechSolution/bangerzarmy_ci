<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function dropdown_usertype(){
	$user_types = array('admin'=>'Admin','producer'=>'Producer','artist'=>'Artist');
    return $user_types;
}
function dropdown_category($type="id"){
	$CI = & get_instance();
    if($type=='id'){
        $CI->db->select('cat_id,cat_name');
        $CI->db->from('category_master');
        $categories = $CI->db->get();
        $array = array();
        foreach ($categories->result() as $key) {
            $array[$key->cat_id] = $key->cat_name;
        } 
    } else {
        $CI->db->select('cat_slug,cat_name');
        $CI->db->from('category_master');
        $categories = $CI->db->get();
        $array = array();
        foreach ($categories->result() as $key) {
            $array[$key->cat_slug] = $key->cat_name;
        }
    }
    
    return $array;
}

function dropdown_tags($type="id"){
    $CI = & get_instance();
    if($type=='id'){
        $CI->db->select('tag_id,tag_name');
        $CI->db->from('beat_tags');
        $tags = $CI->db->get();
        $array = array();
        foreach ($tags->result() as $key) {
            $array[$key->tag_id] = $key->tag_name;
        }
    }
    else{
        $CI->db->select('tag_slug,tag_name');
        $CI->db->from('beat_tags');
        $tags = $CI->db->get();
        $array = array();
        foreach ($tags->result() as $key) {
            $array[$key->tag_slug] = $key->tag_name;
        }
    }
    
    return $array;
}