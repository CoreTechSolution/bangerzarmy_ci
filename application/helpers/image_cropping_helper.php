<?php

global $image_size;
$image_size = array();
$image_size[0] = array('name' => 'large' , 'width' => '400','height'=>'200','crop'=>FALSE);
$image_size[1] = array('name' => 'medium' , 'width' => '300','height'=>'150','crop'=>FALSE);
$image_size[2] = array('name' => 'small' , 'width' => '200','height'=>'100','crop'=>FALSE);
$image_size [3]= array('name' => 'thumbnail' , 'width' => '150','height'=>'150','crop'=>FALSE);


	function image_upload($file,$input_name, $path='uploads',$allowed_types='jpg|png|svg|jpeg',$max_size='5242880'){
		$rtntext='';
		//print_r(FCPATH); exit();
		$CI = & get_instance();
		$CI->load->database();
		if(!empty($file[$input_name]['name'])){
			$upload_path=$path;
			$CI->load->library('upload');
			if (!file_exists(FCPATH .$upload_path)) {
				mkdir(FCPATH .$upload_path, 0777, true);
			}
			$config['upload_path'] = FCPATH . $upload_path . '/';
			$config['allowed_types'] = $allowed_types;
			$config['max_size'] = $max_size; //default: 5MB max     = '*';
			$CI->upload->initialize($config);
			if (!$CI->upload->do_upload($input_name)) {
                    $error = array('error' => $CI->upload->display_errors());
                    $rtntext=$error;
            }
            else {
                $upload_data = $CI->upload->data();
                //print_r($data);
                $save_data['full_path']=$upload_path.'/'.$upload_data['file_name'];
                $save_data['abs_full_path']=$upload_data['full_path'];
                global $image_size;
                //print_r($image_size); exit();
                foreach ($image_size as  $value) {
                	$image_sizes_arr[$value['name']]=str_replace ( FCPATH, '', resize_image($upload_data,$value['width'],$value['height'],$value['crop']));
                }
                
            }
            $save_data['image_sizes_path']=serialize($image_sizes_arr);

		}
		if(!empty($save_data)){ 
			if( $CI->db->table_exists('image_attachment') == FALSE ){ ////////  Create trable if not present

                $query = "CREATE TABLE `image_attachment` ( `id` INT NOT NULL AUTO_INCREMENT , `full_path` TEXT NOT NULL , `abs_full_path` TEXT NULL , `image_sizes_path` TEXT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

                $CI->db->query($query);
                $CI->db->insert('image_attachment',$save_data);
                $rtntext=$CI->db->insert_id(); 

            } else{
            	$CI->db->insert('image_attachment',$save_data);
            	 $rtntext=$CI->db->insert_id();
            }
			
		}
		return $rtntext;
	}
	function resize_image($file,$w, $h, $crop=FALSE){
		$rtntext='';
        $CI =& get_instance();
        $CI->load->library('image_lib');

        $file_name = $file['file_name'];
        $file_path = $file['file_path'];

        $temp = explode(".", $file_name);

            if($crop == FALSE ){
                $newfilename = $temp[0].'-'.$w.'x'.$h.'.'.$temp[1];

                $imgConfig = array();
                $imgConfig['image_library']  = 'gd2';
                $imgConfig['source_image']   = $file_path.$file_name;
                $imgConfig['create_thumb']     = FALSE;
                $imgConfig['maintain_ratio']   = TRUE;
                $imgConfig['new_image']     =  $file_path.$newfilename;
                $imgConfig['width']            = $w;
                $imgConfig['height']           = $h;

                $CI->image_lib->initialize($imgConfig);                                      
                if (!$CI->image_lib->resize()){  
                     //echo $CI->image_lib->display_errors();
                } else{
                	$rtntext=$file_path.$newfilename;
                }

                $CI->image_lib->clear();
                
                unset($imgConfig);

            }else{
                $newfilename = $temp[0].'-'.$w.'x'.$h.'.'.$temp[1];

                $imgConfig = array();
                $imgConfig['image_library']= 'gd2';
                $imgConfig['source_image'] = $file_path.$file_name;
                $imgConfig['new_image']    =  $file_path.$newfilename;
                $imgConfig['maintain_ratio'] = false;
                $imgConfig['width']  = $w;
                $imgConfig['height'] = $h;
                $imgConfig['x_axis'] = 0;
                $imgConfig['y_axis'] = 0;

                $CI->image_lib->initialize($imgConfig); 
                if ( ! $CI->image_lib->crop()){
                   // echo $CI->image_lib->display_errors();
                }else{
                	$rtntext=$file_path.$newfilename;
                }
            }
            return  $rtntext;
        
   }

   function image_show($id,$size='full'){
   	$rtntext='';
   		$CI = & get_instance();
		$CI->load->database();
   		if( $CI->db->table_exists('image_attachment') == TRUE ){
   			$CI->db->select('*');
   			$CI->db->from('image_attachment');
   			$CI->db->where(array('id'=>$id));
   			$queries=$CI->db->get();
   			$query=$queries->row();
   			$db_image_size=unserialize($query->image_sizes_path);
   			if($size=='full'){
   				$rtntext=base_url($query->full_path);
   			} else{
   				if (array_key_exists($size,$db_image_size)){
   					$rtntext=base_url($db_image_size[$size]);
   				} else{
   					$rtntext=base_url($query->full_path);
   				}
   			}
   		}
   		return $rtntext;
   }
