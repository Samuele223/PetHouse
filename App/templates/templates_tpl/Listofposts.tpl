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
                        <div class="header-half header-call">
                            <!-- Removed phone and email info from header -->
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

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse yamm" id="navigation">
                        <div class="button navbar-right">
                            <button class="navbar-btn nav-button wow fadeInRight home" onclick="window.location.href='/PetHouse/'" data-wow-delay="0.5s">Home</button>
                        </div>
                    <ul class="main-nav nav navbar-nav navbar-right">
                        <!-- Navigation items removed for cleaner interface -->
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->

        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">POST SEARCH RESULTS</h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->

        <!-- property area -->
        <div class="properties-area recent-property" style="background-color: #FFF;">
            <div class="container">  
                <div class="row">
                     


                <div class="col-md-9  pr0 padding-top-40 properties-page">
                    <div class="col-md-12 clear"> 
                        <div class="col-xs-10 page-subheader sorting pl0">
                            <!-- Removed sorting and per-page options -->
                        </div>

                        <div class="col-xs-2 layout-switcher">
                            <a class="layout-list" href="javascript:void(0);"> <i class="fa fa-th-list"></i>  </a>
                            <a class="layout-grid active" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>                          
                        </div><!--/ .layout-switcher-->
                    </div>
                    <div class="form-inline" style="margin-bottom:20px;">
                        <label for="filter-price" style="margin-right:10px;">Max price (€):</label>
                        <input type="range" id="filter-price" class="form-control" min="0" max="100" step="1" value="100" style="width:200px;">
                        <span id="filter-price-value">100</span>
                    </div>

                    <div class="section"> 
                            <div id="list-type" class="proerty-th-list">
                                {assign var="postsPerPage" value=6}
                                {if isset($smarty.post.page)}
                                    {assign var="currentPage" value=$smarty.post.page+0}
                                    {if $currentPage < 1}
                                        {assign var="currentPage" value=1}
                                    {/if}
                                {else}
                                    {assign var="currentPage" value=1}
                                {/if}
                                {assign var="totalPosts" value=$posts|@count}
                                {math assign="totalPages" equation="ceil(x/y)" x=$totalPosts y=$postsPerPage}
                                {assign var="startIndex" value=($currentPage-1)*$postsPerPage}
                                {if $totalPosts > 0}
                                    {section name=idx start=$startIndex loop=$posts max=$postsPerPage}
                                        {assign var="post" value=$posts[idx]}
                                        <div class="col-md-4 p0">
                                            <div class="box-two proerty-item">
                                                <div class="item-thumb">
                                                    {assign var="house" value=$post->getHouse()}
                                                    {assign var="photos" value=$house->getPhotos()}
                                                    {if $photos|@count > 0}
                                                        <a href="/PetHouse/Findhosting/selectpost/{$post->getId()}">
                                                            <img src="/PetHouse/image/showImage/{$photos[0]->getId()}">
                                                        </a>
                                                    {else}
                                                        <a href="/PetHouse/Findhosting/selectpost/{$post->getId()}">
                                                            <img src="/PetHouse/App/templates/assets/img/demo/property-1.jpg">
                                                        </a>
                                                    {/if}
                                                </div>
                                                <div class="item-entry overflow">
                                                    <h5><a href="/PetHouse/Post/view/{$post->getId()}" style="color: #2c3e50; font-weight: 600; text-decoration: none;">{$post->getTitle()}</a></h5>
                                                    <div class="dot-hr"></div>
                                                    
                                                    <!-- Price -->
                                                    <div style="text-align: right; margin-bottom: 10px;">
                                                        <span class="proerty-price" style="background: #27ae60; color: white; padding: 4px 10px; border-radius: 12px; font-weight: bold; font-size: 14px;">€ {$post->getPrice()}/day</span>
                                                    </div>
                                                    
                                                    <!-- Location -->
                                                    <div style="margin-bottom: 8px; padding: 6px 8px; background: #e8f4f8; border-radius: 5px; border-left: 3px solid #3498db;">
                                                        <span style="color: #666; font-size: 11px; font-weight: 600;">
                                                            <i class="fa fa-map-marker" style="color: #3498db; margin-right: 4px;"></i>
                                                            {$house->getCity()}, {$house->getProvince()}
                                                        </span>
                                                    </div>
                                                    
                                                    <!-- House Description -->
                                                    <div style="margin-bottom: 8px; padding: 6px 8px; background: #f8f9fa; border-radius: 5px; border-left: 3px solid #3498db;">
                                                        <span style="color: #666; font-size: 11px; font-weight: 600;">
                                                            <i class="fa fa-home" style="color: #3498db; margin-right: 4px;"></i>
                                                            House
                                                        </span>
                                                        <p style="margin: 3px 0 0 0; color: #2c3e50; font-size: 12px; line-height: 1.3;">{$house->getDescription()|truncate:60:"..."}</p>
                                                    </div>
                                                    
                                                    <!-- Post Info -->
                                                    {if $post->getMoreinfo()}
                                                    <div style="margin-bottom: 8px; padding: 6px 8px; background: #fff8e7; border-radius: 5px; border-left: 3px solid #f39c12;">
                                                        <span style="color: #666; font-size: 11px; font-weight: 600;">
                                                            <i class="fa fa-info-circle" style="color: #f39c12; margin-right: 4px;"></i>
                                                            Post Info
                                                        </span>
                                                        <p style="margin: 3px 0 0 0; color: #2c3e50; font-size: 12px; line-height: 1.3;">{$post->getMoreinfo()|truncate:50:"..."}</p>
                                                    </div>
                                                    {/if}
                                                    
                                                    <!-- Dates -->
                                                    <div style="margin-bottom: 8px; padding: 6px 8px; background: #fef5e7; border-radius: 5px; border-left: 3px solid #e74c3c;">
                                                        <span style="color: #666; font-size: 11px; font-weight: 600;">
                                                            <i class="fa fa-calendar" style="color: #e74c3c; margin-right: 4px;"></i>
                                                            Available Period
                                                        </span>
                                                        <div style="margin-top: 4px; display: flex; justify-content: space-between; gap: 8px;">
                                                            <span style="background: white; padding: 3px 6px; border-radius: 8px; font-size: 10px; font-weight: 600; color: #2c3e50; border: 1px solid #ecf0f1;">
                                                                <i class="fa fa-sign-in" style="color: #27ae60; margin-right: 3px; font-size: 10px;"></i>
                                                                {$post->getDateIn()->format('d/m/Y')}
                                                            </span>
                                                            <span style="background: white; padding: 3px 6px; border-radius: 8px; font-size: 10px; font-weight: 600; color: #2c3e50; border: 1px solid #ecf0f1;">
                                                                <i class="fa fa-sign-out" style="color: #e74c3c; margin-right: 3px; font-size: 10px;"></i>
                                                                {$post->getDateOut()->format('d/m/Y')}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Accepted Pets -->
                                                    {assign var="acceptedPets" value=$post->getAcceptedPets()}
                                                    {if $acceptedPets|@count > 0}
                                                    <div style="margin-bottom: 10px; padding: 6px 8px; background: #f3e5f5; border-radius: 5px; border-left: 3px solid #8e44ad;">
                                                        <span style="color: #666; font-size: 11px; font-weight: 600;">
                                                            <i class="fa fa-paw" style="color: #8e44ad; margin-right: 4px;"></i>
                                                            Accepted Pets
                                                        </span>
                                                        <div style="margin-top: 4px; display: flex; flex-wrap: wrap; gap: 4px;">
                                                            {foreach $acceptedPets as $petType => $count}
                                                                {if $petType == 'DOG'}
                                                                    <span style="background: #3498db; color: white; padding: 2px 6px; border-radius: 8px; font-size: 10px; font-weight: 500;">
                                                                        Dog ({$count})
                                                                    </span>
                                                                {elseif $petType == 'CAT'}
                                                                    <span style="background: #9b59b6; color: white; padding: 2px 6px; border-radius: 8px; font-size: 10px; font-weight: 500;">
                                                                        Cat ({$count})
                                                                    </span>
                                                                {elseif $petType == 'BIRD'}
                                                                    <span style="background: #f39c12; color: white; padding: 2px 6px; border-radius: 8px; font-size: 10px; font-weight: 500;">
                                                                        Bird ({$count})
                                                                    </span>
                                                                {elseif $petType == 'FISH'}
                                                                    <span style="background: #1abc9c; color: white; padding: 2px 6px; border-radius: 8px; font-size: 10px; font-weight: 500;">
                                                                        Fish ({$count})
                                                                    </span>
                                                                {elseif $petType == 'RABBIT'}
                                                                    <span style="background: #e67e22; color: white; padding: 2px 6px; border-radius: 8px; font-size: 10px; font-weight: 500;">
                                                                        Rabbit ({$count})
                                                                    </span>
                                                                {else}
                                                                    <span style="background: #95a5a6; color: white; padding: 2px 6px; border-radius: 8px; font-size: 10px; font-weight: 500;">
                                                                        {$petType} ({$count})
                                                                    </span>
                                                                {/if}
                                                            {/foreach}
                                                        </div>
                                                    </div>
                                                    {/if}
                                                    
                                                    <!-- Action Button -->
                                                    <div style="text-align: center; margin-top: 10px;">
                                                        <a href="/PetHouse/Findhosting/selectpost/{$post->getId()}" class="btn btn-primary btn-sm" style="background: #3498db; border: none; border-radius: 15px; font-weight: 600; padding: 6px 20px; text-decoration: none; font-size: 11px; text-transform: uppercase;">
                                                            <i class="fa fa-search-plus" style="margin-right: 5px;"></i>View Details
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {/section}
                                {else}
                                    <div class="col-md-12">
                                        <p>Non hai ancora creato annunci. <a href="/PetHouse/user/addHouse">Crea il tuo primo annuncio</a>.</p>
                                    </div>
                                {/if}
                            </div>
                        </div>
                    
                    <div class="col-md-12"> 
                        <div class="pull-right">
                            <div class="pagination">
                                <ul style="display: flex; gap: 8px;">
                                    {assign var="prevPage" value=$currentPage-1}
                                    {assign var="nextPage" value=$currentPage+1}
                                    <li>
                                        {if $currentPage > 1}
                                            <form method="post" action="/PetHouse/Findhosting/searchHost" style="display:inline;">
                                                <input type="hidden" name="page" value="{$prevPage}">
                                                <input type="hidden" name="city" value="{$smarty.post.city|default:''}">
                                                <input type="hidden" name="province" value="{$smarty.post.province|default:''}">
                                                <input type="hidden" name="datain" value="{$smarty.post.datain|default:''}">
                                                <input type="hidden" name="dataout" value="{$smarty.post.dataout|default:''}">
                                                {if isset($smarty.post.pets)}
                                                    {foreach $smarty.post.pets as $key => $pet}
                                                        <input type="hidden" name="pets[{$key}]" value="{$pet}">
                                                    {/foreach}
                                                {/if}
                                                {if isset($smarty.post.pet_counts)}
                                                    {foreach $smarty.post.pet_counts as $key => $count}
                                                        <input type="hidden" name="pet_counts[{$key}]" value="{$count}">
                                                    {/foreach}
                                                {/if}
                                                <button type="submit" style="background:none;border:none;color:#337ab7;text-decoration:underline;cursor:pointer;">Prev</button>
                                            </form>
                                        {else}
                                            <span style="color: #aaa; cursor: not-allowed;">Prev</span>
                                        {/if}
                                    </li>
                                    <li>
                                        {if $currentPage < $totalPages}
                                            <form method="post" action="/PetHouse/Findhosting/searchHost" style="display:inline;">
                                                <input type="hidden" name="page" value="{$nextPage}">
                                                <input type="hidden" name="city" value="{$smarty.post.city|default:''}">
                                                <input type="hidden" name="province" value="{$smarty.post.province|default:''}">
                                                <input type="hidden" name="datain" value="{$smarty.post.datain|default:''}">
                                                <input type="hidden" name="dataout" value="{$smarty.post.dataout|default:''}">
                                                {if isset($smarty.post.pets)}
                                                    {foreach $smarty.post.pets as $key => $pet}
                                                        <input type="hidden" name="pets[{$key}]" value="{$pet}">
                                                    {/foreach}
                                                {/if}
                                                {if isset($smarty.post.pet_counts)}
                                                    {foreach $smarty.post.pet_counts as $key => $count}
                                                        <input type="hidden" name="pet_counts[{$key}]" value="{$count}">
                                                    {/foreach}
                                                {/if}
                                                <button type="submit" style="background:none;border:none;color:#337ab7;text-decoration:underline;cursor:pointer;">Next</button>
                                            </form>
                                        {else}
                                            <span style="color: #aaa; cursor: not-allowed;">Next</span>
                                        {/if}
                                    </li>
                                </ul>
                            </div>
                        </div>
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
            // Price filter
            var input = document.getElementById('filter-price');
            var valueSpan = document.getElementById('filter-price-value');
            if (input && valueSpan) {
                valueSpan.textContent = input.value;
                input.addEventListener('input', function() {
                    valueSpan.textContent = this.value;
                    var max = parseFloat(this.value) || Infinity;
                    document.querySelectorAll('.proerty-item').forEach(function(item) {
                        var priceText = item.querySelector('.proerty-price');
                        if (!priceText) return;
                        var price = parseFloat(priceText.textContent.replace(/[^\d.]/g, ''));
                        if (isNaN(price) || price > max) {
                            item.style.display = 'none';
                        } else {
                            item.style.display = '';
                        }
                    });
                });
            }
        });
        </script>

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
    </body>
</html>