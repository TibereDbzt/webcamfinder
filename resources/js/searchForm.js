const $ = require('jquery');
import 'jquery-ui/ui/widgets/autocomplete';
import countries from './countries.json';

let cam_form = $('.searchCam');
let cam_input = $('.js-input-country');

function AutoComplete(input) {

  let count = [];
  countries.name.forEach(element => {
      count.push(element);
  });
  input.autocomplete({
      source : count,
      minLength : 3,
  });

}

function ConvertToAlpha2Code(form, input) {

  $(form).submit( () => {
    let countries = require('./countries_names_codes.json');
    
    countries.forEach( (element) => {
      if (element.name == input.val()) {
        cam_input.val(element.alpha2Code);
      }
    });

  })

}

AutoComplete(cam_input);
ConvertToAlpha2Code(cam_form, cam_input);
