<h2>表单创建后查询实例</h2>
<div>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');



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
?>
</div>
