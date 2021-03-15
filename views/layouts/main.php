<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

$departments = department();

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <?= Html::csrfMetaTags() ?>
    <?php $this->registerLinkTag([
        'rel' => 'shortcut icon',
        'type' => 'image/x-icon',
        'href' => '/images/logo.svg',
    ]); ?>
    <title>Cardio | <?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <div class="colorlib-loader"></div>
    
    <div id="page">
        <nav class="colorlib-nav" role="navigation">
            <div class="top-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="top">
                                <div class="row">
                                    <div class="col-md-6 logo__links">
                                        <div id="colorlib-logo">
                                            <a href="<?= Url::home() ?>">
                                                <?= Html::img("@web/images/Logotip.svg", ['alt' => 'cardio', 'class'=>'logo']) ?>
                                            </a>
                                        </div>
                                        <div class="right__links">
                                            <div class="time">
                                                <p>Работаем с 9:00 до 21:00<br>с пн. по пт.</p>
                                            </div>
                                            <div>
                                                <!-- Пользователь -->
                                                <?php if (Yii::$app->user->isGuest): ?> <!-- гость -->
                                                    <a class="personal__cab" href="<?= Url::to("/login") ?>">Войти</a>
                                                <?php else: ?> <!-- Авторизованный пользователь -->
                                                    <a class="personal__cab" href="<?= Url::to('/site/logout') ?>"></a>
                                                    <!-- Для администратора -->
                                                    <span>
                                                        <?= Yii::$app->user->identity['username'] ?><?php if (Yii::$app->user->identity['whois'] == 1){ ?> | <a href="<?= Url::to('/admin') ?>">админка</a><?php } ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="num">
                                            <span class="faicon icon"><i class="fa fa-phone-alt fa-2x" style="color: #1FCCD7"></i></span>
                                            <span class="text__cont"><?= Yii::$app->params['phone'] ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="loc">
                                            <span class="faicon icon" style="color: #1FCCD7;"><i class="fa fa-map-marker-alt fa-2x"></i></span>
                                            <span class="text__cont"><?= Yii::$app->params['address'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="menu-1">
                                    <ul>
                                        <li class="has-dropdown">
                                            <a href="<?= Url::home() ?>">О центре</a>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="<?= Url::to("/department") ?>">Отделения</a>
                                            <ul class="dropdown">
                                                <?php foreach ($departments as $department): ?>
                                                    <li><a href="<?= Url::to("/department/" . $department->id) ?>"><?= $department->title ?></a></li>
                                                <?php endforeach ?>
                                            </ul>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="#">Пациентам</a>
                                            <ul class="dropdown">
                                                <li><a href="<?= Url::to("/price") ?>">Прейскурант</a></li>
                                                <li><a href="<?= Url::to("/faq") ?>">FAQ</a></li>
                                                <li><a href="<?= Url::to("/reviews") ?>">Отзывы</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="<?= Url::to('/doctor') ?>">Врачи</a>
                                        </li>
                                        <li><a href="<?= Url::to('/contacts') ?>">Контакты</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <p class="btn-cta"><a href="<?= Url::to("/appointment") ?>"><span>Записаться к врачу <i class="fas fa-calendar-alt"></i></span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <?= $content ?>

        <footer id="colorlib-footer" role="contentinfo">
        <div class="overlay"></div>
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-3 colorlib-widget">
                    <div class="footer__img">
                        <a href="<?= Url::home() ?>"><?= Html::img("@web/images/logo_dark.svg", ['alt'=>'logo']) ?></a>
                    </div>
                    <p>Рядом с ними протекает небольшая речка Дуден, которая снабжает их необходимой регелиалией. Это райская страна, в которой жареные части предложений летят вам в рот.</p>
                </div>
                <div class="col-md-3 col-md-push-1 colorlib-widget">
                    <h3>Навигация</h3>
                    <ul class="colorlib-footer-links">
                        <li><a href="<?= Url::home() ?>"><i class="fas fa-check"></i> О центре</a></li>
                        <li><a href="<?= Url::to("/department") ?>"><i class="fas fa-check"></i> Отделения</a></li>
                        <li><a href="<?= Url::to("/price") ?>"><i class="fas fa-check"></i> Прейскурант</a></li>
                        <li><a href="<?= Url::to("/doctor") ?>"><i class="fas fa-check"></i> Врачи</a></li>
                        <li><a href="<?= Url::to("/contacts") ?>"><i class="fas fa-check"></i> Контакты</a></li>
                    </ul>
                </div>

                <div class="col-md-3 colorlib-widget">
                    <h3>Наши отделения</h3>
                    <ul class="colorlib-footer-links">
                        <?php foreach ($departments as $dep): ?>
                            <li><a href="<?= Url::to("/department".$dep->id) ?>"><i class="fas fa-check"></i> <?= $dep->title ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>

                <!-- <div class="col-md-3 colorlib-widget">
                    <h3>Записаться к врачу</h3>
                    <form class="contact-form">
                        <div class="form-group">
                            <label for="name" class="sr-only">Имя</label>
                            <input type="name" class="form-control" id="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="message" class="sr-only">Сообщение</label>
                            <textarea class="form-control" id="message" rows="3" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" id="btn-submit" class="btn btn-primary btn-send-message btn-md" value="Send Message">
                        </div>
                    </form>
                </div> -->
            </div>
        </div>
        <div class="row copyright">
            <div class="col-md-12 text-center">
                <p>
                    <small class="block"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy; All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</small> 
                    <small class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> , <a href="https://www.pexels.com/" target="_blank">Pexels</a></small>
                </p>
            </div>
        </div>
    </footer>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop faicon"><i class="fa fa-arrow-up fa-lg"></i></a>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
