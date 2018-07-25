<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	public function __construct()
   {
	   parent::__construct();
	   // Your own constructor code
   }

	/*
	一共就这么几步 往后端传数据
	后端存
	前端向后端请求数据
	后端去数据库找
	找到了给前端
	*/

	public function index()
	{
		$name = $age = $sex = $checkbox = '';
		$data = array(
		    'name' => $name,
			'age' => $age,
		    'sex' => $sex,
			'checkbox' => $checkbox
		);

		$this->load->view('myForm',$data);
	}

	public function formSuccess()
	{
		$name = $this->input->get_post('name');
		$age = $this->input->get_post('age');
		$sex = $this->input->get_post('sex');
		$checkbox = implode(",",$_GET['course']);

		$data = array(
		    'name' => $name,
			'age' => $age,
		    'sex' => $sex,
			'checkbox' => $checkbox
		);

		// 加载并初始化数据库类
		// $this->load->database();
		// 使用查询构造器插入数据
		// $this->db->insert('mytable', $data);
		//
		// 生成这样的SQL代码:
		//   INSERT INTO mytable (title, age, sex,checkbox) VALUES ('{$name}', '{$age}', '{$sex}', '{$checkbox}')
		//

		// $this->db->close();

		$this->load->view('myForm',$data);
	}

	public function formSearch(){
		// 加载并初始化数据库类
		$this->load->database();

		// 使用查询构造器查询数据
		// $query = $this->db->get('mytable');
		//
		// foreach ($query->result() as $row)
		// {
		// 	echo $row->name;
		// 	echo $row->age;
		// 	echo $row->sex;
		//     echo $row->checkbox;
		// }

		$fname = $this->input->get_post('fname');

		$data = array(
		    'fname' => $fname,
		);

		$this->load->view('formSuccess',$data);

	}

	public function showDatabase(){
		$this->load->database();

		$this->load->dbutil();


		if ($this->dbutil->database_exists('CCcat'))
		{
		   echo 'Success!';
		}

		$query = $this->db->get('chenchen');  // Produces: SELECT * FROM mytable
		echo $query;

		$query = $this->db->query('SELECT chenchen FROM mytable LIMIT 1');
		$row = $query->row();
		echo $row->chenchen;
	}
}
