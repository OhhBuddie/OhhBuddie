@extends('layouts.explore')
@section('content')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Page</title>

<style>
    .containerr {
        display: flex;
        height: 89vh;
        width: 100vw;
        margin-top: 59px;
        background-color: black;
    }

    .sidebar {

        width: 108px;
        background-color: black;
        position: fixed;
        height: 80vh;
        overflow-y: scroll;
        scrollbar-width: none;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);

    }

    .sidebar ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .sidebar ul li {
        flex: 1;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .sidebar ul li a {
        text-decoration: none;
        color: white;
        padding: 15px;
        width: 100%;
        display: block;
        border-radius: 8px;
        transition: all 0.3s ease-in-out;
    }



    .sidebar ul li a.active {
        background-color: #aaa;
        font-weight: bold;
        color: #fff;
    }

    .contentt {
        margin-left: 115px;
        padding: 11px;
        overflow-y: scroll;
        scrollbar-width: none;
        width: calc(100% - 120px);
        color: white;
    }

    section {
        margin-bottom: 50px;
    }

    .products {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }

    .product {
        /*background: linear-gradient(135deg, #f7f7f7, #e9e9e9);*/
        /*padding: 15px;*/
        text-align: center;
        /*border: 1px solid #ddd;*/
        border-radius: 10px;
        /*box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);*/
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .product:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .product img {
        max-width: 100%;
        height: auto;
        /*margin-bottom: 10px;*/
        border-radius: 5px;
        transition: transform 0.2s;
    }

    /* 
    .product img:hover {
        transform: scale(1.05);
    } */

    .product h5 {
        margin: 10px 0;
        font-size: 16px;
        color: white;
    }

    .product p {
        /*margin: 5px 0;*/
        font-size: 14px;
        color: white;
    }

    .product span {
        display: block;
        font-weight: bold;
        font-size: 16px;
        color: white;
        /*margin-top: 5px;*/
    }

    @media (max-width: 768px) {
        .products {
            grid-template-columns: repeat(2, 1fr);
        }
    }



    /* Animation for the product containers */
    @keyframes slideFromTop {
        from {
            opacity: 0;
            transform: translateY(-500px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideFromBottom {
        from {
            opacity: 0;
            transform: translateY(500px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Apply animation to the product containers */
    .product-left {
        animation: slideFromTop 0.8s ease-out forwards;
    }

    .product-right {
        animation: slideFromBottom 0.8s ease-out forwards;
    }
</style>

<!-- New add  -->

<style>

    /* Hide extra-products by default */
    .extra-products {
        display: none;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        width: 100%;
        margin-top: 10px;
        opacity: 0;
        max-height: 0;
        overflow: hidden;
        transition: opacity 0.3s ease, max-height 0.3s ease;
    }

    /* Show extra products with a sliding effect */
    .extra-products.showw {
        display: grid;
        opacity: 1;
        max-height: 500px;
        /* Adjust this based on your content */
    }

    /* Ensure Topwear & Bottomwear's extra products share the same row */
    .show-products {
        display: grid;
        grid-column: span 2;
    }

    /* Responsive: 3 products per row */
    @media (max-width: 768px) {
        .extra-products {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    
    .extra-products-container img{
        width: 110px;
        height: 80px;
    }

</style>


    <div class="containerr">
        <!-- Left Sidebar -->
        <div class="sidebar">
            <ul>
                <li class="active"><a href="#women-ethnic" class="active">Men</a></li>
                <li><a href="#women-western">Women</a></li>
                <li><a href="#men">Kids</a></li>
                <!--<li><a href="#kids">Unisex</a></li>-->
                <!--<li><a href="#home-kitchen">Plus Size</a></li>-->
                <!--<li><a href="#beauty-health">Sale</a></li>-->
                <!--<li><a href="#electronics">What's New</a></li>-->
                <!--<li><a href="#books">Celeb Fav</a></li>-->

            </ul>
        </div>
        
    @php
        use Illuminate\Support\Facades\Crypt;
    @endphp

        <!-- Right Content -->
        <div class="contentt">
            <!-- Sections for categories -->
            <section id="women-ethnic"
                style="height:unset; background-image: none; background-repeat: none; background-size: none;">
                <!--<h5>Women Ethnic</h5>-->

                <div class="products">
                    <!-- Topwear -->
                    <div class="product-wrapper">
                        <div class="product ">
                            <img src="{{ $men1 }}"
                                alt="Topwear">
                            <h5>TopWear</h5>
                        </div>
                        <div class="extra-products">
                            <a href="/category/{{ urlencode(Crypt::encryptString('3')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $mentop1 }}"
                                        alt="Extra 1">
                                    <p>T-Shirts</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('4')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $mentop2 }}"
                                        alt="Extra 2">
                                    <p>Shirts</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('5')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $mentop3 }}"
                                        alt="Extra 3">
                                    <p>Sweatshirt</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('6')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $mentop4 }}"
                                        alt="Extra 3">
                                    <p>Jackets</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('7')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $mentop5 }}"
                                        alt="Extra 3">
                                    <p>Blazers & Coats</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('8')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $mentop6 }}"
                                        alt="Extra 3">
                                    <p>Suits</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('9')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $mentop7 }}"
                                        alt="Extra 3">
                                    <p>Co-Ords</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('10')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $mentop8 }}"
                                        alt="Extra 3">
                                    <p>Hoodie</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('11')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $mentop9 }}"
                                        alt="Extra 3">
                                    <p>Shackets</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Bottomwear -->
                    <div class="product-wrapper">
                        <div class="product">
                            <img src="{{ $men2 }}"
                                alt="Bottomwear">
                            <h5>Indian & Festive Wear</h5>
                        </div>
                        <div class="extra-products">
                            <a href="/category/{{ urlencode(Crypt::encryptString('13')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $menindan1 }}"
                                        alt="Extra 1">
                                    <p>Kurta & Kurta Set</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('14')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $menindan2 }}"
                                        alt="Extra 2">
                                    <p>Sherwani</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('15')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $menindan3 }}"
                                        alt="Extra 3">
                                    <p>Indo Western</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('16')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $menindan4 }}"
                                        alt="Extra 3">
                                    <p>Nehru Jacket</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Kidswear -->
                    <div class="product-wrapper">
                        <div class="product">
                            <img src="{{ $men3 }}"
                                alt="Kidswear">
                            <h5>BottomWear</h5>
                        </div>
                        <div class="extra-products">
                            <a href="/category/{{ urlencode(Crypt::encryptString('18')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $menbottom1 }}"
                                        alt="Extra 1">
                                    <p>Jeans</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('19')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $menbottom2 }}"
                                        alt="Extra 2">
                                    <p>Trousers</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('20')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $menbottom3 }}"
                                        alt="Extra 3">
                                    <p>Track pants & Joggers</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('21')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $menbottom4 }}"
                                        alt="Extra 3">
                                    <p>Shorts</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('22')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $menbottom5 }}"
                                        alt="Extra 3">
                                    <p>Cargos & Parachutes</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Menswear -->
                    <div class="product-wrapper">
                            <div class="product">
                                <img src="{{ $men4 }}"
                                    alt="Menswear">
                                <h5>FootWear</h5>
                            </div>
                        <a href="/category/{{ urlencode(Crypt::encryptString('24')) }}" style="text-decoration:none;">
                            <div class="extra-products">
                                <div class="product">
                                    <img src="{{ $menfoot1 }}" alt="Extra 1">
                                    <p>Flip Flops</p>
                                </div>
                        </a>
                        <a href="/category/{{ urlencode(Crypt::encryptString('25')) }}" style="text-decoration:none;">
                            <div class="product">
                                <img src="{{ $menfoot2 }}"
                                    alt="Extra 2">
                                <p>Casual Shoes</p>
                            </div>
                        </a>
                        <a href="/category/{{ urlencode(Crypt::encryptString('26')) }}" style="text-decoration:none;">
                            <div class="product">
                                <img src="{{ $menfoot3 }}"
                                    alt="Extra 3">
                                <p>Formal Shoes</p>
                            </div>
                        <a href="/category/{{ urlencode(Crypt::encryptString('27')) }}" style="text-decoration:none;">
                            <div class="product">
                                <img src="{{ $menfoot4 }}"
                                    alt="Extra 3">
                                <p>Sneakers</p>
                            </div>
                        </a>
                        <a href="/category/{{ urlencode(Crypt::encryptString('28')) }}" style="text-decoration:none;">
                            <div class="product">
                                <img src="{{ $menfoot5 }}"
                                    alt="Extra 3">
                                <p>Sport Shoes</p>
                            </div>
                        </a>
                        <a href="/category/{{ urlencode(Crypt::encryptString('29')) }}" style="text-decoration:none;">
                            <div class="product">
                                <img src="{{ $menfoot6 }}"
                                    alt="Extra 3">
                                <p>Loafers</p>
                            </div>
                        </a>
                        <a href="/category/{{ urlencode(Crypt::encryptString('30')) }}" style="text-decoration:none;">
                            <div class="product">
                                <img src="{{ $menfoot7 }}"
                                    alt="Extra 3">
                                <p>Socks</p>
                            </div>
                        </a>
                        </div>
                    </div>

                    <div class="product-wrapper">
                        <div class="product">
                            <img src="{{ $men5 }}"
                                alt="Menswear">
                            <h5>Innerwear</h5>
                        </div>
                        <div class="extra-products">
                             <a href="/category/{{ urlencode(Crypt::encryptString('32')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $meninner1 }}"
                                        alt="Extra 1">
                                    <p>Briefs & Trunks</p>
                                </div>
                            </a>
                             <a href="/category/{{ urlencode(Crypt::encryptString('33')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $meninner2 }}"
                                        alt="Extra 2">
                                    <p>Boxers</p>
                                </div>
                            </a>
                             <a href="/category/{{ urlencode(Crypt::encryptString('34')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $meninner3 }}"
                                        alt="Extra 3">
                                    <p>Tanks & Vests</p>
                                </div>
                            </a>
                             <a href="/category/{{ urlencode(Crypt::encryptString('35')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $meninner4 }}"
                                        alt="Extra 3">
                                    <p>NightWear</p>
                                </div>
                            </a>
                             <a href="/category/{{ urlencode(Crypt::encryptString('36')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $meninner5 }}"
                                        alt="Extra 3">
                                    <p>Thermals</p>
                                </div>
                            </a>
                             <a href="/category/{{ urlencode(Crypt::encryptString('37')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="{{ $meninner6 }}"
                                        alt="Extra 3">
                                    <p>Bath Robes</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="product-wrapper">
                        
                        <a href="/plushsize?cat=1" style="text-decoration:none;">
                            <div class="product">
                                <img src="{{ $men6 }}"
                                    alt="Menswear">
                                <h5>Plus Size</h5>
                            </div>
                        </a>
                        <!--<div class="extra-products">-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 1">-->
                        <!--        <h5>Extra 1</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 2">-->
                        <!--        <h5>Extra 2</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 3">-->
                        <!--        <h5>Extra 3</h5>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>

            </section>


            <section id="women-western"
                style="height:unset; background-image: none; background-repeat: none; background-size: none;">
                <!--<h5>Women Western</h5>-->
                <div class="products">
      
                    <div class="product-wrapper">
                        <div class="product">
                            <img src="{{ $Women1 }}"
                                alt="Bottomwear">
                            <h5>Indian & Fusion Wear</h5>
                        </div>
                        <div class="extra-products">
                            <a href="/category/{{ urlencode(Crypt::encryptString('40')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Indian/saree.jpg"
                                        alt="Extra 1">
                                    <p>Sarees</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('41')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Indian/Gowns.jpg"
                                        alt="Extra 2">
                                    <p>Gowns</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('42')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Indian/tops.jpg"
                                        alt="Extra 3">
                                    <p>Tops, Tunics & Kurtis</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('43')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Indian/Kurti+Set.jpg"
                                        alt="Extra 3">
                                    <p>Kurtas & Sets</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('44')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Indian/Dupatta.jpg"
                                        alt="Extra 3">
                                    <p>Dupatta & Shawls</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('45')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Indian/Lahenga.jpg"
                                        alt="Extra 3">
                                    <p>Lehenga</p>
                                </div>
                            </a>
                            
                        </div>
                    </div>

                    <div class="product-wrapper">
                        <div class="product">
                            <img src="{{ $Women2 }}"
                                alt="Bottomwear">
                            <h5>Western Wear</h5>
                        </div>
                        <div class="extra-products">
                            <a href="/category/{{ urlencode(Crypt::encryptString('47')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Western/tops.jpg"
                                        alt="Extra 1">
                                    <p>Tops</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('48')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Western/T-shirt.jpg"
                                        alt="Extra 2">
                                    <p>T-Shirts</p>
                                </div>
                            </a>    
                            <a href="/category/{{ urlencode(Crypt::encryptString('49')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Western/shirt.jpg"
                                        alt="Extra 3">
                                    <p>Shirts</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('50')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Western/dress.jpg"
                                        alt="Extra 3">
                                    <p>Dresses</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('51')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Western/Cords.jpg"
                                        alt="Extra 3">
                                    <p>Co-Ords</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('52')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Western/Jumpsuits.jpg"
                                        alt="Extra 3">
                                    <p>Jumpsuits</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('53')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Western/Shrugs.jpg"
                                        alt="Extra 3">
                                    <p>Shrugs</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('54')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Western/Hoodies.jpg"
                                        alt="Extra 3">
                                    <p>Hoodie & Sweatshirts</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('55')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Western/Jacket.jpg"
                                        alt="Extra 3">
                                    <p>Jackets & Coats</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('56')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Western/Blazers.jpg"
                                        alt="Extra 3">
                                    <p>Blazers & Waistcoats</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('57')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Western/Playsuits.jpg"
                                        alt="Extra 3">
                                    <p>Playsuits</p>
                                </div>
                            </a>
                            
                            <a href="/category/{{ urlencode(Crypt::encryptString('58')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Western/shacket.jpg"
                                        alt="Extra 3">
                                    <p>Shackets</p>
                                </div>
                            </a>    
                        </div>
                    </div>

                    <!-- Kidswear -->
                    <div class="product-wrapper">
                        <div class="product">
                            <img src="{{ $Women3 }}"
                                alt="Kidswear">
                            <h5>Bottom Wear</h5>
                        </div>
                        <div class="extra-products">
                            <a href="/category/{{ urlencode(Crypt::encryptString('60')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Bottom+/Jeans.jpg"
                                        alt="Extra 1">
                                    <p>Jeans</p>
                                </div>
                            </a>    
                            <a href="/category/{{ urlencode(Crypt::encryptString('61')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Bottom+/Trousers.jpg"
                                        alt="Extra 2">
                                    <p>Trousers & Capris</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('62')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Bottom+/short.jpg"
                                        alt="Extra 3">
                                    <p>Shorts & Skirts</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('63')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Bottom+/Leggings.jpg"
                                        alt="Extra 3">
                                    <p>Leggings & Tights</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('64')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Bottom+/Plazos.jpg"
                                        alt="Extra 3">
                                    <p>Plazos, Churidar & Salwars</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('65')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Bottom+/W+Hot+Pant.jpg"
                                        alt="Extra 3">
                                    <p>Hot Pants</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('66')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Bottom+/Cargos.jpg"
                                        alt="Extra 3">
                                    <p>Cargos & Parachutes</p>
                                </div>
                            </a>    
                        </div>
                    </div>

          
                    <div class="product-wrapper">
                        <div class="product">
                            <img src="{{ $Women4 }}"
                                alt="Menswear">
                            <h5>Footwear</h5>
                        </div>
                        <div class="extra-products">
                            
                            <a href="/category/{{ urlencode(Crypt::encryptString('68')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Foot/Flats.jpg"
                                        alt="Extra 1">
                                    <p>Flats</p>
                                </div>
                            </a>    
                            <a href="/category/{{ urlencode(Crypt::encryptString('69')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Foot/Heels.jpg"
                                        alt="Extra 2">
                                    <p>Heels</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('70')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Foot/Floaters.jpg"
                                        alt="Extra 3">
                                    <p>Floaters</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('71')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Foot/Boots.jpg"
                                        alt="Extra 3">
                                    <p>Boots</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('72')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Foot/Casual.jpg"
                                        alt="Extra 3">
                                    <p>Casual Shoes</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('73')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Foot/Sneakers.jpg"
                                        alt="Extra 3">
                                    <p>Sneakers</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('74')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Foot/Bellies.jpg"
                                        alt="Extra 3">
                                    <p>Bellies</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('75')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Foot/Socks.jpg"
                                        alt="Extra 3">
                                    <p>Socks</p>
                                </div>
                            </a>    
                            
                        </div>
                    </div>
                    <div class="product-wrapper">
                        <div class="product">
                            <img src="{{ $Women5 }}"
                                alt="Menswear">
                            <h5>Lingerie & Sleepwear</h5>
                        </div>
                        <div class="extra-products">
                            <a href="/category/{{ urlencode(Crypt::encryptString('77')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Lingerie+/Bra+(1).jpg"
                                        alt="Extra 1">
                                    <p>Bra</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('78')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Lingerie+/Briefs+(1).jpg"
                                        alt="Extra 2">
                                    <p>Brief</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('79')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Lingerie+/W+Cemisole.jpg"
                                        alt="Extra 3">
                                    <p>Camisoles</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('80')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Lingerie+/Lingerie+Set+(1).jpg"
                                        alt="Extra 3">
                                    <p>Lingerie Set</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('81')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Lingerie+/Babydoll.jpg"
                                        alt="Extra 3">
                                    <p>Babydoll & Sets</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('82')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Lingerie+/HouseCoat.jpg"
                                        alt="Extra 3">
                                    <p>Housecoat</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('83')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Lingerie+/night+suit.jpg"
                                        alt="Extra 3">
                                    <p>Night Suit</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('84')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Lingerie+/Nighties+(1).jpg"
                                        alt="Extra 3">
                                    <p>Nighties</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('85')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Lingerie+/shapeware.jpg"
                                        alt="Extra 3">
                                    <p>Shapewear</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('86')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Lingerie+/thermal.jpg"
                                        alt="Extra 3">
                                    <p>Thermals</p>
                                </div>
                            </a>
                            <a href="/category/{{ urlencode(Crypt::encryptString('87')) }}" style="text-decoration:none;">
                                <div class="product">
                                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Sub+Category/Women/Lingerie+/bathrobe.jpg"
                                        alt="Extra 3">
                                    <p>Bath Robes</p>
                                </div>
                            </a>    
                        </div>
                    </div>
                    <div class="product-wrapper">
                        
                        <div class="product">
                            <img src="{{ $Women6 }}"
                                alt="Menswear">
                            <h5>Maternity Wear</h5>
                        </div>
                        <!--<div class="extra-products">-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 1">-->
                        <!--        <h5>Extra 1</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 2">-->
                        <!--        <h5>Extra 2</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 3">-->
                        <!--        <h5>Extra 3</h5>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                    
                    <div class="product-wrapper">
                        
                        <a href="/plushsize?cat=38" style="text-decoration:none;">
                            <div class="product">
                                <img src="{{ $Women7 }}"
                                    alt="Menswear">
                                <h5>Plus Size</h5>
                            </div>
                        </a>
                        <!--<div class="extra-products">-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 1">-->
                        <!--        <h5>Extra 1</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 2">-->
                        <!--        <h5>Extra 2</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 3">-->
                        <!--        <h5>Extra 3</h5>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
            </section>

            <section id="men"
                style="height:unset; background-image: none; background-repeat: none; background-size: none;">
                <!--<h5>Men</h5>-->
                <div class="products">
                    <!-- Topwear -->
                    <div class="product-wrapper">
                        
                        <a href="/category/{{ urlencode(Crypt::encryptString('89')) }}" style="text-decoration:none;">
                        <div class="product ">
                            <img src="{{ $kids1 }}"
                                alt="Topwear">
                            <h5>Boy's Clothing</h5>
                        </div>
                        </a>
                        <!--<div class="extra-products">-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://www.botnia.in/cdn/shop/files/5_41b6d8fa-fa23-4550-97f2-5161b85abcbd.png?v=1695274048"-->
                        <!--            alt="Extra 1">-->
                        <!--        <h5>Extra 1</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://www.botnia.in/cdn/shop/files/5_41b6d8fa-fa23-4550-97f2-5161b85abcbd.png?v=1695274048"-->
                        <!--            alt="Extra 2">-->
                        <!--        <h5>Extra 2</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://www.botnia.in/cdn/shop/files/5_41b6d8fa-fa23-4550-97f2-5161b85abcbd.png?v=1695274048"-->
                        <!--            alt="Extra 3">-->
                        <!--        <h5>Extra 3</h5>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>

                    <!-- Bottomwear -->
                    <div class="product-wrapper">
                        
                        <a href="/category/{{ urlencode(Crypt::encryptString('90')) }}" style="text-decoration:none;">
                        <div class="product">
                            <img src="{{ $kids2 }}"
                                alt="Bottomwear">
                            <h5>Girl's Clothing</h5>
                        </div>
                        </a>
                        <!--<div class="extra-products">-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSo6BwptVmQ776VMueRkmI7GhTUDgRq5adaJA&s"-->
                        <!--            alt="Extra 1">-->
                        <!--        <h5>Extra 1</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://levi.in/cdn/shop/files/817910059_01_Front_3bd1cd3d-2059-45da-9a67-bcd06c22030f.jpg?v=1698322814"-->
                        <!--            alt="Extra 2">-->
                        <!--        <h5>Extra 2</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://vilanapparels.com/cdn/shop/products/0W2A8704.jpg?v=1692488152&width=1946"-->
                        <!--            alt="Extra 3">-->
                        <!--        <h5>Extra 3</h5>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>

                    <!-- Kidswear -->
                    <div class="product-wrapper">
                        <a href="/category/{{ urlencode(Crypt::encryptString('91')) }}" style="text-decoration:none;">
                            <div class="product">
                                <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Kids/Shoe.png"
                                    alt="Kidswear">
                                <h5>Footwear</h5>
                            </div>
                        </a>    
                        <!--<div class="extra-products">-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://ramrajcotton.in/cdn/shop/products/1_fc2187ad-922f-4247-9e37-89737632e64c.jpg?v=1677146079"-->
                        <!--            alt="Extra 1">-->
                        <!--        <h5>Extra 1</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://ramrajcotton.in/cdn/shop/products/1_fc2187ad-922f-4247-9e37-89737632e64c.jpg?v=1677146079"-->
                        <!--            alt="Extra 2">-->
                        <!--        <h5>Extra 2</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://ramrajcotton.in/cdn/shop/products/1_fc2187ad-922f-4247-9e37-89737632e64c.jpg?v=1677146079"-->
                        <!--            alt="Extra 3">-->
                        <!--        <h5>Extra 3</h5>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>

                    <!-- Menswear -->
                    <div class="product-wrapper">
                        <a href="/category/{{ urlencode(Crypt::encryptString('92')) }}" style="text-decoration:none;">
                            <div class="product">
                                <img src="{{ $kids3 }}"
                                    alt="Menswear">
                                <h5>Infants</h5>
                            </div>
                        </a>
                        <!--<div class="extra-products">-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 1">-->
                        <!--        <h5>Extra 1</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 2">-->
                        <!--        <h5>Extra 2</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 3">-->
                        <!--        <h5>Extra 3</h5>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                    
                    <div class="product-wrapper">
                        <a href="/category/{{ urlencode(Crypt::encryptString('93')) }}" style="text-decoration:none;">
                            <div class="product">
                                <img src="{{ $kids4 }}"
                                    alt="Menswear">
                                <h5>Kids Accessories</h5>
                            </div>
                        </a>
                        <!--<div class="extra-products">-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 1">-->
                        <!--        <h5>Extra 1</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 2">-->
                        <!--        <h5>Extra 2</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 3">-->
                        <!--        <h5>Extra 3</h5>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                    
                    <div class="product-wrapper">
                        <a href="/category/{{ urlencode(Crypt::encryptString('94')) }}" style="text-decoration:none;">
                            <div class="product">
                                <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Kids/Innerware.png"
                                    alt="Menswear">
                                <h5>Innerwear</h5>
                            </div>
                        </a>
                        <!--<div class="extra-products">-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 1">-->
                        <!--        <h5>Extra 1</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 2">-->
                        <!--        <h5>Extra 2</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 3">-->
                        <!--        <h5>Extra 3</h5>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
            </section>

            <!--<section id="kids"-->
            <!--    style="height:unset; background-image: none; background-repeat: none; background-size: none;">-->
                <!--<h5>Kids</h5>-->
            <!--    <div class="products">-->
                    <!-- Topwear -->
            <!--        <div class="product-wrapper">-->
            <!--            <div class="product ">-->
            <!--                <img src="https://images.bestsellerclothing.in/data/only/21-oct-2024/130543501_g0.jpg"-->
            <!--                    alt="Topwear">-->
            <!--                <h5>T-Shirt</h5>-->
            <!--            </div>-->
                        <!--<div class="extra-products">-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://www.botnia.in/cdn/shop/files/5_41b6d8fa-fa23-4550-97f2-5161b85abcbd.png?v=1695274048"-->
                        <!--            alt="Extra 1">-->
                        <!--        <h5>Extra 1</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://www.botnia.in/cdn/shop/files/5_41b6d8fa-fa23-4550-97f2-5161b85abcbd.png?v=1695274048"-->
                        <!--            alt="Extra 2">-->
                        <!--        <h5>Extra 2</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://www.botnia.in/cdn/shop/files/5_41b6d8fa-fa23-4550-97f2-5161b85abcbd.png?v=1695274048"-->
                        <!--            alt="Extra 3">-->
                        <!--        <h5>Extra 3</h5>-->
                        <!--    </div>-->
                        <!--</div>-->
            <!--        </div>-->

                    <!-- Bottomwear -->
            <!--        <div class="product-wrapper">-->
            <!--            <div class="product">-->
            <!--                <img src="https://images.bestsellerclothing.in/data/only/21-oct-2024/130543501_g0.jpg"-->
            <!--                    alt="Bottomwear">-->
            <!--                <h5>Shirt</h5>-->
            <!--            </div>-->
                        <!--<div class="extra-products">-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSo6BwptVmQ776VMueRkmI7GhTUDgRq5adaJA&s"-->
                        <!--            alt="Extra 1">-->
                        <!--        <h5>Extra 1</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://levi.in/cdn/shop/files/817910059_01_Front_3bd1cd3d-2059-45da-9a67-bcd06c22030f.jpg?v=1698322814"-->
                        <!--            alt="Extra 2">-->
                        <!--        <h5>Extra 2</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://vilanapparels.com/cdn/shop/products/0W2A8704.jpg?v=1692488152&width=1946"-->
                        <!--            alt="Extra 3">-->
                        <!--        <h5>Extra 3</h5>-->
                        <!--    </div>-->
                        <!--</div>-->
            <!--        </div>-->

                    <!-- Kidswear -->
            <!--        <div class="product-wrapper">-->
            <!--            <div class="product">-->
            <!--                <img src="https://images.bestsellerclothing.in/data/only/21-oct-2024/130543501_g0.jpg"-->
            <!--                    alt="Kidswear">-->
            <!--                <h5>Hoodie</h5>-->
            <!--            </div>-->
                        <!--<div class="extra-products">-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://ramrajcotton.in/cdn/shop/products/1_fc2187ad-922f-4247-9e37-89737632e64c.jpg?v=1677146079"-->
                        <!--            alt="Extra 1">-->
                        <!--        <h5>Extra 1</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://ramrajcotton.in/cdn/shop/products/1_fc2187ad-922f-4247-9e37-89737632e64c.jpg?v=1677146079"-->
                        <!--            alt="Extra 2">-->
                        <!--        <h5>Extra 2</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://ramrajcotton.in/cdn/shop/products/1_fc2187ad-922f-4247-9e37-89737632e64c.jpg?v=1677146079"-->
                        <!--            alt="Extra 3">-->
                        <!--        <h5>Extra 3</h5>-->
                        <!--    </div>-->
                        <!--</div>-->
            <!--        </div>-->

                    <!-- Menswear -->
            <!--        <div class="product-wrapper">-->
            <!--            <div class="product">-->
            <!--                <img src="https://images.bestsellerclothing.in/data/only/21-oct-2024/130543501_g0.jpg"-->
            <!--                    alt="Menswear">-->
            <!--                <h5>Sweatshirt</h5>-->
            <!--            </div>-->
                        <!--<div class="extra-products">-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 1">-->
                        <!--        <h5>Extra 1</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 2">-->
                        <!--        <h5>Extra 2</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 3">-->
                        <!--        <h5>Extra 3</h5>-->
                        <!--    </div>-->
                        <!--</div>-->
            <!--        </div>-->
                    
            <!--        <div class="product-wrapper">-->
            <!--            <div class="product">-->
            <!--                <img src="https://images.bestsellerclothing.in/data/only/21-oct-2024/130543501_g0.jpg"-->
            <!--                    alt="Menswear">-->
            <!--                <h5>Jeans</h5>-->
            <!--            </div>-->
                        <!--<div class="extra-products">-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 1">-->
                        <!--        <h5>Extra 1</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 2">-->
                        <!--        <h5>Extra 2</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 3">-->
                        <!--        <h5>Extra 3</h5>-->
                        <!--    </div>-->
                        <!--</div>-->
            <!--        </div>-->
            <!--        <div class="product-wrapper">-->
            <!--            <div class="product">-->
            <!--                <img src="https://images.bestsellerclothing.in/data/only/21-oct-2024/130543501_g0.jpg"-->
            <!--                    alt="Menswear">-->
            <!--                <h5>Cargo</h5>-->
            <!--            </div>-->
                        <!--<div class="extra-products">-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 1">-->
                        <!--        <h5>Extra 1</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 2">-->
                        <!--        <h5>Extra 2</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 3">-->
                        <!--        <h5>Extra 3</h5>-->
                        <!--    </div>-->
                        <!--</div>-->
            <!--        </div>-->
                    
            <!--        <div class="product-wrapper">-->
            <!--            <div class="product">-->
            <!--                <img src="https://images.bestsellerclothing.in/data/only/21-oct-2024/130543501_g0.jpg"-->
            <!--                    alt="Menswear">-->
            <!--                <h5>Trousers</h5>-->
            <!--            </div>-->
                        <!--<div class="extra-products">-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 1">-->
                        <!--        <h5>Extra 1</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 2">-->
                        <!--        <h5>Extra 2</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 3">-->
                        <!--        <h5>Extra 3</h5>-->
                        <!--    </div>-->
                        <!--</div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</section>-->

            <!--<section id="home-kitchen"-->
            <!--    style="height:unset; background-image: none; background-repeat: none; background-size: none;">-->
                <!--<h5>Home Kitchen</h5>-->
            <!--    <div class="products">-->
                    <!-- Topwear -->
            <!--        <div class="product-wrapper">-->
            <!--            <div class="product ">-->
            <!--                <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Plus+Size+All/Plus+Tees.jpg"-->
            <!--                    alt="Topwear">-->
            <!--                <h5>Men</h5>-->
            <!--            </div>-->
                        <!--<div class="extra-products">-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://www.botnia.in/cdn/shop/files/5_41b6d8fa-fa23-4550-97f2-5161b85abcbd.png?v=1695274048"-->
                        <!--            alt="Extra 1">-->
                        <!--        <h5>Extra 1</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://www.botnia.in/cdn/shop/files/5_41b6d8fa-fa23-4550-97f2-5161b85abcbd.png?v=1695274048"-->
                        <!--            alt="Extra 2">-->
                        <!--        <h5>Extra 2</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://www.botnia.in/cdn/shop/files/5_41b6d8fa-fa23-4550-97f2-5161b85abcbd.png?v=1695274048"-->
                        <!--            alt="Extra 3">-->
                        <!--        <h5>Extra 3</h5>-->
                        <!--    </div>-->
                        <!--</div>-->
            <!--        </div>-->

                    <!-- Bottomwear -->
            <!--        <div class="product-wrapper">-->
            <!--            <div class="product">-->
            <!--                <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Explore/Plus+Size+All/Plus+Cargo.jpg"-->
            <!--                    alt="Bottomwear">-->
            <!--                <h5>Women</h5>-->
            <!--            </div>-->
                        <!--<div class="extra-products">-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSo6BwptVmQ776VMueRkmI7GhTUDgRq5adaJA&s"-->
                        <!--            alt="Extra 1">-->
                        <!--        <h5>Extra 1</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://levi.in/cdn/shop/files/817910059_01_Front_3bd1cd3d-2059-45da-9a67-bcd06c22030f.jpg?v=1698322814"-->
                        <!--            alt="Extra 2">-->
                        <!--        <h5>Extra 2</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://vilanapparels.com/cdn/shop/products/0W2A8704.jpg?v=1692488152&width=1946"-->
                        <!--            alt="Extra 3">-->
                        <!--        <h5>Extra 3</h5>-->
                        <!--    </div>-->
                        <!--</div>-->
            <!--        </div>-->

                    
            <!--    </div>-->
            <!--</section>-->

            <!--<section id="beauty-health"-->
            <!--    style="height:unset; background-image: none; background-repeat: none; background-size: none;">-->
                <!--<h5>Beauty & Health</h5>-->
            <!--    <div class="products">-->
                    <!-- Topwear -->
            <!--        <div class="product-wrapper">-->
            <!--            <div class="product ">-->
            <!--                <img src="https://images.bestsellerclothing.in/data/only/21-oct-2024/130543501_g0.jpg"-->
            <!--                    alt="Topwear">-->
            <!--                <h5>40% Off</h5>-->
            <!--            </div>-->
                        <!--<div class="extra-products">-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://www.botnia.in/cdn/shop/files/5_41b6d8fa-fa23-4550-97f2-5161b85abcbd.png?v=1695274048"-->
                        <!--            alt="Extra 1">-->
                        <!--        <h5>Extra 1</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://www.botnia.in/cdn/shop/files/5_41b6d8fa-fa23-4550-97f2-5161b85abcbd.png?v=1695274048"-->
                        <!--            alt="Extra 2">-->
                        <!--        <h5>Extra 2</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://www.botnia.in/cdn/shop/files/5_41b6d8fa-fa23-4550-97f2-5161b85abcbd.png?v=1695274048"-->
                        <!--            alt="Extra 3">-->
                        <!--        <h5>Extra 3</h5>-->
                        <!--    </div>-->
                        <!--</div>-->
            <!--        </div>-->

                    <!-- Bottomwear -->
            <!--        <div class="product-wrapper">-->
            <!--            <div class="product">-->
            <!--                <img src="https://images.bestsellerclothing.in/data/only/21-oct-2024/130543501_g0.jpg"-->
            <!--                    alt="Bottomwear">-->
            <!--                <h5>50% Off</h5>-->
            <!--            </div>-->
                        <!--<div class="extra-products">-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSo6BwptVmQ776VMueRkmI7GhTUDgRq5adaJA&s"-->
                        <!--            alt="Extra 1">-->
                        <!--        <h5>Extra 1</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://levi.in/cdn/shop/files/817910059_01_Front_3bd1cd3d-2059-45da-9a67-bcd06c22030f.jpg?v=1698322814"-->
                        <!--            alt="Extra 2">-->
                        <!--        <h5>Extra 2</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://vilanapparels.com/cdn/shop/products/0W2A8704.jpg?v=1692488152&width=1946"-->
                        <!--            alt="Extra 3">-->
                        <!--        <h5>Extra 3</h5>-->
                        <!--    </div>-->
                        <!--</div>-->
            <!--        </div>-->

                    <!-- Kidswear -->
            <!--        <div class="product-wrapper">-->
            <!--            <div class="product">-->
            <!--                <img src="https://images.bestsellerclothing.in/data/only/21-oct-2024/130543501_g0.jpg"-->
            <!--                    alt="Kidswear">-->
            <!--                <h5>60% Off</h5>-->
            <!--            </div>-->
                        <!--<div class="extra-products">-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://ramrajcotton.in/cdn/shop/products/1_fc2187ad-922f-4247-9e37-89737632e64c.jpg?v=1677146079"-->
                        <!--            alt="Extra 1">-->
                        <!--        <h5>Extra 1</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://ramrajcotton.in/cdn/shop/products/1_fc2187ad-922f-4247-9e37-89737632e64c.jpg?v=1677146079"-->
                        <!--            alt="Extra 2">-->
                        <!--        <h5>Extra 2</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://ramrajcotton.in/cdn/shop/products/1_fc2187ad-922f-4247-9e37-89737632e64c.jpg?v=1677146079"-->
                        <!--            alt="Extra 3">-->
                        <!--        <h5>Extra 3</h5>-->
                        <!--    </div>-->
                        <!--</div>-->
            <!--        </div>-->

                    <!-- Menswear -->
            <!--        <div class="product-wrapper">-->
            <!--            <div class="product">-->
            <!--                <img src="https://images.bestsellerclothing.in/data/only/21-oct-2024/130543501_g0.jpg"-->
            <!--                    alt="Menswear">-->
            <!--                <h5>70% Off and more</h5>-->
            <!--            </div>-->
                        <!--<div class="extra-products">-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 1">-->
                        <!--        <h5>Extra 1</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 2">-->
                        <!--        <h5>Extra 2</h5>-->
                        <!--    </div>-->
                        <!--    <div class="product">-->
                        <!--        <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
                        <!--            alt="Extra 3">-->
                        <!--        <h5>Extra 3</h5>-->
                        <!--    </div>-->
                        <!--</div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</section>-->

            <!--<section id="electronics"-->
            <!--    style="height:unset; background-image: none; background-repeat: none; background-size: none;">-->
            <!--    <h5>Electronics</h5>-->
            <!--    <div class="products">-->
                    <!-- Topwear -->
            <!--        <div class="product-wrapper">-->
            <!--            <div class="product ">-->
            <!--                <img src="https://images.bestsellerclothing.in/data/only/21-oct-2024/130543501_g0.jpg"-->
            <!--                    alt="Topwear">-->
            <!--                <h5>Topwear</h5>-->
            <!--            </div>-->
            <!--            <div class="extra-products">-->
            <!--                <div class="product">-->
            <!--                    <img src="https://www.botnia.in/cdn/shop/files/5_41b6d8fa-fa23-4550-97f2-5161b85abcbd.png?v=1695274048"-->
            <!--                        alt="Extra 1">-->
            <!--                    <h5>Extra 1</h5>-->
            <!--                </div>-->
            <!--                <div class="product">-->
            <!--                    <img src="https://www.botnia.in/cdn/shop/files/5_41b6d8fa-fa23-4550-97f2-5161b85abcbd.png?v=1695274048"-->
            <!--                        alt="Extra 2">-->
            <!--                    <h5>Extra 2</h5>-->
            <!--                </div>-->
            <!--                <div class="product">-->
            <!--                    <img src="https://www.botnia.in/cdn/shop/files/5_41b6d8fa-fa23-4550-97f2-5161b85abcbd.png?v=1695274048"-->
            <!--                        alt="Extra 3">-->
            <!--                    <h5>Extra 3</h5>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->

                    <!-- Bottomwear -->
            <!--        <div class="product-wrapper">-->
            <!--            <div class="product">-->
            <!--                <img src="https://images.bestsellerclothing.in/data/only/21-oct-2024/130543501_g0.jpg"-->
            <!--                    alt="Bottomwear">-->
            <!--                <h5>Bottomwear</h5>-->
            <!--            </div>-->
            <!--            <div class="extra-products">-->
            <!--                <div class="product">-->
            <!--                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSo6BwptVmQ776VMueRkmI7GhTUDgRq5adaJA&s"-->
            <!--                        alt="Extra 1">-->
            <!--                    <h5>Extra 1</h5>-->
            <!--                </div>-->
            <!--                <div class="product">-->
            <!--                    <img src="https://levi.in/cdn/shop/files/817910059_01_Front_3bd1cd3d-2059-45da-9a67-bcd06c22030f.jpg?v=1698322814"-->
            <!--                        alt="Extra 2">-->
            <!--                    <h5>Extra 2</h5>-->
            <!--                </div>-->
            <!--                <div class="product">-->
            <!--                    <img src="https://vilanapparels.com/cdn/shop/products/0W2A8704.jpg?v=1692488152&width=1946"-->
            <!--                        alt="Extra 3">-->
            <!--                    <h5>Extra 3</h5>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->

                    <!-- Kidswear -->
            <!--        <div class="product-wrapper">-->
            <!--            <div class="product">-->
            <!--                <img src="https://images.bestsellerclothing.in/data/only/21-oct-2024/130543501_g0.jpg"-->
            <!--                    alt="Kidswear">-->
            <!--                <h5>Kidswear</h5>-->
            <!--            </div>-->
            <!--            <div class="extra-products">-->
            <!--                <div class="product">-->
            <!--                    <img src="https://ramrajcotton.in/cdn/shop/products/1_fc2187ad-922f-4247-9e37-89737632e64c.jpg?v=1677146079"-->
            <!--                        alt="Extra 1">-->
            <!--                    <h5>Extra 1</h5>-->
            <!--                </div>-->
            <!--                <div class="product">-->
            <!--                    <img src="https://ramrajcotton.in/cdn/shop/products/1_fc2187ad-922f-4247-9e37-89737632e64c.jpg?v=1677146079"-->
            <!--                        alt="Extra 2">-->
            <!--                    <h5>Extra 2</h5>-->
            <!--                </div>-->
            <!--                <div class="product">-->
            <!--                    <img src="https://ramrajcotton.in/cdn/shop/products/1_fc2187ad-922f-4247-9e37-89737632e64c.jpg?v=1677146079"-->
            <!--                        alt="Extra 3">-->
            <!--                    <h5>Extra 3</h5>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->

                    <!-- Menswear -->
            <!--        <div class="product-wrapper">-->
            <!--            <div class="product">-->
            <!--                <img src="https://images.bestsellerclothing.in/data/only/21-oct-2024/130543501_g0.jpg"-->
            <!--                    alt="Menswear">-->
            <!--                <h5>Menswear</h5>-->
            <!--            </div>-->
            <!--            <div class="extra-products">-->
            <!--                <div class="product">-->
            <!--                    <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
            <!--                        alt="Extra 1">-->
            <!--                    <h5>Extra 1</h5>-->
            <!--                </div>-->
            <!--                <div class="product">-->
            <!--                    <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
            <!--                        alt="Extra 2">-->
            <!--                    <h5>Extra 2</h5>-->
            <!--                </div>-->
            <!--                <div class="product">-->
            <!--                    <img src="https://m.media-amazon.com/images/I/718phluzAFL._AC_UY1100_.jpg"-->
            <!--                        alt="Extra 3">-->
            <!--                    <h5>Extra 3</h5>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</section>-->





        </div>
    </div>

    <script>
        // Select all sections and sidebar links
        const sections = document.querySelectorAll("section");
        const sidebarLinks = document.querySelectorAll(".sidebar ul li a");

        // Function to set the active class
        const setActiveLink = (activeSectionId) => {
            // Remove the active class from all sidebar links
            sidebarLinks.forEach(link => link.classList.remove("active"));

            // Add the active class to the corresponding link
            const activeLink = document.querySelector(`.sidebar a[href="#${activeSectionId}"]`);
            if (activeLink) {
                activeLink.classList.add("active");
            }
        };

        // Function to apply animations to products in a section
        const applyProductAnimations = (section) => {
            const products = section.querySelectorAll(".product-wrapper");

            products.forEach((product, index) => {
                // Remove animation classes
                product.classList.remove("product-left", "product-right");

                // Force reflow to restart animation
                void product.offsetWidth;

                // Add animation classes back
                if (index % 2 === 0) {
                    product.classList.add("product-left");
                } else {
                    product.classList.add("product-right");
                }
            });
        };


        // Intersection Observer configuration
        const observerOptions = {
            root: null, // Use the viewport as the root
            threshold: 0.9 // Trigger when at least 50% of the section is in view
        };

        const observerCallback = (entries) => {
            let activeSection = null;

            // Loop through each observed section
            entries.forEach(entry => {
                const products = entry.target.querySelectorAll(".product");

                if (entry.isIntersecting) {
                    activeSection = entry.target.id;

                    // Apply the animation classes to the products if not already added
                    applyProductAnimations(entry.target);
                } else {
                    // If the section is no longer visible, remove the animation classes
                    products.forEach((product) => {
                        product.classList.remove("product-left", "product-right");
                    });
                }
            });

            // If a section is visible, update the active link (only if it's in view)
            if (activeSection) {
                setActiveLink(activeSection);
            }
        };

        const observer = new IntersectionObserver(observerCallback, observerOptions);

        // Observe each section
        sections.forEach(section => observer.observe(section));

        // Ensure the first section is active by default
        setActiveLink(sections[0].id);

        // Smooth scrolling for sidebar links
        sidebarLinks.forEach(link => {
            link.addEventListener("click", (e) => {
                e.preventDefault();
                const targetId = link.getAttribute("href").substring(1);
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    // Scroll to the target section
                    targetElement.scrollIntoView({ behavior: "smooth" });

                    // Apply animation to the target section's products
                    applyProductAnimations(targetElement);

                    // Update the active class to the clicked link
                    setActiveLink(targetId);
                }
            });
        });

    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
    let activeProductWrapper = null;
    let activeExtraContainer = null;

    function setupSection(sectionId) {
        const section = document.querySelector(sectionId);
        if (!section) return;

        const productsContainer = section.querySelector(".products");
        const allWrappers = Array.from(section.querySelectorAll(".product-wrapper"));
        const productsPerRow = 2; 
        const extraProductsPerRow = 3; 

        let extraProductsContainers = [];

        for (let i = 0; i < allWrappers.length; i += productsPerRow) {
            let extraProductsContainer = document.createElement("div");
            extraProductsContainer.classList.add("extra-products-container", "show-products");
            extraProductsContainer.style.display = "none";
            extraProductsContainer.style.gridTemplateColumns = `repeat(${extraProductsPerRow}, 1fr)`;
            extraProductsContainer.style.width = "100%";
            extraProductsContainer.style.gap = "6px"; 
            extraProductsContainer.style.minHeight = "150px"; 
            productsContainer.insertBefore(extraProductsContainer, allWrappers[i + productsPerRow] || null);
            extraProductsContainers.push(extraProductsContainer);
        }

        allWrappers.forEach((wrapper, index) => {
            let mainProduct = wrapper.querySelector(".product");
            let extraProductsElement = wrapper.querySelector(".extra-products");
            let extraProductsContent = extraProductsElement ? extraProductsElement.innerHTML.trim() : "";

            mainProduct.addEventListener("click", function () {
                let rowIndex = Math.floor(index / productsPerRow);
                let targetContainer = extraProductsContainers[rowIndex];

                if (!extraProductsContent) {
                    mainProduct.style.transform = "scale(1)"; 
                    return;
                }

                if (activeExtraContainer && activeExtraContainer !== targetContainer) {
                    activeExtraContainer.classList.remove("showw");
                    activeExtraContainer.style.display = "none";
                }

                if (activeProductWrapper === wrapper) {
                    targetContainer.classList.remove("showw");
                    setTimeout(() => {
                        targetContainer.style.display = "none";
                    }, 300);
                    mainProduct.classList.remove("active");
                    mainProduct.style.transform = "scale(1)"; 
                    activeProductWrapper = null;
                    activeExtraContainer = null;
                    return;
                }

                document.querySelectorAll(".product.active").forEach(prod => {
                    prod.classList.remove("active");
                    // prod.style.transform = "scale(1)"; 
                });

                targetContainer.innerHTML = extraProductsContent;
                targetContainer.style.display = "grid";
                targetContainer.style.minHeight = "150px"; 
                mainProduct.classList.add("active");
                mainProduct.style.transform = "scale(1.05)"; 

                setTimeout(() => {
                    targetContainer.classList.add("showw");
                }, 10);

                activeProductWrapper = wrapper;
                activeExtraContainer = targetContainer;
            });
        });
    }

    setupSection("#women-ethnic");
    setupSection("#women-western");
    setupSection("#men");
    setupSection("#kids");
    setupSection("#home-kitchen");
});














    </script>


@endsection
