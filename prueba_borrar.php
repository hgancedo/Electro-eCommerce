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