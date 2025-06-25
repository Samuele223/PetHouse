document.addEventListener('DOMContentLoaded', function() {
    // Global variable to store provinces and cities
    let provincesData = {};
    
    // Add styles for autocomplete and dropdowns
    addAutocompleteStyles();
    
    // Load the city/province data
    fetch('/PetHouse/App/templates/assets/city/Province/comuni_by_province.json')
        .then(response => response.json())
        .then(data => {
            provincesData = data;
            
            // Extract province names (keys from the object)
            const provinces = Object.keys(provincesData).sort();
            
            // Populate province dropdowns
            setupProvinceDropdowns(provinces);
            
            // Setup city autocomplete fields
            setupCityAutocomplete();
            
            // Disable city fields initially
            disableCityFields();
        })
        .catch(error => {
            console.error('Error loading city data:', error);
            // If we can't load the data, use a fallback
            const fallbackProvinces = ["L'Aquila", "Roma", "Milano", "Napoli", "Torino", "Reggio nell'Emilia"];
            setupProvinceDropdowns(fallbackProvinces);
            setupCityAutocomplete();
            disableCityFields();
        });
    
    // Add CSS styles for autocomplete and dropdowns programmatically
    function addAutocompleteStyles() {
        // Check if styles are already added
        if (document.getElementById('autocomplete-styles')) return;
        
        // Create style element
        const style = document.createElement('style');
        style.id = 'autocomplete-styles';
        style.textContent = `
            .autocomplete-items {
                position: absolute;
                border: 1px solid #d4d4d4;
                border-bottom: none;
                border-top: none;
                z-index: 99;
                width: 100%;
                max-height: 200px; /* Show about 5-6 items at once */
                overflow-y: auto;
                background-color: #fff;
                box-shadow: 0 2px 5px rgba(0,0,0,0.2);
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
            
            .dropdown-menu {
                max-height: 240px; /* Show about 5-6 items at once */
                overflow-y: auto;
                overflow-x: hidden;
            }
            
            .dropdown-menu::-webkit-scrollbar {
                width: 5px;
            }
            
            .dropdown-menu::-webkit-scrollbar-thumb {
                background: #888;
                border-radius: 10px;
            }
            
            .dropdown-menu::-webkit-scrollbar-track {
                background: #f1f1f1;
                border-radius: 10px;
            }
            
            .autocomplete-items::-webkit-scrollbar {
                width: 5px;
            }
            
            .autocomplete-items::-webkit-scrollbar-thumb {
                background: #888;
                border-radius: 10px;
            }
            
            .autocomplete-items::-webkit-scrollbar-track {
                background: #f1f1f1;
                border-radius: 10px;
            }
        `;
        
        // Add style to document head
        document.head.appendChild(style);
    }
    
    // Disable city fields until province is selected
    function disableCityFields() {
        const cityInput = document.getElementById('city');
        const searchCityInput = document.getElementById('searchCity');
        
        if (cityInput) {
            cityInput.disabled = true;
            cityInput.placeholder = 'Select a province first';
        }
        
        if (searchCityInput) {
            searchCityInput.disabled = true;
            searchCityInput.placeholder = 'Select a province first';
        }
    }
    
    // Setup province dropdowns
    function setupProvinceDropdowns(provinces) {
        // Get dropdown elements
        const provinceDropdown = document.getElementById('provinceDropdown');
        const searchProvinceDropdown = document.getElementById('searchProvinceDropdown');
        
        // Get input fields
        const provinceInput = document.getElementById('province');
        const searchProvinceInput = document.getElementById('searchProvince');
        
        // Make province inputs read-only (can only be set by dropdown)
        if (provinceInput) {
            provinceInput.readOnly = true;
            provinceInput.placeholder = 'Select from dropdown';
        }
        
        if (searchProvinceInput) {
            searchProvinceInput.readOnly = true;
            searchProvinceInput.placeholder = 'Select from dropdown';
        }
        
        // Add dropdown-menu class to ensure scrolling is applied
        if (provinceDropdown && !provinceDropdown.classList.contains('dropdown-menu')) {
            provinceDropdown.classList.add('dropdown-menu');
        }
        
        if (searchProvinceDropdown && !searchProvinceDropdown.classList.contains('dropdown-menu')) {
            searchProvinceDropdown.classList.add('dropdown-menu');
        }
        
        // Populate main form dropdown
        if (provinceDropdown) {
            provinceDropdown.innerHTML = '';
            provinces.forEach(province => {
                const li = document.createElement('li');
                const a = document.createElement('a');
                a.href = "#";
                a.textContent = province;
                a.addEventListener('click', function(e) {
                    e.preventDefault();
                    provinceInput.value = province;
                    provinceInput.dataset.selected = "true";
                    
                    // Reset and enable city field
                    const cityInput = document.getElementById('city');
                    if (cityInput) {
                        cityInput.value = '';
                        cityInput.disabled = false;
                        cityInput.placeholder = 'Enter city name';
                        cityInput.focus(); // Focus on city field for immediate typing
                    }
                });
                li.appendChild(a);
                provinceDropdown.appendChild(li);
            });
        }
        
        // Populate search form dropdown
        if (searchProvinceDropdown) {
            searchProvinceDropdown.innerHTML = '';
            provinces.forEach(province => {
                const li = document.createElement('li');
                const a = document.createElement('a');
                a.href = "#";
                a.textContent = province;
                a.addEventListener('click', function(e) {
                    e.preventDefault();
                    searchProvinceInput.value = province;
                    searchProvinceInput.dataset.selected = "true";
                    
                    // Reset and enable city field
                    const searchCityInput = document.getElementById('searchCity');
                    if (searchCityInput) {
                        searchCityInput.value = '';
                        searchCityInput.disabled = false;
                        searchCityInput.placeholder = 'Enter city name';
                        searchCityInput.focus(); // Focus on city field for immediate typing
                    }
                });
                li.appendChild(a);
                searchProvinceDropdown.appendChild(li);
            });
        }
    }
    
    // Setup city autocomplete
    function setupCityAutocomplete() {
        // Main form fields
        const cityInput = document.getElementById('city');
        const cityList = document.getElementById('cityList');
        const provinceInput = document.getElementById('province');
        
        // Search form fields
        const searchCityInput = document.getElementById('searchCity');
        const searchCityList = document.getElementById('searchCityList');
        const searchProvinceInput = document.getElementById('searchProvince');
        
        // Ensure city lists have the autocomplete-items class
        if (cityList && !cityList.classList.contains('autocomplete-items')) {
            cityList.classList.add('autocomplete-items');
        }
        
        if (searchCityList && !searchCityList.classList.contains('autocomplete-items')) {
            searchCityList.classList.add('autocomplete-items');
        }
        
        // Setup city autocomplete for main form
        if (cityInput && cityList && provinceInput) {
            cityInput.addEventListener('input', function() {
                handleCityInput(this, cityList, provinceInput);
            });
        }
        
        // Setup city autocomplete for search form
        if (searchCityInput && searchCityList && searchProvinceInput) {
            searchCityInput.addEventListener('input', function() {
                handleCityInput(this, searchCityList, searchProvinceInput);
            });
        }
        
        // Setup form validation
        setupFormValidation();
    }
    
    // Handle city input
    function handleCityInput(cityInput, cityListElement, provinceInput) {
        const value = cityInput.value.toLowerCase();
        const selectedProvince = provinceInput.value;
        
        // Clear valid status when user types
        cityInput.dataset.selected = "false";
        
        // Close any existing autocomplete lists
        closeAllLists();
        
        // Skip if input is empty or no province selected
        if (!value || !selectedProvince || !provincesData[selectedProvince]) { 
            cityListElement.innerHTML = '';
            return false;
        }
        
        // Clear previous suggestions
        cityListElement.innerHTML = '';
        
        // Get cities for the selected province
        const cities = provincesData[selectedProvince] || [];
        
        // Filter cities based on input
        const matchingCities = cities.filter(city => 
            city.toLowerCase().includes(value)
        );
        
        // Limit results to 6 items for better performance and display
        const limitedCities = matchingCities.slice(0, 6);
        
        // Check if we have any matches
        if (limitedCities.length === 0) {
            const div = document.createElement("div");
            div.innerHTML = "No cities found matching '" + value + "'";
            cityListElement.appendChild(div);
            return;
        }
        
        // Create elements for matching cities
        limitedCities.forEach(city => {
            const div = document.createElement("div");
            
            // Highlight matching text
            const matchIndex = city.toLowerCase().indexOf(value);
            
            if (matchIndex !== -1) {
                div.innerHTML = city.substr(0, matchIndex) + 
                              "<strong>" + city.substr(matchIndex, value.length) + "</strong>" + 
                              city.substr(matchIndex + value.length);
            } else {
                div.innerHTML = city;
            }
            
            // Add hidden input with value
            div.innerHTML += "<input type='hidden' value='" + city + "'>";
            
            // Click handler
            div.addEventListener("click", function() {
                // Update input value with selection
                cityInput.value = this.getElementsByTagName("input")[0].value;
                cityInput.dataset.selected = "true";
                
                // Close all lists
                closeAllLists();
            });
            
            cityListElement.appendChild(div);
        });
    }
    
    // Setup form validation
    function setupFormValidation() {
        // Main form
        const houseForm = document.getElementById('houseForm');
        if (houseForm) {
            houseForm.addEventListener('submit', function(e) {
                const provinceInput = document.getElementById('province');
                const cityInput = document.getElementById('city');
                
                // Validate province selection
                if (!provinceInput.dataset.selected || provinceInput.dataset.selected !== "true") {
                    e.preventDefault();
                    alert('Please select a province from the dropdown');
                    return false;
                }
                
                // Validate city selection if entered
                if (cityInput.value && (!cityInput.dataset.selected || cityInput.dataset.selected !== "true")) {
                    e.preventDefault();
                    alert('Please select a city from the suggestions');
                    return false;
                }
            });
        }
        
        // Search form
        const searchForm = document.getElementById('customSearchForm');
        if (searchForm) {
            searchForm.addEventListener('submit', function(e) {
                const searchProvinceInput = document.getElementById('searchProvince');
                const searchCityInput = document.getElementById('searchCity');
                
                // Validate province selection
                if (searchProvinceInput.value && (!searchProvinceInput.dataset.selected || searchProvinceInput.dataset.selected !== "true")) {
                    e.preventDefault();
                    alert('Please select a province from the dropdown');
                    return false;
                }
                
                // Validate city selection if entered
                if (searchCityInput.value && (!searchCityInput.dataset.selected || searchCityInput.dataset.selected !== "true")) {
                    e.preventDefault();
                    alert('Please select a city from the suggestions');
                    return false;
                }
            });
        }
    }
    
    // Function to close all autocomplete lists
    function closeAllLists(elmnt) {
        // Get all autocomplete lists
        const items = document.getElementsByClassName("autocomplete-items");
        
        // Close all lists except the one passed as argument
        for (let i = 0; i < items.length; i++) {
            if (elmnt !== items[i] && items[i].parentNode !== elmnt) {
                items[i].innerHTML = '';
            }
        }
    }
    
    // Close lists when clicking elsewhere
    document.addEventListener("click", function(e) {
        closeAllLists(e.target);
    });
});



