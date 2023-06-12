<?php
session_start();

include_once "./src/Familia.php";
include_once("./src/Producto.php");

$fam = new Familia();
$families = $fam->getFamilies();

$prod = new Producto();

//El producto que mostraremos según la familia e id que recibimos por url
$item = $prod->getProducts($_GET['famKey'], $_GET['id']);

// echo "<pre>";
// print_r($item);
// echo "</pre>";


//Obtenemos el nombre de familia a partir de famKey
$familyItem = $fam->getFamilies($_GET['famKey']);

// echo "<pre>";
// print_r($familyItem);
// echo "</pre>";

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
    <!-- ventana de login que se mostrará al hacer click en MiCuenta -->
    <div class="show_acc" id="show-acc">
      <div class="title" >Iniciar sesión</div>
      <div class="form-login">
        <form action="" id="form-login">
          <div class="input-flex">
            <div class="input-logo">
              <i class="fa fa-user fa-lg" aria-hidden="true"></i>
            </div>    
            <input type="text" name="user" id="user" placeholder="Usuario">
          </div>
          
          <div class="input-flex">
            <div class="input-logo">
            <i class="fa fa-unlock-alt fa-lg" aria-hidden="true"></i>
            </div>    
            <input type="password" name="pass" id="pass" placeholder="Contraseña">
          </div>
          
          <div class="div-button">
            <button type="button" class="button-login" id="login">Login</button>
          </div>

          <div class="register">
            <a href="./register.php">¿Aún no estás registrado?</a>
          </div>

        </form>
      </div>
    </div>

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
              <!-- El valor true/false ha de ir en string, sino js no lo captura -->
              <?php $hasSession = isset($_SESSION['login']) ? "true" : "false"; ?>
              <input type="hidden" id="hasSession" value="<?php echo $hasSession; ?>">
              <?php $strLogin = isset($_SESSION['login']) ? "Desconectarse" : "Iniciar sesión"; ?>
              <a href="#" id="account"><i class="fa fa-user-o"></i><?php echo $strLogin ;?></a>
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
                    <option value="0">All Categories</option>
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
                    <?php $isConnected = isset($_SESSION['login']) ? $_SESSION['login'] : "Desconectado"; ?>
                    <span id="isLogged"><?php echo $isConnected; ?></span>
                  </a>
                </div>
                <!-- /Wishlist -->

                <!-- Cart -->
                <div class="dropdown">
                  <a href="#"
                    class="dropdown-toggle"
                    data-toggle="dropdown"
                    aria-expanded="true"
                  >
                    <i class="fa fa-shopping-cart"></i>
                    <span>Carrito</span>
                    <?php
                    //num de productos totales que se muestran en la burbuja del carrito
                    $prodTot = 0;
                    if(isset($_SESSION['arrayProd'])) {
                      foreach($_SESSION['arrayProd'] as $prod) {
                        $prodTot += $prod[3];
                      }
                    }
                    ?>
                    <div class="qty"><?php echo $prodTot ;?></div>
                  </a>
                  <div class="cart-dropdown">
                    <div class="cart-list">

                      <!-- Si hay productos en Session arrayProd, lo recorremos, si no mostramos vacío -->
                      <?php if(isset($_SESSION['arrayProd'])) {
                      // controlar con variable boolean si isset arrayProd false no mostramos cart-summary tampoco
                      $show = true; 
                      $sumTot = 0;
                      $prodTot = 0;
                      foreach($_SESSION['arrayProd'] as $prod) {
                      //precio * cantidad
                      $sumTot += floatval($prod[2]) * intval($prod[3]);
                      //uds de productos totales en carrito
                      $prodTot += floatval($prod[3]);
                      ?>
                      <div class="product-widget">
                        <div class="product-img">
                          <img src="<?php echo './img/PRODUCTS/ALL_SMALL/' .$prod[0]. '.webp' ;?>" alt="" />
                        </div>
                        <div class="product-body">
                          <h3 class="product-name">
                            
                            <!-- ruta para ir a ITEM.php desde el carrito -->
                            <?php $link= './ITEM.php?famKey=' .$prod[4]. '&id=' .$prod[0] ;?>
                            <a href="<?php echo $link ;?>"><?php echo $prod[1] ;?></a>
                          </h3>
                          <h4 class="product-price">
                          <span class="qty"><?php echo $prod[3] .'x' ;?></span><?php echo $prod[2] .'€' ; ?>
                          </h4>
                        </div>
                        <button class="delete" value="<?php echo $prod[0] ;?>">
                          <i class="fa fa-close"></i>
                        </button>
                      </div>
                      <?php
                      }
                      //cierre de if count > 0
                      
                      } else {
                        $show = false;
                      ?>
                      <div>
                        Carrito Vacío
                      </div>
                      <!-- cierre del else -->
                      <?php
                      }
                      ?>

                    </div>
                    <!-- /cierre de class="cart-list" -->

                    <?php if($show) {?>
                    <div class="cart-summary">
                      <small> <?php echo $prodTot ;?> producto(s) seleccionados</small>
                      <h5>SUBTOTAL: <?php echo $sumTot .'€' ;?> </h5>
                    </div>
                    <div class="cart-btns">
                      <a href="./checkout.php"
                        >Comprar <i class="fa fa-arrow-circle-right"></i
                      ></a>
                    </div>
                    <?php
                    }
                    ?>
                    <!-- Cierre de if(show) --> 

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
            <li><a href="./index.php">Inicio</a></li>
            <?php foreach($families as $family) {
            //ruta para los enlaces
            $link = './CATEGORIES.php?famKey=' . $family['cod'];
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

    <!-- Mensaje de usuario logeado o login incorrecto -->
    <div class="resp-login">
      <span id="resp-login"></span>
    </div>
    <!-- /Mensaje de usuario logeado o login incorrecto -->

    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb-tree">
              <li><a href="index.php">Inicio</a></li>
              <!-- enlace a página según famKey -->
              <?php $link = './CATEGORIES.php?famKey=' . $_GET['famKey'] ;?>
              <li><a href="<?php echo $link ;?>"><?php echo $familyItem[0]['nombre']; ?></a></li>
              <li class="active"><?php echo $item[0]['nombre_corto'] ;?></li>
            </ul>
          </div>
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <!-- Product main img -->
          <div class="col-md-5 col-md-push-2">
            <div id="product-main-img">
              <div class="product-preview">
                <!-- ruta a las imágenes de diferentes vistas del producto AMPLIADO Y ZOOM -->
                <?php $srcItempreview = './img/PRODUCTS/ALL_BIG/' .$_GET['id']. '.webp' ;?>
                <img src="<?php echo $srcItempreview ;?>" alt="" />
              </div>

              <div class="product-preview">
                <img src="<?php echo $srcItempreview ;?>" alt="" />
              </div>

              <div class="product-preview">
                <img src="<?php echo $srcItempreview ;?>" alt="" />
              </div>

              <div class="product-preview">
                <img src="<?php echo $srcItempreview ;?>" alt="" />
              </div>
            </div>
          </div>
          <!-- /Product main img -->

          <!-- Product thumb imgs -->
          <div class="col-md-2 col-md-pull-5">
            <div id="product-imgs">
              <div class="product-preview">
              <!-- ruta a las imágenes de diferentes vistas del producto, preview pequeños -->
              <?php $srcItemSmall = './img/PRODUCTS/ALL_SMALL/' .$_GET['id']. '.webp' ;?>
              <img src="<?php echo $srcItemSmall ;?>" alt="" />
              </div>

              <div class="product-preview">
                <img src="<?php echo $srcItemSmall ;?>" alt="" />
              </div>

              <div class="product-preview">
                <img src="<?php echo $srcItemSmall ;?>" alt="" />
              </div>

              <div class="product-preview">
                <img src="<?php echo $srcItemSmall ;?>" alt="" />
              </div>
            </div>
          </div>
          <!-- /Product thumb imgs -->

          <!-- Product details -->
          <div class="col-md-5">
            <div class="product-details">
              <h2 class="product-name"> <?php echo $item[0]['nombre_corto'] ;?> </h2>
              <div>
                <div class="product-rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o"></i>
                </div>
                <a class="review-link" href="#"
                  >10 Review(s) | Add your review</a
                >
              </div>
              <div>
                <h3 class="product-price">
                <?php echo floatval($item[0]['pvp']). '€' ;?>
                </h3>
                <span class="product-available">In Stock</span>
              </div>
              <p>
                <?php echo $item[0]['descripcion'] ;?>
              </p>

              <div class="add-to-cart">
                <div class="qty-label">
                  Qty
                  <div class="input-number">
                    <!-- Identificamos el input con qty y su id -->
                    <input class="<?php echo 'qty_' .$item[0]['id'] ;?> " type="number" min= "1" value= "1"/>
                    <span class="qty-up">+</span>
                    <span class="qty-down">-</span>
                  </div>
                </div>
                <!-- tendremos que pasar la cantidad de uds del seleccionable, en las otras páginas siempre eran 1
                Pasamos 0 y en JS controlamos if uds === 0 -->
                <button class="add-to-cart-btn addToCart" value="<?php echo $item[0]['id']. '/' .$item[0]['nombre_corto'] .'/'. $item[0]['pvp'] .'/'. $_GET['famKey']; ?>">
                    <i class="fa fa-shopping-cart"></i> añadir al carrito
                </button>
              </div>

              <ul class="product-btns">
                <li>
                  <a href="#"><i class="fa fa-heart-o"></i> añadir a deseos</a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-exchange"></i> añadir a comparar</a>
                </li>
              </ul>

              <ul class="product-links">
                <li>Categoría:</li>
                <?php $link = './CATEGORIES.php?famKey=' . $_GET['famKey'] ;?>
                <li><a href="<?php echo $link ;?>"><?php echo $familyItem[0]['nombre'] ;?></a></li>
              </ul>

              <ul class="product-links">
                <li>Compartir:</li>
                <li>
                  <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-google-plus"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-envelope"></i></a>
                </li>
              </ul>
            </div>
          </div>
          <!-- /Product details -->

          <!-- Product tab -->
          <div class="col-md-12">
            <div id="product-tab">
              <!-- product tab nav -->
              <ul class="tab-nav">
                <li class="active">
                  <a data-toggle="tab" href="#tab1">Descripción</a>
                </li>
                <li><a data-toggle="tab" href="#tab2">Detalles</a></li>
                <li><a data-toggle="tab" href="#tab3">Opiniones (3)</a></li>
              </ul>
              <!-- /product tab nav -->

              <!-- product tab content -->
              <div class="tab-content">
                <!-- tab1  -->
                <div id="tab1" class="tab-pane fade in active">
                  <div class="row">
                    <div class="col-md-12">
                      <p>
                        <?php echo $item[0]['descripcion'] ;?>
                      </p>
                    </div>
                  </div>
                </div>
                <!-- /tab1  -->

                <!-- tab2  -->
                <div id="tab2" class="tab-pane fade in">
                  <div class="row">
                    <div class="col-md-12">
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis
                        nostrud exercitation ullamco laboris nisi ut aliquip ex
                        ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit
                        anim id est laborum.
                      </p>
                    </div>
                  </div>
                </div>
                <!-- /tab2  -->

                <!-- tab3  -->
                <div id="tab3" class="tab-pane fade in">
                  <div class="row">
                    <!-- Rating -->
                    <div class="col-md-3">
                      <div id="rating">
                        <div class="rating-avg">
                          <span>4.5</span>
                          <div class="rating-stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                          </div>
                        </div>
                        <ul class="rating">
                          <li>
                            <div class="rating-stars">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                            </div>
                            <div class="rating-progress">
                              <div style="width: 80%"></div>
                            </div>
                            <span class="sum">3</span>
                          </li>
                          <li>
                            <div class="rating-stars">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star-o"></i>
                            </div>
                            <div class="rating-progress">
                              <div style="width: 60%"></div>
                            </div>
                            <span class="sum">2</span>
                          </li>
                          <li>
                            <div class="rating-stars">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                            </div>
                            <div class="rating-progress">
                              <div></div>
                            </div>
                            <span class="sum">0</span>
                          </li>
                          <li>
                            <div class="rating-stars">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                            </div>
                            <div class="rating-progress">
                              <div></div>
                            </div>
                            <span class="sum">0</span>
                          </li>
                          <li>
                            <div class="rating-stars">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                            </div>
                            <div class="rating-progress">
                              <div></div>
                            </div>
                            <span class="sum">0</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- /Rating -->

                    <!-- Reviews -->
                    <div class="col-md-6">
                      <div id="reviews">
                        <ul class="reviews">
                          <li>
                            <div class="review-heading">
                              <h5 class="name">John</h5>
                              <p class="date">27 DEC 2018, 8:0 PM</p>
                              <div class="review-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                              </div>
                            </div>
                            <div class="review-body">
                              <p>
                                Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua
                              </p>
                            </div>
                          </li>
                          <li>
                            <div class="review-heading">
                              <h5 class="name">John</h5>
                              <p class="date">27 DEC 2018, 8:0 PM</p>
                              <div class="review-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                              </div>
                            </div>
                            <div class="review-body">
                              <p>
                                Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua
                              </p>
                            </div>
                          </li>
                          <li>
                            <div class="review-heading">
                              <h5 class="name">John</h5>
                              <p class="date">27 DEC 2018, 8:0 PM</p>
                              <div class="review-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                              </div>
                            </div>
                            <div class="review-body">
                              <p>
                                Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua
                              </p>
                            </div>
                          </li>
                        </ul>
                        <ul class="reviews-pagination">
                          <li class="active">1</li>
                          <li><a href="#">2</a></li>
                          <li><a href="#">3</a></li>
                          <li><a href="#">4</a></li>
                          <li>
                            <a href="#"><i class="fa fa-angle-right"></i></a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- /Reviews -->

                    <!-- Review Form -->
                    <div class="col-md-3">
                      <div id="review-form">
                        <form class="review-form">
                          <input
                            class="input"
                            type="text"
                            placeholder="Your Name"
                          />
                          <input
                            class="input"
                            type="email"
                            placeholder="Your Email"
                          />
                          <textarea
                            class="input"
                            placeholder="Your Review"
                          ></textarea>
                          <div class="input-rating">
                            <span>Your Rating: </span>
                            <div class="stars">
                              <input
                                id="star5"
                                name="rating"
                                value="5"
                                type="radio"
                              /><label for="star5"></label>
                              <input
                                id="star4"
                                name="rating"
                                value="4"
                                type="radio"
                              /><label for="star4"></label>
                              <input
                                id="star3"
                                name="rating"
                                value="3"
                                type="radio"
                              /><label for="star3"></label>
                              <input
                                id="star2"
                                name="rating"
                                value="2"
                                type="radio"
                              /><label for="star2"></label>
                              <input
                                id="star1"
                                name="rating"
                                value="1"
                                type="radio"
                              /><label for="star1"></label>
                            </div>
                          </div>
                          <button class="primary-btn">Submit</button>
                        </form>
                      </div>
                    </div>
                    <!-- /Review Form -->
                  </div>
                </div>
                <!-- /tab3  -->
              </div>
              <!-- /product tab content  -->
            </div>
          </div>
          <!-- /product tab -->
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
    <!-- script que gestiona el carrito -->
    <script type="text/javascript" src="./js/shopCartFromItem.js"></script>
    <script type="text/javascript" src="./js/removeFromCart.js"></script>
    <!-- script para la ventana de login -->
    <script type="text/javascript" src="./js/credentials.js"></script>
    <!-- Script para hacer login -->
    <script type="text/javascript" src="./js/login.js"></script>
  </body>
</html>
