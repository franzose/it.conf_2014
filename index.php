<?php
$_pages = array(
    '#summary'   => 'О конференции',
    '#audience'  => 'Слушателям',
    '#speakers'  => 'Докладчикам',
    '#schedule'  => 'Программа'
);

$_partials = array(
    '_summary',
    '_audience',
    '_speakers',
    '_schedule',
    '_partners'
);
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>Сахалинская IT-конференция 2014</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600&subset=latin,cyrillic" rel="stylesheet">
        <link rel="stylesheet" href="css/social-likes_birman.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
<body>
    <div class="layout">
        <header class="header">
            <div class="logo">
                <div class="logo__text">IT.conf_2014</div>
                <div class="logo__tagline">
                    Сахалинская конференция,<br>
                    посвященная информационным технологиям
                </div>
            </div>
            <div class="main-menu">
                <ul class="nav">
                    <?php foreach($_pages as $uri => $title): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $uri; ?>"><?php echo $title; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="social-likes">
                    <div class="facebook" title="Поделиться ссылкой на Фейсбуке">Facebook</div>
                    <div class="vkontakte" title="Поделиться ссылкой во Вконтакте">Вконтакте</div>
                    <div class="twitter" title="Поделиться ссылкой в Твиттере">Twitter</div>
                </div>
            </div>
        </header>
        <main>
            <?php foreach($_partials as $p) include $p . '.php'; ?>
        </main>
    </div><!-- /.layout -->
    <footer class="footer">
        <div class="footer__wrapper">
            По любым вопросам обращайтесь:
            <a class="footer__link" href="mailto:itconf@uhss.ru">itconf@uhss.ru</a>,
            <a class="footer__link" href="xmpp:asdx@talkers.im">xmpp:asdx@talkers.im</a>
            <div class="footer__confs">
                <a class="footer__conf footer__conf_orange" href="/2009">IT.conf_2009</a>
                <a class="footer__conf footer__conf_blue" href="/2010">IT.conf_2010</a>
                <a class="footer__conf footer__conf_green" href="/2011">IT.conf_2011</a>
                <a class="footer__conf footer__conf_purple" href="/2012">IT.conf_2012</a>
            </div>
        </div>
    </footer>
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/social-likes.min.js"></script>
    <script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
    <script src="js/ya-map.js"></script>
</body>
</html>