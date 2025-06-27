<!DOCTYPE html>
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
                        <button type="submit" class="navbar-btn nav-button wow bounceInRight logout" onclick="window.location.href='/PetHouse/user/logout'" data-wow-delay="0.45s">Logout</button>
                        <button class="navbar-btn nav-button wow fadeInRight" onclick="window.location.href='/PetHouse/user/profile'" data-wow-delay="0.5s">Profile</button>
                    </div>
                    <!-- Removed Home button from main-nav -->
                    <ul class="main-nav nav navbar-nav navbar-right">
                        <!-- Home button removed -->
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->

        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <div style="margin-bottom: 15px;">
                            <a href="/PetHouse/user/myPost" class="btn btn-default" style="background: #f8f9fa; border: 1px solid #ddd; color: #333; padding: 8px 16px; border-radius: 20px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                                <i class="fa fa-arrow-left" style="margin-right: 5px;"></i>Back to My Posts
                            </a>
                        </div>
                        <h1 class="page-title">Edit your post</h1>               
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
                            <form action="/PetHouse/user/savedit" method="post" enctype="multipart/form-data">
    <!-- Hidden post ID -->
    <input type="hidden" name="post_id" value="{$post->getId()}">
                                <div class="wizard-header">
                                    <h3>
                                        <b>EDIT</b> YOUR POST <br>
                                        <small>You can modify each aspect of your post.</small>
                                    </h3>
                                </div>

                                <!-- Aggiungi questo blocco per mostrare eventuali errori -->
                                {if isset($error)}
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Error!</strong> {$error}
                                </div>
                                {/if}

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
                            {foreach from=$positions item=position}
                                <option value="{$position->getId()}" {if $post->getHouse() && $post->getHouse()->getId() == $position->getId()}selected{/if}>
                                    {$position->getTitle()}
                                </option>
                            {/foreach}
                        </select>
                    </div>

                    <!-- Campo moreInfo -->
                    <div class="form-group">
                        <label>Additional information <small>(required)</small></label>
                        <textarea name="moreInfo" class="form-control" rows="4" placeholder="Add more details about this listing..." required>{$post->getMoreInfo()}</textarea>
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
                       placeholder="Enter price" required value="{$post->getPrice()}">
                <span class="input-group-addon" style="background:#FDC600; color:#fff; border:1px solid #FDC600;">
                    /night
                </span>
            </div>
        </div>

        <div class="form-group">
            <label>Accepted pets:</label>
            <div id="acceptedPetsFields">
                {foreach from=$post->getAcceptedPets() key=petType item=petCount}
                <div class="input-group pet-group" style="margin-bottom:5px; max-width:400px;">
                    <select name="accepted_pets[]" class="form-control">
                        <option value="">Select pet type</option>
                        <option value="DOG" {if $petType == 'DOG'}selected{/if}>Dog</option>
                        <option value="CAT" {if $petType == 'CAT'}selected{/if}>Cat</option>
                        <option value="PARROT" {if $petType == 'PARROT'}selected{/if}>Parrot</option>
                        <option value="FISH" {if $petType == 'FISH'}selected{/if}>Fish</option>
                        <option value="HAMSTER" {if $petType == 'HAMSTER'}selected{/if}>Hamster</option>
                        <option value="MOUSE" {if $petType == 'MOUSE'}selected{/if}>Mouse</option>
                        <option value="SNAKE" {if $petType == 'SNAKE'}selected{/if}>Snake</option>
                        <option value="RABBIT" {if $petType == 'RABBIT'}selected{/if}>Rabbit</option>
                        <option value="TURTLE" {if $petType == 'TURTLE'}selected{/if}>Turtle</option>
                    </select>
                    <input type="number" name="accepted_pet_counts[]" class="form-control" min="1" value="{$petCount}" 
                           style="width:80px;" placeholder="Qty">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-danger remove-pet">-</button>
                    </span>
                </div>
                {/foreach}
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
                    <input type="date" name="date_in" id="date_in" class="form-control" required value="{$post->getDateIn()|date_format:'%Y-%m-%d'}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>End date:</label>
                    <input type="date" name="date_out" id="date_out" class="form-control" required value="{$post->getDateOut()|date_format:'%Y-%m-%d'}">
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
<!-- Aggiungi questo script prima della chiusura del body -->
<script>
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
</script>
<!-- Aggiungi questo script prima della chiusura del body -->
<script>
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
</script>
<!-- Sostituisci il vecchio script del riepilogo con questo -->
<script>
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
</script>
<style>
.picture::before,
.picture::after {
  content: none !important;
}
</style>
<!-- Date validation and form submission script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const dateInField = document.getElementById('date_in');
    const dateOutField = document.getElementById('date_out');
    
    // Function to validate dates
    function validateDates() {
        const dateInValue = dateInField.value;
        const dateOutValue = dateOutField.value;
        
        if (!dateInValue || !dateOutValue) {
            return true; // Let HTML5 required validation handle empty fields
        }
        
        const dateIn = new Date(dateInValue);
        const dateOut = new Date(dateOutValue);
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        
        // Clear previous custom validity
        dateInField.setCustomValidity('');
        dateOutField.setCustomValidity('');
        
        // Check if start date is in the past
        if (dateIn < today) {
            dateInField.setCustomValidity('Start date cannot be in the past.');
            return false;
        }
        
        // Check if end date is before start date
        if (dateOut <= dateIn) {
            dateOutField.setCustomValidity('End date must be after start date.');
            return false;
        }
        
        return true;
    }
    
    // Add event listeners for real-time validation
    dateInField.addEventListener('change', validateDates);
    dateOutField.addEventListener('change', validateDates);
    
    // Enhanced form submission validation
    const finishBtn = document.querySelector('.btn-finish');
    const form = document.querySelector('form');
    
    finishBtn.addEventListener('click', function(e) {
        e.preventDefault();
        
        // Validate dates first
        if (!validateDates()) {
            // Focus on the field with error
            if (dateInField.validity.customError) {
                dateInField.focus();
                alert(dateInField.validationMessage);
            } else if (dateOutField.validity.customError) {
                dateOutField.focus();
                alert(dateOutField.validationMessage);
            }
            return false;
        }
        
        // Check if all required fields are filled
        if (!dateInField.value || !dateOutField.value) {
            alert('Please select both start and end dates.');
            return false;
        }
        
        // Verify terms are accepted
        const termsCheckbox = document.getElementById('terms_checkbox');
        if (!termsCheckbox.checked) {
            alert('You must accept the terms and conditions to continue.');
            termsCheckbox.focus();
            return false;
        }
        
        // Validate price
        const priceField = document.querySelector('input[name="price"]');
        if (!priceField.value || isNaN(parseFloat(priceField.value)) || parseFloat(priceField.value) <= 0) {
            alert('Please enter a valid price greater than 0.');
            priceField.focus();
            return false;
        }
        
        // Validate property selection
        const propertySelect = document.getElementById('propertySelect');
        if (!propertySelect.value) {
            alert('Please select a property.');
            propertySelect.focus();
            return false;
        }
        
        // If all validations pass, submit the form
        form.submit();
    });
});
</script>
<script>
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
    </body>
</html>