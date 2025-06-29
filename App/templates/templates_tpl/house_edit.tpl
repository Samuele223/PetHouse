<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PetHouse | Submit property Page</title>
        <meta name="description" content="GARO is a real-estate template">
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
        
        <style>
.autocomplete-items {
    position: absolute;
    border: 1px solid #d4d4d4;
    border-bottom: none;
    border-top: none;
    z-index: 99;
    width: 100%;
    max-height: 200px;
    overflow-y: auto;
    background-color: #fff;
}

.autocomplete-items div {
    padding: 10px;
    cursor: pointer;
    background-color: #fff;
    border-bottom: 1px solid #d4d4d4;
}

.autocomplete-items div:hover {
    background-color: #e9e9e9;
}

.autocomplete-active {
    background-color: DodgerBlue !important;
    color: #ffffff;
}

.dropdown-menu {
    max-height: 300px;
    overflow-y: auto;
    width: 100%;
}

.dropdown-menu li a {
    padding: 8px 15px;
    font-size: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.dropdown-menu li a:hover {
    background-color: #f5f5f5;
}

.input-group .form-control[readonly] {
    background-color: #fff;
    cursor: default;
}

/* Customize scrollbar for better visibility */
.dropdown-menu::-webkit-scrollbar {
    width: 8px;
}

.dropdown-menu::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

.dropdown-menu::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 4px;
}

.dropdown-menu::-webkit-scrollbar-thumb:hover {
    background: #555;
}
</style>
    </head>
    <body>

        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- Body content -->

        <div class="header-connect">
            <div class="container">
                <div class="row">
                    <!-- Removed telephone and email from header -->
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
                        <button class="navbar-btn nav-button wow fadeInRight" onclick="window.location.href='/PetHouse/user/logout'" data-wow-delay="0.48s">Logout</button>
                        <button class="navbar-btn nav-button wow fadeInRight" onclick="window.location.href='/PetHouse/user/profile'" data-wow-delay="0.48s">Profile</button>
                    </div>
                    <!-- Removed main-nav links: Home, Properties, Property, Template, Contact -->
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->

        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <div style="margin-bottom: 15px;">
                            <a href="/PetHouse/user/myHouses" class="btn btn-default" style="background: #f8f9fa; border: 1px solid #ddd; color: #333; padding: 8px 16px; border-radius: 20px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                                <i class="fa fa-arrow-left" style="margin-right: 5px;"></i>Back to My Houses
                            </a>
                        </div>
                        <h1 class="page-title">Edit your House Info</h1>               
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
                        

                            <form id="houseform" action="/PetHouse/user/updateHouse/{$house->getId()}" method="post" enctype="multipart/form-data">             
                                <div class="wizard-header">
                                    <h3>
                                        <b>EDIT</b> YOUR HOUSE <br>
                                        <small>Change the current details of your house</small>
                                    </h3>
                                </div>

                                <ul>
                                    <li><a href="#step1" data-toggle="tab">Step 1 </a></li>
                                    <li><a href="#step2" data-toggle="tab">Step 2 </a></li>
                                    <li><a href="#step3" data-toggle="tab">Step 3 </a></li>
                                    <li><a href="#step4" data-toggle="tab">Finished </a></li>
                                </ul>

                                <div class="tab-content">
                                    <!-- Step 1 -->
                                    <div class="tab-pane" id="step1">
                                        <div class="row p-b-15  ">
                                            
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Property name <small>(required)</small></label>
                                                    <input name="title" type="text" class="form-control" value="{$house->getTitle()}">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!--  End step 1 -->

                                    <div class="tab-pane" id="step2">
                                        <h4 class="info-text"> Describe your house  </h4>
                                        <div class="row">
                                            <div class="col-sm-12"> 
                                                <div class="col-sm-12"> 
                                                    <div class="form-group">
                                                        <label>Property Description :</label>
                                                        <textarea name="description" class="form-control">{$house->getDescription()}</textarea>
                                                    </div> 
                                                </div> 
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Country :</label>
                                                        <select name="country" id="country" class="form-control" required>
                                                            <option value="Italy">Italy</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Property Province :</label>
                                                        <div class="input-group">
                                                            <input type="text" name="province" id="province" class="form-control" placeholder="Select province" autocomplete="off" required value="{$house->getProvince()}">
                                                            <div class="input-group-btn">
                                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="caret"></span>
                                                                </button>
                                                                <ul id="provinceDropdown" class="dropdown-menu dropdown-menu-right" style="max-height: 300px; overflow-y: auto;">
                                                                    <!-- Will be populated dynamically -->
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Property City :</label>
                                                        <div class="input-group" id="cityDropdownContainer">
                                                            <input type="text" name="city" id="city" class="form-control" placeholder="Select city" autocomplete="off" required value="{$house->getCity()}" readonly>
                                                            <div class="input-group-btn">
                                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled>
                                                                    <span class="caret"></span>
                                                                </button>
                                                                <ul id="cityDropdown" class="dropdown-menu dropdown-menu-right" style="max-height: 300px; overflow-y: auto;">
                                                                    <!-- Will be populated dynamically after province selection -->
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Address :</label>
                                                        <input type="text" name="address" class="form-control" value="{$house->getAddress()}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End step 2 -->

                                    <div class="tab-pane" id="step3">                                        
                                        <h4 class="info-text">Give us somme images</h4>
                                        <div class="row">  
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="property-images">Choose Images :</label>
                                                    <div id="imageFields">
                                                        <div class="input-group" style="margin-bottom:10px; max-width:400px;">
                                                            <input class="form-control" type="file" name="img[]" accept="image/*">
                                                            <span class="input-group-btn">
                                                                <button type="button" class="btn btn-warning add-image-field" title="Aggiungi un altro campo immagine">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <p class="help-block">Aggiungi una o più immagini per la tua proprietà.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  End step 3 -->


                                    <div class="tab-pane" id="step4">                                        
                                        <h4 class="info-text"> Finished and submit </h4>
                                        <div class="row">  
                                            <div class="col-sm-12">
                                                <div class="">
                                                    <p>
                                                        <label><strong>Terms and Conditions</strong></label>
                                                        By submitting a property to PetHouse, you confirm that all information provided is accurate and that you are authorized to list this property. You agree not to post any misleading, false, or illegal content. PetHouse reserves the right to review, edit, or remove any listing that violates our guidelines. Your personal data will be handled in accordance with our privacy policy and will only be used for the purposes of property management and communication related to your listings. Misuse of the platform may result in account suspension or removal of your listings.
                                                    </p>

                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" id="terms_checkbox" required /> <strong>I accept the terms and conditions.</strong>
                                                        </label>
                                                    </div> 

                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <!--  End step 4 -->

                                </div>

                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-primary' name='next' value='Next' />
                                        <input type='submit' class='btn btn-finish btn-primary' name='finish' value='Save' />
                                    </div>

                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-default' name='previous' value='Previous' />
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
<script src="/PetHouse/App/templates/assets/js/italian-locations.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize with the existing province/city values
    const provinceInput = document.getElementById('province');
    const cityInput = document.getElementById('city');
    
    if (provinceInput && provinceInput.value) {
        // Mark the province as selected so validation passes
        provinceInput.dataset.selected = "true";
        
        // Enable the city field if province is already set
        if (cityInput) {
            cityInput.disabled = false;
            cityInput.placeholder = 'Enter city name';
            
            // If city is already populated, mark it as selected too
            if (cityInput.value) {
                cityInput.dataset.selected = "true";
            }
        }
    }
    
    // Ensure the form always submits province and city values
    document.getElementById('houseform').addEventListener('submit', function(e) {
        // Only if both province and city have values and are marked as selected
        if (provinceInput && provinceInput.value && cityInput && cityInput.value) {
            // No need to prevent default, just let the form submit with the existing values
        } else if (provinceInput && provinceInput.value) {
            // If only province has a value, ensure it's submitted even if city is empty
            // You could optionally block submission here with e.preventDefault() if city is required
        } else {
            // If no province is selected, prevent form submission
            e.preventDefault();
            alert('Please select a province and city');
        }
    });
});
</script>
<script>
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
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gestione aggiunta/rimozione campi immagine
    document.getElementById('imageFields').addEventListener('click', function(e) {
        if (e.target.closest('.add-image-field')) {
            e.preventDefault();
            const group = e.target.closest('.input-group');
            const newGroup = group.cloneNode(true);
            newGroup.querySelector('input[type="file"]').value = '';
            // Cambia il bottone "+" in "-" per rimuovere
            const btn = newGroup.querySelector('.add-image-field');
            btn.classList.remove('btn-warning');
            btn.classList.add('btn-danger');
            btn.innerHTML = '<i class="fa fa-minus"></i>';
            btn.classList.remove('add-image-field');
            btn.classList.add('remove-image-field');
            document.getElementById('imageFields').appendChild(newGroup);
        } else if (e.target.closest('.remove-image-field')) {
            e.preventDefault();
            const group = e.target.closest('.input-group');
            if(document.querySelectorAll('#imageFields .input-group').length > 1) {
                group.remove();
            }
        }
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const finishBtn = document.querySelector('.btn-finish');
    const termsCheckbox = document.getElementById('terms_checkbox');
    const form = document.getElementById('houseform');
    if (finishBtn && termsCheckbox && form) {
        finishBtn.addEventListener('click', function(e) {
            if (!termsCheckbox.checked) {
                e.preventDefault();
                alert('You must accept the terms and conditions to continue.');
            }
        });
        form.addEventListener('submit', function(e) {
            if (!termsCheckbox.checked) {
                e.preventDefault();
                alert('You must accept the terms and conditions to continue.');
            }
        });
    }
});
</script>
    </body>
</html>