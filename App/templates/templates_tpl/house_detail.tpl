<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PetHouse | House Details</title>
        <meta name="description" content="PetHouse - View house details for pet accommodation">
        <meta name="author" content="PetHouse">
        <meta name="keyword" content="html5, css, bootstrap, pets, accommodation, house details">
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
        <link href="/PetHouse/App/templates/assets/css/animate.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/bootstrap-select.min.css"> 
        <link rel="stylesheet" href="/PetHouse/App/templates/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/icheck.min_all.css">
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/price-range.css">
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/owl.carousel.css">  
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/owl.theme.css">
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/owl.transitions.css">
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/lightslider.min.css">
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
                            <p>
                                <span><i class="pe-7s-call"></i> +1 234 567 7890</span>
                                <span><i class="pe-7s-mail"></i> your@company.com</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-2 col-md-offset-5  col-sm-3 col-sm-offset-1  col-xs-12">
                        <div class="header-half header-social">
                            <ul class="list-inline">
                                <li><i class="fa fa-facebook"></i></li>
                                <li><i class="fa fa-twitter"></i></li>
                                <li><i class="fa fa-vine"></i></li>
                                <li><i class="fa fa-linkedin"></i></li>
                                <li><i class="fa fa-dribbble"></i></li>
                                <li><i class="fa fa-instagram"></i></li>
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
                    <a class="navbar-brand" href="/PetHouse/"><img src="/PetHouse/App/templates/assets/img/icona_footer-3.png" alt=""></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
                        <form method="post" action="/PetHouse/user/logout" style="display:inline;">
                            <button type="submit" class="navbar-btn nav-button wow bounceInRight logout" data-wow-delay="0.45s">Logout</button>
                        </form>
                        <button class="navbar-btn nav-button wow fadeInRight" onclick="window.location.href='/PetHouse/user/profile'" data-wow-delay="0.5s">Profile</button>
                        <button class="navbar-btn nav-button wow bounceInRight" onclick="window.location.href='/PetHouse/'" data-wow-delay="0.4s">Home</button>
                    </div>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->

        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <div style="margin-bottom: 15px;">
                            <a href="/PetHouse/user/myHouses" class="btn btn-default" style="background: #f8f9fa; border: 1px solid #ddd; color: #333; padding: 8px 16px; border-radius: 20px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                                <i class="fa fa-arrow-left" style="margin-right: 5px;"></i>Back to My Houses
                            </a>
                        </div>
                        <h1 class="page-title">{$house->getTitle()}</h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->

        <!-- property area -->
        <div class="content-area single-property" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">   

                <div class="clearfix padding-top-40" >

                    <div class="col-md-8 single-property-content prp-style-1 ">
                        <div class="row">
                            <div class="light-slide-item">            
                                <div class="clearfix">
                                    <div class="favorite-and-print">
                                        <a class="add-to-fav" href="#login-modal" data-toggle="modal">
                                            <i class="fa fa-star-o"></i>
                                        </a>
                                        <a class="printer-icon " href="javascript:window.print()">
                                            <i class="fa fa-print"></i> 
                                        </a>
                                    </div> 

                                    <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                        {if $photos && $photos|@count > 0}
                                            {foreach from=$photos item=photo}
                                                <li data-thumb="/PetHouse/image/showImage/{$photo->getId()}"> 
                                                    <img src="/PetHouse/image/showImage/{$photo->getId()}" alt="House Image"/>
                                                </li>
                                            {/foreach}
                                        {else}
                                            <li> 
                                                <img src="/PetHouse/App/templates/assets/img/demo/property-1.jpg" alt="Default House Image"/>
                                            </li>
                                        {/if}
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="single-property-wrapper">
                            <div class="single-property-header">                                          
                                <h1 class="property-title pull-left">{$house->getTitle()}</h1>
                            </div>

                            <!-- Box con i dettagli della casa -->
                            <div class="panel panel-default" style="margin-top:20px;">
                                <div class="panel-heading">
                                    <h4 class="panel-title">House Details</h4>
                                </div>
                                <div class="panel-body">
                                    <ul class="list-group" style="margin-bottom:0;">
                                    <li class="list-group-item">
                                            <strong>Title:</strong><br>
                                            <span class="form-control-static">{$house->getTitle()}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Address:</strong><br>
                                            <span class="form-control-static">{$house->getAddress()}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Province:</strong><br>
                                            <span class="form-control-static">{$house->getProvince()}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>City:</strong><br>
                                            <span class="form-control-static">{$house->getCity()}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Country:</strong><br>
                                            <span class="form-control-static">{$house->getCountry()}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- .property-meta -->

                            <div class="section">
                                <h4 class="s-property-title">Description</h4>
                                <div class="s-property-content">
                                    <p>{if $house->getDescription()}{$house->getDescription()}{else}No description available for this property.{/if}</p>
                                </div>
                            </div>
                            <!-- End description area  -->                           
                        </div>
                    </div>
                    <div class="col-md-4 p0">
                        <aside class="sidebar sidebar-property blog-asside-right">
                            {assign var="owner" value=$house->getOwner()}
                            <div class="owner-info-box" style="background: #fff; border: 1px solid #e0e0e0; border-radius: 8px; padding: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-bottom: 20px;">
                                <div class="owner-header" style="text-align: center; margin-bottom: 15px;">
                                    <div class="owner-avatar" style="margin-bottom: 10px;">
                                        {if $owner->getProfilePicture()}
                                            <img src="/PetHouse/image/showImage/{$owner->getProfilePicture()->getId()}" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid #f8f9fa;" alt="Owner profile picture">
                                        {else}
                                            <img src="/PetHouse/App/templates/assets/img/client-face1.png" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid #f8f9fa;" alt="Default profile">
                                        {/if}
                                    </div>
                                    <h4 style="margin: 0; color: #333; font-weight: 600;">
                                        {if $owner->getName()}{$owner->getName()}{else}<span style="color:#aaa;">Missing field</span>{/if}
                                        {if $owner->getSurname()} {$owner->getSurname()}{else} <span style="color:#aaa;">Missing field</span>{/if}
                                    </h4>
                                    <p style="margin: 5px 0 0 0; color: #666; font-size: 14px;">Property Owner</p>
                                </div>
                                
                                <div class="owner-contact" style="border-top: 1px solid #f0f0f0; padding-top: 15px;">
                                    <div class="contact-item" style="margin-bottom: 10px; display: flex; align-items: center;">
                                        <i class="fa fa-envelope" style="color: #666; width: 20px; margin-right: 10px;"></i>
                                        <span style="color: #333; font-size: 14px; word-break: break-all;">
                                            {if $owner->getEmail()}{$owner->getEmail()}{else}<span style="color:#aaa;">Not provided</span>{/if}
                                        </span>
                                    </div>
                                    <div class="contact-item" style="display: flex; align-items: center;">
                                        <i class="fa fa-phone" style="color: #666; width: 20px; margin-right: 10px;"></i>
                                        <span style="color: #333; font-size: 14px;">
                                            {if $owner->getTel()}{$owner->getTel()}{else}<span style="color:#aaa;">Not provided</span>{/if}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
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

                               <a href="/PetHouse/">
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
                            <div class="single-footer">
                                <h4>Quick links </h4>
                                <div class="footer-title-line"></div>
                                <ul class="footer-menu">
                                    <li><a href="/PetHouse/">Home</a>  </li> 
                                    <li><a href="/PetHouse/Findhosting/searchHost">Properties</a>  </li> 
                                    <li><a href="/PetHouse/user/addHouse">Register your house </a></li> 
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
        <script src="/PetHouse/App/templates/assets/js/jquery-1.10.2.min.js"></script>
        <script src="/PetHouse/App/templates/bootstrap/js/bootstrap.min.js"></script>
        <script src="/PetHouse/App/templates/assets/js/bootstrap-select.min.js"></script>
        <script src="/PetHouse/App/templates/assets/js/bootstrap-hover-dropdown.js"></script>
        <script src="/PetHouse/App/templates/assets/js/easypiechart.min.js"></script>
        <script src="/PetHouse/App/templates/assets/js/jquery.easypiechart.min.js"></script>
        <script src="/PetHouse/App/templates/assets/js/owl.carousel.min.js"></script>
        <script src="/PetHouse/App/templates/assets/js/wow.js"></script>
        <script src="/PetHouse/App/templates/assets/js/icheck.min.js"></script>
        <script src="/PetHouse/App/templates/assets/js/price-range.js"></script>
        <script type="text/javascript" src="/PetHouse/App/templates/assets/js/lightslider.min.js"></script>
        <script src="/PetHouse/App/templates/assets/js/main.js"></script>

        <script>
            $(document).ready(function () {
                // Initialize image gallery
                if ($('#image-gallery li').length > 0) {
                    $('#image-gallery').lightSlider({
                        gallery: true,
                        item: 1,
                        thumbItem: 9,
                        slideMargin: 0,
                        speed: 500,
                        auto: true,
                        loop: true,
                        onSliderLoad: function () {
                            $('#image-gallery').removeClass('cS-hidden');
                        }
                    });
                } else {
                    // If no images, just show the gallery without slider
                    $('#image-gallery').removeClass('cS-hidden');
                }
            });
        </script>

    </body>
</html>