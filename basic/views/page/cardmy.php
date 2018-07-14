<?php
$session = Yii::$app->session;
$session->open();


if(!empty($session['tov'])) {
    ?>
    <ul class="basket_card">
        <?php
        foreach ($session['tov'] as $key => $value) {
            ?>
            <li class="name"><?php echo $value[0] ; ?></li>
            <!--        <li class="id">--><?php //echo $value[1] ; ?><!--</li>-->
            <li class="price"><?php echo $value[2] ; ?></li>
            <li class="image"><img class="small-image" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl()."/"; ?>img/<?php echo $value[3] ; ?>" alt=""></li>
            <form action="" method="post" class="count">
                <input type="text" name="count" value="<?php echo $value[4] ; ?>" onblur="count(this)">
                <input type="hidden" name="id" value="<?php echo $value[1]; ?>">
                <input type="hidden" name="price" value="<?php echo "$value[2]";?>">
            </form>
            <li class="full-price"><?php echo $value[5] ; ?></li>
            <form action="del" method="get" class="del">
                <button class="del-tov" value="<?php echo $value[1]; ?>">x</button>
            </form>
            <br><?php

        }
        ?>
    </ul>
    <?php
}
else{
    echo "Нет товаров в корзине!";
}
var_dump($session['tov']);
//$session->destroy();




?>
<script>
    function count(x) {

        console.log(x);
        x.form.submit();
    }
</script>
