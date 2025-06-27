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
                            <p>
                            </p>
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
                    <a class="navbar-brand" href="/PetHouse/"><img src="/PetHouse/App/templates/assets/img/icona_footer-3.png" alt=""></a>
                </div>

                <!-- RIMOSSO: tutti i menu a tendina e link Home, Property, Properties, Template -->
                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
                        <form method="post" action="/PetHouse/user/logout" style="display:inline;">
                            <button type="submit" class="navbar-btn nav-button wow bounceInRight logout" data-wow-delay="0.45s">Logout</button>
                        </form>
                        <button class="navbar-btn nav-button wow fadeInRight" onclick=" window.location.href='/PetHouse/user/profile'" data-wow-delay="0.5s">Profile</button>
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
                        <h1 class="page-title">House owner : <span class="orange strong">{$name}</span></h1>               
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
                                    <b></b> profile of {$name} <br>
                                    <small>All about {$name}</small>
                                </h3>
                                <hr>
                            </div>

                            <div class="clear">
                                <div class="col-sm-3 col-sm-offset-1">
                                    <div class="picture-container">
                                        <div class="picture">
                                            <img src="{if $pic == 0}/PetHouse/App/templates/assets/img/mauro.png{else}/PetHouse/image/showImage/{$pic}{/if}" alt="Foto profilo di {$name}" style="pointer-events: none;">
                                        </div>
                                        <h6>PROFILE PICTURE</h6>
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
                                    <div>
                                        <p><b>First Name:</b> <span style="user-select: text;">{$name|escape}</span></p>
                                        <p><b>Last Name:</b> <span style="user-select: text;">{$surname|escape}</span></p>
                                        <p><b>Email:</b> <span style="user-select: text;">{$email|escape}</span></p>
                                        <p><b>Phone:</b> <span style="user-select: text;">{$phone|escape}</span></p>
                                        <p><b>Average Rating:</b></p>
                                        <div style="display: flex; align-items: center; flex-wrap: wrap; gap: 10px; margin-bottom: 10px;">
                                            <span style="font-size:2em; color:#FFD600; white-space:nowrap;">
                                                {assign var="ratingValue" value=0}
                                                {if isset($user) && $user->getRating() !== null}
                                                    {assign var="ratingValue" value=$user->getRating()}
                                                {/if}
                                                {section name=star loop=5}
                                                    {if $smarty.section.star.index+1 <= $ratingValue|round:0}
                                                        <i class="fa fa-star"></i>
                                                    {elseif $smarty.section.star.index+1 <= $ratingValue+0.5}
                                                        <i class="fa fa-star-half-o"></i>
                                                    {else}
                                                        <i class="fa fa-star-o"></i>
                                                    {/if}
                                                {/section}
                                            </span>
                                            <span style="font-weight:bold; font-size:1.2em;">
                                                {if $ratingValue > 0}
                                                    {$ratingValue|number_format:2} / 5
                                                {else}
                                                    N/A
                                                {/if}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8 col-sm-offset-1">
                                    <h4>Reviews received:</h4>
                                    {if isset($user) && $user->getReviewToMe()|@count > 0}
                                        <div id="reviews-list">
                                            <ul class="list-group">
                                                {foreach from=$user->getReviewToMe() item=review name=reviewLoop}
                                                    <li class="list-group-item review-item" style="display:none;">
                                                        <div style="display: flex; align-items: flex-start; gap: 12px;">
                                                            {assign var="reviewerPic" value=$review->getReviewer()->getProfilePicture()}
                                                            <div style="flex-shrink:0;">
                                                                {if $reviewerPic}
                                                                    <img src="/PetHouse/image/showImage/{$reviewerPic->getId()}" alt="Reviewer Pic"
                                                                        style="width:40px; height:40px; object-fit:cover; border-radius:50%; border:2px solid #eee;">
                                                                {else}
                                                                    <img src="/PetHouse/App/templates/assets/img/mauro.png" alt="Reviewer Pic"
                                                                        style="width:40px; height:40px; object-fit:cover; border-radius:50%; border:2px solid #eee;">
                                                                {/if}
                                                            </div>
                                                            <div>
                                                                <b>From:</b> {$review->getReviewer()->getName()} {$review->getReviewer()->getSurname()}<br>
                                                                <b>Rating:</b> {$review->getRating()->value} / 5<br>
                                                                <b>Description:</b> {$review->getDescription()|escape}
                                                            </div>
                                                        </div>
                                                    </li>
                                                {/foreach}
                                            </ul>
                                        </div>
                                        <!-- Paginazione -->
                                        <div class="text-center" style="margin:20px 0;">
                                            <button id="prev-page" class="btn btn-default" type="button" disabled>Previous</button>
                                            <span id="page-info" style="margin:0 10px;">Page 1</span>
                                            <button id="next-page" class="btn btn-default" type="button">Next</button>
                                            <select id="reviews-per-page" style="margin-left:20px;">
                                                <option value="3">3 per page</option>
                                                <option value="6" selected>6 per page</option>
                                                <option value="9">9 per page</option>
                                                <option value="12">12 per page</option>
                                            </select>
                                        </div>
                                    {else}
                                        <p>No reviews received yet.</p>
                                    {/if}
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
        <script>
document.addEventListener('DOMContentLoaded', function() {
    var reviews = Array.from(document.querySelectorAll('.review-item'));
    var perPageSelect = document.getElementById('reviews-per-page');
    var perPage = parseInt(perPageSelect.value, 10);
    var currentPage = 1;
    var prevBtn = document.getElementById('prev-page');
    var nextBtn = document.getElementById('next-page');
    var pageInfo = document.getElementById('page-info');

    function showPage(page) {
        var totalPages = Math.ceil(reviews.length / perPage) || 1;
        reviews.forEach(function(item, idx) {
            if (idx >= (page - 1) * perPage && idx < page * perPage) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
        pageInfo.textContent = 'Page ' + page + ' of ' + totalPages;
        prevBtn.disabled = page <= 1;
        nextBtn.disabled = page >= totalPages;
    }

    perPageSelect.addEventListener('change', function() {
        perPage = parseInt(this.value, 10);
        currentPage = 1;
        showPage(currentPage);
    });

    prevBtn.addEventListener('click', function() {
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
        }
    });

    nextBtn.addEventListener('click', function() {
        var totalPages = Math.ceil(reviews.length / perPage) || 1;
        if (currentPage < totalPages) {
            currentPage++;
            showPage(currentPage);
        }
    });

    // Inizializza la paginazione
    showPage(currentPage);
});
</script>


</body>
</html>