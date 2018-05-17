import $ from 'jquery';
import whatInput from 'what-input';
import slick from 'slick-carousel';
var Isotope = require('isotope-layout');

window.$ = $;

import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
//import './lib/foundation-explicit-pieces';

$(document).foundation();

if ($('#resource-grid').length > 0) {
  // init Isotope
  var iso = new Isotope('#resource-grid', {
    itemSelector: '.cell',
    percentPosition: true
  });

  // filter items on button click
  $('#resource-filter').on('click', 'button', function () {
    $(this).parent().addClass('active');
    $(this).parent().siblings().each(function() {
      $(this).removeClass('active');
    });
    var filterValue = $(this).attr('data-filter');
    iso.arrange({
      filter: filterValue
    });
  });
}
