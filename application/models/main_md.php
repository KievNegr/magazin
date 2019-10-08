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
		
		//������� ������ ������ �� ��������� (�.�. ������, ������� ����������� ��� ���������� ������� )
		function get_money_default()
		{
			//��������� ������ � �� ��� ������ ������ �� ���������
			$query = $this->db->get_where('money', array('default_money' => 1));
			//���������� ������� ������ �� ��������� � ���.�������
			return $query->row_array();
		}
		
		//������� ������ ������ ����������� (������ �������)
		function get_money_view()
		{
			//��������� ������ � �� ��� ������ ������ �����������
			$query = $this->db->get_where('money', array('view_money' => 1));
			//���������� ������� ������ ����������� � ���.�������
			return $query->row_array();
		}
	}