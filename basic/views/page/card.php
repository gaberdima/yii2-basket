<?php

$session = Yii::$app->session;
$session->open();
//var_dump(Yii::$app->getUrlManager()->getBaseUrl());
//exit;
//$myimg = $tov->img;
//var_dump($myimg);

// var_dump($tov);
// exit;   
$tov=$tov[0];
if(!empty($tov->img)){
    $myimg = $tov->img;
}
else{
    $myimg = '';
}


?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="img1">
               <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/img/<?php echo $myimg; ?>" alt="" class="photo1">
<!--                <img src="img/--><?php //echo $myimg; ?><!--" alt="" class="photo1">-->

            </div>
        </div>
        <div class="col-md-6">
            <div class="name">
                <?php echo $tov->name;?>
            </div>
            <div class="article12"><?php echo $tov->article;?></div>
            <div class="price"><?php echo $tov->price;?></div>
            <div class="description"><?php echo $tov->description;?></div>
            <form action="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/addcard" method="get">

                <input type="hidden" name="id" value="<?php echo $tov->id;?>">
                <input type="hidden" name="price" value="<?php echo $tov->price;?>">
                <input type="hidden" name="name" value="<?php echo htmlspecialchars($tov->name); ?>">
                <input type="hidden" name="image" value="<?php echo $tov->img;?>">
                <input type="hidden" name="article" value="<?php echo $tov->article;?>">
                <input type="hidden" name="chpu" value="<?php echo $tov->chpu;?>">
                 
                <button>Добавить в корзину</button>
            </form>
        </div>
    </div>
</div>
