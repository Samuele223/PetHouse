<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PetHouse | Your Posts</title>
        <meta name="description" content="PetHouse - Manage your posts for pet accommodation">
        <meta name="author" content="PetHouse">
        <meta name="keyword" content="html5, css, bootstrap, pets, accommodation, posts">
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
                    <a class="navbar-brand" href="/PetHouse/"><img src="/PetHouse/App/templates/assets/img/icona_footer-3.png" alt=""></a>
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
                        <h1 class="page-title">Your Posts</h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->

        <!-- property area -->
        <div class="content-area recent-property" style="background-color: #FFF;">
            <div class="container">   
                <div class="row">

                    <div class="col-md-12 pr-30 padding-top-40 properties-page user-properties">

                        <div class="section"> 
                            <div id="list-type" class="proerty-th-list">
                                {assign var="postsPerPage" value=6}
                                {if isset($smarty.get.page)}
                                    {assign var="currentPage" value=$smarty.get.page+0}
                                    {if $currentPage < 1}
                                        {assign var="currentPage" value=1}
                                    {/if}
                                {else}
                                    {assign var="currentPage" value=1}
                                {/if}
                                {assign var="totalPosts" value=$posts|@count}
                                {math assign="totalPages" equation="ceil(x/y)" x=$totalPosts y=$postsPerPage}
                                {if $totalPages < 1}
                                    {assign var="totalPages" value=1}
                                {/if}
                                {if $currentPage > $totalPages}
                                    {assign var="currentPage" value=$totalPages}
                                {/if}
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
                                                        <a href="/PetHouse/Post/view/{$post->getId()}">
                                                            <img src="/PetHouse/image/showImage/{$photos[0]->getId()}" alt="Property Image">
                                                        </a>
                                                    {else}
                                                        <a href="/PetHouse/Post/view/{$post->getId()}">
                                                            <img src="/PetHouse/App/templates/assets/img/demo/property-1.jpg" alt="Default Property Image">
                                                        </a>
                                                    {/if}
                                                </div>
                                                <div class="item-entry overflow">
                                                    <h5><a href="/PetHouse/Post/view/{$post->getId()}" style="color: #2c3e50; font-weight: 600; text-decoration: none;">{$post->getTitle()}</a></h5>
                                                    <div class="dot-hr"></div>
                                                    
                                                    <!-- Post Description -->
                                                    <div style="margin-bottom: 8px; padding: 6px 8px; background: #e8f4f8; border-radius: 5px; border-left: 3px solid #3498db;">
                                                        <small style="color: #666; font-weight: 600;">Description:</small>
                                                        <span style="color: #333; font-weight: 500;">{if $post->getMoreinfo()}{$post->getMoreinfo()|truncate:80}{else}Not specified{/if}</span>
                                                    </div>
                                                    
                                                    <!-- Accepted Pets -->
                                                    <div style="margin-bottom: 8px; padding: 6px 8px; background: #f0f8e8; border-radius: 5px; border-left: 3px solid #27ae60;">
                                                        <small style="color: #666; font-weight: 600;">Accepted Pets:</small>
                                                        <span style="color: #333; font-weight: 500;">
                                                            {assign var="acceptedPets" value=$post->getAcceptedpets()}
                                                            {if $acceptedPets|@count > 0}
                                                                {foreach from=$acceptedPets item=pet name=petLoop}
                                                                    {$pet}{if !$smarty.foreach.petLoop.last}, {/if}
                                                                {/foreach}
                                                            {else}
                                                                Not specified
                                                            {/if}
                                                        </span>
                                                    </div>
                                                                      <!-- Date Range -->
                                    <div style="margin-bottom: 8px; padding: 6px 8px; background: #fef5e7; border-radius: 5px; border-left: 3px solid #f39c12;">
                                        <small style="color: #666; font-weight: 600;">Period:</small>
                                        <span style="color: #333; font-weight: 500;">
                                            {if $post->getDateIn() && $post->getDateOut()}
                                                {$post->getDateIn()|date_format:"%d/%m/%Y"} - {$post->getDateOut()|date_format:"%d/%m/%Y"}
                                            {else}
                                                Not specified
                                            {/if}
                                        </span>
                                    </div>
                                                    
                                                    <!-- Price -->
                                                    <div style="margin-bottom: 15px; padding: 6px 8px; background: #f8e8f8; border-radius: 5px; border-left: 3px solid #e74c3c;">
                                                        <small style="color: #666; font-weight: 600;">Price:</small>
                                                        <span style="color: #333; font-weight: 500; font-size: 16px; font-weight: bold;">€{$post->getPrice()}/day</span>
                                                    </div>
                                                    
                                                    <!-- Action Buttons -->
                                                    <div class="dealer-action" style="text-align: center;">                                        
                                                        <a href="/PetHouse/user/edit_post/{$post->getId()}" class="button" style="margin: 2px; padding: 6px 12px; font-size: 12px;">Edit</a>
                                                        <a href="/PetHouse/user/delete_post/{$post->getId()}" class="button delete_user_car" style="margin: 2px; padding: 6px 12px; font-size: 12px;" onclick="return confirm('Are you sure you want to delete this post? This action cannot be undone.');">Delete</a>
                                                        <a href="/PetHouse/user/yourpost/{$post->getId()}" class="button" style="margin: 2px; padding: 6px 12px; font-size: 12px;">View</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {/section}
                                {else}
                                    <div class="col-md-12">
                                        <p>You haven't created any posts yet. <a href="/PetHouse/user/addPost">Create your first post</a>.</p>
                                    </div>
                                {/if}
                            </div>
                        </div>

                        <div class="section"> 
                            <div class="pull-right">
                                <div class="pagination">
                                    <ul style="display: flex; gap: 8px;">
                                        {assign var="prevPage" value=$currentPage-1}
                                        {assign var="nextPage" value=$currentPage+1}
                                        <li>
                                            {if $currentPage > 1}
                                                <a href="?page={$prevPage}" style="color:#337ab7;text-decoration:underline;">Prev</a>
                                            {else}
                                                <span style="color: #aaa; cursor: not-allowed;">Prev</span>
                                            {/if}
                                        </li>
                                        <li>
                                            {if $nextPage <= $totalPages}
                                                <a href="?page={$nextPage}" style="color:#337ab7;text-decoration:underline;">Next</a>
                                            {else}
                                                <span style="color: #aaa; cursor: not-allowed;">Next</span>
                                            {/if}
                                        </li>
                                    </ul>
                                    <!-- Debug info (remove in production) -->
                                    <small style="color: #999; margin-left: 10px;">
                                        Page {$currentPage} of {$totalPages} (Total posts: {$totalPosts})
                                    </small>
                                </div>
                            </div>                
                        </div>

                    </div>       

                    <div class="col-md-3 p0 padding-top-40">
                        <!-- Sidebar removed for cleaner interface -->
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
    document.querySelectorAll('.delete_user_car').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            var confirmed = confirm("Are you sure to proceed?\nYou're about to delete the selected post.");
            if (!confirmed) {
                e.preventDefault();
            }
        });
    });
});
</script>

    </body>
</html>