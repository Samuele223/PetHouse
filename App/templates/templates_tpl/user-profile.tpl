<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>GARO ESTATE | property User profile Page </title>
        <meta name="description" content="GARO is a real-estate template">
        <meta name="author" content="Kimarotec">
        <meta name="keyword" content="html5, css, bootstrap, property, real-estate theme , bootstrap template">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/normalize.css">
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/fontello.css">
        <link href="/PetHouse/App/templates/assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
        <link href="/PetHouse/App/templates/assets/fonts/icon-7-stroke/css/helper.css" rel="stylesheet">
        <link href="/PetHouse/App/templates/css/animate.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/bootstrap-select.min.css"> 
        <link rel="stylesheet" href="/PetHouse/App/templates/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/icheck.min_all.css">
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/price-range.css">
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/owl.carousel.css">  
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/owl.theme.css">
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/owl.transitions.css"> 
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/wizard.css"> 
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/style.css">
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/responsive.css">
    </head>
    <body>

        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- Body content -->

        <div class="header-connect">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-8  col-xs-12">
                        <div class="header-half header-call">
                        </div>
                    </div>
                    <div class="col-md-2 col-md-offset-5  col-sm-3 col-sm-offset-1  col-xs-12">
                        <div class="header-half header-social">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-vine"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>         
        <!--End top header -->

        <nav class="navbar navbar-default ">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="https://localhost/PetHouse/"><img src="/PetHouse/App/templates/assets/img/icona_2.png" alt=""></a>
                </div>

                <!-- RIMOSSO: tutti i menu a tendina e link Home, Property, Properties, Template -->
                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
                        <form method="post" action="/PetHouse/user/logout" style="display:inline;">
                            <button type="submit" class="navbar-btn nav-button wow bounceInRight logout" data-wow-delay="0.45s">Logout</button>
                        </form>
                        <button class="navbar-btn nav-button wow fadeInRight" onclick=" window.location.href='https://localhost/PetHouse/user/profile'" data-wow-delay="0.5s">Profile</button>
                    </div>
                    <!-- Menu vuoto -->
                    <ul class="main-nav nav navbar-nav navbar-right"></ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->

        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">Hello : <span class="orange strong">{$name}</span></h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header --> 

        <!-- property area -->
        <div class="content-area user-profiel" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">   
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 profiel-container">

                        <form action="" method="">
                            <div class="profiel-header">
                                <h3>
                                    <b></b> YOUR PROFILE <br>
                                    <small>All about you</small>
                                </h3>
                                <hr>
                            </div>

                            <div class="clear">
                                <div class="col-sm-3 col-sm-offset-1">
                                    <div class="picture-container">
                                        <div class="picture">
                                            <img src="{if $pic == 0}/PetHouse/App/templates/assets/img/mauro.png{else}/PetHouse/image/showImage/{$pic}{/if}" alt="Foto profilo di {$name}" style="pointer-events: none;">
                                            
                                        </div>
                                        <h6>YOUR PROFILE PICTURE</h6>
                                        {if isset($user) && $user->getVerified()}
                                            <div class="verified-user" style="margin-top: 10px; text-align: center;">
                                                <span style="color: #28a745; font-size: 1.5em; vertical-align: middle;">
                                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                </span>
                                                <span style="color: #28a745; font-weight: bold; margin-left: 8px; font-size: 1.1em; vertical-align: middle;">
                                                    User has been verified
                                                </span>
                                            </div>
                                        {/if}
                                    </div>
                                </div>

                                <div class="col-sm-3 padding-top-25">
                                    <div class="form-group">
                                        <label>First Name <small>(required)</small></label>
                                        <input name="firstname" type="text" class="form-control" placeholder="Andrew..." value="{$name|escape}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name <small>(required)</small></label>
                                        <input name="lastname" type="text" class="form-control" placeholder="Smith..." value="{$surname|escape}" readonly>
                                    </div> 
                                    <div class="form-group">
                                        <label>Email <small>(required)</small></label>
                                        <input name="email" type="email" class="form-control" placeholder="andrew@email@email.com.com" value="{$email|escape}" readonly>
                                    </div> 
                                    <div class="form-group">
                                        <label>Phone :</label>
                                        <input name="Phone" type="text" class="form-control" placeholder="+1 9090909090" value="{$phone|escape}" readonly>
                                    </div>
                                    <!-- Bottoni grandi -->
                                    <div class="row" style="margin-top:25px;">
                                        <div class="col-xs-12" style="margin-bottom:10px;">
                                            <a href="/PetHouse/user/activeposts" class="btn btn-lg btn-primary btn-block" style="font-size:1.3em; font-weight:bold; border-radius: 25px;">
                                                <i class="fa fa-home"></i> Active Posts
                                            </a>
                                        </div>
                                        <div class="col-xs-12">
                                            <a href="/PetHouse/user/activeoffers" class="btn btn-lg btn-warning btn-block" style="font-size:1.3em; font-weight:bold; border-radius: 25px;">
                                                <i class="fa fa-list"></i> Active Offers
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Fine bottoni grandi -->
                                </div>
                            </div>                    
                                <div class="col-sm-10 col-sm-offset-1">
                                    <br>
                                    <a href="https://localhost/PetHouse/" class="btn btn-primary btn-block" style="margin-bottom:10px;">Home</a>
                                    <a href="/PetHouse/user/myHouses" class="btn btn-primary btn-block" style="margin-bottom:10px;">Your Houses</a>
                                    <a href="/PetHouse/user/myPost" class="btn btn-primary btn-block" style="margin-bottom:10px;">Your Posts</a>
                                    <a href="/PetHouse/user/review" class="btn btn-primary btn-block" style="margin-bottom:10px;">Your Review</a>
                                    <a href="/PetHouse/Review/Deals" class="btn btn-primary btn-block" style="margin-bottom:10px;">History Deals</a>
                                    <a href="/PetHouse/user/askVerification" class="btn btn-success btn-block" style="margin-bottom:10px;">Ask Verification</a>
                                </div>
                            <br>
                    </form>

                </div>
            </div><!-- end row -->
        </div>
    </div>
        <!-- Scripts: jQuery, Bootstrap, and main.js -->
        <script src="/PetHouse/App/templates/assets/js/jquery-1.10.2.min.js"></script>
        <script src="/PetHouse/App/templates/bootstrap/js/bootstrap.min.js"></script>
        <script src="/PetHouse/App/templates/assets/js/main.js"></script>
</body>
</html>