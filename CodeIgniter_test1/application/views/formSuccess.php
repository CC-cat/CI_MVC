<h2>表单录入信息总表</h2>
<div>
<?php
defined('BASEPATH') or exit('No direct script access allowed');



$query = $this->db->get('content');

foreach ($query->result() as $row) {
    echo $row->userId;
    echo $row->userName;
    echo $row->age;
    echo $row->sex;
    echo $row->subjectId;
    echo '<br>';
}
?>
</div>
