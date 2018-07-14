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
        <form action="count" method="get" class="count">
            <input type="text" name="count" value="<?php echo $value[4] ; ?>" onblur="count1(this)">
            <input type="hidden" name="id" value="<?php echo $value[1]; ?>">
            <input type="hidden" name="price" value="<?php echo "$value[2]";?>">
        </form>
        <li class="full-price"><?php echo $value[5] ; ?></li>
        <form action="del" method="get" class="del">
            <button name="id" class="del-tov" value="<?php echo $value[1]; ?>" title="Удалить">x</button>
        </form>
        <br><?php

    }
    ?>
    </ul>

    <h1>Ваш заказ на: <span class="all-sum"><?php echo $session['all_sum'];?></span> грн</h1>


    <form action="to_order" method="get">
        <input type="email" name="email" placeholder="email" required><br><br>
        <button>Оформить заказ</button>
    </form>
    <?php
}
else{

    echo "<h1>Нет товаров в корзине!</h1>";
}
//var_dump($session['tov']);
//$session->destroy();




?>




<script>
    function count1(x) {
// alert("hello");
//         console.log(x);
        x.form.submit();
    }
</script>
