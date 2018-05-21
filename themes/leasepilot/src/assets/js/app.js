import $ from 'jquery';
import 'jquery-ui-bundle';
import 'before-after.js';
import whatInput from 'what-input';
import slick from 'slick-carousel';
import isInViewport from 'is-in-viewport';

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
    $(this).parent().siblings().each(function () {
      $(this).removeClass('active');
    });
    var filterValue = $(this).attr('data-filter');
    iso.arrange({
      filter: filterValue
    });
  });
}

$(window).on('resize scroll', function () {
  if ($('#section-img-crop').is(':in-viewport( -700 )')) {
    $('#section-img-crop').addClass('animated');
  }
  if ($('#section-computer').is(':in-viewport( -700 )')) {
    $('#section-computer').addClass('animated');
  }
  if ($('#section-bar').is(':in-viewport( -700 )')) {
    $('#section-bar').addClass('animated');
  }
});

$(document).ready(function () {
  $('#case-study-slider').slick({
    infinite: true,
    speed: 500,
    slidesToShow: 5,
    slidesToScroll: 1,
    nextArrow: '<div class="arrow next arrow-right"></div>',
    prevArrow: '<div class="arrow prev arrow-left"></div>',
    responsive: [
      {
        breakpoint: 1023,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      }
    ]
  });
  $('#testimonial-slider').slick({
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    cssEase: 'ease-in'
  });
  $('.js-logo-click').on('click', function(e) {
    e.preventDefault();
    var slideNumber = $(this).data('index');
    $('#testimonial-slider').slick('slickGoTo', slideNumber, false);
  });
  $('.ba-slider').each(function () {
    var cur = $(this);
    // Adjust the slider
    var width = cur.width() + 'px';
    cur.find('.resize img').css('width', width);
    // Bind dragging events
    // drags(cur.find('.handle'), cur.find('.resize'), cur.find('.resize-reverse'), cur);
    drags(cur.find('.handle'), cur.find('.resize'), cur);
  });
});

// Update sliders on resize.
// Because we all do this: i.imgur.com/YkbaV.gif
$(window).resize(function () {
  $('#section-compare').each(function () {
    var cur = $(this);
    var width = cur.width() + 'px';
    cur.find('.resize img').css('width', width);
  });
});

function drags(dragElement, resizeElement, container) {

  // Initialize the dragging event on mousedown.
  dragElement.on('mousedown touchstart', function (e) {

    dragElement.addClass('draggable');
    resizeElement.addClass('resizable');

    var beforeElement = container.find('.before');
    beforeElement.addClass('resizable--reverse');

    // Check if it's a mouse or touch event and pass along the correct value
    var startX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;

    // Get the initial position
    var dragWidth = dragElement.outerWidth(),
      posX = dragElement.offset().left + dragWidth - startX,
      containerOffset = container.offset().left,
      containerWidth = container.outerWidth();

    // Set limits
    var minLeft = containerOffset - 20;
    var maxLeft = containerOffset + containerWidth - dragWidth + 20;

    // Calculate the dragging distance on mousemove.
    dragElement.parents().on("mousemove touchmove", function (e) {

      // Check if it's a mouse or touch event and pass along the correct value
      var moveX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;

      var leftValue = moveX + posX - dragWidth;

      // Prevent going off limits
      if (leftValue < minLeft) {
        leftValue = minLeft;
      } else if (leftValue > maxLeft) {
        leftValue = maxLeft;
      }

      // Translate the handle's left value to masked divs width.
      var widthValue = (leftValue + dragWidth / 2 - containerOffset) * 100 / containerWidth + '%';

      // Set the new values for the slider and the handle.
      // Bind mouseup events to stop dragging.
      container.find('.draggable').css('left', widthValue).on('mouseup touchend touchcancel', function () {
        $(this).removeClass('draggable');
        resizeElement.removeClass('resizable');
        beforeElement.removeClass('resizable--reverse');
      });
      $('.resizable').css('width', widthValue);
      $('.resizable--reverse').css('width', 'calc(100% - ' + widthValue + ')');
    }).on('mouseup touchend touchcancel', function () {
      dragElement.removeClass('draggable');
      resizeElement.removeClass('resizable');
      beforeElement.removeClass('resizable--reverse');
    });
    e.preventDefault();
  }).on('mouseup touchend touchcancel', function (e) {
    dragElement.removeClass('draggable');
    resizeElement.removeClass('resizable');
    beforeElement.removeClass('resizable--reverse');
  });
}
