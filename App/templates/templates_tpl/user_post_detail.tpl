<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PetHouse | Your Post Details</title>
        <meta name="description" content="PetHouse - View your post details for pet accommodation">
        <meta name="author" content="PetHouse">
        <meta name="keyword" content="html5, css, bootstrap, pets, accommodation, post details">
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
                    <div class="col-md-12 text-center">
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
                    <a class="navbar-brand" href="/PetHouse/"><img src="/PetHouse/App/templates/assets/img/icona_2.png" alt=""></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
                        <form method="post" action="/PetHouse/user/logout" style="display:inline;">
                            <button type="submit" class="navbar-btn nav-button wow bounceInRight logout" data-wow-delay="0.45s">Logout</button>
                        </form>
                        <button class="navbar-btn nav-button wow fadeInRight" onclick=" window.location.href='/PetHouse/user/profile'" data-wow-delay="0.5s">Profile</button>
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
                            <a href="/PetHouse/user/myPost" class="btn btn-default" style="background: #f8f9fa; border: 1px solid #ddd; color: #333; padding: 8px 16px; border-radius: 20px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                                <i class="fa fa-arrow-left" style="margin-right: 5px;"></i>Back to My Posts
                            </a>
                        </div>
                        <h1 class="page-title">{$post->getTitle()}</h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->

        <div class="container">
            {if isset($smarty.session.success_message)}
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {$smarty.session.success_message}
                </div>
            {/if}

            {if isset($smarty.session.error_message)}
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {$smarty.session.error_message}

                </div>
            {/if}
        </div>

        <!-- property area -->
        <div class="content-area single-property" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">   

                <div class="clearfix padding-top-40" >

                    <div class="col-md-8 single-property-content prp-style-1 ">
                        <div class="row">
                            <!-- Galleria immagini dinamica -->
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
                                        {foreach from=$photos item=photo}
                                            <li data-thumb="/PetHouse/image/showImage/{$photo->getId()}"> 
                                                <img src="/PetHouse/image/showImage/{$photo->getId()}" alt="Property Image"/>
                                            </li>
                                        {/foreach}
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="single-property-wrapper">
                            <div class="single-property-header">                                          
                                <h1 class="property-title pull-left">{$post->getTitle()}</h1>
                                <span class="property-price pull-right">€ {$post->getPrice()}<span style="font-size: 16px; font-weight: normal;">&nbsp;/day</span></span>
                            </div>

                            <!-- Box con i dettagli del post -->
                            <div class="panel panel-default" style="margin-top:20px;">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Post Details</h4>
                                </div>
                                <div class="panel-body">
                                    <ul class="list-group" style="margin-bottom:0;">
                                        <li class="list-group-item">
                                            <strong>Description:</strong><br>
                                            <span class="form-control-static">{$post->getDescription()}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Start Date:</strong><br>
                                            <span class="form-control-static">{$post->getDateIn()|date_format:"%d/%m/%Y"}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>End Date:</strong><br>
                                            <span class="form-control-static">{$post->getDateOut()|date_format:"%d/%m/%Y"}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Accepted Pets:</strong><br>
                                            <span class="form-control-static">
                                                {foreach from=$post->getAcceptedPets() key=pet item=count name=pets}
                                                    {$pet} ({$count}){if !$smarty.foreach.pets.last}, {/if}
                                                {/foreach}
                                            </span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Additional Info:</strong><br>
                                            <span class="form-control-static">{$post->getMoreInfo()}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Address:</strong><br>
                                            <span class="form-control-static">
                                                {if $address}
                                                    {$address}
                                                {else}
                                                    <span style="color:#aaa;">Missing field</span>
                                                {/if}
                                            </span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>City:</strong><br>
                                            <span class="form-control-static">
                                                {if $city}
                                                    {$city}
                                                {else}
                                                    <span style="color:#aaa;">Missing field</span>
                                                {/if}
                                            </span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Province:</strong><br>
                                            <span class="form-control-static">
                                                {if $province}
                                                    {$province}
                                                {else}
                                                    <span style="color:#aaa;">Missing field</span>
                                                {/if}
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Fine box dettagli -->

                            <div class="section">
                                <h4 class="s-property-title">Description: </h4>
                                <div class="s-property-content">
                                    <p>{$post->getDescription()}</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 p0">
                        <aside class="sidebar sidebar-property blog-asside-right">
                            {if $post->getBooked() == 'open'}
                            <a href="/PetHouse/managerequest/viewoffers/{$post->getId()}" class="btn btn-warning btn-lg btn-block" style="border-radius: 30px; font-weight: bold; margin-bottom: 20px;">
                                <i class="fa fa-list"></i> View Offers
                            </a>
                            {/if}
                            
                            <!-- Post Management Actions -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Manage This Post</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="post-actions" style="text-align: center;">
                                        <a href="/PetHouse/user/edit_post/{$post->getId()}" class="btn btn-primary btn-block" style="margin-bottom: 10px;">
                                            <i class="fa fa-edit"></i> Edit Post
                                        </a>
                                        <a href="/PetHouse/user/delete_post/{$post->getId()}" class="btn btn-danger btn-block" onclick="return confirm('Are you sure you want to delete this post? This action cannot be undone.');">
                                            <i class="fa fa-trash"></i> Delete Post
                                        </a>
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
            <div class="footer-copy text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <span>PetHouse, all rights reserved</span> 
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
        <script type="text/javascript" src="/PetHouse/App/templates/assets/js/lightslider.min.js"></script>
        <script src="/PetHouse/App/templates/assets/js/main.js"></script>

        <script>
            $(document).ready(function () {
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
            });
        </script>

    </body>
</html>