<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.11/handlebars.min.js"></script>
		<style type="text/css">
			body{
				padding-top: 20px;
			}
			.container{
				width: 500px;
				padding: 20px;
			}
			.box{
				background-color: red;
				position: relative;
				overflow: hidden;
			}
		
			
		</style>
</head>
<body>
	
	<div class="container">
		<ul class="tweets">
			<script id="template" type="text/x-handlebars-template">
				{{#each this}}
				<li>
					<h1>{{thumbnail}} {{#if age}} <span style="color: blue">{{age}}</span>{{else}}<span style="color: red">Age not found</span>{{/if}} </h1>
					<p>{{tweet}}</p>
				</li>
				{{/each}}
			</script>


		</ul>
	</div>
	
	<script type="text/javascript">
		(function(){
			
				var template=[
				{
						thumbnail : "Ishtiaque",
						tweet : "Trying hard",
						age : 25
				},
				{

						thumbnail : "Ishtiaque2",
						tweet : "Trying hard2"
				}



				];

				var etx=Handlebars.compile($('#template').html());
				$(".tweets").append(etx(template));

				
		})();
	



	</script>
</body>
</html>