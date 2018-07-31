<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('myForm');
    }

    public function formSuccess()
    {
        // 获取用户填写的新增内容
        $name = $this->input->get('name');
        $age = $this->input->get('age');
        $sex = $this->input->get('sex');
        $subjectId = $this->input->get('subject');

        $data = array(
            'userName' => $name,
            'age' => $age,
            'sex' => $sex,
            'subjectId' => $subjectId
        );


        // 加载控制器方法
        $requery = $this->increaseDB($data);
        echo $requery;
    }

    public function increaseDB($data)
    {

        /*新增数据到数据库*/

        // 加载并初始化数据库类
        $this->load->database();

        // 使用查询构造器插入数据
        $requery = $this->db->insert('content', $data);
        return $requery;

        // 生成这样的SQL代码:
        // INSERT INTO mytable (userName, age, sex,subjectId) VALUES ('{$name}', '{$age}', '{$sex}', '{$checkbox}')

        // 关闭数据库类
        // $this->db->close();
    }

    public function catchDB()
    {
        /*从数据库拉去指定的表所有内容*/
        $query = $this->db->get('content');

        $student_arr = $query->result();

        foreach ($student_arr as $student) {
            $subject_chinese = array();
            foreach (json_decode($student->subjectId) as $subjectId) {
                switch ($subjectId) {
                   case 1:
                       array_push($subject_chinese, '语文');
                       break;
                   case 2:
                       array_push($subject_chinese, '数学');
                       break;
                   case 3:
                       array_push($subject_chinese, '英语');
                       break;
                   default:
                       break;
               }
            }
            $student->subject_chinese = $subject_chinese;
        }
        echo json_encode($student_arr);
    }

    public function searchDB()
    {
        /*查询用户名*/
        // 获取用户填写的新增内容
        $name = $this->input->get('name');

        $query = $this->db->query("SELECT * FROM content WHERE userName LIKE '%".$name."%'");

        $student_arr = $query->result();

        foreach ($student_arr as $student) {
            $subject_chinese = array();
            foreach (json_decode($student->subjectId) as $subjectId) {
                switch ($subjectId) {
                   case 1:
                       array_push($subject_chinese, '语文');
                       break;
                   case 2:
                       array_push($subject_chinese, '数学');
                       break;
                   case 3:
                       array_push($subject_chinese, '英语');
                       break;
                   default:
                       break;
               }
            }
            $student->subject_chinese = $subject_chinese;
        }
        echo json_encode($student_arr);
    }

    public function searchDB_subject()
    {
        /*查询科目*/
        // 获取用户填写的新增内容
        $subjectId = $this->input->get('subject');
        // 保留前面3个关键字 ( 如：["1 )
        $subjectId = substr($subjectId, 0, 3);

        $query = $this->db->query("SELECT * FROM content WHERE subjectId LIKE '%".$subjectId."%'");

        $student_arr = $query->result();

        foreach ($student_arr as $student) {
            $subject_chinese = array();
            foreach (json_decode($student->subjectId) as $subjectId) {
                switch ($subjectId) {
                   case 1:
                       array_push($subject_chinese, '语文');
                       break;
                   case 2:
                       array_push($subject_chinese, '数学');
                       break;
                   case 3:
                       array_push($subject_chinese, '英语');
                       break;
                   default:
                       break;
               }
            }
            $student->subject_chinese = $subject_chinese;
        }
        echo json_encode($student_arr);
    }

    public function deleteDB()
    {
        // 获取用户填写的新增内容
        $userId = $this->input->get('userId');

        // 删除MySQL数据表内容
        $this->db->where('userId', $userId);
        $query = $this->db->delete('content');

        echo json_encode($query);
    }

    public function changeDB()
    {
        // 获取用户填写的新增内容
        $userId = $this->input->get('userId');
        $name = $this->input->get('name');
        $age = $this->input->get('age');
        $sex = $this->input->get('sex');
        $subjectId = $this->input->get('subject');

        $data = array(
            'userName' => $name,
            'age' => $age,
            'sex' => $sex,
            'subjectId' => $subjectId
        );


        // 更新MySQL数据表内容
        $this->db->where('userId', $userId);
        $query = $this->db->update('content', $data);


        echo json_encode($query);

    }

    public function changeSaveDB ()
    {

    }
}
