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
        <p>LOGIN</p>
        <input type="text" v-model="email">   
        <input type="password" v-model="password">
        <h1 @click="login">BTN</h1>
    </div>
</body>
</html>

<script>
new Vue({
    el: '#app',
    data: {
        email: '',
        password: ''
    },
    mounted: function(){
        
    },
    methods: {
    	login(){
            $.ajax({
                url: 'http://fart.test/api/auth/login',
                type: 'post',
                data: {
                    'email': this.email,
                    'password': this.password,
                },
                success(data){
                    console.log(data);
                }
            });
    	},
    }
})
</script>