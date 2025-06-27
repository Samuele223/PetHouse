<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PetHouse | Properties  page</title>
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
        <link href="/PetHouse/App/templates/assets/css/animate.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/bootstrap-select.min.css"> 
        <link rel="stylesheet" href="/PetHouse/App/templates/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/icheck.min_all.css">
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/price-range.css">
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/owl.carousel.css">  
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/owl.theme.css">
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/owl.transitions.css">
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

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse yamm" id="navigation">
                        <div class="button navbar-right">
                            <button class="navbar-btn nav-button wow fadeInRight home" onclick="window.location.href='/PetHouse/'" data-wow-delay="0.5s">Home</button>
                        </div>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->

        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">What other users say about you</h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->

        <!-- property area -->
        <div class="properties-area recent-property" style="background-color: #FFF;">
            <div class="container">  
                <div class="row">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center" style="margin: 30px 0;">
                                    <h3>
                                        Average Rating: 
                                        <span style="color: #FFD600; font-weight: bold;">
                                            {$avg|number_format:2} / 5
                                        </span>
                                    </h3>
                                </div>
                            </div>
                        </div>     
                <div class="col-md-9  pr0 padding-top-40 properties-page">
                    <div class="col-md-12 clear"> 
                        <div class="col-xs-10 page-subheader sorting pl0">

                        <div class="col-xs-2 layout-switcher">
                            <a class="layout-list" href="javascript:void(0);"> <i class="fa fa-th-list"></i>  </a>
                            <a class="layout-grid active" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>                          
                        </div><!--/ .layout-switcher-->
                    </div>

                    <div class="section"> 
                        <div id="list-type" class="proerty-th-list">
                            {if $reviews|@count > 0}
                                {foreach from=$reviews item=review name=reviewLoop}
                                    <div class="col-md-4 p0 review-item" style="display:none;">
                                        <div class="box-two proerty-item">
                                            <div class="item-entry overflow">
                                                <h5>
                                                    Review for: 
                                                    <b>{$review->getReviewed()->getName()} {$review->getReviewed()->getSurname()}</b>
                                                </h5>
                                                <div class="dot-hr"></div>
                                                <span class="pull-left"><b>Rating:</b> {$review->getRating()->value} / 5</span><br>
                                                <span class="pull-left"><b>Description:</b> {$review->getDescription()|escape}</span><br>
                                                <span class="pull-left"><b>Reviewer:</b> {$review->getReviewer()->getName()} {$review->getReviewer()->getSurname()}</span><br>
                                            </div>
                                        </div>
                                    </div>
                                {/foreach}
                            {else}
                                <div class="col-md-12">
                                    <p>No reviews found.</p>
                                </div>
                            {/if}
                        </div>
                        <!-- Paginazione -->
                        <div class="text-center" style="margin:20px 0;">
                            <button id="prev-page" class="btn btn-default" disabled>Previous</button>
                            <span id="page-info" style="margin:0 10px;">Page 1</span>
                            <button id="next-page" class="btn btn-default">Next</button>
                            <select id="reviews-per-page" style="margin-left:20px;">
                                <option value="3">3 per page</option>
                                <option value="6" selected>6 per page</option>
                                <option value="9">9 per page</option>
                                <option value="12">12 per page</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="margin-bottom:20px;">
                    <button class="btn btn-default btn-lg" style="width:100%;font-weight:bold;" onclick="window.history.back();">
                        <i class="fa fa-arrow-left"></i> Back
                    </button>
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

      <script src="/PetHouse/App/templates/assets/js/modernizr-2.6.2.min.js"></script>
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