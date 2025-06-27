<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PetHouse | Make an Offer</title>
        <meta name="description" content="PetHouse - Make an offer for pet accommodation">
        <meta name="author" content="PetHouse">
        <meta name="keyword" content="html5, css, bootstrap, pets, accommodation">
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
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/wizard.css"> 
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/style.css">
        <link rel="stylesheet" href="/PetHouse/App/templates/assets/css/responsive.css">
    </head>
    <body>

        <!-- Body content -->

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
                        <button class="navbar-btn nav-button wow bounceInRight" style="background-color: #FFA500; color: #fff; border: none;" onclick="window.location.href='/PetHouse/'" data-wow-delay="0.4s">Home</button>
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
                            <a href="/PetHouse/findhosting/selectPost/{$post->getId()}" class="btn btn-default" style="background: #f8f9fa; border: 1px solid #ddd; color: #333; padding: 8px 16px; border-radius: 20px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                                <i class="fa fa-arrow-left" style="margin-right: 5px;"></i>Return to Listing
                            </a>
                        </div>
                        <h1 class="page-title">MAKE AN OFFER REQUEST</h1>               
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
        <div class="content-area submit-property" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">
                <div class="clearfix" > 
                    <div class="wizard-container"> 

                        <!-- Big Yellow Box for Create Your Offer -->
                        <div class="offer-header" style="background: #f9c74f; padding: 30px; margin-bottom: 30px; border-radius: 10px; text-align: center; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                            <h2 style="margin: 0; color: #333; font-size: 36px; font-weight: bold; text-transform: uppercase;">
                                CREATE YOUR OFFER
                            </h2>
                            <p style="margin: 10px 0 0 0; color: #666; font-size: 18px;">
                                Make an offer for: <strong>{$post->getTitle()}</strong>
                            </p>
                        </div>

                        <div class="wizard-card ct-wizard-orange" id="wizardProperty">
                            <form id="offerForm" action="/PetHouse/findhosting/createOffer/{$post->getId()}" method="post">                        
                                
                                <div class="tab-content">
                                    <!-- Step 1: Dates and required pets -->
                                    <div class="tab-pane active" id="step1">
                                        
                                        <!-- Post Constraints Info -->
                                        <div class="alert alert-info" style="margin-bottom: 20px;">
                                            <h4><i class="fa fa-info-circle"></i> Post Availability</h4>
                                            <p><strong>Available from:</strong> {$post->getDateIn()|date_format:"%d/%m/%Y"} <strong>to:</strong> {$post->getDateOut()|date_format:"%d/%m/%Y"}</p>
                                            <p><strong>Accepted pets:</strong> 
                                                {foreach from=$post->getAcceptedPets() key=pet item=count name=pets}
                                                    {$pet} (max {$count}){if !$smarty.foreach.pets.last}, {/if}
                                                {/foreach}
                                            </p>
                                            <p><strong>Price:</strong> €{$post->getPrice()}/day</p>
                                        </div>

                                        <div class="row p-b-15">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Start date (Check-in) <span class="required">*</span>:</label>
                                                    <input type="date" name="datein" class="form-control" required id="datein" 
                                                           min="{$post->getDateIn()|date_format:"%Y-%m-%d"}" 
                                                           max="{$post->getDateOut()|date_format:"%Y-%m-%d"}">
                                                    <small class="help-block">Must be between {$post->getDateIn()|date_format:"%d/%m/%Y"} and {$post->getDateOut()|date_format:"%d/%m/%Y"}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>End date (Check-out) <span class="required">*</span>:</label>
                                                    <input type="date" name="dateout" class="form-control" required id="dateout"
                                                           min="{$post->getDateIn()|date_format:"%Y-%m-%d"}" 
                                                           max="{$post->getDateOut()|date_format:"%Y-%m-%d"}">
                                                    <small class="help-block">Must be between {$post->getDateIn()|date_format:"%d/%m/%Y"} and {$post->getDateOut()|date_format:"%d/%m/%Y"}</small>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Required pets <span class="required">*</span>:</label>
                                            <div id="requiredPetsFields">
                                                <div class="input-group pet-group" style="margin-bottom:10px;">
                                                    <select name="required_pets[]" class="form-control required-pet-select" required>
                                                        <option value="">Select pet type</option>
                                                        {foreach from=$post->getAcceptedPets() key=pet item=maxCount}
                                                            <option value="{$pet}" data-max="{$maxCount}">{$pet} (available: {$maxCount})</option>
                                                        {/foreach}
                                                    </select>
                                                    <input type="number" name="required_pets_count[]" class="form-control required-pet-count" min="1" value="1" style="width:100px;" placeholder="Quantity" required>
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-success add-pet" tabindex="-1">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" id="acceptTerms" required /> 
                                                <strong>I accept the terms and conditions <span class="required">*</span></strong>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- End step 1 -->
                                </div>

                                <div class="wizard-footer" style="text-align: center; padding: 30px 0; background: #f8f9fa; border-top: 1px solid #e0e0e0; margin-top: 30px;">
                                    <button type='submit' class='btn btn-finish btn-lg' name='finish' disabled 
                                           style="min-width: 250px; padding: 15px 40px; font-size: 18px; font-weight: bold; border-radius: 25px; box-shadow: 0 4px 8px rgba(0,0,0,0.2); display: block !important; visibility: visible !important;">
                                        ✓ Submit Offer
                                    </button>
                                    <div style="margin-top: 15px;">
                                        <small class="status-text text-muted" style="font-size: 14px;">Please complete all required fields to enable submission</small>
                                    </div>
                                    <div style="margin-top: 10px;">
                                        <small class="text-info" style="font-size: 12px;"><i class="fa fa-info-circle"></i> Your offer will be sent to the property owner for review</small>
                                    </div>
                                </div>	
                            </form>
                        </div>
                        <!-- End submit form -->
                    </div> 
                </div>
            </div>
        </div>

        <div class="footer-area">
    <div class="footer">
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
                            <li><a href="/PetHouse/user/createHouse">Register your house </a></li> 
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
        <script src="/PetHouse/App/templates/assets/js/bootstrap-hover-dropdown.js"></script>
        <script src="/PetHouse/App/templates/assets/js/easypiechart.min.js"></script>
        <script src="/PetHouse/App/templates/assets/js/jquery.easypiechart.min.js"></script>
        <script src="/PetHouse/App/templates/assets/js/owl.carousel.min.js"></script>
        <script src="/PetHouse/App/templates/assets/js/wow.js"></script>
        <script src="/PetHouse/App/templates/assets/js/icheck.min.js"></script>
        <script src="/PetHouse/App/templates/assets/js/price-range.js"></script>
        <script src="/PetHouse/App/templates/assets/js/main.js"></script>

        <script>
        $(document).ready(function() {
            var postStartDate = '{$post->getDateIn()|date_format:"%Y-%m-%d"}';
            var postEndDate = '{$post->getDateOut()|date_format:"%Y-%m-%d"}';
            var acceptedPets = {
                {foreach from=$post->getAcceptedPets() key=pet item=count name=pets}
                    '{$pet}': {$count}{if !$smarty.foreach.pets.last},{/if}
                {/foreach}
            };

            // Initialize button styling - make sure it's always visible
            $('.btn-finish').css({
                'background-color': '#6c757d',
                'border-color': '#6c757d',
                'opacity': '0.6',
                'cursor': 'not-allowed',
                'color': 'white',
                'display': 'block',
                'visibility': 'visible'
            });

            // Add/Remove pet fields functionality
            $(document).on('click', '.add-pet', function(e) {
                e.preventDefault();
                var petGroup = $(this).closest('.pet-group');
                var newGroup = petGroup.clone();
                
                // Reset values
                newGroup.find('select').val('');
                newGroup.find('input[type="number"]').val('1');
                
                // Change add button to remove button
                newGroup.find('.add-pet')
                    .removeClass('add-pet btn-success')
                    .addClass('remove-pet btn-danger')
                    .html('<i class="fa fa-minus"></i>');
                
                petGroup.after(newGroup);
                validateFormCompletion(); // <-- fix: always call validateFormCompletion
            });
            
            // Remove pet field
            $(document).on('click', '.remove-pet', function(e) {
                e.preventDefault();
                if ($('.pet-group').length > 1) {
                    $(this).closest('.pet-group').remove();
                    validateFormCompletion(); // <-- fix: always call validateFormCompletion
                }
            });
            
            // Validate pet counts
            function validatePetCounts() {
                var valid = true;
                var petCounts = {};
                
                $('.pet-group').each(function() {
                    var petType = $(this).find('select').val();
                    var count = parseInt($(this).find('input[type="number"]').val()) || 0;
                    
                    if (petType && count > 0) {
                        petCounts[petType] = (petCounts[petType] || 0) + count;
                    }
                });
                
                // Check if any pet exceeds available count
                for (var pet in petCounts) {
                    if (petCounts[pet] > acceptedPets[pet]) {
                        valid = false;
                        break;
                    }
                }
                
                return valid;
            }
            
            // Pet count validation
            $(document).on('change', '.required-pet-select, .required-pet-count', function() {
                validateFormCompletion(); // <-- fix: always call validateFormCompletion
            });
            
            // Date validation
            $('#datein, #dateout').on('change', function() {
                var startDate = $('#datein').val();
                var endDate = $('#dateout').val();
                
                if (startDate && endDate) {
                    if (new Date(startDate) >= new Date(endDate)) {
                        alert('End date must be after start date');
                        $('#dateout').val('');
                        return;
                    }
                    
                    // Validate dates are within post range
                    if (new Date(startDate) < new Date(postStartDate) || new Date(endDate) > new Date(postEndDate)) {
                        alert('Selected dates must be within the available period: ' + postStartDate + ' to ' + postEndDate);
                        $(this).val('');
                        return;
                    }
                    
                    // Update dateout min value based on datein
                    if (startDate) {
                        $('#dateout').attr('min', startDate);
                    }
                }
                
                validateFormCompletion();
            });
            
            // Form completion validation
            function validateFormCompletion() {
                var startDate = $('#datein').val();
                var endDate = $('#dateout').val();
                var termsAccepted = $('#acceptTerms').is(':checked');
                var validPets = validatePetCounts();
                var hasValidPetSelection = false;
                
                // Check if at least one pet is selected (any pet, not each type)
                $('.pet-group').each(function() {
                    var petType = $(this).find('select').val();
                    var count = parseInt($(this).find('input[type="number"]').val()) || 0;
                    if (petType && count > 0) {
                        hasValidPetSelection = true;
                        return false; // Break out of loop once we find one valid selection
                    }
                });
                
                var isFormValid = startDate && endDate && termsAccepted && validPets && hasValidPetSelection;
                
                if (isFormValid) {
                    $('.btn-finish').prop('disabled', false)
                                   .removeClass('btn-secondary')
                                   .addClass('btn-success')
                                   .css({
                                       'background-color': '#28a745',
                                       'border-color': '#28a745',
                                       'opacity': '1',
                                       'cursor': 'pointer',
                                       'color': 'white'
                                   });
                    $('.status-text').text('Ready to submit!').removeClass('text-muted').addClass('text-success');
                } else {
                    $('.btn-finish').prop('disabled', true)
                                   .removeClass('btn-success')
                                   .addClass('btn-secondary')
                                   .css({
                                       'background-color': '#6c757d',
                                       'border-color': '#6c757d',
                                       'opacity': '0.6',
                                       'cursor': 'not-allowed',
                                       'color': 'white'
                                   });
                    $('.status-text').text('Please complete all required fields to enable submission').removeClass('text-success').addClass('text-muted');
                }
                
                return isFormValid;
            }
            
            // Terms checkbox validation
            $('#acceptTerms').on('change', function() {
                validateFormCompletion();
            });
            
            // Initialize validation
            validateFormCompletion();
        });
        </script>

    </body>
</html>