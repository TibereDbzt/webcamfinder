const $ = require('jquery');

let alpha2Code = GetAlpha2CodeFromURL();
DisplayName(alpha2Code);

function GetAlpha2CodeFromURL (sParam) {
  
  let sPageURL = window.location.search.substring(1);
  let sURLVariables = sPageURL.split('&');
  
  for (var i = 0; i < sURLVariables.length; i++) {
    let sParameterName = sURLVariables[i].split('=');
    if (sParameterName[0] == 'country') {
      return sParameterName[1];
    }
  }
  
}

function DisplayName(code) {
  
  let countries = require('./countries_names_codes.json');
  
  countries.forEach( (element) => {
    if (element.alpha2Code == code) {
      $('.result h1 span').text(element.name);
    }
  });

}