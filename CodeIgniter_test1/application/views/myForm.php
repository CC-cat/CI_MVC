<?php
defined('BASEPATH') or exit('No direct script access allowed');
?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>myForm</title>
	<script src="/js/jquery-3.1.1.js"></script>
	<script type="text/javascript">

	var btnSend = function (){
		var name = $('#name').val();
		var age = $('#age').val();
		var sex = $('input:radio[name="sex"]:checked').val();

		var subject =[];
		 $('input[name="subject"]:checked').each(function(){
		  subject.push($(this).val());
		 });

		// 数组排序
		subject = subject.sort(sortNumber);
		subject = JSON.stringify(subject);

		var url = '/index.php/form/formSuccess?name='+name+'&age='+age+'&sex='+sex+"&subject="+subject;
		console.log(url);

		if (subject!=="[]") {
			console.log("checkbox 不为空");
			$.get(
				url,
				{},
				function (response,status,xhr) {
					console.log(response);
				},
				"json"
			);
		}else {
			console.log("checkbox 为空");
		}

	};

	var sortNumber = function (a,b){
		return a - b
	};

	var btnSearch = function () {
		var name = $('#name2').val();
		var url = '/index.php/form/searchDB?name='+name;
		console.log(url);
		$.get(
			url,
			{},
			function (response,status,xhr) {
				console.log(response);
				// console.log(JSON.stringify(response));

				$("#myTable tbody").empty();

				for (let i = 0; i < response.length; i++) {
					$("#myTable tbody").append(
						'<tr>'+
						'<td>'+response[i].userId+'</td>'+
						'<td>'+response[i].userName+'</td>'+
						'<td>'+response[i].age+'</td>'+
						'<td>'+response[i].sex+'</td>'+
						'<td>'+response[i].subject_chinese+'</td>'+
						'<tr>'
					);
				}
			},
			"json"
		);
	};

	var btnSearch_subject = function () {

		var subject =[];
		 $('input[name="subject2"]:checked').each(function(){
		  subject.push($(this).val());
		 });

		// 数组排序
		subject = subject.sort(sortNumber);
		subject = JSON.stringify(subject);

		var url = '/index.php/form/searchDB_subject?subject='+subject;
		console.log(url);
		$.get(
			url,
			{},
			function (response,status,xhr) {
				console.log(response);
				// console.log(JSON.stringify(response));

				$("#myTable tbody").empty();

				for (let i = 0; i < response.length; i++) {
					$("#myTable tbody").append(
						'<tr>'+
						'<td>'+response[i].userId+'</td>'+
						'<td>'+response[i].userName+'</td>'+
						'<td>'+response[i].age+'</td>'+
						'<td>'+response[i].sex+'</td>'+
						'<td>'+response[i].subject_chinese+'</td>'+
						'<td></td>'+
						'<td></td>'+
						'<tr>'
					);
				}
			},
			"json"
		);
	};

	var btnSearchAll = function () {
		var url = '/index.php/form/catchDB';
		console.log(url);
		$.get(
			url,
			{},
			function (response,status,xhr) {
				console.log(response);
				// console.log(JSON.stringify(response));
				$("#myTable tbody").empty();

				for (let i = 0; i < response.length; i++) {
					$("#myTable tbody").append(
						'<tr>'+
						'<td>'+response[i].userId+'</td>'+
						'<td>'+response[i].userName+'</td>'+
						'<td>'+response[i].age+'</td>'+
						'<td>'+response[i].sex+'</td>'+
						'<td>'+response[i].subject_chinese+'</td>'+
						'<td><a href="javascript:;" onclick="btnEdit()">编辑</a></td>'+
						'<td><a href="javascript:;" onclick="btnDelect()">删除</a></td>'+
						'<tr>'
					);
				}
			},
			"json"
		);
	};

	var btnChangeAll = function () {
		var url = '/index.php/form/catchDB';
		console.log(url);
		$.get(
			url,
			{},
			function (response,status,xhr) {
				console.log(response);
				// console.log(JSON.stringify(response));
				$("#myTable tbody").empty();
				$(".btnChangeSave").css("display","inline-block");
				$(".btnChangeCancel").css("display","inline-block");
				$(".btnChangeSave").css("margin-left","20px");

				for (let i = 0; i < response.length; i++) {
					$("#myTable tbody").append(
						'<tr>'+
						'<td>'+response[i].userId+'</td>'+
						'<td><input type="text"  name="name" value="'+response[i].userName+'"></td>'+
						'<td><input type="text"  name="age" value="'+response[i].age+'"></td>'+
						'<td><input type="radio"  name="sex" value="male">男生'+
						'<input type="radio"  name="sex" value="female">女生</td>'+
						'<td><input type="checkbox"  name="subject" value="1">语文'+
						'<input type="checkbox"  name="subject" value="2">数学'+
						'<input type="checkbox"  name="subject" value="3">英语</td>'+
						'<tr>'
					);
				}

			},
			"json"
		);
	};

	var btnChangeSave = function (){
		console.log('btnChangeSave');
	};

	var btnChangeCancel = function (){
		console.log('btnChangeCancel');
	};

	var btnEdit = function(){
		console.log('btnEdit');
	};

	var btnDelect = function(){
		console.log('btnDelect');
	};
	</script>
</head>
<body>

	<h2>表单创建实例</h2>
		创建学生<br>
		姓名：
		<input type="text"  name="name" id="name">
		<br>
		年龄：
		<input type="text"  name="age" id="age">
		<br>
		性别：
		<input type="radio"  name="sex" value="male">男生
		<input type="radio"  name="sex" value="female">女生
		<br>
		课程：
		<input type="checkbox"  name="subject" value="1">语文
		<input type="checkbox"  name="subject" value="2">数学
		<input type="checkbox"  name="subject" value="3">英语
		<br>
	    <button type="submit" name="submit" onclick="btnSend()">提交</button>
	<h2>表单查询实例</h2>
		姓名：
		<input type="text"  name="name2" id="name2">
		<button type="submit" name="submit" onclick="btnSearch()">按条件查询学生信息</button>
		<br>
		课程：
		<input type="checkbox"  name="subject2" value="1">语文
		<input type="checkbox"  name="subject2" value="2">数学
		<input type="checkbox"  name="subject2" value="3">英语
		<button type="submit" name="submit" onclick="btnSearch_subject()">按条件查询学生信息</button>
		<br>
		<br>
		<button type="submit" name="submit" onclick="btnSearchAll()">查询全部学生信息</button>
		<button type="button" name="button" onclick="btnChangeAll()">修改学生全部信息</button>
		<button type="button" name="button" onclick="btnChangeSave()" class="btnChangeSave" style="display:none;">保存</button>
		<button type="button" name="button" onclick="btnChangeCancel()" class="btnChangeCancel" style="display:none;">取消</button>
		<br>
		<br>
		<div class="formShow">
			<table id="myTable" border="1" cellpadding="10" style="border-collapse:collapse;">
				<thead>
					<tr>
						<th>学号</th>
						<th>姓名</th>
						<th>年龄</th>
						<th>性别</th>
						<th>课程</th>
						<th colspan="2" width="122"></th>
					</tr>
				</thead>
				<tbody>

				</tbody>

			</table>
		</div>
</body>
</html>
