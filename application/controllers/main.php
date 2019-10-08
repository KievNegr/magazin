<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('main_md');
		$this->load->model('category_md');
		$this->load->model('admin_md');
		$this->load->library('cart');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	public function index()
	{	
		$info = $this->admin_md->get_settings();
		$themePath = $info[9]['value'];
		$data = array(
			'themePath' => $themePath,
			'title' => $info[0]['value'],
			'description' => $info[7]['value'],
			'keywords' => $info[8]['value'],
			'height' => $info[2]['height'],
			'static' => $this->main_md->get_static(),
			'parent_category' => $this->main_md->get_parent_category(),
			'cart_count' => '',
			'product' => $this->admin_md->get_added_product( 9 ), //��������� N ��������� ����������� �������
			//'page' => $this->main_md->get_pages(),
			'default_money' => $this->main_md->get_money_default(), //��������� ������ �� ���������
			'view_money' => $this->main_md->get_money_view() //��������� ������ �����������
		);
			
		$this->form_validation->set_rules('cart_id', 'cart_id', 'required');
		
		if( $this->form_validation->run() == TRUE )
		{
			$cart = array(
				'id' => $this->input->post('cart_id'),
				'price' => $this->input->post('cart_price'),
				'qty' => 1,
				'name' => $this->input->post('cart_name'),
				'options' => array('image' => $this->input->post('cart_img'))
				);
			
			$this->cart->insert($cart);
		}
		
		if( $this->cart->total_items() > 0 )
		{
			$data['cart_count'] = $this->cart->total_items();
			$data['cart_price'] = $this->cart->total();
		}
		else
		{
			$data['cart_count'] = 0;
		}	
		
		$this->load->view($themePath . '/header', $data);
		$this->load->view($themePath . '/menu', $data);
		$this->load->view($themePath . '/slider');
		//$this->load->view($themePath . '/sidebar', $data);
		$this->load->view($themePath . '/index', $data);
		$this->load->view($themePath . '/footer', $data);
	}
}