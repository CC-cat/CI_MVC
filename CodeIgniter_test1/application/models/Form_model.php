<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    public function formData(){
        // 加载并初始化数据库类
		$this->load->database();

        $query = $this->db->query('SELECT userId, userName, age, sex, subjectId FROM content');

		foreach ($query->result_array() as $row)
		{
		    echo $row['userId'];
		    echo $row['userName'];
			echo $row['age'];
			echo $row['sex'];
			echo $row['subjectId'];
		    echo '<br>';
		}

        $this->db->close();
    }

    public function insert_entry()
   {
       $this->input->get_post('userName');
       $this->input->get_post('age');
       $this->input->get_post('sex');
       $this->input->get_post('subjectId');


       $this->db->insert('content', $this);
   }

}
