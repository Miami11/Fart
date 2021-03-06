<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cssReset.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/modal.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <title>F.A.R.T</title>
        <script src="{{ asset('js/vue.js') }}"></script>
        <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
        <script src="{{ asset('js/common.js') }}"></script>

    </head>
    <body>
        <div id="app">

            <!-- nav -->
            <div class="navArea">
                <div class="leftNav">
                    <div class="logo"><img class="indexLogo" src="{{ asset('images/icons/LOGO.png') }}" alt="logo"></div>
                    <div class="ham" @click="navIn = !navIn"><img class="indexLogo" src="{{ asset('images/icons/LOGO.png') }}" alt="logo"></div>
                    <div :class="mobileNavCss">
                        <div class="navv babyCloth"><a href="./products">嬰兒衣服</a><i class="fas fa-angle-down"></i></div>
                        <div class="navv babyPants">嬰兒褲/裙<i class="fas fa-angle-down"></i></div>
                        <div class="navv babyToy">玩具<i class="fas fa-angle-down"></i></div>
                        <div class="navv mamaCloth">媽媽服裝<i class="fas fa-angle-down"></i></div>
                        <div class="navv others">周邊商品<i class="fas fa-angle-down"></i></div>
                    </div>
                </div>
                <div class="rightNav">
                    <div class="login" v-on:click="toLoginPage" v-if="!login">登入</div>
                    <div class="login" v-else>鼻要登出</div>
                    <div class="shopCar"><i class="fas fa-shopping-cart"></i></div>
                </div>
            </div>
            
            <!-- top product -->
            <div class="topArea container">
                <div class="leftProd indexHoverBtns banner1"></div>
                <div class="midProd">
                    <div class="midProd1 indexHoverBtns banner2"></div>
                    <div class="midProd2 indexHoverBtns banner3"></div>
                </div>
                <div class="rightProd indexHoverBtns banner4"></div>
            </div>

            <!-- some slogan -->
            <div class="secondArea">
                <h3>嚴選品質，舒適穿搭</h3>
                <p>法爾特從日本韓國進口高品質童裝，每一件衣服的品質都經過我們把關，<br>我們精心挑選最好看的衣服，多變的樣式供您挑選。</p>
            </div>

            <!-- products silder -->
            <div class="thirdArea container">
                <h2 class="tac">暢銷商品</h2>
                <div class="sliderWrap">
                    <div class="prodContent" :class="sliderPos">
                        <div class="prodItem prod1" v-for="item in productList">
                            <!-- @{{item.attributes.img[0]}} -->
                            <img src="http://fart.test/uploads/images/products/product1524728818.jpg" class="prodImg">
                            <h3 class="prodName">@{{item.attributes.name}}</h3>
                            <div class="prodPrize">$@{{item.attributes.price}}</div>
                            <div class="prodPopup">
                                <div class="likeBtn" v-on:click="like(item.id)"><i class="fas fa-heart"></i></div>
                                <div class="cartBtn"><i class="fas fa-cart-plus"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- products silder -->
            <div class="thirdArea container">
                <h2 class="tac">特價商品</h2>
                <div class="sliderWrap">
                    <div class="prodContent" :class="sliderPos">
                        <div class="prodItem prod1">
                            <img src="http://fart.test/uploads/images/products/product1524728818.jpg" class="prodImg">
                            <h3 class="prodName">good stuff</h3>
                            <div class="specialPrizeArea">
                                <div class="prodPrize orgPrize">$87</div>
                                <div class="prodPrize newPrize">$86</div>
                            </div>
                        </div>
                        <div class="prodItem prod2">
                            <img src="http://fart.test/uploads/images/products/product1524728818.jpg" class="prodImg">
                            <h3 class="prodName">good stuff</h3>
                            <div class="prodPrize orgPrize">$87</div>
                        </div>
                        <div class="prodItem prod3">
                            <img src="http://fart.test/uploads/images/products/product1524728818.jpg" class="prodImg">
                            <h3 class="prodName">good stuff</h3>
                            <div class="prodPrize orgPrize">$87</div>
                        </div>
                        <div class="prodItem prod4">
                            <img src="http://fart.test/uploads/images/products/product1524728818.jpg" class="prodImg">
                            <h3 class="prodName">good stuff</h3>
                            <div class="prodPrize orgPrize">$87</div>
                        </div>
                        <div class="prodItem prod5">
                            <img src="http://fart.test/uploads/images/products/product1524728818.jpg" class="prodImg">
                            <h3 class="prodName">good stuff</h3>
                            <div class="prodPrize orgPrize">$87</div>
                        </div>
                        <div class="prodItem prod6">
                            <img src="http://fart.test/uploads/images/products/product1524728818.jpg" class="prodImg">
                            <h3 class="prodName">good stuff</h3>
                            <div class="prodPrize orgPrize">$87</div>
                        </div>
                        <div class="prodItem prod7">
                            <img src="http://fart.test/uploads/images/products/product1524728818.jpg" class="prodImg">
                            <h3 class="prodName">good stuff</h3>
                            <div class="prodPrize orgPrize">$87</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- footer -->
            <div class="fourthArea">
                <div class="footerText">
                    <ul>
                        <li>法爾特精品童裝</li>
                        <li>02-2345-6789</li>
                        <li>fart@fart.com</li>
                    </ul>
                </div>
                <img src="{{ asset('images/icons/LOGO.png') }}" class="footerLogo">
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
        counting: 0,
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
        sliderPos: function(){
            return 'indexSlider' + parseInt(this.counting%5);
        }
    },
    created: function(){
        var _this = this;
        // setInterval(function(){
        //     _this.counting += 1;
        // }, 2000);
    },
    mounted: function(){
        console.log('mounted get product data');
        if (localStorage.jwt_token) {
            this.login = true;
        }
        this.token = localStorage.jwt_token;
        var _this = this;
        $.ajax({
            type: 'GET',
            headers: {"Authorization": "BEARER " + this.token},
            url: 'api/v1/product',
            data: {

            },
            success(data){
                console.log(data);
                // console.log(data.data[0].attributes.img[0].path);
                _this.productList = data.data.splice(0,7);
            }
        });
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
                        $.toast.alert('好棒棒' + data.data.id);
                    }
                },
                error(error){
                    console.log(error);
                    $.toast.confirm('嗶嗶！報錯了！');
                }
            });
        }
    }
})
</script>