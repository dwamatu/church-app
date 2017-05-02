/**
 * Add key and value to session
 */
function addToSession(key, value) {

    $.ajax({
        type: 'GET',
        url: '/session/add/' + key + '/' + value,
        success: function(response) {}
    });
}

/**
 * Remove key from session
 */
function removeSession(key) {

    $.ajax({
        type: 'GET',
        url: '/session/remove/' + key,
        success: function(response) {}
    });
}

function getSession(key) {
    $.ajax({
        type: 'GET',
        url: '/session/get/' + key,
        success: function(response) {
            console.log("session obtained: " + response);
        }
    });
}

function pushToSession(session, key, value) {
    $.ajax({
        type: 'GET',
        url: '/session/push/' + session + '/' + key + '/' + value,
        success: function(response) {}
    });
}

/**
 * Add to the country selector dropdown, the countries the currently signed in
 * user is allowed to access.
 */
function populateCountries(allowedCountries) {
    var options = '',
        countryCount = allowedCountries.length;

    for (var i = 0; i < countryCount; i++) {
        options += '<option data-icon="flag-icon flag-icon-' + allowedCountries[i].country_code.toLowerCase() + '" data-tokens="' + toTitleCase(allowedCountries[i].country_name) + '" value="' + allowedCountries[i].country_id + '">' + toTitleCase(allowedCountries[i].country_name) + '</option>';
    }

    $('#select-country-dropdown').html(options).selectpicker('val', null).selectpicker('refresh');
    handleCountrySelectorSubmitState();
}

/**
 * Add to the country switcher dropdown, the countries the currently signed in
 * user is allowed to access.
 */
function populateCountrySwitcher(allowedCountries, selectedCountryId) {
    var options = '',
        countryCount = allowedCountries.length;

    for (var i = 0; i < countryCount; i++) {
        if (selectedCountryId === allowedCountries[i].country_id) {
            options += '<option disabled selected data-icon="flag-icon flag-icon-' + allowedCountries[i].country_code.toLowerCase() + '" data-tokens="' + toTitleCase(allowedCountries[i].country_name) + '" value="' + allowedCountries[i].country_id + '">' + toTitleCase(allowedCountries[i].country_name) + '</option>';
        } else {
            options += '<option data-icon="flag-icon flag-icon-' + allowedCountries[i].country_code.toLowerCase() + '" data-tokens="' + toTitleCase(allowedCountries[i].country_name) + '" value="' + allowedCountries[i].country_id + '">' + toTitleCase(allowedCountries[i].country_name) + '</option>';
        }
    }

    $('#switch-country-dropdown').html(options).selectpicker('refresh');
    handleCountrySwitcherSubmitState();
}

/**
 * Toggle state of submit button in country switcher dropdown.
 */
function handleCountrySwitcherSubmitState() {
    $('#switch-country-dropdown').on('changed.bs.select', function(e) {
        // Enable the submit button
        if ($('#switch-country-dropdown-submit').hasClass('disabled')) {
            $('#switch-country-dropdown-submit').attr('type', 'submit');
            $('#switch-country-dropdown-submit').removeClass('disabled');
        }
    });
}

/**
 * Toggle state of submit button in country selector dropdown.
 */
function handleCountrySelectorSubmitState() {
    $('#select-country-dropdown').on('changed.bs.select', function(e) {
        // Enable the submit button
        if ($('#select-country-dropdown-submit').hasClass('disabled')) {
            $('#select-country-dropdown-submit').attr('type', 'submit');
            $('#select-country-dropdown-submit').removeClass('disabled');
        }
    });
}

function getElementTopPosition(element) {
    var viewportOffset = element.getBoundingClientRect();
    // these are relative to the viewport, i.e. the window
    var top = viewportOffset.top;

    return top;
}

function formatAmount(amount) {
    var amount = String(Math.ceil(amount));

    return addCommas(amount);
}

function addCommas(nStr) {
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function toTitleCase(str) {
    if (null !== str || 'undefined' !== typeof str) {
        return str.replace(/\w\S*/g, function(str) {
            return str.charAt(0).toUpperCase() + str.substr(1).toLowerCase();
        });
    }
}
