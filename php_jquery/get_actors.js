(function(){
	var Actor={
		init : function(config){
			this.config=config;
			this.bindEvents();

		},
		bindEvents: function(){
			this.config.letterSelection.on('change',this.fetchActors);


		},
		fetchActors : function(){
			var self=Actor;
			$.ajax({
				url : 'index.php',
				type : 'POST',
				data : self.config.form.serialize(),
			
				success : function(result)
				{
					self.config.body.html(result);
					//console.log(result[0].first_name);
				}
			});
		}
	};
	Actor.init({
		letterSelection : $('#q'),
		form : $('form'),
		body : $('#show_result')


	});


})();