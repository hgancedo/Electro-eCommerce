<?php
session_start();
include_once "./src/Familia.php";
include_once "./src/Usuario.php";

$fam = new Familia();
$families = $fam->getFamilies();

//Si el user está logeado, mostramos sus datos en el form
if(isset($_SESSION['login'])) {
  $user = new Usuario();
  $userLogged = $user->getUserData($_SESSION['login']);
}
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
              <a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a>
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
                  <img src="./img/NetWareWhite.png" alt="logo" />
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
                  <input class="input" placeholder="Search here" />
                  <button class="search-btn">Search</button>
                </form>
              </div>
            </div>
            <!-- /SEARCH BAR -->

            <!-- ACCOUNT -->
            <div class="col-md-3 clearfix">
              <div class="header-ctn">
                <!-- Wishlist -->
                <div>
                  <?php $connected = isset($_SESSION['login']) ? './myOrders.php' : '' ;?>
                  <a href="<?php echo $connected ;?>">
                    <?php $isConnected = isset($_SESSION['login']) ? $_SESSION['login'] : "Desconectado"; ?>
                    <span id="isLogged"><?php echo $isConnected; ?></span>
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
                          <img src="<?php echo './img/PRODUCTS/ALL_SMALL/' .$prod[0]. '.webp' ;?>" alt="product" />
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

                      <a 
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
            <h3 class="breadcrumb-header">Carrito</h3>
            <ul class="breadcrumb-tree">
              <li><a href="index.php">Inicio</a></li>
              <li class="active">Carrito</li>
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
          <div class="col-md-7">
            <!-- Billing Details -->
            <div class="billing-details">
              <div class="section-title">
                <h3 class="title">Datos de Envío</h3>
              </div>
              <div class="form-group">
                <input
                  class="input"
                  type="text"
                  name="first-name"
                  id="name"
                  placeholder="Nombre"
                  value="<?php if(isset($userLogged)) echo $userLogged[0]['nombre']; ?>" 
                />
              </div>
              <div class="form-group">
                <input
                  class="input"
                  type="text"
                  name="last-name"
                  id="last-name"
                  placeholder="Apellidos"
                  value="<?php if(isset($userLogged)) echo $userLogged[0]['apellidos']; ?>" 
                />
              </div>

              <div class="form-group">
                <input
                  class="input"
                  type="text"
                  name="address"
                  id="address"
                  placeholder="Dirección"
                  value="<?php if(isset($userLogged)) echo $userLogged[0]['direccion']; ?>" 
                />
              </div>

              <div class="form-group">
                <input
                  class="input"
                  type="tel"
                  name="tel"
                  id="tel"
                  placeholder="Teléfono"
                  value="<?php if(isset($userLogged)) echo $userLogged[0]['telefono']; ?>" 
                />
              </div>

              <div class="form-group">
                <input
                  class="input"
                  type="email"
                  name="email"
                  id="email"
                  placeholder="Email"
                  value="<?php if(isset($userLogged)) echo $userLogged[0]['email']; ?>" 
                />
              </div>

              <div>
                <div 
                  class="danger"
                  name="danger"
                  id="danger">
                  <span id="message"> </span>
                </div>
              </div>
              
            </div>
            <!-- /Billing Details -->
          </div>

          <!-- Order Details -->
          <div class="col-md-5 order-details">
            <div class="section-title text-center">
              <h3 class="title">PEDIDO</h3>
            </div>

            <?php if(isset($_SESSION['arrayProd'])) { ?>
            <div class="order-summary">
              <div class="order-col">
                <div><strong>PRODUCT</strong></div>
                <div><strong>TOTAL</strong></div>
              </div>
              <div class="order-products" id="order-products" data-products="<?php echo htmlspecialchars(json_encode($_SESSION['arrayProd'])); ?>">

                <?php
                $sumTot = 0;
                $sumPart = 0;
                foreach($_SESSION['arrayProd'] as $prod) { 
                $sumPart = floatval($prod[2]) * intval($prod[3]);
                $sumTot += floatval($prod[2]) * intval($prod[3]); ?>
                <div class="order-col">
                  <div><?php echo $prod[3] .'x '. floatval($prod[2]) .'€'; ?></div>
                  <div><?php echo $sumPart .'€'; ?></div>
                </div>
                <?php
                }
                ?>

              </div>
              <div class="order-col">
                <div>Envío</div>
                <div><strong>GRATIS</strong></div>
              </div>
              <div class="order-col">
                <div><strong>TOTAL</strong></div>
                <div><strong class="order-total"><?php echo $sumTot .'€' ;?></strong></div>
              </div>
            </div>
            <!-- Cierre de Order Summary -->

            <div class="payment-method">
              <div class="input-radio">
                <input type="radio" name="payment" id="payment-1" />
                <label for="payment-1">
                  <span></span>
                  Transferencia Bancaria
                </label>
              </div>

              <div class="input-radio">
                <input type="radio" name="payment" id="payment-2" />
                <label for="payment-2">
                  <span></span>
                  Tarjéta de débito/crédito
                </label>
              </div>

              <div class="input-radio">
                <input type="radio" name="payment" id="payment-3" />
                <label for="payment-3">
                  <span></span>
                  Paypal
                </label>
              </div>

            </div>

            <div class="input-checkbox">
              <input type="checkbox" id="terms" />
              <label for="terms">
                <span></span>
                He leído y acepto los <a href="#">términos y condiciones</a>
              </label>
            </div>
            <a class="primary-btn order-submit" id="pagar">Pagar</a>
          </div>
          <!-- /Order Details -->
          <?php
            } else { ?>
            <div>
              <div><strong>CARRITO VACÍO</strong></div>
            </div>
            <?php
            }
            ?>
            <!-- cierre de if isset $_SESSiON -->

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
                      ><i class="fa fa-envelope-o"></i>email@email.com</a
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
                  <li><a href="./whereWeAre.php">Dónde Estamos</a></li>
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
                  <?php if(isset($_SESSION['login'])){?>
                  <li><a href="./myOrders.php">Mis Pedidos</a></li>
                  <?php
                  }
                  ?>
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
    <!-- script que envía valores por medio del botón eyeView a ITEM.php para localizar producto -->
    <script type="text/javascript" src="./js/toItemFromEye.js"></script>
    <!-- script que gestiona el carrito -->
    <script type="text/javascript" src="./js/shopCart.js"></script>
    <script type="text/javascript" src="./js/removeFromCart.js"></script>
    <!-- script para la ventana de login -->
    <script type="text/javascript" src="./js/credentials.js"></script>
    <!-- Script para hacer login -->
    <script type="text/javascript" src="./js/login.js"></script>
    <!-- script para registrar pedido -->
    <script type="text/javascript" src="./js/payOrder.js"></script>
  </body>
</html>