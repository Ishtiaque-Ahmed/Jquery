<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style type="text/css">
		
		
			
		</style>
</head>
<body>
	<script id=blogTemplate type=tuts/tutorial>
		<h2>{{title}}</h2>
		<img src={{thumbnail}} alt={{title}}>
	</script>
	<script type="text/javascript">
		(function(){
			var content=[
				{
					title: 'Post One',
					thumbnail: 'http://www.writingfordesigners.com/wp-content/uploads/2017/04/33b869f90619e81763dbf1fccc896d8d.jpg'
				},
				{
					title: 'Post Two',
					thumbnail: 'https://logopond.com/logos/6b309aa83be5cc279fd2a7483ca6f8c4.png'
				}

			];
		var template=$.trim($('#blogTemplate').html());
		$.each(content,function (index,object) {
			var temp=template.replace(/{{title}}/ig,object.title).replace(/{{thumbnail}}/ig,object.thumbnail);
			$(document.body).append(temp);

		});


		})();



	</script>
</body>
</html>