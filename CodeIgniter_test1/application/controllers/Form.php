<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	public function __construct()
   {
	   parent::__construct();

   }

	public function index()
	{
		$this->load->view('header');
		$this->load->view('myForm');
		$this->load->view('formSearch');
		$this->load->view('formSuccess');
		$this->load->view('footer');
	}

	public function formSuccess()
	{
		// 获取用户填写的新增内容
		$name = $this->input->get_post('name');
		$age = $this->input->get_post('age');
		$sex = $this->input->get_post('sex');
		$subjectId = implode(",",$_POST['course']);

		$data = array(
		    'userName' => $name,
			'age' => $age,
		    'sex' => $sex,
			'subjectId' => $subjectId
		);


		// 加载控制器方法
		$this->increaseDB($data);
		$this->index();
	}

	public function increaseDB($data)
	{

		/*新增数据到数据库*/

		// 加载并初始化数据库类
		$this->load->database();

		// 使用查询构造器插入数据
		$this->db->insert('content', $data);

		// 生成这样的SQL代码:
		// INSERT INTO mytable (userName, age, sex,subjectId) VALUES ('{$name}', '{$age}', '{$sex}', '{$checkbox}')

		// 关闭数据库类
		$this->db->close();
	}


	public function catchDB()
	{
		/*从数据库拉去指定的表所有内容*/
		$query = $this->db->get('content');

		foreach ($query->result() as $row)
		{
			echo $row->userId;
			echo $row->userName;
			echo $row->age;
			echo $row->sex;
			echo $row->subjectId;
		    echo '<br>';
		}


	}

	public function formSearch()
	{
		// 获取用户填写的新增内容
		$name = $this->input->get_post('name');
		$age = $this->input->get_post('age');
		$sex = $this->input->get_post('sex');
	}

}
