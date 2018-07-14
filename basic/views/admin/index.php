<?php
$session = Yii::$app->session;
$session->open();

    ?>

    <div class="container">

        <form action="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/user" class="form-signin exit"
              method="post">
            <h2 class="form-signin-heading">Please sign in</h2>
            <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <label class="checkbox">

                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>

    </div>
