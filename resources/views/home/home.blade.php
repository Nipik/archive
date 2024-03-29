    <!doctype html>
    <html lang="fr" class="no-js">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>DocTrack</title>
    <meta name="description" content="">
    <meta name="author" content="WebThemez">
    <link rel="stylesheet" href="{{ asset('css/home/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home/isotope.css') }}" media="screen" />
    <link rel="stylesheet" href="{{ asset('js/fancybox/jquery.fancybox.css') }}" type="text/css" media="screen" />
    <link href="{{ asset('css/home/animate.css') }}" rel="stylesheet" media="screen">
    <!--Flag-->
    <link rel="stylesheet" href="{{ asset('css/home/flag.css') }}">
    <!-- Favicon -->
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <!-- Owl Carousel Assets -->
    <link href="{{ asset('js/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home/styles.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    </head>

    <body>
    <header class="header">
    <div class="container">
        <nav class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
            <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a href="#" class="navbar-brand scroll-top logo  animated bounceInLeft"><b><i><img src="{{ asset('images/logo.png') }}" /></i></b></a> </div>
        <!--/.navbar-header-->
        <div id="main-nav" class="collapse navbar-collapse">
            <ul class="nav navbar-nav" id="mainNav">
            <li class="active" id="firstLink"><a href="#home" class="scroll-link">{{ __('messages.Home') }}</a></li>
            <li><a href="#service" class="scroll-link">{{ __('messages.Services') }}</a></li>
            <li><a href="{{ route('login') }}" class="scroll-link">{{ __('messages.Log in') }}</a></li>
            <li><a href="#team" class="scroll-link">{{ __('messages.Management') }}</a></li>
            <li><a href="#testimonials" class="scroll-link">{{ __('messages.Testimonials') }}</a></li>
            <li><a href="#comments" class="scroll-link">{{ __('messages.Comments') }}</a></li>
            <li><a href="#contactUs" class="scroll-link">{{ __('messages.Help') }}</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ __('messages.Languages') }} <span class="caret"></span></a>
                <ul class="dropdown-menu language-menu">
                    <li><a href="{{ route('setlang', ['lang' => 'en']) }}"><img src="{{ asset('images/USA.png') }}" alt="English"> <span class="language-name">English</span></a></li>
                    <li><a href="{{ route('setlang', ['lang' => 'ja']) }}"><img src="{{ asset('images/Japon.png') }}" alt="日本語"> <span class="language-name">日本語</span></a></li>
                    <li><a href="{{ route('setlang', ['lang' => 'ru']) }}"><img src="{{ asset('images/Russia.png') }}" alt="русский"> <span class="language-name">русский</span></a></li>
                    <li><a href="{{ route('setlang', ['lang' => 'zh']) }}"><img src="{{ asset('images/China.png') }}" alt="中国人"> <span class="language-name">中国人</span></a></li>
                    <li><a href="{{ route('setlang', ['lang' => 'fr']) }}"><img src="{{ asset('images/France.png') }}" alt="Frensh"> <span class="language-name">France</span></a></li>
                    <li><a href="{{ route('setlang', ['lang' => 'ko']) }}"><img src="{{ asset('images/Korean.png') }}" alt="한국"> <span class="language-name">한국</span></a></li>
                </ul>

        </div>
        <!--/.navbar-collapse-->
        </nav>
        <!--/.navbar-->
    </div>
    <!--/.container-->
    </header>
    <!--/.header-->
    <div id="#top"></div>
    <section id="home">
    <div class="banner-container">
        <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    <!-- Carousel items -->
    <div class="carousel-inner">
        <div class="active item"><img src="{{ asset('images/banner-bg.jpg') }}" alt="banner" /></div>
        <div class="item"><img src="{{ asset('images/banner-bg2.jpg') }}" alt="banner" /></div>
        <div class="item"><img src="{{ asset('images/banner-bg3.jpg') }}" alt="banner" /></div>
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#carousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#carousel" data-slide="next">&rsaquo;</a>
    </div>

    </div>

    <div class="container hero-text2">
            <div class="col-md-9">
            <h2 class="docArchiv">{{ __('messages.Why DocTrack?') }}</h2>
                <p class="paragraphe1">{{ __('messages.DocTrack offers a comprehensive range of features designed specifically to meet the unique needs, providing a robust and reliable solution for efficient mail management.') }}</p>
            </div>
            <div class="col-md-3">
                <a class="btn btn-apply " href="{{ route('login') }}">{{ __('messages.Log in') }}</a>
            </div>
    </div>
    </section>

    <!--/.container-->

    <section id="service" class="page-section">
        <div class="container">
        <div class="heading text-center">
            <h2>{{ __('messages.Our services') }}</h2>
            <p>{{ __('messages.Discover our mail management services') }}</p>
        </div>
        <div class="row">
            <!-- Service Item 1 -->
            <div class="col-md-4">
            <div class="service-item">
                <img src="{{ asset('images/email.jpg') }}" alt="Service d'archivage">
                <h3>{{ __('messages.Archiving') }}</h3>
                <p>{{ __('messages.We offer a secure archiving service for you, guaranteeing reliable and accessible storage of important documents.') }}</p>
            </div>
            </div>
            <!-- Service Item 2 -->
            <div class="col-md-4">
            <div class="service-item">
                <img src="{{ asset('images/classement.jpg') }}" alt="Service de classement">
                <h3> {{ __('messages.Ranking') }}</h3>
                <p>{{ __('messages.Our system allows efficient classification of letters based on personalized criteria, thus facilitating the search and management of documents.') }}</p>
            </div>
            </div>
            <!-- Service Item 3 -->
            <div class="col-md-4">
            <div class="service-item">
                <img src="{{ asset('images/update.jpg') }}" alt="Service de modification">
                <h3>{{ __('messages.Edit') }}</h3>
                <p>{{ __('messages.You can easily edit the information in saved mails, ensuring the data is accurate and up-to-date.') }}</p>
            </div>
            </div>
        </div>
        <div class="row">
            <!-- Service Item 4 -->
            <div class="col-md-4">
            <div class="service-item">
                <img src="{{ asset('images/add.jpg') }}" alt="Service d'ajout">
                <h3>{{ __('messages.Add') }}</h3>
                <p>{{ __('messages.With our system, you can quickly add new mail to the database, simplifying the process of managing information flows.') }}</p>
            </div>
            </div>
            <!-- Service Item 5 -->
            <div class="col-md-4">
            <div class="service-item">
                <img src="{{ asset('images/del.jpg') }}" alt="Service de suppression">
                <h3>{{ __('messages.Deletion') }}</h3>
                <p>{{ __('messages.We offer secure deletion features to efficiently manage obsolete or irrelevant documents, ensuring a clean and organized database.') }}</p>
            </div>
            </div>
            <!-- Service Item 6 -->
            <div class="col-md-4">
            <div class="service-item">
                <img src="{{ asset('images/costum.jpg') }}" alt="Service personnalisé">
                <h3>{{ __('messages.Personalized service') }}</h3>
                <p>{{ __('messages.We also offer customized services to meet specific mail management needs, based on the requirements of your healthcare facility.') }}</p>
            </div>
            </div>
        </div>
        </div>
    </section>
    <section id="team" class="page-section">
    <div class="container">
        <div class="heading text-center">
        <!-- Heading -->
        <h2>{{ __('messages.Management') }}</h2>
        <p>{{ __('messages.The team responsible for this project...') }}</p>
        </div>
        <!-- Team Member's Details -->
        <div class="team-content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
            <!-- Team Member -->
            <div class="team-member pDark">
                <!-- Image Hover Block -->

                <div class="member-img">
                <!-- Image  -->
                <img class="img-responsive" src="{{ asset('images/photo-1.jpg') }}" alt=""> </div>
                <!-- Member Details -->
                <div class="team-title">
                <h4 class="para4">Marta TAIO</h4>
                <!-- Designation -->
                <span class="pos">{{ __('messages.Finance') }}</span>
                </div>
                <div class="team-socials"></div>
            </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
            <!-- Team Member -->
            <div class="team-member pDark">
                <!-- Image Hover Block -->
                <div class="member-img">
                <!-- Image  -->
                <img class="img-responsive" src="{{ asset('images/photo-2.jpg') }}" alt=""> </div>
                <!-- Member Details -->
                <h4 class="para4">Larry JERREMY</h4>
                <!-- Designation -->
                <span class="pos">{{ __('messages.Director') }}</span>

            </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
            <!-- Team Member -->
            <div class="team-member pDark">
                <!-- Image Hover Block -->
                <div class="member-img">
                <!-- Image  -->
                <img class="img-responsive" src="{{ asset('images/photo-3.jpg') }}" alt=""> </div>
                <!-- Member Details -->
                <h4 class="para4">Ranith Kays</h4>
                <!-- Designation -->
                <span class="pos">{{ __('messages.Developer') }}</span>

            </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
            <!-- Team Member -->
            <div class="team-member pDark">
                <!-- Image Hover Block -->
                <div class="member-img">
                <!-- Image  -->
                <img class="img-responsive" src="{{ asset('images/photo-4.jpg') }}" alt=""> </div>
                <!-- Member Details -->
                <h4 class="para4">Joan Ray</h4>
                <!-- Designation -->
                <span class="pos">{{ __('messages.Designer') }}</span>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Section de Témoignages -->
<section id="testimonials" class="page-section">
    <div class="container">
        <div class="heading text-center">
            <h2>{{ __('messages.Testimonials') }}</h2>
            <p>{{ __('messages.See what our customers have to say about us.') }}</p>
        </div>
        <div class="row">
            <!-- Témoignage 1 -->
            <div class="col-md-4">
                <div class="testimonial">
                    <div class="testimonial-content">
                        <p>{{ __('messages.The DocTrack system has revolutionized the way we handle mail in our office. It\'s intuitive, efficient, and incredibly useful.') }}</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="{{ asset('images/clinet1.jpg') }}" alt="Customer 1">
                        <p><strong>Ema Kapio</strong><br>Flora</p>
                    </div>
                </div>
            </div>
            <!-- Témoignage 2 -->
            <div class="col-md-4">
                <div class="testimonial">
                    <div class="testimonial-content">
                        <p>{{ __('messages.DocTrack has helped us streamline our mail management process, saving us time and improving our overall efficiency.') }}</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="{{ asset('images/clinet3.jpg') }}" alt="Customer 2">
                        <p><strong>Jane Smith</strong><br>Blue</p>
                    </div>
                </div>
            </div>
            <!-- Témoignage 3 -->
            <div class="col-md-4">
                <div class="testimonial">
                    <div class="testimonial-content">
                        <p>{{ __('messages.I highly recommend DocTrack to anyone looking for a reliable mail management solution. It\'s user-friendly and has greatly improved our workflow.') }}</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="{{ asset('images/clinet2.jpg') }}" alt="Customer 3">
                        <p><strong>Mary Johnson</strong><br>Kio</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!--Comment section-->
    <section id="comments" class="page-section">
        <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="heading text-center">
                <h2>{{ __('messages.Comments') }}</h2>
            </div>
            <div class="comments-container">
                <!-- Commentaire 1 -->
                <!-- Commentaire 1 -->
        <div class="comment">
            <div class="comment-author">
            <img src="{{ asset('images/user.jpg') }}" alt="Avatar Utilisateur 1">
            <div class="author-info">
                <h4 class="head-name">Alice Dupont</h4>
                <span>15 avril 2024</span>
            </div>
            </div>
            <p>{{ __('messages.I\'m impressed by the customization offered by DocTrack. We can tailor the application to our specific needs, making our work even smoother.') }}</p>
            <!-- Étoiles de note -->
            <div class="rating">
            <span class="star" style="color: gold; font-size: 28px;">&#9733;</span>
            <span class="star" style="color: gold; font-size: 28px;">&#9733;</span>
            <span class="star" style="color: gold; font-size: 28px;">&#9733;</span>
            <span class="star" style="color: gold; font-size: 28px;">&#9733;</span>
            <span class="star" style="color: gold; font-size: 28px;">&#9733;</span>
            </div>
        </div>

                <!-- Commentaire 2 -->
                <div class="comment">
                <div class="comment-author">
                    <img src="{{ asset('images/user1.jpg') }}" alt="Avatar Utilisateur 2">
                    <div class="author-info">
                    <h4 class="head-name">John Smith</h4>
                    <span>18 avril 2024</span>
                    </div>
                </div>
                <p>   {{ __('messages.DocTrack has transformed the way we manage our medical documents. It\'s so intuitive and easy to use. I highly recommend it to any medical institution.') }}</p>
                <div class="rating">
                    <span class="star" style="color: gold; font-size: 28px;">&#9733;</span>
                    <span class="star" style="color: gold; font-size: 28px;">&#9733;</span>
                    <span class="star" style="color: gold; font-size: 28px;">&#9733;</span>
                    <span class="star" style="color: gold; font-size: 28px;">&#9733;</span>
                </div>
                </div>
                <!-- Commentaire 3 -->
                <div class="comment">
                <div class="comment-author">
                    <img src="{{ asset('images/user2.jpg') }}" alt="Avatar Utilisateur 3">
                    <div class="author-info">
                    <h4 class="head-name">Sarah Johnson</h4>
                    <span>20 avril 2024</span>
                    </div>
                </div>
                <p>{{ __('messages.Thanks to DocTrack, we have gained efficiency and precision in managing our medical correspondence. It\'s an indispensable tool for any serious healthcare institution.') }}</p>
                <div class="rating">
                    <span class="star" style="color: gold; font-size: 28px;">&#9733;</span>
                    <span class="star" style="color: gold; font-size: 28px;">&#9733;</span>
                    <span class="star" style="color: gold; font-size: 28px;">&#9733;</span>
                    <span class="star" style="color: gold; font-size: 28px;">&#9733;</span>
                </div>
                </div>
                <!-- Commentaire 4 -->
                <div class="comment">
                <div class="comment-author">
                    <img src="{{ asset('images/user3.jpg') }}" alt="Avatar Utilisateur 4">
                    <div class="author-info">
                    <h4 class="head-name">Michael Brown</h4>
                    <span>22 avril 2024</span>
                    </div>
                </div>
                <p>  {{ __('messages.I\'m impressed by the efficiency of this application in managing our medical correspondence. It has significantly enhanced our team\'s productivity.') }}</p>
                <div class="rating">
                    <span class="star" style="color: gold; font-size: 28px;">&#9733;</span>
                    <span class="star" style="color: gold; font-size: 28px;">&#9733;</span>
                    <span class="star" style="color: gold; font-size: 28px;">&#9733;</span>
                    <span class="star" style="color: gold; font-size: 28px;">&#9733;</span>
                    <span class="star" style="color: gold; font-size: 28px;">&#9733;</span>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>


    <!--/.container-->
    </section>
    <section id="contactUs" class="contact-parlex">
    <div class="parlex-back">
        <div class="container">
        <div class="row">
            <div class="heading text-center">
            <!-- Heading -->
            <h2>{{ __('messages.Contact us') }}</h2>
            <p>{{ __('messages.If you have a problem describe the problem so we can help you') }}</p>
            </div>
        </div>

        <div class="row mrgn30">
            <form method="post" action="{{ route('submit-comment') }}" id="contactfrm" role="form">
                @csrf
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="name" class="lab1">{{ __('messages.Name') }}</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email" class="lab1">{{ __('messages.Email') }}</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="comment" class="lab1">{{ __('messages.Comment') }}</label>
                        <textarea name="comment" class="form-control" id="comment" cols="3" rows="5"></textarea>
                        <button name="submit" type="submit" class="btn btn-lg btn-primary" id="submit">{{ __('messages.Send') }}</button>
                    </div>
                    <div class="result"></div>
                </div>
            </form>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>


        <!--/.container-->
    </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="col">
                        <h4>{{ __('messages.Contact us') }}</h4>
                        <ul>
                            <li><strong>{{ __('messages.Address') }}:</strong>123 Rue  République, 75001 Paris, France</li>
                            <li><strong>{{ __('messages.Phone') }}:</strong>+33 1 23 45 67 89</li>
                            <li><strong>{{ __('messages.Email') }}:</strong>doctrack.info@gmail.me</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="col">
                        <h4>{{ __('messages.Quick Links') }}</h4>
                        <ul>
                            <li><a href="#home">{{ __('messages.Home') }}</a></li>
                            <li><a href="#service">{{ __('messages.Services') }}</a></li>
                            <li><a href="{{ route('login') }}">{{ __('messages.Log in') }}</a></li>
                            <li><a href="#contactUs">{{ __('messages.Contact us') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!--/.page-section-->
    <section class="copyright">
    <div class="container">
        <div class="row">
        <div class="col-sm-12 text-center"> Copyright 2024 | All Rights Reserved DocTrack</div>
        </div>
        <!-- / .row -->
    </div>
    </section>
    <a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a>


    <script src="{{ asset('js/jquery-1.8.2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.isotope.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/fancybox/jquery.fancybox.pack.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.nav.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.fittext.js') }}"></script>
    <script src="{{ asset('js/waypoints.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>
    </body>
    </html>













