<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cssReset.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/modal.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <title>F.A.R.T</title>
        <script src="{{ asset('js/vue.js') }}"></script>
        <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
        <script src="{{ asset('js/common.js') }}"></script>
    </head>
<body>
	<div id="app">
        <div class="inputArea">
            <div class="loginTab" :class="{active: operation == 1}" v-on:click="operation = 1">登入</div>
            <div class="registerTab" :class="{active: operation == 2}" v-on:click="operation = 2">註冊</div>
            <div v-if="operation == 1">
                <div class="loginId">
                    帳號：
                    <input type="text" v-model="loginEmail">
                </div>
                <div class="loginPwd por">
                    密碼：
                    <input :type="loginPwdType" v-model="loginPwd" maxlength="10">
                    <div class="pwdSwitch" v-on:click="showLoginPwd = true" v-show="showLoginPwd == false">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="pwdSwitch" v-on:click="showLoginPwd = false" v-show="showLoginPwd == true">
                        <i class="fas fa-eye-slash"></i>
                    </div>
                </div>
                <button v-on:click="login">登入</button>
            </div>
            <div v-if="operation == 2">
                <div class="loginId">
                    帳號：
                    <input type="text" placeholder="請使用信箱作為登入帳號" v-model="regisEmail">
                </div>
                <div class="loginId">
                    姓名：
                    <input type="text" v-model="regisName">
                </div>
                <div class="loginId">
                    電話：
                    <input type="tel" v-model="regisTel">
                </div>
                <div class="loginPwd por">
                    密碼：
                    <input :type="RegisPwdType" v-model="regisPwd" maxlength="10">
                    <div class="pwdSwitch" v-on:click="showRegisPwd = true" v-show="showRegisPwd == false">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="pwdSwitch" v-on:click="showRegisPwd = false" v-show="showRegisPwd == true">
                        <i class="fas fa-eye-slash"></i>
                    </div>
                </div>
                <button v-on:click="register">註冊</button>
            </div>
        </div>
        
        <!-- <div class="modal message">
            <div class="message-body">
                <div class="close-modal"></div>
                <p class="message-content">
                    gg
                </p>
                <button class="message-confirm">OK</button>
            </div>
        </div> -->

    </div>
</body>
</html>

<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script>
new Vue({
    el: '#app',
    data: {
        loginEmail: '',
        loginPwd: '',
        operation: 1,
        regisEmail: '',
        regisPwd: '',
        regisName: '',
        regisTel: '',
        showLoginPwd: false,
        showRegisPwd: false
    },
    computed: {
        loginPwdType: function(){
            return this.showLoginPwd === false? 'password' : 'text';
        },
        RegisPwdType: function(){
            return this.showRegisPwd === false? 'password' : 'text';
        }
    },
    mounted: function(){
        
    },
    methods: {
    	login(){
            $.ajax({
                url: '../api/auth/login',
                type: 'post',
                data: {
                    'email': this.loginEmail,
                    'password': this.loginPwd,
                },
                success(data){
                    console.log(data);
                    if (data.success) {
                        alert('login success');
                        localStorage.setItem('jwt_token', data.result.token);
                        location.href = '../../';
                    }else{
                        alert(data.message);
                    }
                }
            });
    	},
        register(){
            $.ajax({
                url: '../api/register',
                type: 'post',
                data: {
                    'name': this.regisName,
                    'email': this.regisEmail,
                    'password': this.regisPwd,
                    'tel': this.regisTel,
                    'img': 'uploads/images/members/member1.jpg'
                },
                success(data){
                    console.log(data);
                    if (data.status == 'success') {
                        alert('oh ya!');
                    }
                }
            });
        },
    }
})
</script>