<?php

namespace app\controllers;
use app\models\Catalog;
use app\models\Category;
use app\models\OpBil;
use app\models\OpOrder;
use app\models\TestClass;
use yii\data\Pagination;
use Yii;

class PageController extends \yii\web\Controller


{
    public function actionCatalog()
    {
        $session = Yii::$app->session;
        $session->open();



        $category = Category::find()->all();
        $catalog = Catalog::find();

        $test = TestClass::test();
        echo $test;
//        var_dump($test);

//         $countQuery = $catalog;
//         $pages = new Pagination(['totalCount' => count($countQuery), 'pageSize' => 5]);
////         $pages->pageSizeParam = false;
//         $models = $catalog->offset($pages->offset)
//         ->limit($pages->limit)
//         ->all();
//         var_dump($models);

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $catalog->count()
        ]);
        $catalog = $catalog->offset($pagination->offset)->limit($pagination->limit)->all();


        return $this->render('catalog', ['product' => $catalog, 'category_name' => $category, 'pagination' => $pagination]);

    }


    public function actionCategory($category){
//        var_dump($category);
        $category_id = Category::findAll(['trans_name' => $category]);
        $categories_number = Catalog::find()->all();
        $category1 = Category::find()->all();

//        $pagination = new Pagination([
//            'defaultPageSize' => 5,
//            'totalCount' => $categories_number->count()
//        ]);
//        $categories_number = $categories_number->offset($pagination->offset)->limit($pagination->limit)->all();


        return $this->render('category', ['idCategory' => $category_id, 'category' => $categories_number, 'all_category' => $category1]);


    }




    public function actionCard($tovar){
        echo $tovar;

//        $id_tov = Yii::$app->request->get('id_tov');
//        var_dump($id_tov);
        $tov = Catalog::findAll(['chpu'=>$tovar]);
// var_dump($tov);
// exit;
        return $this->render('card', ['tov' => $tov]);
    }

    public function actionAddcard(){
        $session = Yii::$app->session;
        $session->open();
//var_dump($_GET);
//exit;
        $name = Yii::$app->request->get('name');
//        $name = mysql_real_escape_string($_GET['name']);
        $id = Yii::$app->request->get('id');
        $price = Yii::$app->request->get('price');
        $image = Yii::$app->request->get('image');
        $article = Yii::$app->request->get('article');
        $chpu = Yii::$app->request->get('chpu');


        if(!empty($session['tov'])){

            $my_array = [$name, $id, $price, $image, 1, $price, $article, $chpu];
            $tmp_array = $session['tov'];
            array_push($tmp_array, $my_array);
            $session['tov'] = $tmp_array;

            $session['all_sum'] = $session['all_sum'] + $my_array[5];
        }
        else{
            $tov_array = [[$name, $id, $price, $image, 1, $price, $article, $chpu]];
            $session['tov'] = $tov_array;

            $session['all_sum'] = $session['all_sum'] + $tov_array[0][5];

            $my_insert =  new OpBil();
            $my_insert->name = $name;
            $my_insert->save();
//            var_dump($my_insert->id);
            $session['card'] = $my_insert->id;
        }

//var_dump($session['card']);

        $this->redirect('viewcard');
    }

    public function actionViewcard(){
        $session = Yii::$app->session;
        $session->open();
       return $this->render('addcard');
    }








    public function actionDel(){
        $session = Yii::$app->session;
        $session->open();
        $id = Yii::$app->request->get('id');
        $tmp_session = $session['tov'];
//var_dump($id);
        foreach ($tmp_session as $key => $value){
            $elem = $value[1];

//            var_dump($tmp_session[$key][5]);
//exit;
            if($id == $elem){
                $session['all_sum'] = $session['all_sum'] - $tmp_session[$key][5];
                unset($tmp_session[$key]);
            }
        }
        $session['tov'] = $tmp_session;
//        var_dump($session['tov']);
//        exit;
        $this->redirect('viewcard');
    }



    public function actionCount(){
        $session = Yii::$app->session;
        $session->open();
        $id = Yii::$app->request->get('id');
        $count = Yii::$app->request->get('count');
        $price = Yii::$app->request->get('price');
        $tmp = $session['tov'];
        $all_sum = 0;

        foreach ($session['tov'] as $key => $value){
            $elem = $value[1];
//            $_SESSION['id_element'] = $elem;
            if($id == $elem){
//                var_dump($tmp[$key]);
//                var_dump($tmp[$key][4]);

                 $tmp[$key][4] = $count;
                $sum = $count * $tmp[$key][2];
                $tmp[$key][5] = $sum;
                $session['tov'] = $tmp;

            }
            $all_sum = $all_sum + $tmp[$key][5];
            $session['all_sum'] = $all_sum;
//            var_dump($all_sum);
//            exit;
        }

        $this->redirect('viewcard');
    }


    public function actionTo_order(){
        $session = Yii::$app->session;
        $session->open();
        $email = Yii::$app->request->get('email');
//        var_dump($email);
//        exit;

        foreach ($session['tov'] as $key=>$value){
//            var_dump($value);
//            exit;
            $name = $value[0];
            $price = $value[2];
            $count = $value[4];
            $article = $value[6];
            $basket_number = $session['card'];


//            $my_insert = new OpOrder();
//
//            $my_insert->name = $name;
//            echo "hello";
//            $my_insert->price = $price;
//            $my_insert->count = $count;
//            $my_insert->article = $article;
//            $my_insert->basket_number = $basket_number;
//            $my_insert->email = $email;
//            $my_insert->save();


//            $my_insert = $connection
//                ->createCommand('INSERT INTO `OpOrder`(`price`, `name`, `article`, `count`, `email`, `basket_number`) VALUES ('$price','$name',$article,$count,'$email',$basket_number)')
//                ->execute();

            $my_insert = Yii::$app->db->createCommand("INSERT INTO `op_order`(`price`, `name`, `article`, `count`, `email`, `basket_number`) VALUES ('$price','$name',$article,$count,'$email',$basket_number)")
                ->execute();



            $session['tov'] = 0;
            $session['all_sum'] = 0;

        }
        echo "hello world 1";
        $tov = OpOrder::findAll(['basket_number' => $session['card']]);
        return $this->render('to_order', ['tov' => $tov]);
    }

    





















}
