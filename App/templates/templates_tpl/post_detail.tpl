<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>GARO ESTATE | Property  page</title>
        <meta name="description" content="company is a real-estate template">
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

        <!--End top header -->

        <nav class="navbar navbar-default ">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html"><img src="/PetHouse/App/templates/assets/img/icona_footer-3.png" alt=""></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
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
                            <a href="{$backUrl}" class="btn btn-default" style="background: #f8f9fa; border: 1px solid #ddd; color: #333; padding: 8px 16px; border-radius: 20px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                                <i class="fa fa-arrow-left" style="margin-right: 5px;"></i>Back to Search Results
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
                                            <strong>Title:</strong><br>
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
                                <h4 class="s-property-title">Additional info: </h4>
                                <div class="s-property-content">
                                    <p>{$post->getMoreInfo()}</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 p0">
                        <aside class="sidebar sidebar-property blog-asside-right">
                            <div class="owner-info-box" style="background: #fff; border: 1px solid #e0e0e0; border-radius: 8px; padding: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-bottom: 20px;">
                                <div class="owner-header" style="text-align: center; margin-bottom: 15px;">
                                    <div class="owner-avatar" style="margin-bottom: 10px;">
                                        <a href="/PetHouse/findhosting/viewprofile/{$owner->getId()}">
                                            {if $owner->getProfilePicture()}
                                                <img src="/PetHouse/image/showImage/{$owner->getProfilePicture()->getId()}" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid #f8f9fa;" alt="Owner profile picture">
                                            {else}
                                                <img src="/PetHouse/App/templates/assets/img/client-face1.png" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid #f8f9fa;" alt="Default profile">
                                            {/if}
                                        </a>
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



                <div class="row">
                    <div class="col-md-8">
                        <a href="/PetHouse/Findhosting/bookPost/{$post->getId()}" class="btn btn-warning btn-lg btn-block" style="border-radius: 30px; font-weight: bold;">
                            <i class="fa fa-calendar-check-o"></i> Book this post
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="/PetHouse/Report/makeReport/{$post->getId()}" class="btn btn-danger btn-lg btn-block" style="border-radius: 30px; font-weight: bold; margin-top: 0;">
                            <i class="fa fa-flag"></i> Report this post
                        </a>
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
                            <span>&copy; PetHouse 2025. All rights reserved.</span> 
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

{if isset($smarty.session.user)}
<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="reportModalLabel">Report Inappropriate Post</h4>
            </div>
            <form action="/PetHouse/Report/reportPost/{$post->getId()}" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="description">Please describe why you're reporting this post:</label>
                        <textarea class="form-control" name="description" id="description" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Submit Report</button>
                </div>
            </form>
        </div>
    </div>
</div>
{/if}