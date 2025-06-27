<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PetHouse | Report Post</title>
        <meta name="description" content="Report a post on PetHouse">
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
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/bootstrap-select.min.css"> 
        <link rel="stylesheet" href="/PetHouse/App/templates/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/style.css">
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/responsive.css">
    </head>
    <body>
        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        
        <!-- Navigation bar -->
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/PetHouse/"><img src="/PetHouse/App/templates/assets/img/icona_footer-3.png" alt="PetHouse"></a>
                </div>

                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
                        {if isset($smarty.session.user)}
                            <button class="navbar-btn nav-button" onclick="window.location.href='/PetHouse/user/logout'">Logout</button>
                            <button class="navbar-btn nav-button" onclick="window.location.href='/PetHouse/user/profile'">Profile</button>
                        {else}
                            <button class="navbar-btn nav-button" onclick="window.location.href='/PetHouse/user/login'">Login</button>
                            <button class="navbar-btn nav-button" onclick="window.location.href='/PetHouse/user/register'">Register</button>
                        {/if}
                    </div>
                    <!-- Removed Home and Find Host buttons from navigation bar -->
                    <!--<ul class="main-nav nav navbar-nav navbar-right">
                        <li><a href="/PetHouse/">Home</a></li>
                        <li><a href="/PetHouse/Findhosting/searchHost">Find Host</a></li>
                    </ul>-->
                </div>
            </div>
        </nav>
        <!-- End navigation bar -->

        <!-- Page header -->
        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">Report Post</h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->

        <!-- Report form area -->
        <div class="content-area submit-property" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">
                <div class="clearfix"> 
                    <div class="wizard-container"> 
                        <div class="wizard-card ct-wizard-orange" id="reportForm">
                            <div class="wizard-header">
                                <h3>
                                    <b>Report</b> this post<br>
                                    <small>Help us understand why this post violates our guidelines</small>
                                </h3>
                            </div>

                            <!-- Post Information -->
                            <div class="row" style="margin-bottom: 20px;">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">Post Information</h4>
                                        </div>
                                        <div class="panel-body">
                                            <h5><strong>Title:</strong> {$post->getTitle()}</h5>
                                            <p><strong>Posted by:</strong> {$post->getSeller()->getUsername()}</p>
                                            {if $post->getHouse()}
                                                <p><strong>Location:</strong> {$post->getHouse()->getCity()}, {$post->getHouse()->getProvince()}</p>
                                            {/if}
                                            <p><strong>Price:</strong> €{$post->getPrice()}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="/PetHouse/Report/reportPost/{$post->getId()}" method="post" onsubmit="return handleReportSubmit(event);">
                                <!-- Add a hidden field to capture the redirect URL -->
                                <input type="hidden" name="redirect_url" value="{$smarty.session.report_redirect_url|default:'/PetHouse/Findhosting/selectpost/{$post->getId()}'}">
                                
                                <div class="row p-b-15">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="description">Reason for reporting</label>
                                            <select name="description" id="description" class="form-control" required>
                                                <option value="">-- Select a reason --</option>
                                                <option value="Inappropriate content">Inappropriate content</option>
                                                <option value="Spam or misleading">Spam or misleading</option>
                                                <option value="Offensive language">Offensive language</option>
                                                <option value="Harmful to animals">Harmful to animals</option>
                                                <option value="Fake listing">Fake listing</option>
                                                <option value="Other reason">Other reason</option>
                                            </select>
                                            <small class="text-muted">Your report will be reviewed by our moderation team.</small>
                                        </div>
                                        
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="terms_accepted" required /> 
                                                <strong>I confirm that this report is truthful and made in good faith.</strong>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='submit' class='btn btn-finish btn-danger' name='finish' value='Submit Report' />
                                    </div>
                                    <div class="pull-left">
                                        <a href="{$smarty.session.report_redirect_url|default:'/PetHouse/Findhosting/selectpost/{$post->getId()}'}" class='btn btn-default' id="cancelReturnBtn">
                                            <i class="fa fa-arrow-left"></i> Cancel & Return to Post
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
        </div>

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
        <script src="/PetHouse/App/templates/assets/js/main.js"></script>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Cancel & Return to Post button: go to the redirect_url
            var cancelBtn = document.getElementById('cancelReturnBtn');
            if (cancelBtn) {
                cancelBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.location.href = this.getAttribute('href');
                });
            }
        });

        function handleReportSubmit(e) {
            var reasonSelect = document.getElementById('description');
            var termsCheckbox = document.querySelector('input[name="terms_accepted"]');
            if (reasonSelect.value === '') {
                alert('Please select a reason for reporting');
                return false;
            }
            if (!termsCheckbox.checked) {
                alert('You must confirm that your report is truthful');
                return false;
            }
            // After successful submit, redirect to the post page
            var redirectUrl = document.querySelector('input[name="redirect_url"]').value;
            setTimeout(function() {
                window.location.href = redirectUrl;
            }, 100); // Give the form a moment to submit
            return true;
        }
        </script>
    </body>
</html>