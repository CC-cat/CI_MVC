
	<h2>表单创建实例</h2>
	<form action="formSuccess" method="post">
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
