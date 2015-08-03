<?php

use common\models\Kategori;
use common\models\Pengaturan;
use common\models\Url;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Breadcrumbs;

/* @var $this View */
/* @var $content string */

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        
        <link href='http://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700%7CDancing+Script%7CMontserrat:400,700%7CMerriweather:400,300italic%7CLato:400,700,900' rel='stylesheet' type='text/css' />
        <!--[if IE 9]>
            <link href="css/ie9.css" rel="stylesheet" type="text/css" />
        <![endif]-->
    </head>
    <body class="style-2">
        <?php $this->beginBody() ?>

        <!-- LOADER -->
        <div id="loader-wrapper">
            <div class="bubbles">
                <div class="title">loading</div>
                <span></span>
                <span id="bubble2"></span>
                <span id="bubble3"></span>
            </div>
        </div>

        <div id="content-block">

            <div class="content-center fixed-header-margin">
                <!-- HEADER -->
                <div class="header-wrapper style-2">
                    <header class="type-1">
                        <div class="header-top">
                            <div class="header-top-entry">
                                <div class="title"><?php echo Html::img(["theme/img/flag-lang-2.png"]); ?>Indonesia<i class="fa fa-caret-down"></i></div>
                                <div class="list">
                                    <a href="#" class="list-entry"><?php echo Html::img(["theme/img/flag-lang-1.png"]); ?>English</a>
                                    <a href="#" class="list-entry"><?php echo Html::img(["theme/img/flag-lang-2.png"]); ?>Indonesia</a>
                                </div>
                            </div>
                            <div class="header-top-entry">
                                <div class="title"><b>Currency:</b> $ USD<i class="fa fa-caret-down"></i></div>
                                <div class="list">
                                    <a href="#" class="list-entry">$ CAD</a>
                                    <a href="#" class="list-entry">&#8364; EUR</a>
                                </div>
                            </div>
                            <div class="header-top-entry hidden-xs">
                                <div class="title"><i class="fa fa-phone"></i>Any question? Call Us <a href="tel:+987123654"><b>+987 123 654</b></a></div>
                            </div>
                            <div class="socials-box">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="menu-button responsive-menu-toggle-class"><i class="fa fa-reorder"></i></div>
                            <div class="clear"></div>
                        </div>

                        <div class="header-middle">
                            <div class="logo-wrapper">
                                <a id="logo" href="<?= \yii\helpers\Url::to(["/"]) ?>">
                                    <?php echo Html::img(["images/logo.png"]); ?>
                                </a>
                            </div>

                            <div class="middle-entry">
                                <a class="icon-entry" href="#">
                                    <span class="image">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                    <span class="text">
                                        <b>Contact Info</b> <br/> (+48) 500 700 600
                                    </span>
                                </a>
                                <a class="icon-entry" href="#">
                                    <span class="image">
                                        <i class="fa fa-car"></i>
                                    </span>
                                    <span class="text">
                                        <b>Free Shipping</b> <br/> on order over $200
                                    </span>
                                </a>
                            </div>

                            <div class="right-entries">
                                <a class="header-functionality-entry open-search-popup" href="#"><i class="fa fa-search"></i><span>Search</span></a>
                                <a class="header-functionality-entry" href="#"><i class="fa fa-copy"></i><span>Compare</span></a>
                                <a class="header-functionality-entry" href="#"><i class="fa fa-heart-o"></i><span>Wishlist</span></a>
                                <a class="header-functionality-entry open-cart-popup" href="#"><i class="fa fa-shopping-cart"></i><span>My Cart</span> <b>$255,99</b></a>
                            </div>

                        </div>

                        <div class="close-header-layer"></div>
                        <div class="navigation">
                            <div class="navigation-header responsive-menu-toggle-class">
                                <div class="title">Navigation</div>
                                <div class="close-menu"></div>
                            </div>
                            <div class="nav-overflow">
                                <div class="sidebar-navigation-title">Kategori</div>
                                <div class="navigation-search-content">
                                    <div class="toggle-desktop-menu"><i class="fa fa-bars"></i><i class="fa fa-close"></i>menu</div>
                                    <div class="search-box size-1">
                                        <form>
                                            <div class="search-button">
                                                <i class="fa fa-search"></i>
                                                <input type="submit" />
                                            </div>
                                            <div class="search-drop-down">
                                                <div class="title"><span>Semua Kategori</span><i class="fa fa-angle-down"></i></div>
                                                <div class="list">
                                                    <div class="overflow">
                                                        <div class="category-entry">Semua Kategori</div>
                                                        <?php
                                                        foreach(Kategori::find()->where(["parent_id"=>0])->all() as $kategori){
                                                            $url = Url::find()->where(["jenis"=>"k", "data_id"=>$kategori->id])->one();
                                                        ?>
                                                        <div class="category-entry"><?php echo $kategori->nama ?></div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="search-field">
                                                <input type="text" value="" placeholder="Search for product" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <nav>
                                    <ul>
                                        <li class="full-width">
                                            <a href="#" class="active">Home</a><i class="fa fa-chevron-down"></i>
                                            <div class="submenu">
                                                <div class="full-width-menu-items-right">
                                                    <div class="menu-slider-arrows">
                                                        <a class="left"><i class="fa fa-chevron-left"></i></a>
                                                        <a class="right"><i class="fa fa-chevron-right"></i></a>
                                                    </div>
                                                    <div class="submenu-list-title"><a href="#">Reccomended Products</a><span class="toggle-list-button"></span></div>
                                                    <div class="menu-slider-out">
                                                        <div class="menu-slider-in">
                                                            <div class="menu-slider-entry">
                                                                <div class="product-slide-entry">
                                                                    <div class="product-image">
                                                                        <img src="img/product-minimal-1.jpg" alt="" />
                                                                        <div class="bottom-line left-attached">
                                                                            <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-expand"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#" class="title">1.Pullover Batwing Sleeve Zigzag</a>
                                                                    <div class="price">
                                                                        <div class="prev">$199,99</div>
                                                                        <div class="current">$119,99</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="menu-slider-entry">
                                                                <div class="product-slide-entry">
                                                                    <div class="product-image">
                                                                        <img src="img/product-minimal-2.jpg" alt="" />
                                                                        <div class="bottom-line left-attached">
                                                                            <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-expand"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#" class="title">2.Pullover Batwing Sleeve Zigzag</a>
                                                                    <div class="price">
                                                                        <div class="prev">$199,99</div>
                                                                        <div class="current">$119,99</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="menu-slider-entry">
                                                                <div class="product-slide-entry">
                                                                    <div class="product-image">
                                                                        <img src="img/product-minimal-3.jpg" alt="" />
                                                                        <div class="bottom-line left-attached">
                                                                            <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-expand"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#" class="title">3.Pullover Batwing Sleeve Zigzag</a>
                                                                    <div class="price">
                                                                        <div class="prev">$199,99</div>
                                                                        <div class="current">$119,99</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="menu-slider-entry">
                                                                <div class="product-slide-entry">
                                                                    <div class="product-image">
                                                                        <img src="img/product-minimal-4.jpg" alt="" />
                                                                        <div class="bottom-line left-attached">
                                                                            <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-expand"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#" class="title">4.Pullover Batwing Sleeve Zigzag</a>
                                                                    <div class="price">
                                                                        <div class="prev">$199,99</div>
                                                                        <div class="current">$119,99</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="menu-slider-entry">
                                                                <div class="product-slide-entry">
                                                                    <div class="product-image">
                                                                        <img src="img/product-minimal-5.jpg" alt="" />
                                                                        <div class="bottom-line left-attached">
                                                                            <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-expand"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#" class="title">5.Pullover Batwing Sleeve Zigzag</a>
                                                                    <div class="price">
                                                                        <div class="prev">$199,99</div>
                                                                        <div class="current">$119,99</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="full-width-menu-items-left">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="submenu-list-title"><a href="index-wide.html">Homepages <span class="menu-label blue">new</span></a><span class="toggle-list-button"></span></div>
                                                            <ul class="list-type-1 toggle-list-container">
                                                                <li><a href="index-wide.html"><i class="fa fa-angle-right"></i>Mango - Wide Header</a></li>
                                                                <li><a href="index-electronic.html"><i class="fa fa-angle-right"></i>Mango - Electronic</a></li>
                                                                <li><a href="index-everything.html"><i class="fa fa-angle-right"></i>Mango - Everything</a></li>
                                                                <li><a href="index-fullwidthheader.html"><i class="fa fa-angle-right"></i>Mango - Fullwidth Header</a></li>
                                                                <li><a href="index-food.html"><i class="fa fa-angle-right"></i>Mango - Food</a></li>
                                                                <li><a href="index-underwear.html"><i class="fa fa-angle-right"></i>Mango - Underwear</a></li>
                                                                <li><a href="index-bags.html"><i class="fa fa-angle-right"></i>Mango - Bags</a></li>
                                                                <li><a href="index-fullwidth-noslider.html"><i class="fa fa-angle-right"></i>Mango - Fullwidth No Slider</a></li>
                                                                <li><a href="index-lookbook.html"><i class="fa fa-angle-right"></i>Mango - Lookbook</a></li>
                                                                <li><a href="index-wine-left.html"><i class="fa fa-angle-right"></i>Mango - Wine</a></li>
                                                                <li><a href="index-fullwidth.html"><i class="fa fa-angle-right"></i>Mango - Fullwidth</a></li>
                                                                <li><a href="index-fullwidth-left.html"><i class="fa fa-angle-right"></i>Mango - Fullwidth Left Sidebar</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="submenu-list-title"><a href="index-wide.html">Homepages <span class="menu-label blue">new</span></a><span class="toggle-list-button"></span></div>
                                                            <ul class="list-type-1 toggle-list-container">
                                                                <li><a href="index-parallax.html"><i class="fa fa-angle-right"></i>Mango - Parallax</a></li>
                                                                <li><a href="index-grid.html"><i class="fa fa-angle-right"></i>Mango - Grid Light</a></li>
                                                                <li><a href="index-leftsidebar.html"><i class="fa fa-angle-right"></i>Mango - Grid Left Sidebar</a></li>
                                                                <li><a href="index-minimal.html"><i class="fa fa-angle-right"></i>Mango - Minimal</a></li>
                                                                <li><a href="index-toys.html"><i class="fa fa-angle-right"></i>Mango - Toys</a></li>
                                                                <li><a href="index-furniture.html"><i class="fa fa-angle-right"></i>Mango - Furniture</a></li>
                                                                <li><a href="index-jewellery.html"><i class="fa fa-angle-right"></i>Mango - Jewellery</a></li>
                                                                <li><a href="index-mini.html"><i class="fa fa-angle-right"></i>Mango - Mini</a></li>
                                                                <li><a href="index-presentation.html"><i class="fa fa-angle-right"></i>Mango - Presentation</a></li>
                                                                <li><a href="index-parallax-fullwidth.html"><i class="fa fa-angle-right"></i>Mango - Parallax Fullwidth</a></li>
                                                                <li><a href="index-parallax-boxed.html"><i class="fa fa-angle-right"></i>Mango - Parallax Boxed</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="submenu-links-line">
                                                    <div class="submenu-links-line-container">
                                                        <div class="cell-view">
                                                            <div class="line-links"><b>Quicklinks:</b>  <a href="#">Blazers</a>, <a href="#">Jackets</a>, <a href="#">Shoes</a>, <a href="#">Bags</a>, <a href="#">Special offers</a>, <a href="#">Sales and discounts</a></div>
                                                        </div>
                                                        <div class="cell-view">
                                                            <div class="red-message"><b>-20% sale only this week. Don’t miss buy something!</b></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="full-width-columns">
                                            <a href="#">Pages</a><i class="fa fa-chevron-down"></i>
                                            <div class="submenu">
                                                <div class="product-column-entry">
                                                    <div class="image"><img alt="" src="img/product-menu-2.jpg"></div>
                                                    <div class="submenu-list-title"><a href="contact.html">Contact Us</a><span class="toggle-list-button"></span></div>
                                                    <div class="description toggle-list-container">
                                                        <ul class="list-type-1">
                                                            <li><a href="contact.html"><i class="fa fa-angle-right"></i>Contact Us 1</a></li>
                                                            <li><a href="contact-2.html"><i class="fa fa-angle-right"></i>Contact Us 2</a></li>
                                                            <li><a href="contact-3.html"><i class="fa fa-angle-right"></i>Contact Us 3</a></li>
                                                            <li><a href="contact-4.html"><i class="fa fa-angle-right"></i>Contact Us 4</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="hot-mark">hot</div>
                                                </div>
                                                <div class="product-column-entry">
                                                    <div class="image"><img alt="" src="img/product-menu-4.jpg"></div>
                                                    <div class="submenu-list-title"><a href="about-1.html">About Us</a><span class="toggle-list-button"></span></div>
                                                    <div class="description toggle-list-container">
                                                        <ul class="list-type-1">
                                                            <li><a href="about-1.html"><i class="fa fa-angle-right"></i>About Us Fullwidth 1</a></li>
                                                            <li><a href="about-2.html"><i class="fa fa-angle-right"></i>About Us Fullwidth 2</a></li>
                                                            <li><a href="about-3.html"><i class="fa fa-angle-right"></i>About Us Fullwidth 3</a></li>
                                                            <li><a href="about-4.html"><i class="fa fa-angle-right"></i>About Us Sidebar 1</a></li>
                                                            <li><a href="about-5.html"><i class="fa fa-angle-right"></i>About Us Sidebar 2</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="hot-mark yellow">sale</div>
                                                </div>
                                                <div class="product-column-entry">
                                                    <div class="image"><img alt="" src="img/product-menu-3.jpg"></div>
                                                    <div class="submenu-list-title"><a href="cart.html">Cart</a><span class="toggle-list-button"></span></div>
                                                    <div class="description toggle-list-container">
                                                        <ul class="list-type-1">
                                                            <li><a href="cart.html"><i class="fa fa-angle-right"></i>Cart</a></li>
                                                            <li><a href="cart-traditional.html"><i class="fa fa-angle-right"></i>Cart Traditional</a></li>
                                                            <li><a href="checkout.html"><i class="fa fa-angle-right"></i>Checkout</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-column-entry">
                                                    <div class="image"><img alt="" src="img/product-menu-5.jpg"></div>
                                                    <div class="submenu-list-title"><a href="teaser-background.html">Coming Soon</a><span class="toggle-list-button"></span></div>
                                                    <div class="description toggle-list-container">
                                                        <ul class="list-type-1">
                                                            <li><a href="teaser-background.html"><i class="fa fa-angle-right"></i>Coming Soon 1</a></li>
                                                            <li><a href="teaser-background-2.html"><i class="fa fa-angle-right"></i>Coming Soon 2</a></li>
                                                            <li><a href="teaser-simple.html"><i class="fa fa-angle-right"></i>Coming Soon 3</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="hot-mark">hot</div>
                                                </div>
                                                <div class="product-column-entry">
                                                    <div class="image"><img alt="" src="img/product-menu-2.jpg"></div>
                                                    <div class="submenu-list-title"><a href="shop.html">Products</a><span class="toggle-list-button"></span></div>
                                                    <div class="description toggle-list-container">
                                                        <ul class="list-type-1">
                                                            <li><a href="shop.html"><i class="fa fa-angle-right"></i>Shop</a></li>
                                                            <li><a href="product.html"><i class="fa fa-angle-right"></i>Product</a></li>
                                                            <li><a href="product-nosidebar.html"><i class="fa fa-angle-right"></i>No Sidebar</a></li>
                                                            <li><a href="product-tabnosidebar.html"><i class="fa fa-angle-right"></i>Tab No Sidebar</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="submenu-links-line">
                                                    <div class="submenu-links-line-container">
                                                        <div class="cell-view">
                                                            <div class="line-links"><b>Quicklinks:</b>  <a href="shop.html">Blazers</a>, <a href="shop.html">Jackets</a>, <a href="shop.html">Shoes</a>, <a href="shop.html">Bags</a>, <a href="shop.html">Special offers</a>, <a href="shop.html">Sales and discounts</a></div>
                                                        </div>
                                                        <div class="cell-view">
                                                            <div class="red-message"><b>-20% sale only this week. Don’t miss buy something!</b></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="simple-list">
                                            <a href="shop.html">Products</a><i class="fa fa-chevron-down"></i>
                                            <div class="submenu">
                                                <ul class="simple-menu-list-column">
                                                    <li><a href="shop.html"><i class="fa fa-angle-right"></i>Shop</a></li>
                                                    <li><a href="product.html"><i class="fa fa-angle-right"></i>Product</a></li>
                                                    <li><a href="product-nosidebar.html"><i class="fa fa-angle-right"></i>No Sidebar</a></li>
                                                    <li><a href="product-tabnosidebar.html"><i class="fa fa-angle-right"></i>Tab No Sidebar</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="column-1">
                                            <a href="portfolio-default.html">Portfolio</a><i class="fa fa-chevron-down"></i>
                                            <div class="submenu">
                                                <div class="full-width-menu-items-left">
                                                    <img class="submenu-background" src="img/product-menu-7.jpg" alt="" />
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="submenu-list-title"><a href="portfolio-default.html">Our Portfolio</a><span class="toggle-list-button"></span></div>
                                                            <ul class="list-type-1 toggle-list-container">
                                                                <li><a href="portfolio-default.html"><i class="fa fa-angle-right"></i>Portfolio Default</a></li>
                                                                <li><a href="portfolio-simple.html"><i class="fa fa-angle-right"></i>Portfolio Simple</a></li>
                                                                <li><a href="portfolio-custom.html"><i class="fa fa-angle-right"></i>Portfolio Custom</a></li>
                                                                <li><a href="portfolio-customfullwidth.html"><i class="fa fa-angle-right"></i>Fullwidth Custom</a></li>
                                                                <li><a href="portfolio-simplefullwidth.html"><i class="fa fa-angle-right"></i>Fullwidth Simple</a></li>
                                                                <li><a href="project-default.html"><i class="fa fa-angle-right"></i>Project Default</a></li>
                                                                <li><a href="project-fullwidth.html"><i class="fa fa-angle-right"></i>Project Fullwidth</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="submenu-links-line">
                                                    <div class="submenu-links-line-container">
                                                        <div class="cell-view">
                                                            <div class="line-links"><b>Quicklinks:</b>  <a href="shop.html">Blazers</a>, <a href="shop.html">Jackets</a>, <a href="shop.html">Shoes</a>, <a href="shop.html">Bags</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="column-1">
                                            <a href="blog.html">Blog</a><i class="fa fa-chevron-down"></i>
                                            <div class="submenu">
                                                <div class="full-width-menu-items-left">
                                                    <img class="submenu-background" src="img/product-menu-8.jpg" alt="" />
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="submenu-list-title"><a href="blog.html">Blog <span class="menu-label blue">new</span></a><span class="toggle-list-button"></span></div>
                                                            <ul class="list-type-1 toggle-list-container">
                                                                <li><a href="blog.html"><i class="fa fa-angle-right"></i>Blog Default</a></li>
                                                                <li><a href="blog-grid.html"><i class="fa fa-angle-right"></i>Blog Grid</a></li>
                                                                <li><a href="blog-timeline.html"><i class="fa fa-angle-right"></i>Blog Timeline</a></li>
                                                                <li><a href="blog-list.html"><i class="fa fa-angle-right"></i>Blog List</a></li>
                                                                <li><a href="blog-biggrid.html"><i class="fa fa-angle-right"></i>Blog Big Grid</a></li>
                                                                <li><a href="blog-detail.html"><i class="fa fa-angle-right"></i>Blog Detail</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="submenu-links-line">
                                                    <div class="submenu-links-line-container">
                                                        <div class="cell-view">
                                                            <div class="line-links"><b>Quicklinks:</b>  <a href="shop.html">Blazers</a>, <a href="shop.html">Jackets</a>, <a href="shop.html">Shoes</a>, <a href="shop.html">Bags</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="simple-list">
                                            <a>More</a><i class="fa fa-chevron-down"></i>
                                            <div class="submenu">
                                                <ul class="simple-menu-list-column">
                                                    <li><a href="login.html"><i class="fa fa-angle-right"></i>Login</a></li>
                                                    <li><a href="error.html"><i class="fa fa-angle-right"></i>Error</a></li>
                                                    <li><a href="faq.html"><i class="fa fa-angle-right"></i>Faq</a></li>
                                                    <li><a href="compare.html"><i class="fa fa-angle-right"></i>Compare</a></li>
                                                    <li><a href="wishlist.html"><i class="fa fa-angle-right"></i>Wishlist</a></li>
                                                    <li><a href="shortcodes.html"><i class="fa fa-angle-right"></i>Shortcodes</a></li>
                                                    <li><a href="elements-headers.html"><i class="fa fa-angle-right"></i>Elements - Headers</a></li>
                                                    <li><a href="elements-footers.html"><i class="fa fa-angle-right"></i>Elements - Footers</a></li>
                                                    <li><a href="elements-breadcrumbs.html"><i class="fa fa-angle-right"></i>Elements - Breadcrumbs</a></li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="fixed-header-visible">
                                            <a class="fixed-header-square-button open-cart-popup"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="fixed-header-square-button open-search-popup"><i class="fa fa-search"></i></a>
                                        </li>
                                    </ul>

                                    <div class="clear"></div>

                                    <a class="fixed-header-visible additional-header-logo"><?php echo Html::img(["images/logo.png"]); ?></a>
                                </nav>
                                <div class="navigation-footer responsive-menu-toggle-class">
                                    <div class="socials-box">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-youtube"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="navigation-copyright">Created by <a href="#">8theme</a>. All rights reserved</div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="clear"></div>
                </div>

                <div class="content-push">
                    
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                    
                    <?= Alert::widget() ?>
                    
                    <?= $content ?>
                    
                    <!-- FOOTER -->
                    <div class="footer-wrapper style-2">
                        <footer class="type-1">
                            <div class="footer-columns-entry">
                                <div class="row">
                                    <div class="col-md-3">
                                        <?php echo Html::img(["images/logo.png"], ["class"=>"footer-logo"]); ?>
                                        <div class="footer-description"></div>
                                        <div class="footer-address"><?php echo Pengaturan::getPengaturan("alamat") ?><br/>
                                            Phone: <?php echo Pengaturan::getPengaturan("no_telp") ?><br/>
                                            Email: <a href="mailto:<?php echo Pengaturan::getPengaturan("email") ?>"><?php echo Pengaturan::getPengaturan("email") ?></a><br/>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <h3 class="column-title">Our Services</h3>
                                        <ul class="column">
                                            <li><a href="#">About us</a></li>
                                            <li><a href="#">Order History</a></li>
                                            <li><a href="#">Returns</a></li>
                                            <li><a href="#">Custom Service</a></li>
                                            <li><a href="#">Terms &amp; Condition</a></li>
                                            <li><a href="#">Order History</a></li>
                                            <li><a href="#">Returns</a></li>
                                        </ul>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <h3 class="column-title">Our Services</h3>
                                        <ul class="column">
                                            <li><a href="#">About us</a></li>
                                            <li><a href="#">Order History</a></li>
                                            <li><a href="#">Returns</a></li>
                                            <li><a href="#">Custom Service</a></li>
                                            <li><a href="#">Terms &amp; Condition</a></li>
                                            <li><a href="#">Order History</a></li>
                                            <li><a href="#">Returns</a></li>
                                        </ul>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <h3 class="column-title">Our Services</h3>
                                        <ul class="column">
                                            <li><a href="#">About us</a></li>
                                            <li><a href="#">Order History</a></li>
                                            <li><a href="#">Returns</a></li>
                                            <li><a href="#">Custom Service</a></li>
                                            <li><a href="#">Terms &amp; Condition</a></li>
                                            <li><a href="#">Order History</a></li>
                                            <li><a href="#">Returns</a></li>
                                        </ul>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="clearfix visible-sm-block"></div>
                                    <div class="col-md-3">
                                        <h3 class="column-title">Company working hours</h3>
                                        <div class="footer-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</div>
                                        <div class="footer-description">
                                            <b>Monday-Friday:</b> 8.30 a.m. - 5.30 p.m.<br/>
                                            <b>Saturday:</b> 9.00 a.m. - 2.00 p.m.<br/>
                                            <b>Sunday:</b> Closed
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-bottom-navigation">
                                <div class="cell-view">
                                    <div class="footer-links">
                                        <a href="#">Site Map</a>
                                        <a href="#">Search</a>
                                        <a href="#">Terms</a>
                                        <a href="#">Advanced Search</a>
                                        <a href="#">Orders and Returns</a>
                                        <a href="#">Contact Us</a>
                                    </div>
                                </div>
                                <div class="cell-view">
                                    <div class="payment-methods">
                                        <a href="#"><img src="<?= \yii\helpers\Url::to(["/theme/img/payment-method-1.png"]) ?>" alt="" /></a>
                                        <a href="#"><img src="<?= \yii\helpers\Url::to(["/theme/img/payment-method-2.png"]) ?>" alt="" /></a>
                                        <a href="#"><img src="<?= \yii\helpers\Url::to(["/theme/img/payment-method-3.png"]) ?>" alt="" /></a>
                                        <a href="#"><img src="<?= \yii\helpers\Url::to(["/theme/img/payment-method-4.png"]) ?>" alt="" /></a>
                                        <a href="#"><img src="<?= \yii\helpers\Url::to(["/theme/img/payment-method-5.png"]) ?>" alt="" /></a>
                                        <a href="#"><img src="<?= \yii\helpers\Url::to(["/theme/img/payment-method-6.png"]) ?>" alt="" /></a>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>

            </div>
            <div class="clear"></div>

        </div>

        <div class="search-box popup">
            <form>
                <div class="search-button">
                    <i class="fa fa-search"></i>
                    <input type="submit" />
                </div>
                <div class="search-drop-down">
                    <div class="title"><span>All categories</span><i class="fa fa-angle-down"></i></div>
                    <div class="list">
                        <div class="overflow">
                            <div class="category-entry">Category 1</div>
                            <div class="category-entry">Category 2</div>
                            <div class="category-entry">Category 2</div>
                            <div class="category-entry">Category 4</div>
                            <div class="category-entry">Category 5</div>
                            <div class="category-entry">Lorem</div>
                            <div class="category-entry">Ipsum</div>
                            <div class="category-entry">Dollor</div>
                            <div class="category-entry">Sit Amet</div>
                        </div>
                    </div>
                </div>
                <div class="search-field">
                    <input type="text" value="" placeholder="Search for product" />
                </div>
            </form>
        </div>

        <div class="cart-box popup">
            <div class="popup-container">
                <div class="cart-entry">
                    <a class="image"><img src="img/product-menu-1.jpg" alt="" /></a>
                    <div class="content">
                        <a class="title" href="#">Pullover Batwing Sleeve Zigzag</a>
                        <div class="quantity">Quantity: 4</div>
                        <div class="price">$990,00</div>
                    </div>
                    <div class="button-x"><i class="fa fa-close"></i></div>
                </div>
                <div class="cart-entry">
                    <a class="image"><img src="img/product-menu-1_.jpg" alt="" /></a>
                    <div class="content">
                        <a class="title" href="#">Pullover Batwing Sleeve Zigzag</a>
                        <div class="quantity">Quantity: 4</div>
                        <div class="price">$990,00</div>
                    </div>
                    <div class="button-x"><i class="fa fa-close"></i></div>
                </div>
                <div class="summary">
                    <div class="subtotal">Subtotal: $990,00</div>
                    <div class="grandtotal">Grand Total <span>$1029,79</span></div>
                </div>
                <div class="cart-buttons">
                    <div class="column">
                        <a class="button style-3">view cart</a>
                        <div class="clear"></div>
                    </div>
                    <div class="column">
                        <a class="button style-4">checkout</a>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
