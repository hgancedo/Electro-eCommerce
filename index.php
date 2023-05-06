<?php
include_once "./src/Producto.php";
include_once "./src/Familia.php";

$prod = new Producto();
$fam = new Familia();

//novedades del primer carrusel (y del grupo del último carrusel, la primera columna de 2 div)
$novedades = $prod->getRandomProducts(6);

//más vendidos
$topVentas = $prod->getRandomProducts(6);
//más valorados
$mostValued = $prod->getRandomProducts(6);

$families = $fam->getFamilies();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>NETWARE TIENDA ONLINE DE INFORMÁTICA</title>

    <!-- Google font -->
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700"
      rel="stylesheet"
    />

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css" />

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- HEADER -->
    <header>
      <!-- TOP HEADER -->
      <div id="top-header">
        <div class="container">
          <ul class="header-links pull-left">
            <li>
              <a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-envelope-o"></i>hgancedo@email.com</a>
            </li>
            <li>
              <a href="#"
                ><i class="fa fa-map-marker"></i>17 Pol. Industrial Trápaga,
                Vizcaya</a>
            </li>
          </ul>
          <ul class="header-links pull-right">
            <li>
              <a href="#"><i class="fa fa-eur"></i>EUR</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-user-o"></i>Mi Cuenta</a>
            </li>
          </ul>
        </div>
      </div>
      <!-- /TOP HEADER -->

      <!-- MAIN HEADER -->
      <div id="header">
        <!-- container -->
        <div class="container">
          <!-- row -->
          <div class="row">
            <!-- LOGO -->
            <div class="col-md-3">
              <div class="header-logo">
                <a href="#" class="logo">
                  <img src="./img/logo.png" alt="" />
                </a>
              </div>
            </div>
            <!-- /LOGO -->

            <!-- SEARCH BAR -->
            <div class="col-md-6">
              <div class="header-search">
                <form>
                  <select class="input-select">
                    <option value="0">Categorías</option>
                    <option value="1">Category 01</option>
                    <option value="1">Category 02</option>
                  </select>
                  <input class="input" placeholder="Buscar aquí" />
                  <button class="search-btn">Buscar</button>
                </form>
              </div>
            </div>
            <!-- /SEARCH BAR -->

            <!-- ACCOUNT -->
            <div class="col-md-3 clearfix">
              <div class="header-ctn">
                <!-- Wishlist -->
                <div>
                  <a href="#">
                    <i class="fa fa-heart-o"></i>
                    <span>Lista Deseos</span>
                    <div class="qty">2</div>
                  </a>
                </div>
                <!-- /Wishlist -->

                <!-- Cart -->
                <div class="dropdown">
                  <a
                    class="dropdown-toggle"
                    data-toggle="dropdown"
                    aria-expanded="true"
                  >
                    <i class="fa fa-shopping-cart"></i>
                    <span>Carrito</span>
                    <div class="qty">3</div>
                  </a>
                  <div class="cart-dropdown">
                    <div class="cart-list">
                      <div class="product-widget">
                        <div class="product-img">
                          <img src="./img/product01.png" alt="" />
                        </div>
                        <div class="product-body">
                          <h3 class="product-name">
                            <a href="#">product name goes here</a>
                          </h3>
                          <h4 class="product-price">
                            <span class="qty">1x</span>$980.00
                          </h4>
                        </div>
                        <button class="delete">
                          <i class="fa fa-close"></i>
                        </button>
                      </div>

                      <div class="product-widget">
                        <div class="product-img">
                          <img src="./img/product02.png" alt="" />
                        </div>
                        <div class="product-body">
                          <h3 class="product-name">
                            <a href="#">product name goes here</a>
                          </h3>
                          <h4 class="product-price">
                            <span class="qty">3x</span>$980.00
                          </h4>
                        </div>
                        <button class="delete">
                          <i class="fa fa-close"></i>
                        </button>
                      </div>
                    </div>
                    <div class="cart-summary">
                      <small>3 Item(s) selected</small>
                      <h5>SUBTOTAL: $2940.00</h5>
                    </div>
                    <div class="cart-btns">
                      <a href="#">View Cart</a>
                      <a href="#"
                        >Checkout <i class="fa fa-arrow-circle-right"></i
                      ></a>
                    </div>
                  </div>
                </div>
                <!-- /Cart -->

                <!-- Menu Toogle -->
                <div class="menu-toggle">
                  <a href="#">
                    <i class="fa fa-bars"></i>
                    <span>Menu</span>
                  </a>
                </div>
                <!-- /Menu Toogle -->
              </div>
            </div>
            <!-- /ACCOUNT -->
          </div>
          <!-- row -->
        </div>
        <!-- container -->
      </div>
      <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
      <!-- container -->
      <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
          <!-- NAV -->
          <ul class="main-nav nav navbar-nav">
            <!-- <li class="active"><a href="#">Pc Sobremesa</a></li> -->

          <!-- si definimos un enlace para cada categoría en lugar de crearlos dinámicamente, podremos crear cada página de categoría
          con el famKey que recibirá y no tendremos que crear una página por cada categoría, simplemente  UNA ÚNICA PÁGINA  -->

            <?php foreach($families as $family) {
            //ruta para los enlaces
            $link = './CATEGORIES.php?famKey=' .$family['cod'];
            ?>
            <li><a href="<?php echo $link ;?>"><?php echo $family['nombre']; ?></a></li>
            <?php
            }
            ?>
          </ul>
          <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
      </div>
      <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->

    <!-- SECTION -->
    <div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">

          <?php foreach($families as $family) {
          //ruta para las imágenes de categorías
          $srcCateg = "./img/CATEGORIES/". $family['cod']. ".webp";
          ?>
          <!-- shop -->
          <div class="col-md-3 col-xs-6">
            <div class="shop">
              <div class="shop-img">
                <img src="<?php echo $srcCateg ;?>" alt="" />
              </div>
              <div class="shop-body">
                <h3><?php echo $family['nombre']; ?><br /></h3>
                <!-- ruta para los enlaces -->
                <?php 
                $link = './CATEGORIES.php?famKey=' .$family['cod'];
                ?>
                <a href="<?php echo $link ;?>" class="cta-btn"
                  >Comprar <i class="fa fa-arrow-circle-right"></i
                ></a>
              </div>
            </div>
          </div>
          <!-- /shop -->
          <?php
          }
          ?>

        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <!-- section title -->
          <div class="col-md-12">
            <div class="section-title">
              <h3 class="title">Nuevos Productos</h3>
              <div class="section-nav">
                <ul class="section-tab-nav tab-nav">
                <!--<li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li> -->
                  <?php foreach($families as $family) {
                  //ruta para los enlaces de tab-nav
                  $link = './CATEGORIES.php?famKey=' .$family['cod'];
                  ?>
                  <li>
                    <a href="<?php echo $link ;?>"><?php echo $family['nombre'] ;?></a>
                  </li>
                  <?php
                  }
                  ?>

                </ul>
              </div>
            </div>
          </div>
          <!-- /section title -->

          <!-- Products tab & slick -->
          <div class="col-md-12">
            <div class="row">
              <div class="products-tabs">
                <!-- tab -->
                <div id="tab1" class="tab-pane active">
                  <div class="products-slick" data-nav="#slick-nav-1">

                    <!-- product -->
                    <?php foreach($novedades as $novedad){
                    //Ruta de las fotos  
                    $srcAllProd = "./img/PRODUCTS/ALL_SMALL/" .$novedad['id']. ".webp"; ?>
                    <div class="product">
                      <div class="product-img">
                        <img src="<?php echo $srcAllProd; ?>" alt="" />
                        <div class="product-label">
                          <span class="new">NEW</span>
                        </div>
                      </div>
                      <div class="product-body">
                        <p class="product-category"><?php echo $novedad['nombre']; ?></p>
                        <h3 class="product-name">
                          <!-- ruta para el enlace al producto -->
                          <?php $url = './ITEM.php?famKey=' .$novedad['cod']. '&id=' .$novedad['id'] ;?>
                          <a href="<?php echo $url ;?>"><?php echo $novedad['nombre_corto']; ?></a>
                        </h3>
                        <h4 class="product-price">
                          <?php echo $novedad['pvp'] ."€" ;?>
                        </h4>
                        <div class="product-rating">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                        </div>
                        <div class="product-btns">
                          <button class="add-to-wishlist">
                            <i class="fa fa-heart-o"></i
                            ><span class="tooltipp">add to wishlist</span>
                          </button>
                          <button class="add-to-compare">
                            <i class="fa fa-exchange"></i
                            ><span class="tooltipp">add to compare</span>
                          </button>
                          <button class="eyeView" class="quick-view" value="<?php echo $novedad['id'].'+'.$novedad['cod'] ;?>">
                            <i class="fa fa-eye"></i
                            ><span class="tooltipp">quick view</span>
                          </button>
                        </div>
                      </div>
                      <div class="add-to-cart">
                        <button class="add-to-cart-btn addToCart" value="<?php echo $novedad['id']. '/' .$novedad['nombre_corto'] .'/'. $novedad['pvp'] ;?>">
                          <i class="fa fa-shopping-cart"></i> añadir al carrito
                        </button>
                      </div>
                    </div>
                    <!-- /product -->
                    <?php
                    }
                    ?>

                  </div>
                  <div id="slick-nav-1" class="products-slick-nav"></div>
                </div>
                <!-- /tab -->
              </div>
            </div>
          </div>
          <!-- Products tab & slick -->
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <div class="col-md-12">
            <div class="hot-deal">
              <ul class="hot-deal-countdown">
                <li>
                  <div>
                    <h3>02</h3>
                    <span>Días</span>
                  </div>
                </li>
                <li>
                  <div>
                    <h3>10</h3>
                    <span>Horas</span>
                  </div>
                </li>
                <li>
                  <div>
                    <h3>34</h3>
                    <span>Mins</span>
                  </div>
                </li>
                <li>
                  <div>
                    <h3>60</h3>
                    <span>Segs</span>
                  </div>
                </li>
              </ul>
              <h2 class="text-uppercase">Ofertas Semanales</h2>
              <p>Descuentos de hasta el 50%</p>
              <a class="primary-btn cta-btn" href="#">Comprar</a>
            </div>
          </div>
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->

    <!-- SECTION -->
    <div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <div class="col-md-4 col-xs-6">
            <div class="section-title">
              <h4 class="title">Novedades</h4>
              <div class="section-nav">
                <div id="slick-nav-3" class="products-slick-nav"></div>
              </div>
            </div>

            <div class="products-widget-slick" data-nav="#slick-nav-3">

              <div>
                <!-- Recorremos hasta 3 porque son 2 div de 3 productos cada div -->
                <?php for($i=0; $i<3; $i++) {
                //Ruta de las fotos  
                $srcNovedades = "./img/PRODUCTS/ALL_SMALL/" .$novedades[$i]['id']. ".webp"; ?>
                <!-- product widget -->
                <div class="product-widget">
                  <div class="product-img">
                    <img src="<?php echo $srcNovedades ;?>" alt="" />
                  </div>
                  <div class="product-body">
                    <p class="product-category"><?php echo $novedades[$i]['nombre']; ?></p>
                    <h3 class="product-name">

                      <!-- url según la famKey e idProd. Necesitamos el famKey (o cod de familia) a partir del nombre de ésta -->
                      <?php
                      $famKeyNov_1 = $fam->getCodFamily($novedades[$i]['nombre']);
                      //url que contendrá el famkey ( o cod fam) e idProd
                      $urlNov_1 = './ITEM.php?famKey='. $famKeyNov_1[0]['cod']. '&id='. $novedades[$i]['id'];
                      ?>
                      <a href="<?php echo $urlNov_1 ;?>"><?php echo $novedades[$i]['nombre_corto'] ;?></a>
                    </h3>
                    <h4 class="product-price">
                      <?php echo $novedades[$i]['pvp'] ."€"; ?>
                    </h4>
                  </div>
                </div>
                <!-- /product widget -->
                <?php
                }
                ?>
              </div>

              <div>
                <?php for($i=3; $i<6; $i++) {
                //Ruta de las fotos  
                $srcNovedades2 = "./img/PRODUCTS/ALL_SMALL/" .$novedades[$i]['id']. ".webp"; ?>
                <!-- product widget -->
                <div class="product-widget">
                  <div class="product-img">
                    <img src="<?php echo $srcNovedades2 ;?>" alt="" />
                  </div>
                  <div class="product-body">
                    <p class="product-category"><?php echo $novedades[$i]['nombre']; ?></p>
                    <h3 class="product-name">

                      <!-- url según la famKey e idProd. Necesitamos el famKey (o cod de familia) a partir del nombre de ésta -->
                      <?php
                      $famKeyNov_2 = $fam->getCodFamily($novedades[$i]['nombre']);
                      //url que contendrá el famkey ( o cod fam) e idProd
                      $urlNov_2 = './ITEM.php?famKey='. $famKeyNov_2[0]['cod']. '&id='. $novedades[$i]['id'];
                      ?>
                      <a href="<?php echo $urlNov_2 ;?>"><?php echo $novedades[$i]['nombre_corto']; ?></a>
                    </h3>
                    <h4 class="product-price">
                      <?php echo $novedades[$i]['pvp'] ."€" ;?>
                    </h4>
                  </div>
                </div>
                <!-- /product widget -->
                <?php
                }
                ?>

              </div>

            </div>
          </div>

          <div class="col-md-4 col-xs-6">
            <div class="section-title">
              <h4 class="title">Top Ventas</h4>
              <div class="section-nav">
                <div id="slick-nav-4" class="products-slick-nav"></div>
              </div>
            </div>

            <div class="products-widget-slick" data-nav="#slick-nav-4">
              <div>

                <?php for($i=0; $i<3; $i++) {
                //Ruta de las fotos  
                $srcTopVentas = "./img/PRODUCTS/ALL_SMALL/" .$topVentas[$i]['id']. ".webp"; ?>
                <!-- product widget -->
                <div class="product-widget">
                  <div class="product-img">
                    <img src="<?php echo $srcTopVentas ;?>" alt="" />
                  </div>
                  <div class="product-body">
                    <p class="product-category"><?php echo $topVentas[$i]['nombre']; ?></p>
                    <h3 class="product-name">
                    
                      <!-- url según la famKey e idProd. Necesitamos el famKey (o cod de familia) a partir del nombre de ésta -->
                      <?php
                      $famKeyTop_1 = $fam->getCodFamily($topVentas[$i]['nombre']);
                      //url que contendrá el famkey ( o cod fam) e idProd
                      $urlTop_1 = './ITEM.php?famKey='. $famKeyTop_1[0]['cod']. '&id='. $topVentas[$i]['id'];
                      ?>
                      <a href="<?php echo $urlTop_1 ;?>"><?php echo $topVentas[$i]['nombre_corto']; ?></a>
                    </h3>
                    <h4 class="product-price">
                      <?php echo $topVentas[$i]['pvp'] ."€" ;?>
                    </h4>
                  </div>
                </div>
                <!-- /product widget -->
                <?php
                }
                ?>

              </div>

              <div>

                <?php for($i=3; $i<6; $i++) {
                //Ruta de las fotos  
                $srcTopVentas2 = "./img/PRODUCTS/ALL_SMALL/" .$topVentas[$i]['id']. ".webp"; ?>
                <!-- product widget -->
                <div class="product-widget">
                  <div class="product-img">
                    <img src="<?php echo $srcTopVentas2 ;?>" alt="" />
                  </div>
                  <div class="product-body">
                    <p class="product-category"><?php echo $topVentas[$i]['nombre']; ?></p>
                    <h3 class="product-name">

                      <!-- url según la famKey e idProd. Necesitamos el famKey (o cod de familia) a partir del nombre de ésta -->
                      <?php
                      $famKeyTop_2 = $fam->getCodFamily($topVentas[$i]['nombre']);
                      //url que contendrá el famkey ( o cod fam) e idProd
                      $urlTop_2 = './ITEM.php?famKey='. $famKeyTop_2[0]['cod']. '&id='. $topVentas[$i]['id'];
                      ?>
                      <a href="<?php echo $urlTop_2 ;?>"><?php echo $topVentas[$i]['nombre_corto']; ?></a>
                    </h3>
                    <h4 class="product-price">
                      <?php echo $topVentas[$i]['pvp'] ."€" ;?>
                    </h4>
                  </div>
                </div>
                <!-- /product widget -->
                <?php
                }
                ?>

              </div>
            </div>
          </div>

          <div class="clearfix visible-sm visible-xs"></div>

          <div class="col-md-4 col-xs-6">
            <div class="section-title">
              <h4 class="title">Más Valorados</h4>
              <div class="section-nav">
                <div id="slick-nav-5" class="products-slick-nav"></div>
              </div>
            </div>


            <div class="products-widget-slick" data-nav="#slick-nav-5">
              <div>

                <?php for($i=0; $i<3; $i++) {
                //Ruta de las fotos  
                $srcMostValued = "./img/PRODUCTS/ALL_SMALL/" .$mostValued[$i]['id']. ".webp"; ?>
                <!-- product widget -->
                <div class="product-widget">
                  <div class="product-img">
                    <img src="<?php echo $srcMostValued ;?>" alt="" />
                  </div>
                  <div class="product-body">
                    <p class="product-category"><?php echo $mostValued[$i]['nombre']; ?></p>

                    <h3 class="product-name">

                      <!-- url según la famKey e idProd. Necesitamos el famKey (o cod de familia) a partir del nombre de ésta -->
                      <?php
                      $famKeyMost_1 = $fam->getCodFamily($mostValued[$i]['nombre']);
                      //url que contendrá el famkey ( o cod fam) e idProd
                      $urlMost_1 = './ITEM.php?famKey='. $famKeyMost_1[0]['cod']. '&id='. $mostValued[$i]['id'];
                      ?>
                      <a href="<?php echo $urlMost_1 ;?>"><?php echo $mostValued[$i]['nombre_corto']; ?></a>
                    </h3>
                    <h4 class="product-price">
                      <?php echo $mostValued[$i]['pvp'] ."€" ;?>
                    </h4>
                  </div>
                </div>
                <!-- /product widget -->
                <?php
                }
                ?>

              </div>

              <div>

                <?php for($i=3; $i<6; $i++) {
                //Ruta de las fotos  
                $srcMostValued2 = "./img/PRODUCTS/ALL_SMALL/" .$mostValued[$i]['id']. ".webp"; ?>
                <!-- product widget -->
                <div class="product-widget">
                  <div class="product-img">
                    <img src="<?php echo $srcMostValued2 ;?>" alt="" />
                  </div>
                  <div class="product-body">
                    <p class="product-category"><?php echo $mostValued[$i]['nombre']; ?></p>
                    <h3 class="product-name">

                      
                      <!-- url según la famKey e idProd. Necesitamos el famKey (o cod de familia) a partir del nombre de ésta -->
                      <?php
                      $famKeyMost_2 = $fam->getCodFamily($mostValued[$i]['nombre']);
                      //url que contendrá el famkey ( o cod fam) e idProd
                      $urlMost_2 = './ITEM.php?famKey='. $famKeyMost_2[0]['cod']. '&id='. $mostValued[$i]['id'];
                      ?>
                      <a href="<?php echo $urlMost_2 ;?>"><?php echo $mostValued[$i]['nombre_corto']; ?></a>
                    </h3>
                    <h4 class="product-price">
                    <?php echo $mostValued[$i]['pvp'] ."€" ;?>
                    </h4>
                  </div>
                </div>
                <!-- /product widget -->
                <?php
                }
                ?>

              </div>
            </div>
          </div>
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <div class="col-md-12">
            <div class="newsletter">
              <p>Suscríbete a nuestra <strong>NEWSLETTER</strong></p>
              <form>
                <input
                  class="input"
                  type="email"
                  placeholder="Introduce tu Email"
                />
                <button class="newsletter-btn">
                  <i class="fa fa-envelope"></i> Subscribirse
                </button>
              </form>
              <ul class="newsletter-follow">
                <li>
                  <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-instagram"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-pinterest"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->

    <!-- FOOTER -->
    <footer id="footer">
      <!-- top footer -->
      <div class="section">
        <!-- container -->
        <div class="container">
          <!-- row -->
          <div class="row">
            <div class="col-md-3 col-xs-6">
              <div class="footer">
                <h3 class="footer-title">Sobre Nosotros</h3>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                  do eiusmod tempor incididunt ut.
                </p>
                <ul class="footer-links">
                  <li>
                    <a href="#"
                      ><i class="fa fa-map-marker"></i>17 Pol. Industrial Trápaga, Vizcaya</a
                    >
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a>
                  </li>
                  <li>
                    <a href="#"
                      ><i class="fa fa-envelope-o"></i>hgancedo@email.com</a
                    >
                  </li>
                </ul>
              </div>
            </div>

            <div class="col-md-3 col-xs-6">
              <div class="footer">
                <h3 class="footer-title">Categorías</h3>
                <ul class="footer-links">
                  <li><a href="#">Ofertas</a></li>
                  <?php foreach($families as $family) {
                  $link = './CATEGORIES.php?famKey=' .$family['cod']; ?>
                  <li><a href="<?php echo $link ;?>"><?php echo $family['nombre']; ?></a></li>
                  <?php
                  }
                  ?>
                </ul>
              </div>
            </div>

            <div class="clearfix visible-xs"></div>

            <div class="col-md-3 col-xs-6">
              <div class="footer">
                <h3 class="footer-title">Información</h3>
                <ul class="footer-links">
                  <li><a href="#">Sobre Nosotros</a></li>
                  <li><a href="#">Contacto</a></li>
                  <li><a href="#">Política de Privacidad</a></li>
                  <li><a href="#">Pedidos y Devoluciones</a></li>
                  <li><a href="#">Términos y Condiciones</a></li>
                </ul>
              </div>
            </div>

            <div class="col-md-3 col-xs-6">
              <div class="footer">
                <h3 class="footer-title">Servicio</h3>
                <ul class="footer-links">
                  <li><a href="#">Mi Cuenta</a></li>
                  <li><a href="#">Ver Carrito</a></li>
                  <li><a href="#">Lista de Deseos</a></li>
                  <li><a href="#">Seguimiento del Pedido</a></li>
                  <li><a href="#">Ayuda</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->
      </div>
      <!-- /top footer -->

      <!-- bottom footer -->
      <div id="bottom-footer" class="section">
        <div class="container">
          <!-- row -->
          <div class="row">
            <div class="col-md-12 text-center">
              <ul class="footer-payments">
                <li>
                  <a href="#"><i class="fa fa-cc-visa"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-credit-card"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-cc-paypal"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-cc-mastercard"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-cc-discover"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-cc-amex"></i></a>
                </li>
              </ul>
              <span class="copyright">
                <a target="_blank" href="https://www.templateshub.net"
                  >Powered By Hector Gancedo Grade</a
                >
              </span>
            </div>
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->
      </div>
      <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>
    <!-- script que envía valores por medio del botón a ITEM.php para localizar producto -->
    <script type="text/javascript" src="./js/toItemFromIndex.js"></script>
    <!-- script que gestiona el carrito -->
    <script type="text/javascript" src="./js/shopCart.js"></script>
  </body>
</html>
