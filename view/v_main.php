<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
          crossOrigin="anonymous"/>
    <link rel="stylesheet" href="/source/css/style.css">
</head>
<body>
<div class="body-wrapper">

    <div class="header">
        <div class="container">
            <div class="header__content inner inner--flex inner--flex-between">
                <div class="inner inner--flex inner--flex-middle">
                    <a href="/index.php?c=home" class="link link--white link--mr-30">Home</a>
                    <a href="/index.php?c=about" class="link link--white link--mr-30">About us</a>
                    <a href="/index.php?c=contacts" class="link link--white link--mr-30">Contacts</a>
                    <a href="/index.php?c=donate" class="link link--white">Donate</a>
                </div>
                <div class="inner">
                    <a class="link link--white" href="#">Разместить
                        объявление</a>
                    <a class="link link--white link--like link--ml-30" href="#"></a>
                    <a class="link link--white link--login link--ml-30" href="#">Вход
                        / Регистрация</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="content__basic inner inner--flex">

                <div class="content__main content__main--wide">
                    <h1 class="text text--title-s"><?=$title?></h1>
                    <div class="inner inner--flex inner--flex-between inner--flex-wrap">

                        <?=$content?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="footer__uphead">
        </div>
        <div class="container">
            <div class="inner inner--flex inner--flex-between inner--py-24">
                <div class="inner">
                    <a href="/">
                        <img class="footer__logo" src="/source/img/static/logotype.png" alt="footer logo"/>
                    </a>
                </div>
                <div class="inner inner--flex inner--flex-column">
                    <div class="footer__title text text--title-s">Company info</div>
                    <a href="#" class="footer__link link--black">Blog</a>
                    <a href="#" class="footer__link link--black">About us</a>
                    <a href="#" class="footer__link link--black">Contacts</a>
                    <a href="#" class="footer__link link--black">Vacancy</a>
                </div>
                <div class="inner inner--flex inner--flex-column">
                    <div class="footer__title text text--title-s">CLIMB LIMITED - T/A ROCK + RUN</div>
                    <div class="inner inner--mb-12">
                        <div class="footer__text">Company Number: 03252430</div>
                        <div class="footer__text">VAT Number: GB378556010</div>
                    </div>
                    <div class="inner inner--mb-12">
                        <div class="footer__text">Rock + Run, Shoreline Business Park, Sandside,</div>
                        <div class="footer__text">Cumbria, LA7 7BF, United Kingdom.</div>
                    </div>
                    <div class="inner">
                        <div class="footer__text">Please note: We do not offer in-store purchase,</div>
                        <div class="footer__text">only Click & Collect.</div>
                    </div>
                </div>
                <div class="inner inner--flex inner--flex-column">
                    <div class="footer__title text text--title-s">Follow Us</div>
                    <div class="social inner inner--flex">
                        <a class="social__link social__link--mr-12 social__link--vk" href="#"></a>
                        <a class="social__link social__link--mr-12 social__link--tw" href="#"></a>
                        <a class="social__link social__link--mr-12 social__link--yt" href="#"></a>
                        <a class="social__link social__link--telegr" href="#"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="/source/js/common.js"></script>
</body>
</html>