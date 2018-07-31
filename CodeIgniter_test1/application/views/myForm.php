<?php
defined('BASEPATH') or exit('No direct script access allowed');
?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>myForm</title>
	<script src="/js/jquery-3.1.1.js"></script>
	<script type="text/javascript">
	$(function(){
		$(".btnSearchAll").trigger('click');
		$(".btnChangeAll").trigger('click');
	});

	var btnSend = function (){
		var name = $('.creatForm .name').val();
		var age = $('.creatForm .age').val();
		var sex = $('.creatForm input:radio[name="sex"]:checked').val();

		var subject =[];
		 $('.creatForm input[name="subject"]:checked').each(function(){
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

			window.location.reload();
		}else {
			console.log("checkbox 为空");
		}

	};

	var sortNumber = function (a,b){
		return a - b
	};

	var btnSearch = function () {
		var name = $('.searchForm .name').val();
		var url = '/index.php/form/searchDB?name='+name;
		console.log(url);
		if (name != '') {
			$.get(
				url,
				{},
				function (response,status,xhr) {
					console.log(response);
					// console.log(JSON.stringify(response));

					$(".myTable tbody").empty();

					for (let i = 0; i < response.length; i++) {
						$(".myTable tbody").append(
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
		}else {
			console.log('查询的 姓名 为空');
		}
	};

	var btnSearch_subject = function () {
		var subject =[];
		$('.searchForm input[name="subject2"]:checked').each(function(){
		  subject.push($(this).val());
		});

		// 数组排序
		subject = subject.sort(sortNumber);
		subject = JSON.stringify(subject);

		var url = '/index.php/form/searchDB_subject?subject='+subject;
		console.log(url);

		if (subject.length > 2 && subject.length != 2) {
			$.get(
				url,
				{},
				function (response,status,xhr) {
					console.log(response);
					// console.log(JSON.stringify(response));

					$(".myTable tbody").empty();

					for (let i = 0; i < response.length; i++) {
						$(".myTable tbody").append(
							'<tr>'+
							'<td class="userId">'+response[i].userId+'</td>'+
							'<td class="name">'+response[i].userName+'</td>'+
							'<td class="age">'+response[i].age+'</td>'+
							'<td class="sex">'+response[i].sex+'</td>'+
							'<td class="subject_chinese">'+response[i].subject_chinese+'</td>'+
							'<td><a href="javascript:;" class="btnEdit" onclick="btnEdit(this)">编辑</a></td>'+
							'<td><a href="javascript:;" class="btnDelect" onclick="btnDelect(this)">删除</a></td>'+
							'<tr>'
						);
					}
				},
				"json"
			);
		}else {
			console.log("查询的 科目 为空");
		};
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
				$(".myTable tbody").empty();

				for (let i = 0; i < response.length; i++) {
					$(".myTable tbody").append(
						'<tr>'+
						'<td class="userId">'+response[i].userId+'</td>'+
						'<td class="name">'+response[i].userName+'</td>'+
						'<td class="age">'+response[i].age+'</td>'+
						'<td class="sex">'+response[i].sex+'</td>'+
						'<td class="subject_chinese">'+response[i].subject_chinese+'</td>'+
						'<td><a href="javascript:;" class="btnEdit" onclick="btnEdit(this)">编辑</a></td>'+
						'<td><a href="javascript:;" class="btnDelect" onclick="btnDelect(this)">删除</a></td>'+
						'<tr>'
					);
				}
			},
			"json"
		);
	};

	var btnChangeAll = function () {
		$(".searchForm .btnSave").css("display", "inline-block");
		$(".searchForm .btnCancel").css("display", "inline-block");
		$(".myTable .btnEdit").css("color","");
		// $(".myTable tbody").empty();

		var url = '/index.php/form/catchDB';
		console.log(url);
		$.get(
			url,
			{},
			function (response,status,xhr) {
				console.log(response);

				$(".editMyTable tbody").empty();

				for (let i = 0; i < response.length; i++) {
					let sex = response[i].sex;
					let subjectId = response[i].subjectId;

					// json字符串 解析成 对象
					subjectId = JSON.parse(subjectId);

					$(".editMyTable tbody").append(
						'<tr>'+
						'<td>'+response[i].userId+'</td>'+
						'<td><input type="text"  name="name" value="'+response[i].userName+'"></td>'+
						'<td><input type="text"  name="age" value="'+response[i].age+'"></td>'+
						'<td><input type="radio" name="sex_'+i+'" value="male">男生'+
						'<input type="radio" name="sex_'+i+'" value="female">女生</td>'+
						'<td><input type="checkbox"  name="subject_'+i+'" value="1">语文'+
						'<input type="checkbox"  name="subject_'+i+'" value="2">数学'+
						'<input type="checkbox"  name="subject_'+i+'" value="3">英语</td>'+
						'<tr>'
					);

					//  根据对比 input value 值，设置 input checked 值
					$(".editMyTable input:radio[name=sex_"+i+"][value=" + sex + "]").prop("checked", "checked");


					for (let a = 0; a < $('.editMyTable input[name=subject_'+i+']').length; a++) {
						let e = $('.editMyTable input[name=subject_'+i+']').eq(a).val();

						$(".editMyTable input[name=subject_"+i+"][value='" + subjectId[a] + "']").prop("checked", "checked");
					}

				}

			},
			"json"
		);
	};

	var btnSave = function () {
		var userId = $(".editMyTable .userId").html();
		var name = $(".editMyTable .name").val();
		var age = $(".editMyTable .age").val();
		var sex = $('input:radio[name="sex3"]:checked').val();

		var subject =[];
		 $('input[name="subject3"]:checked').each(function(){
		  subject.push($(this).val());
		 });

		// 数组排序
		subject = subject.sort(sortNumber);
		subject = JSON.stringify(subject);

		var url = '/index.php/form/changeDB?userId='+userId+'&name='+name+'&age='+age+'&sex='+sex+"&subject="+subject;
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

			window.location.reload();
		}else {
			console.log("checkbox 为空");
		}
	};

	var btnCancel = function () {
		//表单编辑实例 取消
		$(".editMyTable tbody").empty();
		$(".formEdit .btnSave").css("display", "none");
		$(".formEdit .btnCancel").css("display", "none");

		$(".myTable .btnEdit").css("color","");
	};

	var btnEdit = function (index) {
		$(".myTable .btnEdit").css("color","");
		$(index).css("color","rgb(85, 26, 139)");
		$(".btnSave").css("display", "inline-block");
		$(".btnCancel").css("display", "inline-block");

		$(".editMyTable tbody").empty();

		$(".editMyTable tbody").append(
			'<tr>'+
			'<td class="userId"></td>'+
			'<td><input type="text"  name="name3" class="name"></td>'+
			'<td><input type="text"  name="age3" class="age"></td>'+
			'<td><input type="radio"  name="sex3" value="male" class="sex">男生'+
			'<input type="radio"  name="sex3" value="female" class="sex">女生</td>'+
			'<td><input type="checkbox"  name="subject3" value="1">语文'+
			'<input type="checkbox"  name="subject3" value="2">数学'+
			'<input type="checkbox"  name="subject3" value="3">英语</td>'+
			'<tr>'
		);

		var p = $(index).parent();

		var userId = p.siblings('.userId').html();
		var userName = p.siblings('.name').html();
		var age = p.siblings('.age').html();
		var sex = p.siblings('.sex').html();
		var subject_chinese = p.siblings('.subject_chinese').html();

		var arr = [];
		var newArr = [];
		arr = subject_chinese.split(',');

		for (let i = 0; i < arr.length; i++) {
			// arr = ['语文','数学'];
			switch (arr[i]) {
				case '语文':
					newArr.push('1');
					break;
				case '数学':
					newArr.push('2');
					break;
				case '英语':
					newArr.push('3');
					break;
				default:
			}

			for (let a = 0; a < $(".editMyTable input[name='subject3']").length; a++) {
				var e = $(".editMyTable input[name='subject3']").eq(a).val();

				$(".editMyTable input[name='subject3'][value='" + newArr[i] + "']").prop("checked", "checked");
			}
		}

		// 数组排序
		newArr = newArr.sort(sortNumber);
		newArr = JSON.stringify(newArr);

		$(".editMyTable .userId").html(userId);
		// input text 设置value值
		$(".editMyTable .name").val(userName);
		$(".editMyTable .age").val(age);
		// input radio 设置选中
		$(".editMyTable input:radio[name='sex3'][value='" + sex + "']").prop("checked", "checked");

	};

	var btnDelect = function(index){
		// 表单显示实例 删除
		var userId = $(index).parent().siblings('.userId').html();
		var name = $(index).parent().siblings('.name').html();

		var url = '/index.php/form/deleteDB?userId='+userId;
		console.log(url);

		// ----------- 弹框确认 ---------
		var r=confirm('您真的要执行【删除】，学号为【'+userId+'】的学生【'+name+'】的信息吗？');
		if (r==true){
			console.log("你按下了\"确定\"按钮!");

			$.get(
				url,
				{},
				function (response,status,xhr) {
					console.log(response);
					if (response == true) {
						window.location.reload();
					}
				},
				"json"
			);
		}
		else{
			console.log("你按下了\"取消\"按钮!");
		}

	};

	var btnChangeSave = function (){
		// 表单编辑实例 保存

		var url = '/index.php/form/changeSaveDB';
		console.log(url);

		if (subject!=="[]") {
			// console.log("checkbox 不为空");
			$.get(
				url,
				{},
				function (response,status,xhr) {
					console.log(response);
				},
				"json"
			);

			// window.location.reload();
		}else {
			// console.log("checkbox 为空");
		}


	};

	var btnChangeCancel = function (){
		// 修改学生全部信息 取消
		$(".editMyTable tbody").empty();
		$(".searchForm .btnSave").css("display", "none");
		$(".searchForm .btnCancel").css("display", "none");
	};
	</script>
</head>
<body>

	<h2>表单创建实例</h2>
	<div class="creatForm">
		创建学生<br>
		姓名：
		<input type="text"  name="name" class="name">
		<br>
		年龄：
		<input type="text"  name="age" class="age">
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
	</div>



	<h2>表单查询实例</h2>
		<div class="searchForm">
			姓名：
			<input type="text" name="name2" class="name">
			<button type="submit" name="submit" onclick="btnSearch()">按条件查询学生信息</button>
			<br>
			课程：
			<input type="checkbox" name="subject2" value="1">语文
			<input type="checkbox" name="subject2" value="2">数学
			<input type="checkbox" name="subject2" value="3">英语
			<button type="submit" name="submit" onclick="btnSearch_subject()">按条件查询学生信息</button>
			<br>
			<br>
			<button type="submit" name="submit" onclick="btnSearchAll()" class="btnSearchAll">查询全部学生信息</button>
			<button type="button" name="button" onclick="btnChangeAll()" class="btnChangeAll">修改学生全部信息</button>
			<button type="button" name="button" onclick="btnChangeSave()" class="btnSave" style="display:none;">保存</button>
			<button type="button" name="button" onclick="btnChangeCancel()" class="btnCancel" style="display:none;">取消</button>
		</div>

	<h2>表单显示实例</h2>
		<div class="formShow">
			<table class="myTable" border="1" cellpadding="10" style="border-collapse:collapse;">
				<thead>
					<tr>
						<th>学号</th>
						<th>姓名</th>
						<th>年龄</th>
						<th>性别</th>
						<th>课程</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>



	<h2>表单编辑实例</h2>
		<div class="formEdit">
			<table class="editMyTable" border="1" cellpadding="10" style="border-collapse:collapse;">
				<thead>
					<tr>
						<th>学号</th>
						<th>姓名</th>
						<th>年龄</th>
						<th>性别</th>
						<th>课程</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
			<br>
			<button style="display:none;" type="submit" name="submit" class="btnSave" onclick="btnSave()">保存</button>
			<button style="display:none;" type="submit" name="submit" class="btnCancel" onclick="btnCancel()">取消</button>
		</div>
</body>
</html>
