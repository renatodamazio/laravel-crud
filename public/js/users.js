var userform = new Vue({

	el: "#userform",
	data:{
		activePassWord: false,
		avatar: '/images/avatar.png'
	},

	mounted() {

		var img = ($('input[name="image"]').val());
		
		if(img.length) {
			this.avatar = 'http://127.0.0.1:3000' + img;
		};

	},

	methods: {

		activePass() {

			var active = this.activePassWord;
			this.activePassword = active ? true : false;

		},

		upload() {
			
			var data = new FormData();
			var token = $('input[name="_token"]').val();
			var url = $('input[name="upload-route"]').val();
			var self = this;

			 data.append('upload', $('input[type=file]')[0].files[0]);

			$.ajax({
			    url: '/api/upload',
			    data: data,
			    cache: false,
			    processData: false,
                contentType: false,
			    method: 'POST',
			    success: function(data){
			       $('input[name="image"').val(data.image);
			       self.avatar = 'http://127.0.0.1:3000' + data.image
			    },
			    error: function(data){
			    	console.log(data)
			    }
			});

		}

	}

})