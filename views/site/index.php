<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Главная';
?>

<div class="banner">
    <div class="banner__inner">
        <div class="slide slide_main active__slide" style="background-image: url(<?= Url::to("@web/images/slider/slide1.jpg"); ?>)"></div>
        <div class="slide slide_main" style="background-image: url(<?= Url::to("@web/images/slider/slide2.jpg"); ?>)"></div>
        <div class="slide slide_main" style="background-image: url(<?= Url::to("@web/images/slider/slide3.jpg"); ?>)"></div>
    </div>
</div>

<div id="colorlib-intro">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="intro animate-box">
                    <?php foreach ($dep as $value): ?>
                    <div class="intro-grid color-1">
                        <span class="icon"><i class="flaticon-hospital"></i></span>
                        <h3><?= $value->title ?></h3>
                        <p class="dep_descr"><?= $value->description ?>...</p>
                        <a href="<?= Url::to("/department/$value->id") ?>">Читать</a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" id="content">

    <div class="site-index">

        <div id="colorlib-about">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <img class="img-responsive about-img" src="images/about.jpg" alt="">
                    </div>
                    <div class="col-md-7 col-md-push-1">
                        <h2>О нас</h2>
                        <p>
                        </p>
                            <div class="fancy-collapse-panel">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                         <div class="panel panel-default">
                             <div class="panel-heading" role="tab" id="headingOne">
                                 <h4 class="panel-title">
                                     <a id="link" href="#one" data-id="collapseOne"></span>Почему мы?
                                     </a>
                                 </h4>
                             </div>
                             <div id="collapseOne" class="panel-collapse collapse in" data-toggle="one">
                                 <div class="panel-body">
                                     <div class="row">
                                                <div class="col-md-6">
                                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                                </div>
                                            </div>
                                 </div>
                             </div>
                         </div>
                         <div class="panel panel-default">
                             <div class="panel-heading" role="tab" id="headingOne">
                                 <h4 class="panel-title">
                                     <a id="link" class="collapsed" href="#two" data-id="collapseTwo">Что мы делаем?
                                     </a>
                                 </h4>
                             </div>
                             <div id="collapseTwo" class="panel-collapse collapse" data-toggle="one">
                                 <div class="panel-body">
                                     <div class="row">
                                                <div class="col-md-6">
                                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                                </div>
                                            </div>
                                 </div>
                             </div>
                         </div>
                         <div class="panel panel-default">
                             <div class="panel-heading" role="tab" id="headingOne">
                                 <h4 class="panel-title">
                                     <a id="link" class="collapsed" href="#three" aria-expanded="false" data-id="collapseThree">Наши сервисы
                                     </a>
                                 </h4>
                             </div>
                             <div id="collapseThree" class="panel-collapse collapse" data-toggle="one">
                                 <div class="panel-body">
                                     <div class="row">
                                                <div class="col-md-6">
                                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                                </div>
                                            </div>
                                 </div>
                             </div>
                         </div>
                      </div>
                   </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="colorlib-services">
            <div class="container">
                <div class="row animate-box">
                    <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
                        <h2>Наши преимущества</h2>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 animate-box">
                        <div class="services">
                            <span class="faicon icon">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                            <div class="desc">
                                <h3><a href="#">Квалифицированные доктора</a></h3>
                                <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 animate-box">
                        <div class="services">
                            <span class="faicon icon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <div class="desc">
                                <h3><a href="#">Консультации специалистов</a></h3>
                                <p>Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 animate-box">
                        <div class="services">
                            <span class="faicon icon">
                                <i class="fa fa-ambulance fa-2x" style="color: #fff;"></i>
                            </span>
                            <div class="desc">
                                <h3><a href="#">Служба скорой помощи</a></h3>
                                <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 animate-box">
                        <div class="services">
                            <span class="faicon icon">
                                <i class="fa fa-stethoscope fa-2x" style="color: #fff"></i>
                            </span>
                            <div class="desc">
                                <h3><a href="#">Банк крови</a></h3>
                                <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 animate-box">
                        <div class="services">
                            <span class="faicon icon">
                                <i class="fa fa-user-nurse fa-2x" style="color: #fff"></i>
                            </span>
                            <div class="desc">
                                <h3><a href="#">Операционный зал</a></h3>
                                <p>Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 animate-box">
                        <div class="services">
                            <span class="faicon icon">
                                <i class="fa fa-handshake fa-2x" style="color: #fff"></i>
                            </span>
                            <div class="desc">
                                <h3><a href="#">Бесплатная медицина</a></h3>
                                <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="colorlib-doctor">
            <div class="container">
                <div class="row animate-box">
                    <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
                        <h2>Лучшие специалисты</h2>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12 animate-box text-center">
                        <div class="doctor">
                            <div class="staff-img" style="background-image: url(images/staff-4.jpg);"></div>
                            <div class="desc">
                                <h3><a href="#">Dr. Beatrice Prior</a></h3>
                                <span>Стоматолог-гигиенист</span>
                                <ul class="colorlib-social">
                                    <li><a href="#" class="faicon"><i class="fab fa-facebook-f fa-lg"></i></a></li>
                                    <li><a href="#" class="faicon"><i class="fab fa-twitter fa-lg"></i></a></li>
                                    <li><a href="#" class="faicon"><i class="fab fa-linkedin fa-lg"></i></a></li>
                                    <li><a href="#" class="faicon"><i class="fab fa-instagram fa-lg"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 animate-box text-center">
                        <div class="doctor">
                            <div class="staff-img" style="background-image: url(images/staff-2.jpg);"></div>
                            <div class="desc">
                                <h3><a href="#">Dr. Edward Dughlas</a></h3>
                                <span>Ортопедический хирург</span>
                                <ul class="colorlib-social">
                                    <li><a href="#" class="faicon"><i class="fab fa-facebook-f fa-lg"></i></a></li>
                                    <li><a href="#" class="faicon"><i class="fab fa-twitter fa-lg"></i></a></li>
                                    <li><a href="#" class="faicon"><i class="fab fa-linkedin fa-lg"></i></a></li>
                                    <li><a href="#" class="faicon"><i class="fab fa-instagram fa-lg"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 animate-box text-center">
                        <div class="doctor">
                            <div class="staff-img" style="background-image: url(images/staff-3.jpg);"></div>
                            <div class="desc">
                                <h3><a href="#">Dr. Peter Parker</a></h3>
                                <span>Терапевт</span>
                                <ul class="colorlib-social">
                                    <li><a href="#" class="faicon"><i class="fab fa-facebook-f fa-lg"></i></a></li>
                                    <li><a href="#" class="faicon"><i class="fab fa-twitter fa-lg"></i></a></li>
                                    <li><a href="#" class="faicon"><i class="fab fa-linkedin fa-lg"></i></a></li>
                                    <li><a href="#" class="faicon"><i class="fab fa-instagram fa-lg"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 animate-box text-center">
                        <div class="doctor">
                            <div class="staff-img" style="background-image: url(images/staff-1.jpg);"></div>
                            <div class="desc">
                                <h3><a href="#">Dr. Liza Thomas</a></h3>
                                <span>Менеджер По Обслуживанию Пациентов</span>
                                <ul class="colorlib-social">
                                    <li><a href="#" class="faicon"><i class="fab fa-facebook-f fa-lg"></i></a></li>
                                    <li><a href="#" class="faicon"><i class="fab fa-twitter fa-lg"></i></a></li>
                                    <li><a href="#" class="faicon"><i class="fab fa-linkedin fa-lg"></i></a></li>
                                    <li><a href="#" class="faicon"><i class="fab fa-instagram fa-lg"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="colorlib-counter" class="colorlib-counters" style="background-image: url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 text-center animate-box">
                                <span class="faicon icon"><i class="far fa-smile fa-3x" style="color: #fff"></i></span>
                                <span class="colorlib-counter js-counter" data-from="0" data-to="3297" data-speed="5000" data-refresh-interval="50"></span>
                                <span class="colorlib-counter-label">Довольные клиенты</span>
                            </div>
                            <div class="col-md-3 col-sm-6 text-center animate-box">
                                <span class="faicon icon"><i class="fas fa-hospital fa-3x" style="color: #fff"></i></span>
                                <span class="colorlib-counter js-counter" data-from="0" data-to="378" data-speed="5000" data-refresh-interval="50"></span>
                                <span class="colorlib-counter-label">Госпитали</span>
                            </div>
                            <div class="col-md-3 col-sm-6 text-center animate-box">
                                <span class="faicon icon"><i class="fa fa-user-md fa-3x" style="color: #fff"></i></span>
                                <span class="colorlib-counter js-counter" data-from="0" data-to="400" data-speed="5000" data-refresh-interval="50"></span>
                                <span class="colorlib-counter-label">Квалифицированных врачей</span>
                            </div>
                            <div class="col-md-3 col-sm-6 text-center animate-box">
                                <span class="faicon icon"><i class="fas fa-ambulance fa-3x" style="color: #fff"></i></span>
                                <span class="colorlib-counter js-counter" data-from="0" data-to="30" data-speed="5000" data-refresh-interval="50"></span>
                                <span class="colorlib-counter-label">Отделы</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="colorlib-testimonial" class="colorlib-bg-section">
            <div class="container">
                <div class="row animate-box">
                    <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
                        <h2>Что о нас говорят</h2>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col animate-box">
                       <div class="reviews">
                           <div class="review">
                                <div class="review__inner">
                                    <div class="review__image">
                                        <img class="review__image-img" src="images/person1.jpg" alt="">
                                    </div>
                                    <div class="review__text">
                                        <div class="review__text-title">
                                            Justine Mill
                                        </div>
                                        <div class="review__text-descr">
                                            "The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli."
                                        </div>
                                        <div class="review__text-score">
                                            <p class="color"><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="far fa-star"></i></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="review">
                                <div class="review__inner">
                                    <div class="review__image">
                                        <img class="review__image-img" src="images/person2.jpg" alt="">
                                    </div>
                                    <div class="review__text">
                                        <div class="review__text-title">
                                            Edward Tom
                                        </div>
                                        <div class="review__text-descr">
                                            "The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli."
                                        </div>
                                        <div class="review__text-score">
                                            <p class="color"><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="review">
                                <div class="review__inner">
                                    <div class="review__image">
                                        <img class="review__image-img" src="images/person3.jpg" alt="">
                                    </div>
                                    <div class="review__text">
                                        <div class="review__text-title">
                                            John Bay
                                        </div>
                                        <div class="review__text-descr">
                                            "The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli."
                                        </div>
                                        <div class="review__text-score">
                                            <p class="color"><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>