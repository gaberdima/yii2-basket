<?php

namespace app\controllers;
use app\models\OpOrder;
use app\models\users;
use Yii;

class AdminController extends \yii\web\Controller
{
    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionUser()
    {
//        var_dump($_POST);
//        exit;
        $order = OpOrder::find()->all();
        $user = Users::find()->all();

//        $email_user = Yii::$app->request->post('email');
        $email_user = Yii::$app->request->post('email');
        $password_user = md5(Yii::$app->request->post('password'));





        return $this->render('user', ['order' => $order, 'user' => $user, 'email_user' => $email_user, 'password_user' => $password_user]);

    }
    public function actionCard_admin_order(){


        return $this->render('card_admin_order');
    }


}
