<?php
use yii\widgets\LinkPager;




foreach ($idCategory as $y){

        ?>
        <div class="col-md-2">
            <?php
    foreach ($all_category as $z) {
            ?>
            <ul class="category">

                <li><a style="text-decoration: none"
                       href="<?php echo $z['trans_name'] ?>"><?php echo $z['name'] . "<br>"; ?></a></li>
<!--                <form action="pc" method="post">-->
<!--                    <input type="hidden" name="id_category" value="--><?php //echo $y['id']; ?><!--">-->
<!--                </form>-->

            </ul>
        <?php
    }
            ?>
        </div>

    <div class="col-md-10">
    <?php
    foreach ($category as $x){

        if($y['id'] == $x['categories']){
          ?>
            <div class="tov">
                <div class="row">
                    <div class="col-md-2"><div class="img"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl()."/"; ?>img/<?php echo $x['img']; ?>" alt="" class="photo"></div>
                        <div class="buy">
                            <form action="<?php echo Yii::$app->getUrlManager()->getBaseUrl()."/"; ?>card" method="get" class="form-buy">
                                <button class="button-buy">Заказать</button>
                                <input type="hidden" name="id_tov" value="<?php echo $x['id'];?>">
                            </form>
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
    }
    ?>
    </div>

<?php

}

?>
<!--<div class="pagination">--><?php
//
//    echo LinkPager::widget(['pagination' => $pagination]);
//
//    ?>
<!--</div>-->
