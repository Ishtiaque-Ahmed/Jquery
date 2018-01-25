<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style type="text/css">
			body{
				padding-top: 20px;
			}
			.container{
				width: 500px;
				padding: 20px;
			}
			#contact-me{
				background: #e3e3e3;
				position: relative;

				

			}
			.js #contact-me{
				position: absolute;
				width: inherit;
				height: 450px;
				top: 0;
				display: none;
			}
			.close{
				position: absolute;
				right: 10px;
				top: 10px;
				font-weight: bold;
				font-family: sans-serif;
				cursor: pointer;
			}
			
		</style>
</head>
<body>
	<div class="container">
	<article>
		<p>
			Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. 
		</p>
		<p>
			Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. Taking advantage of Motorcycles. 
		</p>

	</article>


		<div style="border-style: solid; margin: auto;" class="container" id="contact-me">
		<form action="" method="post">
			<div class="form-group">
			<label>Name:</label>
			<input type="text" name="name">
			</div>
			<div class="form-group">
			<label>Email:</label>
			<input type="text" name="email">
			</div>
			<div class="form-group">
			<label>Message:</label>
			<input type="textarea" name="message">
			</div>
			<button class="btn btn-primary" type="submit">Submit</button>
		</form>
		</div>
	</div>
	<script type="text/javascript">
		$('html').addClass('js');
		$(document).ready(function () {
			var ContactForm={
				container: $('#contact-me'),
				config:{
					effect: 'slideToggle'
				},
				init:function(config){
					$.extend(this.config,config);
						$('<button></button>',{
								text: 'contact',
								id: 'loren'


						}).insertAfter('article')
						.on('click',ContactForm.show);


				},
				show:function(){
					var cf=ContactForm,
					container=cf.container,
					config=cf.config;
					
					ContactForm.close.call(container);
					container[config.effect](300);
				},
				close:function(){
						var cross="<span class='close'>X</span>";
						var $this=$(this);
						
						$(cross).prependTo(ContactForm.container).on('click',function(){
								$this[ContactForm.config.effect](300);
								
						});

				}

			};

		 	ContactForm.init();





		});



	</script>
</body>
</html>