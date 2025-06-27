<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PetHouse | Home page</title>
        
        <meta name="description" content="GARO is a real-estate template">
        <meta name="author" content="Kimarotec">
        <meta name="keyword" content="html5, css, bootstrap, property, real-estate theme , bootstrap template">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

        <!-- Place /PetHouse/favicon1.ico and apple-touch-icon.png in the root directory -->
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center" style="margin-top: 30px;">
                    <h1>
                        Welcome 
                        {if isset($username) && $username|@strlen > 0}
                            {$username|escape}! How have you been?
                        {else}
                            to our website! Ready to love your pets?
                        {/if}
                    </h1>
                </div>
            </div>
        </div>       

        <!--End top header -->

        <nav class="navbar navbar-default ">
            <div style="position: absolute; left: 10px; top: 10px; z-index: 9999;">
                <button class="navbar-btn nav-button wow fadeInLeft" onclick="window.location.href='/PetHouse/Admin/login'" data-wow-delay="0.40s">Login Admin</button>
            </div>
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/PetHouse/"><img src="/PetHouse/App/templates/assets/img/icona_footer-3.png" alt="PetHouse logo"></a>
                </div>
                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right" style="position: absolute; right: 50px; top: 10px; z-index: 9999;">
    {if isset($username) && $username|@strlen > 0}
        <button class="navbar-btn nav-button wow fadeInRight" onclick="window.location.href='/PetHouse/user/logout'" data-wow-delay="0.48s">Logout</button>
        <button class="navbar-btn nav-button wow fadeInRight" onclick="window.location.href='/PetHouse/user/profile'" data-wow-delay="0.48s">Profile</button>
    {else}
        <button class="navbar-btn nav-button wow bounceInRight login" onclick="window.location.href='/PetHouse/user/login'" data-wow-delay="0.45s">Login/Register</button>
    {/if}
</div>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->

        <div class="slider-area">
            <div class="slider">
                <div id="bg-slider" class="owl-carousel owl-theme">

                    <div class="item"><img src="/PetHouse/App/templates/assets/img/slide1/3.jpg" alt="GTA V"></div>
                    <div class="item"><img src="/PetHouse/App/templates/assets/img/slide1/2.jpg" alt="The Last of us"></div>
                    <div class="item"><img src="/PetHouse/App/templates/assets/img/slide1/1.jpg" alt="GTA VI"></div>

                </div>
            </div>
            <div class="slider-content" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; display: flex; align-items: center; justify-content: center;">
                <div class="row" style="width: 100%;">
                    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 text-center">
                        <div style="background: rgba(40,40,40,0.22); display: inline-block; padding: 28px 36px 20px 36px; border-radius: 16px; box-shadow: 0 2px 12px rgba(0,0,0,0.13); margin-bottom: 18px; border: 1.5px solid rgba(80,80,80,0.10);">
                            <h2 style="color: #fff; font-size: 2.5em; font-weight: 800; letter-spacing: 1px; text-shadow: 0 2px 8px #222; margin-bottom: 10px;">TAKE CARE OF YOUR PETS, THEY MATTER</h2>
                            <p style="color: #ffd700; font-size: 1.3em; font-weight: 600; letter-spacing: 0.5px; text-shadow: 0 1px 4px #222; margin-bottom: 0;">Petsitting by loving homeowners, at affordable prices</p>
                        </div>
                        <div class="search-form wow pulse" data-wow-delay="0.8s">

                            <!-- Modifica il form di ricerca nella home -->
<form action="/PetHouse/Findhosting/searchHost" method="post" class="form-inline" id="customSearchForm">
    <div class="form-group">
        <select name="country" id="searchCountry" class="form-control">
            <option value="Italy">Italy</option>
        </select>
    </div>
    <div class="form-group">
        <div class="input-group">
            <input type="text" class="form-control" name="province" id="searchProvince" placeholder="Select province" autocomplete="off" readonly>
            <div class="input-group-btn">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                </button>
                <ul id="searchProvinceDropdown" class="dropdown-menu dropdown-menu-right" style="max-height: 300px; overflow-y: auto;">
                    <!-- Will be populated dynamically -->
                </ul>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="input-group" id="searchCityDropdownContainer">
            <input type="text" class="form-control" name="city" id="searchCity" placeholder="Select a province first" autocomplete="off" readonly disabled>
            <div class="input-group-btn">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled>
                    <span class="caret"></span>
                </button>
                <ul id="searchCityDropdown" class="dropdown-menu dropdown-menu-right" style="max-height: 300px; overflow-y: auto;">
                    <!-- Will be populated dynamically after province selection -->
                </ul>
            </div>
        </div>
    </div>
    <div class="form-group">
        <input type="date" class="form-control" name="datain" placeholder="Date In">
    </div>
    <div class="form-group">
        <input type="date" class="form-control" name="dataout" placeholder="Date Out">
    </div>
    <div class="form-group" id="petFields">
        <div class="input-group pet-group" style="margin-bottom:5px;">
            <select name="pets[]" class="form-control">
                <option value="">Select pet</option>
                <option value="DOG">DOG</option>
                <option value="CAT">CAT</option>
                <option value="PARROT">PARROT</option>
                <option value="FISH">FISH</option>
                <option value="HAMSTER">HAMSTER</option>
                <option value="MOUSE">MOUSE</option>
                <option value="SNAKE">SNAKE</option>
                <option value="RABBIT">RABBIT</option>
                <option value="TURTLE">TURTLE</option>
            </select>
            <input type="number" name="pet_counts[]" class="form-control" min="1" value="1" style="width:80px;" placeholder="Qty">
            <span class="input-group-btn">
                <button type="button" class="btn btn-success add-pet">+</button>
            </span>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Search</button>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('#petFields').addEventListener('click', function(e) {
        const target = e.target;

        if (target.classList.contains('add-pet')) {
            e.preventDefault();
            const petGroup = target.closest('.pet-group');
            const newGroup = petGroup.cloneNode(true);

            newGroup.querySelector('select').selectedIndex = 0;
            newGroup.querySelector('input').value = 1;

            const addBtn = newGroup.querySelector('.add-pet');
            addBtn.classList.remove('btn-success');
            addBtn.classList.add('btn-danger');
            addBtn.classList.remove('add-pet');
            addBtn.classList.add('remove-pet'); 
            addBtn.textContent = '-';

            document.querySelector('#petFields').appendChild(newGroup);
        }

        else if (target.classList.contains('remove-pet')) { // ✅ Controlla nuova classe
            e.preventDefault();
            const petGroup = target.closest('.pet-group');
            if(document.querySelectorAll('#petFields .pet-group').length > 1) {
                petGroup.remove();
            }
        }
    });
});
</script>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- property area -->
        <!-- Add this button where you want, for example above the "Top PetHouses" section -->
        <div class="col-md-10 col-md-offset-1 col-sm-6 text-center page-title">
        <a href="/PetHouse/user/addHouse" class="btn btn-default">Add your house + </a>  
        <a href="/PetHouse/offerHosting/showOfferForm" class="btn btn-default">Create a post +</a> 
        <div class="content-area home-area-1 recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                        <h2>Top PetHouses</h2>
                        <p>Best Pethouses in the last 30 days </p>
                    </div>
                </div>

                <div class="row">
                    <div class="proerty-th">

                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="#" onclick="return false;" style="cursor: pointer;"><img src="/PetHouse/App/templates/assets/img/demo/property-1.jpg"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="#" onclick="return false;" style="cursor: pointer;">Sunny Loft</a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b>Price per day:</b> €30</span>
                                    <span class="proerty-price pull-right"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="#" onclick="return false;" style="cursor: pointer;"><img src="/PetHouse/App/templates/assets/img/demo/property-2.jpg"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="#" onclick="return false;" style="cursor: pointer;">Cozy Den</a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b>Price per day:</b> €40</span>
                                    <span class="proerty-price pull-right"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="#" onclick="return false;" style="cursor: pointer;"><img src="/PetHouse/App/templates/assets/img/demo/property-3.jpg"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="#" onclick="return false;" style="cursor: pointer;">Urban Nest</a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b>Price per day:</b> €50</span>
                                    <span class="proerty-price pull-right"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="#" onclick="return false;" style="cursor: pointer;"><img src="/PetHouse/App/templates/assets/img/demo/property-4.jpg"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="#" onclick="return false;" style="cursor: pointer;">Pet Retreat</a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b>Price per day:</b> €60</span>
                                    <span class="proerty-price pull-right"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="#" onclick="return false;" style="cursor: pointer;"><img src="/PetHouse/App/templates/assets/img/demo/property-2.jpg"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="#" onclick="return false;" style="cursor: pointer;">Garden Flat</a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b>Price per day:</b> €35</span>
                                    <span class="proerty-price pull-right"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="#" onclick="return false;" style="cursor: pointer;"><img src="/PetHouse/App/templates/assets/img/demo/property-4.jpg"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="#" onclick="return false;" style="cursor: pointer;">Tiny Studio</a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b>Price per day:</b> €45</span>
                                    <span class="proerty-price pull-right"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="#" onclick="return false;" style="cursor: pointer;"><img src="/PetHouse/App/templates/assets/img/demo/property-3.jpg"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="#" onclick="return false;" style="cursor: pointer;">Lakeview Room</a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b>Price per day:</b> €55</span>
                                    <span class="proerty-price pull-right"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-tree more-proerty text-center">
                                <div class="item-tree-icon">
                                    <i class="fa fa-th"></i>
                                </div>
                                <div class="more-entry overflow">
                                    <h5><a href="/PetHouse/Findhosting/searchHost" >CAN'T DECIDE ? </a></h5>
                                    <h5 class="tree-sub-ttl">START SEARCHING FOR THE PERFECT HOUSE TODAY</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!--Welcome area -->
        <div class="Welcome-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 Welcome-entry  col-sm-12">
                        <div class="col-md-5 col-md-offset-2 col-sm-6 col-xs-12">
                            <div class="welcome_text wow fadeInLeft" data-wow-delay="0.3s" data-wow-offset="100">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                                        <!-- /.feature title -->
                                        <h2>PET HOUSE </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                            <div  class="welcome_services wow fadeInRight" data-wow-delay="0.3s" data-wow-offset="100">
                                <div class="row">
                                    <div class="col-xs-6 m-padding">
                                        <div class="welcome-estate">
                                            <div class="welcome-icon">
                                                <i class="pe-7s-home pe-4x"></i>
                                            </div>
                                            <h3>Any property</h3>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 m-padding">
                                        <div class="welcome-estate">
                                            <div class="welcome-icon">
                                                <i class="pe-7s-users pe-4x"></i>
                                            </div>
                                            <h3>More Clients</h3>
                                        </div>
                                    </div>


                                    <div class="col-xs-12 text-center">
                                        <i class="welcome-circle"></i>
                                    </div>

                                    <div class="col-xs-6 m-padding">
                                        <div class="welcome-estate">
                                            <div class="welcome-icon">
                                                <i class="pe-7s-notebook pe-4x"></i>
                                            </div>
                                            <h3>Easy to use</h3>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 m-padding">
                                        <div class="welcome-estate">
                                            <div class="welcome-icon">
                                                <i class="pe-7s-help2 pe-4x"></i>
                                            </div>
                                            <h3>Any help </h3>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--TESTIMONIALS -->
        <div class="testimonial-area recent-property" style="background-color: #FCFCFC; padding-bottom: 15px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                        <h2>Our Customers Said:  </h2> 
                    </div>
                </div>

                <div class="row">
                    <div class="row testimonial">
                        <div class="col-md-12">
                            <div id="testimonial-slider">
                                <div class="item">
                                    <div class="client-text">                                
                                        <p>"Great service!"</p>
                                        <h4><strong>Luca Bianchi, </strong><i>Pet Owner</i></h4>
                                    </div>
                                    <div class="client-face wow fadeInRight" data-wow-delay=".9s"> 
                                        <img src="/PetHouse/App/templates/assets/img/client-face1.png" alt="">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="client-text">                                
                                        <p>"Easy and safe."</p>
                                        <h4><strong>Marco Verdi, </strong><i>House Owner</i></h4>
                                    </div>
                                    <div class="client-face">
                                        <img src="/PetHouse/App/templates/assets/img/client-face2.png" alt="">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="client-text">                                
                                        <p>"Found a sitter fast."</p>
                                        <h4><strong>Giovanni Russo, </strong><i>Pet Owner</i></h4>
                                    </div>
                                    <div class="client-face">
                                        <img src="/PetHouse/App/templates/assets/img/client-face1.png" alt="">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="client-text">                                
                                        <p>"Will use again!"</p>
                                        <h4><strong>Alessandro Neri, </strong><i>House Owner</i></h4>
                                    </div>
                                    <div class="client-face">
                                        <img src="/PetHouse/App/templates/assets/img/client-face2.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Count area -->
        <div class="count-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                        <h2>You can trust Us! </h2> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12 percent-blocks m-main" data-waypoint-scroll="true">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6">
                                <div class="count-item">
                                    <div class="count-item-circle">
                                        <span class="pe-7s-users"></span>
                                    </div>
                                    <div class="chart" data-percent="5000">
                                        <h2 class="percent" id="counter">0</h2>
                                        <h5>HAPPY CUSTOMER </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="count-item">
                                    <div class="count-item-circle">
                                        <span class="pe-7s-home"></span>
                                    </div>
                                    <div class="chart" data-percent="12000">
                                        <h2 class="percent" id="counter1">0</h2>
                                        <h5>Properties REGISTERED</h5>
                                    </div>
                                </div> 
                            </div> 
                            <div class="col-sm-3 col-xs-6">
                                <div class="count-item">
                                    <div class="count-item-circle">
                                        <span class="pe-7s-flag"></span>
                                    </div>
                                    <div class="chart" data-percent="120">
                                        <h2 class="percent" id="counter2">0</h2>
                                        <h5>City registered </h5>
                                    </div>
                                </div> 
                            </div> 
                            <div class="col-sm-3 col-xs-6">
                                <div class="count-item">
                                    <div class="count-item-circle">
                                        <span class="pe-7s-graph2"></span>
                                    </div>
                                    <div class="chart" data-percent="5000">
                                        <h2 class="percent"  id="counter3">5000</h2>
                                        <h5>POST CREATED</h5>
                                    </div>
                                </div> 

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- boy-sale area -->
        <div class="boy-sale-area">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12">
                        <div class="asks-first">
                            <div class="asks-first-circle">
                                <span class="fa fa-search"></span>
                            </div>
                            <div class="asks-first-info">
                                <h2>Are you looking for a place for your pet?</h2>
                                <p>Find a loving and safe home for your pet while you are away. Search trusted hosts near you.</p>                                        
                            </div>
                            <div class="asks-first-arrow">
                                <a href="/PetHouse/Findhosting/searchHost"><span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-10 col-sm-offset-1 col-xs-12 col-md-offset-0">
                        <div  class="asks-first">
                            <div class="asks-first-circle">
                                <span class="fa fa-usd"></span>
                            </div>
                            <div class="asks-first-info">
                                <h2>Do you have free time and a safe place?</h2>
                                <p>Become a host and earn by caring for pets in your home. Help pet owners and enjoy great company.</p>
                            </div>
                            <div class="asks-first-arrow">
                                <a href="/PetHouse/user/addHouse"><span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div> </div> 

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
    // Get location fields in search form
    const cityField = document.querySelector('form#customSearchForm input[name="city"]');
    const provinceField = document.querySelector('form#customSearchForm input[name="province"]');
    
    // Location field validation - only letters, spaces, hyphens, and apostrophes
    const locationRegex = /^[A-Za-z\s\-']*$/;
    
    // Add HTML5 pattern validation
    provinceField.pattern = "[A-Za-z\\s\\-']*";
    cityField.pattern = "[A-Za-z\\s\\-']*";
    
    // Add title attribute for validation message on hover
    provinceField.title = "Province should only contain letters, spaces, hyphens or apostrophes";
    cityField.title = "City should only contain letters, spaces, hyphens or apostrophes";
    
    // Add input event listeners for real-time validation
    [provinceField, cityField].forEach(field => {
        field.addEventListener('input', function() {
            validateLocationField(this);
        });
    });
    
    // Add form submit validation
    const searchForm = document.getElementById('customSearchForm');
    searchForm.addEventListener('submit', function(e) {
        let isValid = true;
        
        // Validate location fields
        [provinceField, cityField].forEach(field => {
            if (field.value && !locationRegex.test(field.value)) {
                isValid = false;
                validateLocationField(field);
            }
        });
        
        if (!isValid) {
            e.preventDefault();
            alert('Please enter valid location information.');
        }
    });
    
    function validateLocationField(field) {
        if (field.value && !locationRegex.test(field.value)) {
            field.style.borderColor = 'red';
            return false;
        } else {
            field.style.borderColor = '';
            return true;
        }
    }
});
</script>

<?php
// Add this function to a utilities file or directly in your controller
function validateLocationString($string) {
    // Allow only letters, spaces, hyphens and apostrophes
    return preg_match('/^[A-Za-z\s\-\']+$/', $string);
}

// Then in your controller methods that handle form submissions:
$city = UHTTPMethods::post('city');
$province = UHTTPMethods::post('province');
$country = UHTTPMethods::post('country');

// Validate all location fields
if (!empty($city) && !validateLocationString($city)) {
    // Return error or set default
    $city = null;
}

if (!empty($province) && !validateLocationString($province)) {
    // Return error or set default
    $province = null;
}

if (!empty($country) && !validateLocationString($country)) {
    // Return error or set default
    $country = null;
}
?>
<script src="/PetHouse/App/templates/assets/js/italian-locations.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get date input fields
    const dateInField = document.querySelector('input[name="datain"]');
    const dateOutField = document.querySelector('input[name="dataout"]');
    
    // Set min date to today for both fields
    const today = new Date().toISOString().split('T')[0];
    dateInField.min = today;
    dateOutField.min = today;
    
    // When start date changes, update min value of end date
    dateInField.addEventListener('change', function() {
        if (dateInField.value) {
            dateOutField.min = dateInField.value;
            
            // If end date is now before start date, clear it
            if (dateOutField.value && dateOutField.value < dateInField.value) {
                dateOutField.value = '';
            }
        }
    });
    
    // Validate dates before form submission
    document.getElementById('customSearchForm').addEventListener('submit', function(e) {
        if (dateInField.value && dateOutField.value) {
            if (new Date(dateOutField.value) < new Date(dateInField.value)) {
                e.preventDefault();
                alert('End date cannot be before start date');
                return false;
            }
        }
    });
});
</script>
    </body>
</html>