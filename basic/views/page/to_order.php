<?php
//foreach ($tov as $x){
//    $name = $x['name'];
//    $id = $x['id'];
//    $price = $x['price']/26;
//    $count = $x['count'];
//
//
//
//$payNowButtonUrl = 'https://www.sandbox.paypal.com/cgi-bin/websc';
//$userId = 315; // id текущего пользователя
//
//$receiverEmail = 'xxx-facilitator@yandex.ru'; //email получателя платежа(на него зарегестрирован paypal аккаунт)
//
//$productId = $id;
//$itemName = $name;	// название продукта
//$amount = $price; // цена продукта(за 1 шт.)
//$quantity = $count;	// количество
//
//$returnUrl = 'http://your-site.com/single_payment?status=paymentSuccess';
//$customData = ['user_id' => $userId, 'product_id' => $productId];
//
//}
//?>
<!---->
<!--<form action="--><?php //echo $payNowButtonUrl; ?><!--" method="post" target="_blank">-->
<!--    <input type="hidden" name="cmd" value="_xclick">-->
<!--    <input type="hidden" name="business" value="--><?php //echo $receiverEmail; ?><!--">-->
<!--    <input id="paypalItemName" type="hidden" name="item_name" value="--><?php //echo $itemName; ?><!--">-->
<!--    <input id="paypalQuantity" type="hidden" name="quantity" value="--><?php //echo $quantity; ?><!--">-->
<!--    <input id="paypalAmmount" type="hidden" name="amount" value="--><?php //echo $amount; ?><!--">-->
<!--    <input type="hidden" name="no_shipping" value="1">-->
<!--    <input type="hidden" name="return" value="--><?php //echo $returnUrl; ?><!--">-->
<!---->
<!--    <input type="hidden" name="custom" value="--><?php //echo json_encode($customData);?><!--">-->
<!---->
<!--    <input type="hidden" name="currency_code" value="USD">-->
<!--    <input type="hidden" name="lc" value="US">-->
<!--    <input type="hidden" name="bn" value="PP-BuyNowBF">-->
<!---->
<!--    <button type="submit">-->
<!--        Pay Now-->
<!--    </button>-->
<!--</form>-->

<form method="POST" action="https://www.liqpay.com/api/3/checkout"
      accept-charset="utf-8">
    <input type="hidden" name="data" value="eyAidmVyc2lvbiIgOiAzLCAicHVibGljX2tleSIgOiAieW91cl9wdWJsaWNfa2V5IiwgImFjdGlv
	biIgOiAicGF5IiwgImFtb3VudCIgOiAxLCAiY3VycmVuY3kiIDogIlVTRCIsICJkZXNjcmlwdGlv
	biIgOiAiZGVzY3JpcHRpb24gdGV4dCIsICJvcmRlcl9pZCIgOiAib3JkZXJfaWRfMSIgfQ=="/>
    <input type="hidden" name="signature" value="QvJD5u9Fg55PCx/Hdz6lzWtYwcI="/>
    <input type="image"
           src="//static.liqpay.ua/buttons/p1ru.radius.png"/>
</form>