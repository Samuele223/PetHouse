<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PetHouse | Property  page</title>
        <meta name="description" content="company is a real-estate template">
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
                        <h1 class="page-title">Reported Post Details </h1>               
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
    <div class="row">
        <div class="col-md-8 single-property-content prp-style-1 ">
            <div class="row">
                <!-- Galleria immagini dinamica -->
                <div class="light-slide-item">            
                    <div class="clearfix">
                        <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                            {assign var="house" value=$post->getHouse()}
                            {assign var="photos" value=$house->getPhotos()}
                            {if $photos|@count > 0}
                                {foreach from=$photos item=photo}
                                    <li data-thumb="/PetHouse/image/showImage/{$photo->getId()}"> 
                                        <img src="/PetHouse/image/showImage/{$photo->getId()}" alt="Property Image"/>
                                    </li>
                                {/foreach}
                            {else}
                                <li>
                                    <img src="/PetHouse/App/templates/assets/img/default-property.png" alt="Default Property Image"/>
                                </li>
                            {/if}
                        </ul>
                    </div>
                </div>
            </div>

            <div class="single-property-wrapper">
                <div class="single-property-header">                                          
                    <h1 class="property-title pull-left">{$post->getTitle()}</h1>
                    <span class="property-price pull-right">€ {$post->getPrice()}</span>
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
                                <strong>Date In:</strong><br>
                                <span class="form-control-static">{$post->getDateIn()|date_format:"%d/%m/%Y"}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>Date Out:</strong><br>
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
                                <strong>More Info:</strong><br>
                                <span class="form-control-static">{$post->getMoreInfo()}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>Address:</strong><br>
                                <span class="form-control-static">
                                    {if $house->getAddress()}{$house->getAddress()}{else}<span style="color:#aaa;">Missing field</span>{/if}
                                </span>
                            </li>
                            <li class="list-group-item">
                                <strong>City:</strong><br>
                                <span class="form-control-static">
                                    {if $house->getCity()}{$house->getCity()}{else}<span style="color:#aaa;">Missing field</span>{/if}
                                </span>
                            </li>
                            <li class="list-group-item">
                                <strong>Province:</strong><br>
                                <span class="form-control-static">
                                    {if $house->getProvince()}{$house->getProvince()}{else}<span style="color:#aaa;">Missing field</span>{/if}
                                </span>
                            </li>
                            <li class="list-group-item">
                                <strong>Total number of Reports:</strong>
                                <span class="form-control-static">{$post->getNumReport()}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Fine box dettagli -->

   <!-- Dettagli dei report -->
<div class="panel panel-warning" style="margin-top:20px;">
    <div class="panel-heading">
        <h4 class="panel-title">Report Details</h4>
    </div>
    <div class="panel-body">
        {assign var="reports" value=$post->getReport()}
        {if $reports|@count > 0}
            <ul class="list-group">
                {foreach from=$reports item=report}
                    {assign var="reporter" value=$report->getReporter()}
                    <li class="list-group-item" style="display: flex; align-items: center;">
                        {if $reporter}
                            <a href="/PetHouse/Admin/showuserProfile/{$reporter->getId()}" style="display:inline-block;">
    {if $reporter->getProfilePicture()}
        <img src="/PetHouse/image/showImage/{$reporter->getProfilePicture()->getId()}" alt="Reporter profile" style="width:32px;height:32px;border-radius:50%;margin-right:10px;">
    {else}
        <img src="/PetHouse/App/templates/assets/img/mauro.png" alt="Default profile" style="width:32px;height:32px;border-radius:50%;margin-right:10px;">
    {/if}
</a>
                        {else}
                            <img src="/PetHouse/App/templates/assets/img/mauro.png" alt="Default profile" style="width:32px;height:32px;border-radius:50%;margin-right:10px;">
                        {/if}
                        <div>
                            <strong>Report Description:</strong> {$report->getDescription()}<br>
                            <strong>Segnalato da:</strong>
                            {if $reporter}
                                {$reporter->getName()} {$reporter->getSurname()} ({$reporter->getEmail()})
                            {else}
                                <span style="color:#aaa;">Unknown Reporter</span>
                            {/if}
                        </div>
                    </li>
                {/foreach}
            </ul>
        {else}
            <p>No Reports Found.</p>
        {/if}
    </div>
</div>

                <!-- Pulsanti admin -->
                <div class="row" style="margin-top:30px;">
                    <div class="col-md-12 text-center">
                        <form method="post" action="/PetHouse/Admin/approveReportedPost/{$post->getId()}" style="display:inline;">
                            <button type="submit" class="btn btn-success" style="border-radius: 30px; font-weight: bold;">
                                <i class="fa fa-check"></i> APPROVE POST
                            </button>
                        </form>
                        <form method="post" action="/PetHouse/Admin/deleteReportedPost/{$post->getId()}" style="display:inline; margin-left:10px;">
                            <button type="submit" class="btn btn-danger" style="border-radius: 30px; font-weight: bold;">
                                <i class="fa fa-trash"></i> DELETE POST
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>



                    <div class="col-md-4 p0">
                        <aside class="sidebar sidebar-property blog-asside-right">
                            <div class="dealer-widget">
                                <div class="dealer-content">
                                    <div class="inner-wrapper">
                                        <div class="clear">
                                           <div class="col-xs-4 col-sm-4 dealer-face">
    {assign var="owner" value=$post->getSeller()}
   <a href="/PetHouse/Admin/showuserProfile/{$owner->getId()}">
    {if $owner->getProfilePicture()}
        <img src="/PetHouse/image/showImage/{$owner->getProfilePicture()->getId()}" class="img-circle" alt="Owner profile picture">
    {else}
        <img src="/PetHouse/App/templates/assets/img/client-face1.png" class="img-circle" alt="Default profile">
    {/if}
</a>
</div>
                                            <div class="col-xs-8 col-sm-8 ">
                                                <h3 class="dealer-name">
                                                    <a href="#">
                                                        {if $owner->getName()}{$owner->getName()}{else}<span style="color:#aaa;">Missing field</span>{/if}
                                                        {if $owner->getSurname()} {$owner->getSurname()}{else} <span style="color:#aaa;">Missing field</span>{/if}
                                                    </a>
                                                    
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="clear">
                                            <ul class="dealer-contacts">
                                                <li>
                                                    <i class="pe-7s-mail strong"></i>
                                                    {if $owner->getEmail()}{$owner->getEmail()}{else}<span style="color:#aaa;">Missing field</span>{/if}
                                                </li>
                                                <li>
                                                    <i class="pe-7s-call strong"></i>
                                                    {if $owner->getTel()}{$owner->getTel()}{else}<span style="color:#aaa;">Missing field</span>{/if}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </aside>
                    


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