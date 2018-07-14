<?php
use yii\widgets\LinkPager;



?>


 <div class="container">
     <div class="row">
         <div class="col-md-2">
             <ul class="category">
             <?php

             foreach ($category_name as $y){
                 ?>
                 <li><a style="text-decoration: none" href="cat/<?php echo $y['trans_name']?>"><?php echo $y['name']."<br>";?></a></li>
                 <form action="pc" method="post">
                     <input type="hidden" name="id_category" value="<?php echo $y['id'];?>">
                 </form>
                 <?php

             }
             ?>
             </ul>
         </div>
         <div class="col-md-10">
             <?php
             foreach ($product as $x){
                 ?>
                 <div class="tov">
                     <div class="row">
                         <div class="col-md-2">
                             <div class="img"><img src="img/<?php echo $x['img']; ?>" alt="" class="photo"></div>
                             <div class="buy">
<!--                                 <form action="card/--><?php //echo $x['id']; ?><!--" method="get" class="form-buy">-->
                                     <?php
                                     if (!empty($session['tov'])) {

                                         $flag = 0;
                                         foreach ($session['tov'] as $key => $value) {
                                             if ($value[1] == $x['id']) {
                                                 $flag = 1;
                                             }
                                         }
                                     }
//                                     $session->destroy();

                                     ?>
                                     <button class="button-buy <?php if(!empty($flag)){echo "in-basket";} ?>"  <?php if(!empty($flag)){echo "disabled";} ?>>
                                          <?php if(!empty($flag)){echo "В корзине"; }else{?><a href="card/<?php echo $x['chpu']; ?>"><?php echo "Заказать"; ?> </a><?php } ?></button>
<!--                                     <input type="hidden" name="id_tov" value="--><?php //echo $x['id'];?><!--">-->
<!--                                 </form>-->
                             </div>
                         </div>
                         <div class="col-md-10" style="padding-left: 40px">
                             <div class="name"><?php echo $x['name']."<br>"; ?></div>
                             <div class="price"> <?php echo $x['price']; ?> <span>грн</span></div>
                             <div class="description"><?php echo $x['description']."<br>"; ?></div>
                             <div class="article"><span>Код товара: </span><?php echo $x['article']."<br>"; ?></div>
                         </div>
                     </div>
                 </div>



                 <?php

             }
             ?>
         </div>
     </div>
 </div>


 <div class="pagination"><?php

     echo LinkPager::widget(['pagination' => $pagination]);

   ?>
 </div>
