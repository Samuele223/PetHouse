<?php
/* Smarty version 5.5.0, created on 2025-06-25 16:01:32
  from 'file:offer_hosting.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.0',
  'unifunc' => 'content_685c013c70a984_47799456',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0d0ee849f621c7e97a950ebcdc22b3f64b86b864' => 
    array (
      0 => 'offer_hosting.tpl',
      1 => 1750787586,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_685c013c70a984_47799456 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\PetHouse\\App\\templates\\templates_tpl';
?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>GARO ESTATE | Submit property Page</title>
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
        <link href="css/animate.css" rel="stylesheet" media="screen">
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
                                <span><i class="pe-7s-call"></i> +1 234 567 7890</span>
                                <span><i class="pe-7s-mail"></i> your@company.com</span>
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
                    <a class="navbar-brand" href="https://localhost/PetHouse/"><img src="/PetHouse/App/templates/assets/img/icona_2.png" alt=""></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
                        <button button type="submit" class="navbar-btn nav-button wow bounceInRight logout" onclick="window.location.href='https://localhost/PetHouse/user/logout'" data-wow-delay="0.45s">Logout</button>
                        <button class="navbar-btn nav-button wow fadeInRight" onclick=" window.location('https://localhost/PetHouse/user/profile')" data-wow-delay="0.5s">Profile</button>
                    </div>
                    <ul class="main-nav nav navbar-nav navbar-right">
                        <li class="dropdown ymm-sw " data-wow-delay="0.1s">
                            <li class="wow fadeInDown" data-wow-delay="0.2s"><a class="" href="https://localhost/PetHouse/">Home</a></li>
                        </li>

                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a class="" href="properties.html">Properties</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a class="" href="property.html">Property</a></li>
                        <li class="dropdown yamm-fw" data-wow-delay="0.1s">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Template <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="yamm-content">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h5>Home pages</h5>
                                                <ul>
                                                    <li>
                                                        <a href="index.html">Home Style 1</a>
                                                    </li>
                                                    <li>
                                                        <a href="index-2.html">Home Style 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="index-3.html">Home Style 3</a>
                                                    </li>
                                                    <li>
                                                        <a href="index-4.html">Home Style 4</a>
                                                    </li>
                                                    <li>
                                                        <a href="index-5.html">Home Style 5</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-3">
                                                <h5>Pages and blog</h5>
                                                <ul>
                                                    <li><a href="blog.html">Blog listing</a>  </li>
                                                    <li><a href="single.html">Blog Post (full)</a>  </li>
                                                    <li><a href="single-right.html">Blog Post (Right)</a>  </li>
                                                    <li><a href="single-left.html">Blog Post (left)</a>  </li>
                                                    <li><a href="contact.html">Contact style (1)</a> </li>
                                                    <li><a href="contact-3.html">Contact style (2)</a> </li>
                                                    <li><a href="contact_3.html">Contact style (3)</a> </li>
                                                    <li><a href="faq.html">FAQ page</a> </li> 
                                                    <li><a href="404.html">404 page</a>  </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-3">
                                                <h5>Property</h5>
                                                <ul>
                                                    <li><a href="property-1.html">Property pages style (1)</a> </li>
                                                    <li><a href="property-2.html">Property pages style (2)</a> </li>
                                                    <li><a href="property-3.html">Property pages style (3)</a> </li>
                                                </ul>

                                                <h5>Properties list</h5>
                                                <ul>
                                                    <li><a href="properties.html">Properties list style (1)</a> </li> 
                                                    <li><a href="properties-2.html">Properties list style (2)</a> </li> 
                                                    <li><a href="properties-3.html">Properties list style (3)</a> </li> 
                                                </ul>                                               
                                            </div>
                                            <div class="col-sm-3">
                                                <h5>Property process</h5>
                                                <ul> 
                                                    <li><a href="submit-property.html">Submit - step 1</a> </li>
                                                    <li><a href="submit-property.html">Submit - step 2</a> </li>
                                                    <li><a href="submit-property.html">Submit - step 3</a> </li> 
                                                </ul>
                                                <h5>User account</h5>
                                                <ul>
                                                    <li><a href="register.html">Register / login</a>   </li>
                                                    <li><a href="user-properties.html">Your properties</a>  </li>
                                                    <li><a href="submit-property.html">Submit property</a>  </li>
                                                    <li><a href="change-password.html">Change password</a> </li>
                                                    <li><a href="user-profile.html">Your profile</a>  </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.yamm-content -->
                                </li>
                            </ul>
                        </li>

                        <li class="wow fadeInDown" data-wow-delay="0.4s"><a href="contact.html">Contact</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->

        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">Submit new property</h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->

        <!-- property area -->
        <div class="content-area submit-property" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">
                <div class="clearfix" > 
                    <div class="wizard-container"> 

                        <div class="wizard-card ct-wizard-orange" id="wizardProperty">
                            <form action="/PetHouse/offerHosting/createOffer" method="post" enctype="multipart/form-data">                        
                                <div class="wizard-header">
                                    <h3>
                                        <b>Submit</b> YOUR PROPERTY <br>
                                        <small>Lorem ipsum dolor sit amet, consectetur adipisicing.</small>
                                    </h3>
                                </div>

                                <!-- Aggiungi questo blocco per mostrare eventuali errori -->
                                <?php if ((true && ($_smarty_tpl->hasVariable('error') && null !== ($_smarty_tpl->getValue('error') ?? null)))) {?>
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Error!</strong> <?php echo $_smarty_tpl->getValue('error');?>

                                </div>
                                <?php }?>

                                <ul>
    <li><a href="#step1" data-toggle="tab">Step 1</a></li>
    <li><a href="#step2" data-toggle="tab">Step 2</a></li>
    <li><a href="#step3" data-toggle="tab">Step 3</a></li>
    <li><a href="#step4" data-toggle="tab">Finished</a></li>
</ul>

<div class="tab-content">
    <!-- STEP 1 -->
    <div class="tab-pane" id="step1">
        <div class="row p-b-15">
            <h4 class="info-text">Select your property</h4>

            <div class="col-sm-12">
                <div class="col-sm-7">
                    <!-- Campo property -->
                    <div class="form-group">
                        <label>Select your property <small>(required)</small></label>
                        <select name="idPosition" id="propertySelect" class="form-control" required>
                            <option value="">-- Select a property --</option>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('positions'), 'position');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('position')->value) {
$foreach0DoElse = false;
?>
                                <option value="<?php echo $_smarty_tpl->getValue('position')->getId();?>
">
                                    <?php echo $_smarty_tpl->getValue('position')->getTitle();?>
 - <?php echo $_smarty_tpl->getValue('position')->getAddress();?>
, <?php echo $_smarty_tpl->getValue('position')->getCity();?>

                                </option>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </select>
                        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('positions')) == 0) {?>
                            <div class="alert alert-warning" style="margin-top:10px;">
                                <p>You don't have any properties yet.
                                    <a href="/PetHouse/user/addHouse" class="btn btn-xs btn-primary">Add a property</a>
                                </p>
                            </div>
                        <?php }?>
                    </div>

                    <!-- Campo moreInfo -->
                    <div class="form-group">
                        <label>Additional information <small>(required)</small></label>
                        <textarea name="moreInfo" class="form-control" rows="4" placeholder="Add more details about this listing..." required></textarea>
                    </div>
                </div>

                <!-- Anteprima immagine -->
                <div class="col-sm-5">
                    <div id="property-preview-container" style="margin-top: 20px; text-align: center;">
                        <img src="/PetHouse/App/templates/assets/img/default-property.jpg" 
                             id="propertyImagePreview"
                             style="max-width: 100%; max-height: 200px; border:1px solid #ddd; padding:3px; border-radius:4px;" />
                        <p style="margin-top:10px;">Selected property image</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FINE STEP 1 -->

    <!-- STEP 2 -->
    <div class="tab-pane" id="step2">
        <h4 class="info-text">Listing details</h4>

        <div class="form-group">
            <label>Price per night <span style="color:#FDC600;">€</span>:</label>
            <div class="input-group" style="max-width: 300px;">
                <span class="input-group-addon" style="background:#FDC600; color:#fff; border:1px solid #FDC600;">
                    <i class="fa fa-eur"></i>
                </span>
                <input type="number" name="price" class="form-control" min="0" step="0.01"
                       placeholder="Enter price" required>
                <span class="input-group-addon" style="background:#FDC600; color:#fff; border:1px solid #FDC600;">
                    /night
                </span>
            </div>
        </div>

        <div class="form-group">
            <label>Accepted pets:</label>
            <div id="acceptedPetsFields">
                <div class="input-group pet-group" style="margin-bottom:5px; max-width:400px;">
                    <select name="accepted_pets[]" class="form-control">
                        <option value="">Select pet type</option>
                        <option value="DOG">Dog</option>
                        <option value="CAT">Cat</option>
                        <option value="PARROT">Parrot</option>
                        <option value="FISH">Fish</option>
                        <option value="HAMSTER">Hamster</option>
                        <option value="MOUSE">Mouse</option>
                        <option value="SNAKE">Snake</option>
                        <option value="RABBIT">Rabbit</option>
                        <option value="TURTLE">Turtle</option>
                    </select>
                    <input type="number" name="accepted_pet_counts[]" class="form-control" min="1" value="1" 
                           style="width:80px;" placeholder="Qty">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-success add-pet">+</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- FINE STEP 2 -->

    <!-- STEP 3 -->
    <div class="tab-pane" id="step3">
        <h4 class="info-text">Availability period</h4>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Start date:</label>
                    <input type="date" name="date_in" class="form-control" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>End date:</label>
                    <input type="date" name="date_out" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="alert alert-info">
            <i class="fa fa-info-circle"></i> Enter the period when your property will be available for hosting.
        </div>
    </div>
    <!-- FINE STEP 3 -->

    <!-- STEP 4 -->
    <div class="tab-pane" id="step4">
        <h4 class="info-text">Terms and Conditions</h4>
        <div class="alert alert-warning">
            <p>Please review the terms and conditions before finalizing.</p>
        </div>
        <div class="form-group">
            <input type="checkbox" name="terms_accepted" id="terms_checkbox" required>
            <strong>I accept the terms and conditions.</strong>
        </div>
    </div>
    <!-- FINE STEP 4 -->
</div>

<!-- Footer con i pulsanti del Wizard -->
<div class="wizard-footer">
    <div class="pull-right">
        <input type='button' class='btn btn-primary btn-next' name='next' value='Next'/>
        <input type='button' class='btn btn-primary btn-finish' name='finish' value='Finish'/>
    </div>
    <div class="pull-left">
        <input type='button' class='btn btn-default btn-previous' name='previous' value='Previous'/>
    </div>
    <div class="clearfix"></div>
</div>
                            </form>
                        </div>
                        <!-- End submit form -->
                    </div> 
                </div>
            </div>
        </div>

          <!-- Footer area-->
        <div class="footer-area">

            <div class=" footer">
                <div class="container">
                    <div class="row">

                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer">
                                <h4>About us </h4>
                                <div class="footer-title-line"></div>

                                <img src="/PetHouse/App/templates/assets/img/icona_2.png" alt="" class="wow pulse" data-wow-delay="1s">
                                <p>Lorem ipsum dolor cum necessitatibus su quisquam molestias. Vel unde, blanditiis.</p>
                                <ul class="footer-adress">
                                    <li><i class="pe-7s-map-marker strong"> </i> 9089 your adress her</li>
                                    <li><i class="pe-7s-mail strong"> </i> email@yourcompany.com</li>
                                    <li><i class="pe-7s-call strong"> </i> +1 908 967 5906</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer">
                                <h4>Quick links </h4>
                                <div class="footer-title-line"></div>
                                <ul class="footer-menu">
                                    <li><a href="properties.html">Properties</a>  </li> 
                                    <li><a href="#">Services</a>  </li> 
                                    <li><a href="submit-property.html">Submit property </a></li> 
                                    <li><a href="contact.html">Contact us</a></li> 
                                    <li><a href="faq.html">fqa</a>  </li> 
                                    <li><a href="faq.html">Terms </a>  </li> 
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer">
                                <h4>Last News</h4>
                                <div class="footer-title-line"></div>
                                <ul class="footer-blog">
                                    <li>
                                        <div class="col-md-3 col-sm-4 col-xs-4 blg-thumb p0">
                                            <a href="single.html">
                                                <img src="/PetHouse/App/templates/assets/img/demo/small-proerty-2.jpg">
                                            </a>
                                            <span class="blg-date">12-12-2016</span>

                                        </div>
                                        <div class="col-md-8  col-sm-8 col-xs-8  blg-entry">
                                            <h6> <a href="single.html">Add news functions </a></h6> 
                                            <p style="line-height: 17px; padding: 8px 2px;">Lorem ipsum dolor sit amet, nulla ...</p>
                                        </div>
                                    </li> 

                                    <li>
                                        <div class="col-md-3 col-sm-4 col-xs-4 blg-thumb p0">
                                            <a href="single.html">
                                                <img src="/PetHouse/App/templates/assets/img/demo/small-proerty-2.jpg">
                                            </a>
                                            <span class="blg-date">12-12-2016</span>

                                        </div>
                                        <div class="col-md-8  col-sm-8 col-xs-8  blg-entry">
                                            <h6> <a href="single.html">Add news functions </a></h6> 
                                            <p style="line-height: 17px; padding: 8px 2px;">Lorem ipsum dolor sit amet, nulla ...</p>
                                        </div>
                                    </li> 

                                    <li>
                                        <div class="col-md-3 col-sm-4 col-xs-4 blg-thumb p0">
                                            <a href="single.html">
                                                <img src="/PetHouse/App/templates/assets/img/demo/small-proerty-2.jpg">
                                            </a>
                                            <span class="blg-date">12-12-2016</span>

                                        </div>
                                        <div class="col-md-8  col-sm-8 col-xs-8  blg-entry">
                                            <h6> <a href="single.html">Add news functions </a></h6> 
                                            <p style="line-height: 17px; padding: 8px 2px;">Lorem ipsum dolor sit amet, nulla ...</p>
                                        </div>
                                    </li> 


                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer news-letter">
                                <h4>Stay in touch</h4>
                                <div class="footer-title-line"></div>
                                <p>Lorem ipsum dolor sit amet, nulla  suscipit similique quisquam molestias. Vel unde, blanditiis.</p>

                                <form>
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="E-mail ... ">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary subscribe" type="button"><i class="pe-7s-paper-plane pe-2x"></i></button>
                                        </span>
                                    </div>
                                    <!-- /input-group -->
                                </form> 

                                <div class="social pull-right"> 
                                    <ul>
                                        <li><a class="wow fadeInUp animated" href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="wow fadeInUp animated" href="https://www.facebook.com/" data-wow-delay="0.2s"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="wow fadeInUp animated" href="https://plus.google.com/" data-wow-delay="0.3s"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a class="wow fadeInUp animated" href="https://instagram.com/" data-wow-delay="0.4s"><i class="fa fa-instagram"></i></a></li>
                                        <li><a class="wow fadeInUp animated" href="https://instagram.com/" data-wow-delay="0.6s"><i class="fa fa-dribbble"></i></a></li>
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
                        <div class="pull-left">
                            <span> (C) <a href="http://www.KimaroTec.com">KimaroTheme</a> , All rights reserved 2016  </span> 
                        </div> 
                        <div class="bottom-menu pull-right"> 
                            <ul> 
                                <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.2s">Home</a></li>
                                <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.3s">Property</a></li>
                                <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.4s">Faq</a></li>
                                <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.6s">Contact</a></li>
                            </ul> 
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php echo '<script'; ?>
 src="/PetHouse/App/templates/assets/js/vendor/modernizr-2.6.2.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="/PetHouse/App/templates/assets/js//jquery-1.10.2.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="/PetHouse/App/templates/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="/PetHouse/App/templates/assets/js/bootstrap-select.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="/PetHouse/App/templates/assets/js/bootstrap-hover-dropdown.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="/PetHouse/App/templates/assets/js/easypiechart.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="/PetHouse/App/templates/assets/js/jquery.easypiechart.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="/PetHouse/App/templates/assets/js/owl.carousel.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="/PetHouse/App/templates/assets/js/wow.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="/PetHouse/App/templates/assets/js/icheck.min.js"><?php echo '</script'; ?>
>

        <?php echo '<script'; ?>
 src="/PetHouse/App/templates/assets/js/price-range.js"><?php echo '</script'; ?>
> 
        <?php echo '<script'; ?>
 src="/PetHouse/App/templates/assets/js/jquery.bootstrap.wizard.js" type="text/javascript"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="/PetHouse/App/templates/assets/js/jquery.validate.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="/PetHouse/App/templates/assets/js/wizard.js"><?php echo '</script'; ?>
>

        <?php echo '<script'; ?>
 src="/PetHouse/App/templates/assets/js/main.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('#acceptedPetsFields').addEventListener('click', function(e) {
        if (e.target.classList.contains('add-pet')) {
            e.preventDefault();
            const petGroup = e.target.closest('.pet-group');
            const newGroup = petGroup.cloneNode(true);
            newGroup.querySelector('select').selectedIndex = 0;
            newGroup.querySelector('input').value = 1;
            // Cambia il bottone "+" in "-" per rimuovere
            const btn = newGroup.querySelector('.add-pet');
            btn.classList.remove('btn-success', 'add-pet');
            btn.classList.add('btn-danger', 'remove-pet');
            btn.textContent = '-';
            document.querySelector('#acceptedPetsFields').appendChild(newGroup);
        } else if (e.target.classList.contains('remove-pet')) {
            e.preventDefault();
            const petGroup = e.target.closest('.pet-group');
            if(document.querySelectorAll('#acceptedPetsFields .pet-group').length > 1) {
                petGroup.remove();
            }
        }
    });
});
<?php echo '</script'; ?>
>
<!-- Aggiungi questo script prima della chiusura del body -->
<?php echo '<script'; ?>
>
document.addEventListener('DOMContentLoaded', function() {
    // Gestisce la selezione della proprietà e aggiorna l'immagine
    const propertySelect = document.getElementById('propertySelect');
    const imagePreview = document.getElementById('propertyImagePreview');
    
    propertySelect.addEventListener('change', function() {
        const propertyId = this.value;
        
        if (!propertyId) {
            // Se nessuna proprietà è selezionata, mostra l'immagine di default
            imagePreview.src = '/PetHouse/App/templates/assets/img/default-property.jpg';
            return;
        }
        
        // Esegui una richiesta AJAX per ottenere la prima foto della proprietà
        fetch('/PetHouse/image/getPropertyFirstImage/' + propertyId)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log('Image data:', data); // Per debug
                if (data.success && data.imageUrl) {
                    // Precarica l'immagine
                    const tempImg = new Image();
                    tempImg.onload = function() {
                        imagePreview.src = data.imageUrl;
                    };
                    tempImg.onerror = function() {
                        console.error('Failed to load image:', data.imageUrl);
                        imagePreview.src = '/PetHouse/App/templates/assets/img/default-property.jpg';
                    };
                    tempImg.src = data.imageUrl;
                } else {
                    console.warn('No image found:', data.message);
                    imagePreview.src = '/PetHouse/App/templates/assets/img/default-property.jpg';
                }
            })
            .catch(error => {
                console.error('Error fetching property image:', error);
                imagePreview.src = '/PetHouse/App/templates/assets/img/default-property.jpg';
            });
    });
    
    // Se c'è già un valore selezionato all'avvio, aggiorna l'immagine
    if (propertySelect.value) {
        propertySelect.dispatchEvent(new Event('change'));
    }
});
<?php echo '</script'; ?>
>
<!-- Aggiungi questo script prima della chiusura del body -->
<?php echo '<script'; ?>
>
document.addEventListener('DOMContentLoaded', function() {
    // Evento per aggiornare il riepilogo quando si passa allo step 3
    document.querySelector('a[href="#step3"]').addEventListener('click', updateSummary);
    
    function updateSummary() {
        // Proprietà selezionata
        const propertySelect = document.getElementById('propertySelect');
        const propertyText = propertySelect.options[propertySelect.selectedIndex]?.text || '-';
        document.getElementById('summary-property').textContent = propertyText;
        
        // Informazioni aggiuntive
        const moreInfo = document.querySelector('textarea[name="moreInfo"]').value || '-';
        document.getElementById('summary-moreinfo').textContent = moreInfo;
        
        // Immagine
        document.getElementById('summary-image').src = document.getElementById('propertyImagePreview').src;
        
        // Date e prezzo
        const dateIn = document.querySelector('input[name="date_in"]').value;
        document.getElementById('summary-datein').textContent = dateIn ? new Date(dateIn).toLocaleDateString() : '-';
        
        const dateOut = document.querySelector('input[name="date_out"]').value;
        document.getElementById('summary-dateout').textContent = dateOut ? new Date(dateOut).toLocaleDateString() : '-';
        
        const price = document.querySelector('input[name="price"]').value;
        document.getElementById('summary-price').textContent = price ? '€ ' + price + ' /notte' : '-';
        
        // Animali accettati
        const petsList = document.getElementById('summary-pets');
        petsList.innerHTML = '';
        
        const petSelects = document.querySelectorAll('select[name="accepted_pets[]"]');
        const petCounts = document.querySelectorAll('input[name="accepted_pet_counts[]"]');
        
        let hasPets = false;
        
        for (let i = 0; i < petSelects.length; i++) {
            if (petSelects[i].value) {
                hasPets = true;
                const petType = petSelects[i].options[petSelects[i].selectedIndex].text;
                const petCount = petCounts[i].value;
                
                const li = document.createElement('li');
                li.className = 'list-group-item';
                li.textContent = petType + ' (' + petCount + ')';
                petsList.appendChild(li);
            }
        }
        
        if (!hasPets) {
            const li = document.createElement('li');
            li.className = 'list-group-item';
            li.textContent = 'Nessun animale selezionato';
            petsList.appendChild(li);
        }
    }
});
<?php echo '</script'; ?>
>
<!-- Sostituisci il vecchio script del riepilogo con questo -->
<?php echo '<script'; ?>
>
document.addEventListener('DOMContentLoaded', function() {
    // Imposta date predefinite quando si carica la pagina
    const today = new Date();
    const nextMonth = new Date();
    nextMonth.setMonth(today.getMonth() + 1);
    
    // Formatta le date in YYYY-MM-DD per il campo input type="date"
    const formatDate = (date) => {
        const year = date.getFullYear();
        const month = (date.getMonth() + 1).toString().padStart(2, '0');
        const day = date.getDate().toString().padStart(2, '0');
        return year + '-' + month + '-' + day;
    };
    
    // Imposta i valori predefiniti se l'utente non ha già inserito date
    document.querySelector('a[href="#step3"]').addEventListener('click', function() {
        const dateInField = document.querySelector('input[name="date_in"]');
        const dateOutField = document.querySelector('input[name="date_out"]');
        
        if (!dateInField.value) {
            dateInField.value = formatDate(today);
        }
        
        if (!dateOutField.value) {
            dateOutField.value = formatDate(nextMonth);
        }
    });
});
<?php echo '</script'; ?>
>
<style>
.picture::before,
.picture::after {
  content: none !important;
}
</style>
<!-- Aggiungi questo prima della chiusura del body -->
<?php echo '<script'; ?>
>
document.addEventListener('DOMContentLoaded', function() {
    // Aggiunge validazione al bottone Finish
    const finishBtn = document.querySelector('.btn-finish');
    const form = document.querySelector('form');
    
    finishBtn.addEventListener('click', function(e) {
        e.preventDefault(); // Previeni l'invio automatico
        
        // Verifica che i termini siano stati accettati
        const termsCheckbox = document.getElementById('terms_checkbox');
        if (!termsCheckbox.checked) {
            alert('You must accept the terms and conditions to continue.');
            return false;
        }
        
        // Assicurati che il prezzo sia valido
        const priceField = document.querySelector('input[name="price"]');
        if (!priceField.value || isNaN(parseFloat(priceField.value))) {
            alert('Please enter a valid price.');
            return false;
        }
        
        // Se tutto è ok, invia il form
        form.submit();
    });
});
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
document.addEventListener('DOMContentLoaded', function() {
    const steps = document.querySelectorAll('.tab-pane');
    const nextBtn = document.querySelector('.btn-next');
    const prevBtn = document.querySelector('.btn-previous');
    const finishBtn = document.querySelector('.btn-finish');

    function updateButtons() {
        const activeIndex = [...steps].findIndex(step => step.classList.contains('active'));

        if (activeIndex === 0) {
            prevBtn.style.display = 'none';
            nextBtn.style.display = 'inline-block';
            finishBtn.style.display = 'none';
        } else if (activeIndex === steps.length - 1) {
            prevBtn.style.display = 'inline-block';
            nextBtn.style.display = 'none';
            finishBtn.style.display = 'inline-block';
        } else {
            prevBtn.style.display = 'inline-block';
            nextBtn.style.display = 'inline-block';
            finishBtn.style.display = 'none';
        }
    }

    updateButtons();

    nextBtn.addEventListener('click', function() {
        const active = document.querySelector('.tab-pane.active');
        const nextStep = active.nextElementSibling;
        if (nextStep) {
            const nextTabId = nextStep.id;
            // Usa concatenazione classica anziché i backtick:
            document.querySelector('a[href="#' + nextTabId + '"]').click();
        }
    });

    prevBtn.addEventListener('click', function() {
        const active = document.querySelector('.tab-pane.active');
        const prevStep = active.previousElementSibling;
        if (prevStep) {
            const prevTabId = prevStep.id;
            document.querySelector('a[href="#' + prevTabId + '"]').click();
        }
    });

    // Ricalcola i pulsanti ogni volta che si cambia tab
    document.querySelectorAll('a[data-toggle="tab"]').forEach(link => {
        link.addEventListener('shown.bs.tab', updateButtons);
    });
});
<?php echo '</script'; ?>
>
    </body>
</html><?php }
}
