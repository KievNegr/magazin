<?php
	class Main_md extends CI_Model
	{
		function __construct()
		{
			$this->load->database();
		}
		
		function get_parent_category()
		{
			$query = $this->db->get_where('category', array('sub_category' => 0));
			return $query->result_array();
		}
		
		function get_sub_category($parent)
		{
			$query = $this->db->get_where('category', array('sub_category' => $parent));
			return $query->result_array();
		}
		
		function get_static()
		{
			$this->db->order_by('sort', 'desk');
			$query = $this->db->get_where('pages', array('view' => 1));
			return $query->result_array();
		}

		function get_static_page($input)
		{
			$query = $this->db->get_where('pages', array('rewrite' => $input));
			return $query->row_array();
		}
		
		//Функция поиска валюты по умолчанию (т.е. валюта, которая учитывается при наполнении товаров )
		function get_money_default()
		{
			//Выполняем запрос в БД для поиска валюты по умолчанию
			$query = $this->db->get_where('money', array('default_money' => 1));
			//Возвращаем строчку валюты по умолчанию с тех.данными
			return $query->row_array();
		}
		
		//Функция поиска валюты отображения (валюты расчета)
		function get_money_view()
		{
			//Выполняем запрос в БД для поиска валюты отображения
			$query = $this->db->get_where('money', array('view_money' => 1));
			//Возвращаем строчку валюты отображения с тех.данными
			return $query->row_array();
		}
	}