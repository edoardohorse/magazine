<?php include_once('../wp-includes/template.php'); ?>
<html>
    <head>
        <script src="splide.min.js"></script>
        <link href="splide.min.css" rel="stylesheet">
        <link rel="stylesheet" href="magazine.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <!-- <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE"> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/brands.min.js"></script>

    </head>
    <body>
        <?php include_once('../wp-content/themes/Newsmag-child/parts/header/magazineMenu.php'); ?>
        <main>
            <h2 class="title">RB C<span>asting</span></h2>
            <section id="search">

                <h3 idContent="search_title"></h3>
                <div class="search_input_wrapper">
                    <form action="https://testi.rbcasting.com/search" method="GET">
                        <div class="search_input">
                            <!-- TODO action https://testi.rbcasting.com/search?q=pippo -->
                            <!-- TODO https://rbcasting.com/rb/search?q=pippo -->
                            <input type="search" class="searchbox" name="q"
                                idContent="placeholder_artist" idContentAttribute="placeholder">
                            <div class="box"></div>
                            <button class="search_input_btn btn_icon"
                                idContent="btn_search_artist" idContentAttribute="title"></button>
                        </div>
                    </form>
                    <a class="btn_lnk" idContent="btn_search_advance"></a>
                </div>
            </section>
            <section id="icons">
                <div class="icons_btn"><a data-icon="plus"  idContent="lnk_create_casting" class="btn_icon"></a><p idContent="btn_lnk_create_casting"></p></div>
                <div class="icons_btn"><a data-icon="users" idContent="lnk_users" class="btn_icon"></a><p idContent="btn_lnk_users"></p></div>
                <div class="icons_btn"><a data-icon="signin" idContent="lnk_signup" class="btn_icon"></a><p idContent="btn_signin"></p></div>
                <div class="icons_btn"><a data-icon="casting"   idContent="lnk_casting" class="btn_icon"></a><p idContent="btn_lnk_casting"></p></div>
                <div class="icons_btn"><a data-icon="magazine"  idContent="lnk_magazine" class="btn_icon"></a><p idContent="btn_lnk_magazine"></p></div>
            </section>
            <section id="slideshow_wrapper">
                <h2 idContent="magazine_title"></h2>
                <p idContent="magazine_subtitle"></p>
                <div id="slideshow_magazine">
                    <!-- <button class="btn_prev"><</button> -->
                    <div class="splide" role="group" aria-label="Splide Basic HTML Example">
                        <div class="splide__track">
                            <ul class="splide__list" id="slideshow_magazine_list">
                               <!--  <li class="splide__slide">
                                    <div class="slideshow_slide">
                                        <img src="./img/slideshow/1.jpg" alt="./magazine/slideshow/1.jpg">
                                        <div class="slideshow_label">avatar</div>
                                    </div>
                                </li>
                                <li class="splide__slide"><div class="slideshow_slide"><img src="./img/slideshow/2.jpg" alt="./magazine/slideshow/2.jpg"><div class="slideshow_label">the whale</div></div></li>
                                <li class="splide__slide"><div class="slideshow_slide"><img src="./img/slideshow/3.jpg" alt="./magazine/slideshow/3.jpg"><div class="slideshow_label">pulp fiction</div></div></li>
                                <li class="splide__slide"><div class="slideshow_slide"><img src="./img/slideshow/4.jpg" alt="./magazine/slideshow/4.jpg"><div class="slideshow_label">eightful eight</div></div></li>
                                <li class="splide__slide"><div class="slideshow_slide"><img src="./img/slideshow/5.jpg" alt="./magazine/slideshow/5.jpg"><div class="slideshow_label">kill bill</div></div></li>
                                <li class="splide__slide"><div class="slideshow_slide"><img src="./img/slideshow/6.jpg" alt="./magazine/slideshow/6.jpg"><div class="slideshow_label">unce upon a time in hollywood</div></div></li> -->
                            </ul>
                        </div>
                    </div>
                    <!-- <button class="btn_next">></button> -->
                </div>
                </div>
                <div class="search_input_wrapper">
                    <form action="">
                        <div class="search_input">
                            <!-- TODO search magazine -->
                            <input type="search" class="searchbox" name="search_magazine"
                                idContent="placeholder_magazine" idContentAttribute="placeholder">
                            <div class="box"></div>
                            <button class="search_input_btn btn_icon"
                                idContent="btn_search_magazine" idContentAttribute="title"></button>
                        </div>
                    </form>
                    <a class="btn_lnk" idContent="btn_lnk_magazine"></a>
                </div>
            </section>
            <section id="opportunita_wrapper">
                <h2 idContent="opportunita_title"></h2>
                <p idContent="opportunita_subtitle"></p>
                <div class="opportunita">
                    <section >
                        <header idContent="header_opportunita_attore">
                        </header>
                        <main>
                            <div class="opportunita_content" idContent="section_opportunita_attore">
                            </div>
                        </main>
                    </section>
                    <section>
                        <header idContent="header_opportunita_casting_director"></b>
                        </header>
                        <main>
                            <div class="opportunita_content" idContent="section_opportunita_casting_director">
                            </div>
                        </main>
                        
                    </section>
                    <section>
                        <header idContent="header_opportunita_agente">
                        </header>
                        <main>
                            <div class="opportunita_content" idContent="section_opportunita_agente">
                            </div>
                        </main>

                    </section>
                    <section>
                        <header idContent="header_opportunita_audizione">
                        </header>
                        <main>
                            <div class="opportunita_content" idContent="section_opportunita_audizione">
                            </div>
                        </main>

                    </section>
                </div>
                <a class="btn_lnk btn_lnk--uppercase" idContent="btn_login"></a>
                <a class="btn_lnk btn_lnk--secondary btn_lnk--uppercase" idContent="btn_signin"></a>
                <!-- <a class="lnk" idContent="btn_lnk_guest"></a> -->
            </section>
            <section id="casting">
                <div class="casting_info">
                    <h2 idContent="casting_title"></h2>
                    <div class="casting_info_btns">
                        <a class="btn_lnk btn_lnk--uppercase" idContent="btn_lnk_castlist"></a>
                         <a class="btn_lnk btn_lnk--secondary btn_lnk--uppercase" idContent="btn_lnk_create_casting"></a>
                    </div>
                </div>
                <div id="casting_images" class="casting_images"></div>
            </section>
            <footer>
                
                <div class="footer_content">
                    <!-- <div class="footer_lnks">/ -->
                        <a class="lnk" idContent="lnk_privacy_policy">Privacy Policy</a>
                        
                    <!-- </div> -->
                    <div class="footer_logo">

                        <img width="124" height="56" src="https://testi.rbcasting.com/o/profile-theme/images/company_logo.gif"
                        alt="./magazine/img/logo.png">
                        <div class="footer_social">
                            <a idContent="lnk_fb" target="_blank"><i class="fa-brands fa-facebook-square"></i></a>
                            <a idContent="lnk_ig" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                            <a idContent="lnk_tw" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                            <a idContent="lnk_yt" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                    <a class="lnk" idContent="lnk_cookie_policy"></a>
                </div>
                <p idContent="copyright"></p>
            </footer>
        </main>
    </body>
    <script src="magazine.js"></script>
</html>