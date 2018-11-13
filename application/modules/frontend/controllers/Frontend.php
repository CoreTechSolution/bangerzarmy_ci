<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('frontend_m');
    }
    public function index()
    {
        /*$data['content_v'] = 'home/home_v';*/
        $data['testimonials']=$this->frontend_m->get_testimonials(array(),false);
        $data['featured_beats']=$this->beat->get_beats(array('beat_featured'=>'yes'),false);
        $data['featured_producers']=$this->users->get_user(array('user_types'=>'producer','featured'=>'true'),false);
        $data['content_v'] = 'frontend/home_v';
        $this->templates->call_template($data);
    }

    public function beats($type='top'){
		$data['type']=$type;
	    if(!empty($_GET['s'])){
            $data['title']='Search Result(s)';
            $data['beats_lists']=$this->beat->get_beats("search_field LIKE '%".$_GET['s']."%'  AND status='active'",false);
            //echo $this->db->last_query();
            //exit();
            $data['content_v']='frontend/beats_search_v';
        } else{
            $data['title']='Beats';
		    $data['beats_lists']=$this->beat->get_beats("status='active'",false);
		    $data['top10_downloaded_beats_lists']=$this->beat->top_downloaded_beats_lists(10);
		    $data['top10_downloaded_producer_lists']=$this->beat->top_downloaded_producer_lists(10);
            $data['beat_lists_recent']=$this->beat->get_beats_order_by(array('status'=>'active'),0,0,'create_dt','DESC',false);
            //echo $this->db->last_query(); exit();
            $data['beat_lists_featured']=$this->beat->get_beats(array('beat_featured'=>'yes','status'=>'active'),false);
            $data['category_lists']=$this->categories->get_categories(array('status'=>'enable'),false);
            $data['tag_lists']=$this->frontend_m->get_tags();
            $data['producer_lists']=$this->users->get_user(array('user_types'=>'producer','status'=>'active'),false);

            //$data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
            $data['content_v']='frontend/beats_v';
        }

        $this->templates->call_template($data);
    }
	public function browse(){
		$data['title']='Beats';
		$data['view_all']=false;
		$data['beats_lists']=$this->beat->get_beats("status='active'",false);
		$data['content_v']='frontend/top_downloaded';
		$this->templates->call_template($data);
	}
	public function blogs($slug=''){
	    if($slug=='') {
            $data['title'] = 'Blogs';
            $data['view_all'] = false;
		    $data['view_comment'] = false;
            $data['blogs'] = $this->blog->get_blogs(array('active' => 1), false);
            $data['content_v'] = 'frontend/blogs';
            $this->templates->call_template($data);
        } else {
					//echo 'hello'; exit;
            $data['blogs'] = $this->blog->get_blogs(array('slug' => $slug), true);
            $data['title'] =  $data['blogs']->post_title;
		    $data['view_all'] = false;
            $data['view_comment'] = true;
            $data['content_v'] = 'frontend/single_blog';
            $data['user_id']=$this->users->get_current_user_id();
						//echo $data['blogs']->post_id; exit;
            $data['comments']=$this->blog->get_comments(array('post_id'=> $data['blogs']->post_id),false);
            //print_r($data['comments']); exit();
            $this->templates->call_template($data);
        }
	}
	public function chart(){
		$data['title']='Chart';
		$data['view_all']=true;
		$data['producer_lists']=$this->beat->top_downloaded_producer_lists(0);
		$data['genre_lists']=$this->beat->top_downloaded_genre_lists(0);
		$data['content_v']='frontend/chart_v';
		$this->templates->call_template($data);
	}
	public function top_100_download(){
		$data['title']='Beats';
		$data['view_all']=true;
		$data['beats_lists']=$this->beat->top_downloaded_beats_lists(100);
		$data['content_v']='frontend/top_downloaded';
		$this->templates->call_template($data);
	}
	public function top_download(){
		$data['title']='Beats';
		$data['view_all']=false;
		$data['beats_lists']=$this->beat->get_beats(array(),false);
		$data['content_v']='frontend/top_downloaded';
		$this->templates->call_template($data);
	}
	public function top_100_downloaded_producers(){
		$data['title']='Beats';
		$data['view_all']=true;
		$data['producer_lists']=$this->beat->top_downloaded_producer_lists(100);
		$data['content_v']='frontend/top_downloaded_producers';
		$this->templates->call_template($data);
	}
	public function top_downloaded_producers(){
		$data['title']='Beats';
		$data['view_all']=false;
		$data['beats_lists']=$this->beat->get_beats("status='active'",false);
		$data['producer_lists']=$this->beat->top_downloaded_producer_lists(0);
		$data['content_v']='frontend/top_downloaded_producers';
		$this->templates->call_template($data);
	}
    public function category($slug){
        $data['title']='Genre';
        $data['beats_lists']=$this->beat->get_beats("category_id LIKE '%".$slug."%'  AND status='active'",false);
        $data['content_v']='frontend/category_v';
        $this->templates->call_template($data);
    }
    public function producer($producer_id){
        $data['title']='Producer';
        $data['beats_lists']=$this->beat->get_beats(array('uploaded_by'=>$producer_id),false);
        $data['content_v']='frontend/producer_v';
        $this->templates->call_template($data);
    }
    public function tag($slug){
        $data['title']='Tag';
        $data['beats_lists']=$this->beat->get_beats("beat_tag LIKE '%".$slug."%'  AND status='active'",false);
        $data['content_v']='frontend/tag_v';
        $this->templates->call_template($data);
    }
    public function single_beat($id){
        $data['title']='Beats';
        $data['beats_lists']=$this->beat->get_beats(array('beat_id'=>$id),true);
        $data['tag_lists']=$this->frontend_m->get_tags();
        $data['subbeat_lists']=$this->beat->get_subbeats(array('beat_id'=>$id),false);
        $data['favorite_lists']=$this->frontend_m->get_favorites(array('user_id'=>$this->users->get_current_user_id()),false);
        $data['content_v']='frontend/single_beat_v';
        $this->templates->call_template($data);
    }
    public function about(){
        $data['title']='About';
        $data['page_list']=$this->pages->get_page(array('status'=>'enable', 'page'=>'About'),true);
        $data['content_v']='frontend/about_v';
        $this->templates->call_template($data);
    }
	public function terms(){
		$data['title']='Terms';
		$data['page_list']=$this->pages->get_page(array('status'=>'enable', 'page'=>'terms'),true);
		$data['content_v']='frontend/page_content_v';
		$this->templates->call_template($data);
	}
	public function privacy(){
		$data['title']='Terms';
		$data['page_list']=$this->pages->get_page(array('status'=>'enable', 'page'=>'privacy'),true);
		$data['content_v']='frontend/page_content_v';
		$this->templates->call_template($data);
	}
	public function help(){
		$data['title']='Terms';
		$data['page_list']=$this->pages->get_page(array('status'=>'enable', 'page'=>'help'),true);
		$data['content_v']='frontend/page_content_v';
		$this->templates->call_template($data);
	}
    public function contact(){
        $data['title']='Contact';
        $data['page_list']=$this->pages->get_page(array('status'=>'enable', 'page'=>'Contact'),true);
        $data['content_v']='frontend/contact_v';

        if($this->input->post('contactSubmit')){
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('email_addr', 'Email', 'required|valid_email');

                if($this->form_validation->run() == true){
                    $contactData = array(
                        'name' => trim($this->input->post('name')),
                        'email' => trim($this->input->post('email_addr')),
                        'phone' => $this->input->post('phone'),
                        'message' => $this->input->post('message'),
                        'create_dt'=>date('Y-m-d H:i:s')
                    );

                    $insert = $this->frontend_m->contact_insert($contactData);
                    if($insert){
                        $message = '<p><b>Name:</b> '.$this->input->post('name').'</p>
                                    <p><b>Email:</b> '.$this->input->post('email_addr').'</p>
                                    <p><b>Phone:</b> '.$this->input->post('phone').'</p>
                                    <p><b>Message:</b></p>
                                    <p>'.$this->input->post('message').'</p>
                                    ';

                        if(send_mail(contact_email(),'Contact Form',$message)){
                            $this->session->set_flashdata('msg', $this->input->post('email_addr'));
                            redirect('frontend/thankyou/');
                        } else {
                            $this->session->set_flashdata('error_msg', 'Mail Not send. Please try again later!');
                        }

                    }else{
                        $this->session->set_flashdata('error_msg', 'Some problems occured. Please try again later!');
                    }
                }
            }

        $this->templates->call_template($data);
    }
    public function thankyou(){
        $data['title']='Thank You for Contacting us';
        $data['content_v']='frontend/thank_you_v';
        $this->templates->call_template($data);
    }
    public function faqs(){
        $data['title']='Faqs';
        $data['page_list']=$this->pages->get_page(array('status'=>'enable', 'page'=>'Faqs'),true);
        $data['content_v']='frontend/faqs_v';
        $this->templates->call_template($data);
    }
}
