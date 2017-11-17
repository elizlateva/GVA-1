<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/eli/scss/style.css">
    <link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

    <script src="https://projects.lukehaas.me/scrollify/script/jquery-2.2.1.min.js"></script>

    <script src="https://projects.lukehaas.me/scrollify/script/jquery.scrollify.js"></script>

    <title>GVA</title>
</head>

<body>
    <header class="header">
        <div class="header-inner">
            <a href="#" class="logo" alt="">
                <img src="/eli/css/images/logo.png">
            </a>
            <nav class="menu">
                <ul class="active">
                    <li>
                        <a href="# ">Accueil </a>
                    </li>
                    <li>
                        <a href="# ">Notre service</a>
                    </li>
                    <li>
                        <a href="# ">Réservation  </a>
                    </li>
                    <li>
                        <a href="# "> Avis clients </a>
                    </li>
                    <li>
                        <a href="# "> Accès </a>
                    </li>
                    <li>
                        <a href="# ">Contact</a>
                    </li>
                </ul>
                <div class="select-lang ">
                    <select>
                        <option value="EN " selected=" ">fr</option>
                        <option value="French ">en</option>
                        <option value="Spanish ">de</option>
                    </select>
                </div> <!--/.select-lang-->
                <a class="toggle-nav"><i class=" fa fa-bars fa-2x " aria-hidden="true "></i></a>
            </nav><!--/.menu-->
        </div><!--/.header-inner-->
    </header> <!--/header-->
        
    <section class="reservation-section">
        <div class="main ">
            <div class="main-inner ">
                <div class="reservation-form ">
                    <div class="reservation-form-center">
                        <form>
                            <div class="input-inline">
                                <label>Date de départ</label>
                                <input type="date " name="calendar ">
                            </div><!-- /.input-inline -->
                                    <div class="input-inline">
                                    <label class="label-center">Heure de rendez-vous</label>
                                        <div class="select-center">
                                            <div class="select-wrapper ">
                                             <select> 
                                             <option value="HH " selected=" ">HH</option>
                                             <option value="00 ">00</option>
                                             <option value="01 ">01</option>
                                             <option value="02 ">02</option>
                                             <option value="03 ">03</option>
                                             <option value="04 ">04</option>
                                             <option value="05 ">05</option>
                                             <option value="06 ">06</option>
                                             </select>
                                            </div>
                                            <div class="select-wrapper ">
                                             <select> 
                                             <option value="MM " selected=" ">MM</option>
                                             <option value="00 ">00</option>
                                             <option value="30 ">10</option>
                                             <option value="0100 ">20</option>
                                             <option value="0130 ">30</option>
                                             <option value="0200 ">40</option>
                                             <option value="0230 ">50</option>
                                             </select>
                                            </div>
                                        </div>
                                    </div><!-- /.input-inline -->
                                    <div class="input-inline">
                                         <label>Date de retour</label>
                                         <input type="date " name="calendar ">
                                    </div><!-- /.input-inline -->
                                    <div class="input-inline">
                                         <label class="label-center">Heure de retour</label>
                                        <div class="select-center">
                                            <div class="select-wrapper ">
                                             <select> 
                                             <option value="HH " selected=" ">HH</option>
                                             <option value="00 ">00</option>
                                             <option value="01 ">01</option>
                                             <option value="02 ">02</option>
                                             <option value="03 ">03</option>
                                             <option value="04 ">04</option>
                                             <option value="05 ">05</option>
                                             <option value="06 ">06</option>
                                            </select>
                                            </div>
                                            <div class="select-wrapper ">
                                            <select> 
                                            <option value="MM " selected=" ">MM</option>
                                            <option value="00 ">00</option>
                                            <option value="30 ">10</option>
                                            <option value="0100 ">20</option>
                                            <option value="0130 ">30</option>
                                            <option value="0200 ">40</option>
                                            <option value="0230 ">50</option>
                                            </select>
                                           </div>
                                        </div>
                                    </div><!-- /.input-inline -->
                        </form><!--/form-->
                    </div><!--/.reservation-form-center-->
                <div class="reservation-button ">
                            <button type="button ">Réservation</button>
                        </div><!--/.reservation-button-->
                    </div><!--/.reservation-form-->
            </div><!--/.main-inner-->
        </div> <!--/.main-->
        <div class="reservation-section-footer ">
            <div class="reservation-section-footer-center ">
                    <img src="/eli/css/images/car-icon.png">
                    <p class="reservation-footer-text">Park &amp; Fly</p>
                    <img src="/eli/css/images/fly-icon.png">
                </div><!--/.reservation-section-footer-center-->
            </div><!--/.reservation-section-footer-->
        </section>

        @yield('content')

    <footer class="footer">
        <div class="footer-inner ">
            <div class="contact ">
                <p>022 510 14 40</p>
            </div> <!--/.contact-->
            <div class="footer-image-center">
                <div class="clients ">
                    <img src="/eli/css/images/widget.png ">
                </div><!--/.clients-->
                <div class="payments ">
                    <ul>
                        <li><img class="image-center" src="/eli/css/images/post_finance.png"></li>
                        <li><img class="image-center" src="/eli/css/images/visa.png"></li>
                        <li><img class="image-center" src="/eli/css/images/master_card.png"></li>
                        <li><img class="image-center" src="/eli/css/images/pay_pal.png"></li>
                        <li><img src="/eli/css/images/american_express.png" class="round-border"></li>
                        <li><img src="/eli/css/images/twint.png"></li>
                        <li><img src="/eli/css/images/klarna.png"></li>
                    </ul>
                </div><!--/.payments-->
            </div><!--/.footer-image-center-->
            <div class="cr-text ">
                <p>© Copyright 2017 GVA park.Ch. Tous Droits Sont réservé création du site internet – BGCS</p>
            </div><!--/.cr-text-->
            <div class="social ">
                <a href="#">Follow us</a>
            </div> <!--/.social-->
        </div><!--/.footer-inner-->
    </footer><!--footer-->

    <script src="/eli/vendors/app.js"></script>
</body>

</html>