document.addEventListener('DOMContentLoaded', function() {
    // Global variable to store provinces and cities
    let provincesData = {};
    
    // Identify which form we're working with
    const isSearchForm = document.getElementById('customSearchForm') !== null;
    const isHouseForm = document.getElementById('houseForm') !== null;
    const isEditForm = document.querySelector('form[action*="editHouse"]') !== null;
    
    // Set selectors based on the form type
    let provinceField, cityField, provinceDropdown, cityDropdown, cityDropdownBtn;
    
    if (isSearchForm) {
        provinceField = document.getElementById('searchProvince');
        cityField = document.getElementById('searchCity');
        provinceDropdown = document.getElementById('searchProvinceDropdown');
        cityDropdown = document.getElementById('searchCityDropdown');
        cityDropdownBtn = document.querySelector('#searchCityDropdownContainer .dropdown-toggle');
    } else {
        provinceField = document.getElementById('province');
        cityField = document.getElementById('city');
        provinceDropdown = document.getElementById('provinceDropdown');
        cityDropdown = document.getElementById('cityDropdown');
        cityDropdownBtn = document.querySelector('#cityDropdownContainer .dropdown-toggle');
    }
    
    // Load the city/province data
    fetch('/PetHouse/App/templates/assets/city/Province/comuni_by_province.json')
        .then(response => response.json())
        .then(data => {
            provincesData = data;
            
            // Extract province names (keys from the object)
            const provinces = Object.keys(provincesData).sort();
            
            // Setup province dropdowns
            setupProvinceDropdowns(provinces);
            
            // Handle pre-selected values for edit forms
            if (isEditForm || document.referrer.includes('editHouse')) {
                handlePreselectedValues();
            }
        })
        .catch(error => {
            console.error('Error loading city data:', error);
            // Fallback provinces if data can't be loaded
            const fallbackProvinces = ["Roma", "Milano", "Napoli", "Torino"];
            setupProvinceDropdowns(fallbackProvinces);
        });
    
    // Disable city fields until province is selected
    function disableCityFields() {
        if (!cityField || !cityDropdownBtn) return;
        
        cityField.disabled = true;
        cityField.placeholder = 'Select a province first';
        cityDropdownBtn.disabled = true;
    }
    
    // Enable city dropdown after province selection
    function enableCityFields() {
        if (!cityField || !cityDropdownBtn) return;
        
        cityField.disabled = false;
        cityField.placeholder = 'Select a city';
        cityField.readOnly = true; // Ensure it's read-only to force dropdown selection
        cityDropdownBtn.disabled = false;
    }
    
    // Setup province dropdowns
    function setupProvinceDropdowns(provinces) {
        if (!provinceDropdown || !provinceField) return;
        
        // Make province inputs read-only (can only be set by dropdown)
        provinceField.readOnly = true;
        provinceField.placeholder = 'Select from dropdown';
        
        // Populate dropdown
        provinceDropdown.innerHTML = '';
        provinces.forEach(province => {
            const li = document.createElement('li');
            const a = document.createElement('a');
            a.href = "#";
            a.textContent = province;
            a.dataset.value = province;
            a.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Update province field
                provinceField.value = province;
                provinceField.dataset.selected = "true";
                
                // Clear active class from all province items
                provinceDropdown.querySelectorAll('a').forEach(item => {
                    item.classList.remove('active');
                });
                
                // Add active class to selected item
                a.classList.add('active');
                
                // Enable and populate city dropdown
                enableCityFields();
                populateCityDropdown(province);
            });
            li.appendChild(a);
            provinceDropdown.appendChild(li);
        });
    }
    
    // Populate city dropdown based on selected province
    function populateCityDropdown(province) {
        if (!cityDropdown || !cityField) return;
        
        // Get all cities for the selected province
        const cities = provincesData[province] || [];
        if (cities.length === 0) {
            console.warn(`No cities found for province: ${province}`);
            return;
        }
        
        // Sort cities alphabetically
        cities.sort();
        
        // Clear existing options
        cityDropdown.innerHTML = '';
        
        // Remember current city value (for edit forms)
        const currentCityValue = cityField.value;
        let foundMatch = false;
        
        // Add cities to dropdown
        cities.forEach(city => {
            const li = document.createElement('li');
            const a = document.createElement('a');
            a.href = "#";
            a.textContent = city;
            a.dataset.value = city;
            
            // Check if this is the current city (for edit forms)
            if (city === currentCityValue) {
                a.classList.add('active');
                foundMatch = true;
            }
            
            a.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Update city field
                cityField.value = city;
                cityField.dataset.selected = "true";
                
                // Remove active class from all items
                cityDropdown.querySelectorAll('a').forEach(item => {
                    item.classList.remove('active');
                });
                
                // Add active class to selected item
                a.classList.add('active');
            });
            li.appendChild(a);
            cityDropdown.appendChild(li);
        });
        
        // If it's an edit form and we found the city in the list, keep it
        if (isEditForm && currentCityValue && foundMatch) {
            cityField.dataset.selected = "true";
        } else if (isEditForm && currentCityValue && !foundMatch) {
            // If it's an edit form but city not found in current province, clear it
            cityField.value = '';
            cityField.dataset.selected = "false";
        }
    }
    
    // Handle pre-selected values (for edit forms)
    function handlePreselectedValues() {
        if (!provinceField || !cityField) return;
        
        // Check if we have pre-selected values
        if (provinceField.value) {
            console.log('Pre-selected province detected:', provinceField.value);
            
            // Mark field as selected
            provinceField.dataset.selected = "true";
            
            // Find and highlight the selected province in dropdown
            if (provinceDropdown) {
                const provinceLinks = provinceDropdown.querySelectorAll('a');
                let foundProvince = false;
                
                provinceLinks.forEach(link => {
                    if (link.textContent === provinceField.value) {
                        link.classList.add('active');
                        foundProvince = true;
                    }
                });
                
                if (foundProvince) {
                    // Enable city dropdown and populate it
                    enableCityFields();
                    populateCityDropdown(provinceField.value);
                    
                    // If we also have a city value, it will be handled in populateCityDropdown
                }
            }
        }
    }
    
    // Setup form validation
    const form = isSearchForm ? document.getElementById('customSearchForm') : 
                 isHouseForm ? document.getElementById('houseForm') : 
                 document.querySelector('form');
                 
    if (form && !isSearchForm) { // Only apply strict validation to non-search forms
        form.addEventListener('submit', function(e) {
            if (!provinceField || !cityField) return;
            
            // For house forms, both province and city are required
            if (isHouseForm || isEditForm) {
                // Validate province selection
                if (!provinceField.value || !provinceField.dataset.selected || provinceField.dataset.selected !== "true") {
                    e.preventDefault();
                    alert('Please select a province from the dropdown');
                    return false;
                }
                
                // Validate city selection
                if (!cityField.value || !cityField.dataset.selected || cityField.dataset.selected !== "true") {
                    e.preventDefault();
                    alert('Please select a city from the dropdown');
                    return false;
                }
            }
        });
    }
    
    // Special handling for search form which allows empty fields
    if (isSearchForm && form) {
        form.addEventListener('submit', function(e) {
            // For search form, we allow submission with empty fields
            // Only validate if both province and city have values
            if (provinceField.value && cityField.value) {
                // If province is selected but city isn't from dropdown
                if (provinceField.dataset.selected === "true" && 
                    (!cityField.dataset.selected || cityField.dataset.selected !== "true")) {
                    
                    // Clear city value to prevent incorrect search
                    cityField.value = '';
                }
            }
        });
    }
});



