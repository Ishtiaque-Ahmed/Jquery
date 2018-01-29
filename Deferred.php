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
		<p id="result"></p>
	</div>
	
	<script type="text/javascript">
	(function(){
		var set;
		var dfr=function()
		{
			var dfd= $.Deferred();
			
			
			setTimeout(function(){
				set="task finished";
				dfd.resolve();
			},2000);
			return dfd.promise();

		};
		

	/*
		manual way (u can use 'always' to trigger default function )
		

		dfr().done(function(){
				console.log(set);
		}).fail(function(){
			//something
		});*/

	/*	dfr().then(function(){
				console.log(set);
				//first function for success
			},
			function()
			{
				//second function for failure
			}
		);*/


	})();

	</script>
	<script type="text/javascript">
		
		$.searchTwitter=function(search)
		{	
			return $.ajax({
				url: 'https://twitter.com/search?q=cats'
			
			}).promise();
		
			

		};

		var outer=$.searchTwitter('cat');
		outer.then(
			function(results){
				console.log(results);
		},
			function(results)
		{
			console.log('Not found');
		}


		);



	</script>
</body>
</html>