<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cssReset.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/detail.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
        <title>F.A.R.T</title>
        <script src="{{ asset('js/vue.js') }}"></script>
        <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
        <script src="{{ asset('js/common.js') }}"></script>

    </head>
    <body>
        <div id="app" class="productDetailPage">

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
            
            <!-- product detail -->
            <div class="detailArea" :class="{uSeeMe: pageReady}">
                <div class="prodImgWrapper">
                    <div class="mainProdImg" :style="mainImgStyle">
                        <!-- <img src="{{ asset('images/index/7.jpg') }}" class="w100p"> -->
                    </div>
                    <div class="slideProdImg">
                        <div class="subImgBlock" :class="{active: activeIndex == 1}" :style="img1Style" v-on:click="activeIndex = 1"></div>
                        <div class="subImgBlock" :class="{active: activeIndex == 2}" :style="img2Style" v-on:click="activeIndex = 2"></div>
                        <div class="subImgBlock" :class="{active: activeIndex == 3}" :style="img3Style" v-on:click="activeIndex = 3"></div>
                        <div class="subImgBlock" :class="{active: activeIndex == 4}" :style="img4Style" v-on:click="activeIndex = 4"></div>
                    </div>
                </div>
                <div class="prodIntro">
                    <h3 class="pName fl">@{{currentProduct.attributes.name}}</h3>
                    <h3 class="pPrice fr">$ @{{currentProduct.attributes.price}}</h3>
                    <div class="clearfix"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias atque minima rerum laborum deleniti beatae, id! Accusantium ea, delectus, iusto nesciunt asperiores autem eveniet totam similique aliquid, recusandae omnis accusamus.</p>
                </div>
                <div class="prodBtnArea"></div>
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

    </body>
</html>

<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script>
new Vue({
    el: '#app',
    data: {
        login: false,
        navIn: false,
        token: '',
        pageReady: false,
        activeIndex: 1,
        currentProduct:{
            "type": "products",
            "id": 1,
            "attributes":{
                "img":[
                    {"id": 17, "name": "米祥", "path": "images/index/7.jpg"},
                    {"id": 17, "name": "米祥", "path": "images/index/8.jpg"},
                    {"id": 17, "name": "米祥", "path": "images/index/9.jpg"},
                    {"id": 17, "name": "米祥", "path": "images/index/10.jpg"}
                ],
                "price": 240,
                "name": "好棒棒褲子"
            },
            "coupon":[
                {"id": 4, "name": "曾燕", "description": "Et voluptas officiis amet dolore porro.", "started_at": "2018-05-13 12:31:40"},
                {"id": 8, "name": "成桂荣", "description": "Voluptates perferendis debitis sunt voluptate sapiente quia."}
            ],
            "links":{
                "self": "http://fart.test/api/v1/product/1"
            }
        }
    },
    computed: {
        mobileNavCss: function(){
            return {
                'navTabs' : true,
                'navIn' : this.navIn === true
            }
        },
        prodImgList(){
            return this.currentProduct['attributes']['img'];
        },
        mainImgStyle(){
            return {
                backgroundImage: 'url(' + this.currentProduct.attributes.img['' + (this.activeIndex-1) + ''].path + ')'
            }
        },
        img1Style(){
            return {
                backgroundImage: 'url(' + this.currentProduct.attributes.img[0].path + ')'
            }
        },
        img2Style(){
            return {
                backgroundImage: 'url(' + this.currentProduct.attributes.img[1].path + ')'
            }
        },
        img3Style(){
            return {
                backgroundImage: 'url(' + this.currentProduct.attributes.img[2].path + ')'
            }
        },
        img4Style(){
            return {
                backgroundImage: 'url(' + this.currentProduct.attributes.img[3].path + ')'
            }
        }
    },
    mounted: function(){
        console.log('mounted get product data');
        if (localStorage.jwt_token) {
            this.login = true;
            this.token = localStorage.jwt_token;
        }
        setTimeout(()=>{
            this.pageReady = true;
        }, 500);
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