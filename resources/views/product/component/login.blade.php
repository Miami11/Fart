<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cssReset.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <title>F.A.R.T</title>
        <script src="{{ asset('js/vue.js') }}"></script>
        <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
    </head>
<body>
	<div id="app">
        <div class="inputArea">
            <div class="loginTab" :class="{active: operation == 1}" v-on:click="operation = 1">登入</div>
            <div class="registerTab" :class="{active: operation == 2}" v-on:click="operation = 2">註冊</div>
            <div v-if="operation == 1">
                <div class="loginId">
                    帳號：
                    <input type="text">
                </div>
                <div class="loginPwd">
                    密碼：
                    <input type="password">
                </div>
                <button>登入</button>
            </div>
            <div v-if="operation == 2">
                <div class="loginId">
                    帳號：
                    <input type="text" placeholder="請使用有效信箱作為登入帳號">
                </div>
                <div class="loginPwd">
                    密碼：
                    <input type="password">
                </div>
                <button>註冊</button>
            </div>
        </div>
        <!-- <p>LOGIN</p>
        <input type="text" v-model="email">   
        <input type="password" v-model="password">
        <h1 @click="login">BTN</h1> -->
    </div>
</body>
</html>

<script>
new Vue({
    el: '#app',
    data: {
        email: '',
        password: '',
        operation: 1,
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