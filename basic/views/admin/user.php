<?php
$session = Yii::$app->session;
$session->open();



//var_dump($session['session_user']);
//exit;
?>

<form action="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/exit" method="get">
    <button name="exit">Выйти</button>
</form>
<div class="container">
    <table class="table table-striped">
    <tr>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
        <th>6</th>
    </tr>
    
<?php

//echo $email_user;
//exit;

foreach ($user as $y){

$email = $y['email'];
$password = $y['password'];


if($email_user == $email && preg_match("/^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i", $_POST['email'])){
    if($password_user == $password && preg_match("/^[a-z0-9_\.-]{4,8}$/i", $_POST['password'])){
        foreach ($order as $x){
          ?><tr>
          <td><?php echo $x['name']; ?></td>
          <td><?php echo $x['price']; ?></td>
          <td><?php echo $x['article']; ?></td>
          <td><?php echo $x['email']; ?></td>
          <td><a name="basket_number" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl()."/"; ?>admin/card_order?p=<?php echo $x['basket_number']; ?>"> <?php echo $x['basket_number']; ?></a></td>
          <td><?php echo $x['count']; ?></td>
          <?php
            
           



        }

    }else{

    }

}else{

}



}

?>

    </table>
</div>

