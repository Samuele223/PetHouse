<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PetHouse | property User profile Page </title>
        <meta name="description" content="GARO is a real-estate template">
        <meta name="author" content="Kimarotec">
        <meta name="keyword" content="html5, css, bootstrap, property, real-estate theme , bootstrap template">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

        <!-- Place /PetHouse/favicon1.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="/PetHouse/favicon1.ico" type="image/x-icon">
        <link rel="icon" href="/PetHouse/favicon1.ico" type="image/x-icon">

        
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
                    <a class="navbar-brand" ><img src="/PetHouse/App/templates/assets/img/icona_footer-3.png" alt=""></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
                        <form method="post" action="/PetHouse/Admin/logout" style="display:inline;">
                                <button button type="submit" class="navbar-btn nav-button wow bounceInRight logout" data-wow-delay="0.45s">Logout</button>
                            </form>
                                                        <button class="navbar-btn nav-button wow fadeInRight" onclick="window.location.href='/PetHouse/admin/profile'" data-wow-delay="0.48s">Profile</button>
                    </div>
                    <ul class="main-nav nav navbar-nav navbar-right">


                        
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->

        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                    <a href="/PetHouse/Admin/listVerificationRequests" class="btn btn-default" style="margin-bottom: 15px; background: #f8f9fa; border: 1px solid #ddd; color: #333; padding: 8px 16px; border-radius: 20px; text-decoration: none; font-weight: 600;">
                      <i class="fa fa-arrow-left" style="margin-right: 5px;"></i>Back to List of Users
                         </a>
                        <h1 class="page-title">User Profile</span></h1>               
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
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-sm-6 text-center">
                    <p><strong>Profile Picture:</strong></p>
                    {if $user->getProfilePicture()}
                        <img src="/PetHouse/image/showImage/{$user->getProfilePicture()->getId()}" alt="Foto Profilo" style="width:100px;height:100px;border-radius:50%;">
                    {else}
                        <img src="/PetHouse/App/templates/assets/img/default-profile.png" alt="Default" style="width:100px;height:100px;border-radius:50%;">
                    {/if}
                </div>
                <div class="col-sm-6 text-center">
    <p><strong>Attached Document:</strong></p>
    {assign var="docs" value=$verification->getDocuments()}
    {if $docs|@count > 0}
        {foreach from=$docs item=doc}
            <img src="/PetHouse/image/showImage/{$doc->getId()}" alt="Documento allegato" style="width:100px;height:100px;border-radius:5px; margin:5px;">
        {/foreach}
    {else}
        <span>Nessun documento allegato</span>
    {/if}
</div>
            </div>
            <hr>
            <div class="row" style="margin-top: 20px;">
    <div class="col-md-6">
        <ul class="list-group" style="font-size: 16px;">
            <li class="list-group-item"><strong>Name:</strong> {$user->getName()} {$user->getSurname()}</li>
                        <li class="list-group-item"><strong>Username:</strong> {$user->getUsername()}</li>
            <li class="list-group-item"><strong>Email:</strong> {$user->getEmail()}</li>
            <li class="list-group-item"><strong>Phone:</strong> {if $user->getTel()}{$user->getTel()}{else}-{/if}</li>

            <li class="list-group-item">
                <strong>Rating:</strong>
                {if $user->getRating() !== null}
                    <span style="color: #f39c12;">
                        {assign var="rating" value=$user->getRating()}
                        {math equation="round(x*10)/10" x=$rating assign="roundedRating"}
                        {$roundedRating} / 5
                        {section name=star loop=5}
                            {if $smarty.section.star.index < $roundedRating}
                                <i class="fa fa-star" style="color: #f39c12;"></i>
                            {else}
                                <i class="fa fa-star-o" style="color: #f39c12;"></i>
                            {/if}
                        {/section}
                    </span>
                {else}
                    <span>-</span>
                {/if}
            </li>
        </ul>
    </div>
</div>
            <h3>Info Verification Request</h3>
            <p><strong>Request Date:</strong> {$verification->getRequestDate()->format('d/m/Y')}</p>
            <p><strong>Description:</strong> {$verification->getDescription()|default:'-'}</p>

            <div class="row" style="margin-top:30px;">
                    <div class="col-md-12 text-left">
                <form method="post" action="/PetHouse/Admin/acceptVerification/{$verification->getId()}" style="display:inline;">
                    <button type="submit" class="btn btn-success" style="border-radius: 30px; font-weight: bold;">
                                <i class="fa fa-check"></i> APPROVE REQUEST
                </form>
                <form method="post" action="/PetHouse/Admin/rejectVerification/{$verification->getId()}" style="display:inline;">
                    <button type="submit" class="btn btn-danger" style="border-radius: 30px; font-weight: bold;">
                                <i class="fa fa-trash"></i> DENY REQUEST
                            </button>
                </form>
            </div>
        </div>
    </div>
</div>
                            <br>
                    </form>

                </div>
            </div><!-- end row -->

        </div>
    </div>
          <!-- Footer area-->
        <div class="footer-area">

            <div class=" footer">
                <div class="container">
                    <div class="row justify-content-center" style="display: flex; justify-content: center;">

                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer">
                                <h4>About us </h4>
                                <div class="footer-title-line"></div>

                               
    <img src="/PetHouse/App/templates/assets/img/icona_footer-3.png" alt="" class="wow pulse" data-wow-delay="1s">
</a>
                                <p>Sadly, none of this is real. It's just a project... sorry 🥸</p>
                                <ul class="footer-adress">
                                    <li><i class="pe-7s-map-marker strong"> </i> Via degli Animali 13, Roma</li>
                                    <li><i class="pe-7s-mail strong"> </i> UNIVAQ@university</li>
                                    <li><i class="pe-7s-call strong"> </i> +123 456 789</li>
                                </ul>
                            </div>
                        </div>
                        
                        
                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer news-letter">
                                <h4>Stay in touch</h4>
                                <div class="footer-title-line"></div>
                                <p>Even tho none of this is real, we can still keep in touch! </p>

                                <div class="social pull-center"> 
                                    <ul>
                                        <li><a class="wow fadeInUp animated" href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="wow fadeInUp animated" href="https://www.facebook.com/" data-wow-delay="0.2s"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="wow fadeInUp animated" href="https://google.com/" data-wow-delay="0.3s"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a class="wow fadeInUp animated" href="https://instagram.com/" data-wow-delay="0.4s"><i class="fa fa-instagram"></i></a></li>
                                    </ul> 
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="footer-copy text-center">
                <div class="container">
                    <div class="row">
                        <div class="pull-center">
                            <span> (C) <a href="/PetHouse/App/templates/assets/img/cfe88934-bb52-41be-95a3-9f63f0cca6df.jpg">UNIVAQ</a> , Tutti i diritti sono riservati  </span> 
                        </div> 
                        <div class="bottom-menu pull-right"> 

                        </div>
                    </div>
                </div>
            </div>

        </div>


        <script src="/PetHouse/App/templates/assets/js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="/PetHouse/App/templates/assets/js//jquery-1.10.2.min.js"></script>
        <script src="/PetHouse/App/templates/bootstrap/js/bootstrap.min.js"></script>
        <script src="/PetHouse/App/templates/assets/js/bootstrap-select.min.js"></script>
        <script src="/PetHouse/App/templates/assets/js/bootstrap-hover-dropdown.js"></script>
        <script src="/PetHouse/App/templates/assets/js/easypiechart.min.js"></script>
        <script src="/PetHouse/App/templates/assets/js/jquery.easypiechart.min.js"></script>
        <script src="/PetHouse/App/templates/assets/js/owl.carousel.min.js"></script>
        <script src="/PetHouse/App/templates/assets/js/wow.js"></script>
        <script src="/PetHouse/App/templates/assets/js/icheck.min.js"></script>

        <script src="/PetHouse/App/templates/assets/js/price-range.js"></script> 
        <script src="/PetHouse/App/templates/assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
        <script src="/PetHouse/App/templates/assets/js/jquery.validate.min.js"></script>
        <script src="/PetHouse/App/templates/assets/js/wizard.js"></script>

        <script src="/PetHouse/App/templates/assets/js/main.js"></script>


</body>
</html>