<!-- http://localhost:8888/index.php/form/index -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>myForm</title>
</head>
<body>

	<h2>表单创建实例</h2>
	<form action="formSuccess" method="get">
		创建学生<br>
		姓名：
		<input type="text"  name="name" value="凉凉">
		<br>
		年龄：
		<input type="text"  name="age" value="12">
		<br>
		性别：
		<input type="radio"  name="sex" value="male">男生
		<input type="radio"  name="sex" value="female">女生
		<br>
		课程：
		<input type="checkbox"  name="course[0]" value="0">语文
		<input type="checkbox"  name="course[1]" value="1">数学
		<input type="checkbox"  name="course[2]" value="2">英语
		<br>
	   <input type="submit" name="submit" value="submit">
	</form>

	<h2>表单创建后查询实例</h2>
	<?php echo $name;?><br>
	<?php echo $age;?><br>
	<?php echo $sex;?><br>
	<?php echo $checkbox;?>

	<h2>表单查询实例</h2>
	<form action="formSearch" method="get">
		查询学生<br>
		姓名：
		<input type="text"  name="fname" value="" placeholder="请在此输入...">
		<br>
		课程：
		<input type="text"  name="fcourse" value="" placeholder="请在此输入...">
		<br>
		<input type="submit" name="fsubmit" value="submit">
	</form>


	<?php
	//判断是否点击提交
		// if( $_GET )
		// {
		// $array = $_GET['course'];
		// alert($array);
		// }
	?>
	<!-- <script type="text/javascript">
	$(function(){
		$.ajax({
			type : "GET",
			url : "xxx",
			success : function (data) {
				console.log(data);   //data即为后台返回的数据
		}
	});
	</script> -->
</body>
