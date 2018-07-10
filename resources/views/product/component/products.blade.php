<!doctype html>
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
        <script src="{{ asset('js/common.js') }}"></script>

    </head>
    <body>
        <div id="app" class="productPage">

            <!-- nav -->
            <div class="navArea">
                <div class="leftNav">
                    <div class="logo"><img class="indexLogo" src="{{ asset('images/icons/LOGO.png') }}" alt="logo"></div>
                    <div class="ham" @click="navIn = !navIn"><img class="indexLogo" src="{{ asset('images/icons/LOGO.png') }}" alt="logo"></div>
                    <div :class="mobileNavCss">
                        <div class="tabs babyCloth active">嬰兒衣服<i class="fas fa-angle-down upAndDown"></i></div>
                        <div class="tabs babyPants">嬰兒褲/裙<i class="fas fa-angle-down upAndDown"></i></div>
                        <div class="tabs babyToy">玩具<i class="fas fa-angle-down upAndDown"></i></div>
                        <div class="tabs mamaCloth">媽媽服裝<i class="fas fa-angle-down upAndDown"></i></div>
                        <div class="tabs others">周邊商品<i class="fas fa-angle-down upAndDown"></i></div>
                    </div>
                </div>
                <div class="rightNav">
                    <div class="login" v-on:click="toLoginPage" v-if="!login">登入</div>
                    <div class="login" v-else>鼻要登出</div>
                    <div class="shopCar"><i class="fas fa-shopping-cart"></i></div>
                </div>
            </div>
            
            <!-- 1 -->
            <canvas class="productBanner"></canvas>

            <!-- 2 -->
            <div class="container p20 bsbb prodWrapper">
                <div class="prodItem prod1" v-for="i in 7">
                    <!-- @{{item.attributes.img[0]}} -->
                    <img src="http://fart.test/uploads/images/products/product1524728818.jpg" class="prodImg">
                    <h3 class="prodName">12321</h3>
                    <div class="prodPrize">$12321</div>
                    <div class="prodPopup">
                        <div class="likeBtn" v-on:click="like(i)"><i class="fas fa-heart"></i></div>
                        <div class="cartBtn"><i class="fas fa-cart-plus"></i></div>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>

<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script>
new Vue({
    el: '#app',
    data: {
        login: false,
        navIn: false,
        productList: [],
        token: ''
    },
    computed: {
        mobileNavCss: function(){
            return {
                'navTabs' : true,
                'navIn' : this.navIn === true
            }
        },
    },
    mounted: function(){
        console.log('mounted get product data');
        if (localStorage.jwt_token) {
            this.login = true;
            this.token = localStorage.jwt_token;
        }
        // var _this = this;
        // $.ajax({
        //     url: 'api/v1/product',
        //     data: {

        //     },
        //     success(data){
        //         console.log(data.data[0].attributes.img[0].path);
        //         _this.productList = data.data.splice(0,7);
        //     }
        // });
    },
    methods: {
        toLoginPage(){
            location.href = './entry/login';
        },
        like(id){
            $.ajax({
                type: 'POST',
                headers: {"Authorization": "BEARER " + this.token},
                url: 'api/like',
                data: {
                    product_id: id
                },
                success(data){
                    console.log(data);
                    if (data.status == 'success') {
                        alert('好棒棒' + data.data.id);
                    }
                },
                error(error){
                    console.log(error);
                }
            });
        }
    }
})
</script>