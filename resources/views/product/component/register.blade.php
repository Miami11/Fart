<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cssReset.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <title>F.A.R.T</title>
        <script src="{{ asset('js/vue.js') }}"></script>
        <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
    </head>
<body>
	<div id="app">
		123
		<div class="dd" @click="register">REGISTER</div>
	</div>
</body>
</html>

<script>
new Vue({
    el: '#app',
    data: {
    },
    mounted: function(){
        
    },
    methods: {
    	register(){
    		$.ajax({
	            url: 'http://fart.test/api/register',
	            type: 'post',
	            data: {
	            	'name': 'joejoe',
	            	'email': 'joejoe@gmail.com',
	            	'password': '123456',
	            	'tel': '0911223123',
	            	'img': 'uploads/images/members/member1.jpg'
	            },
	            success(data){
	            	console.log(data);
	            }
	        });
    	},
    }
})
</script>