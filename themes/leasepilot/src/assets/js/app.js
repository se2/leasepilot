import $ from 'jquery';
import whatInput from 'what-input';
import slick from 'slick-carousel';
import isInViewport from 'is-in-viewport';
import updwn from 'updwn';

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
	$('.section-img-crop').each(function () {
		if ($(this).is(':in-viewport( -700 )')) {
			$(this).addClass('animated');
		}
	});
	$('.section-computer').each(function () {
		if ($(this).is(':in-viewport( -700 )')) {
			$(this).addClass('animated');
		}
	});
	$('.section-bar').each(function () {
		if ($(this).is(':in-viewport( -700 )')) {
			$(this).addClass('animated');
		}
	});
	$('.section-compare').each(function () {
		if ($(this).is(':in-viewport( -700 )')) {
			if ($(this).hasClass('first-time')) {
				$(this).addClass('handle-move');
			}
			$(this).find('.handle img').addClass('animated').addClass('pulse');
		}
	});
});

$(document).ready(function () {
	// fullscreen-bg__video
	// 0.7
	// if ($(window).height() / $(window).width() > 0.7) {
	//   $('.fullscreen-bg__video').addClass('fullscreen-bg__video--portrait');
	// }

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

	$('.js-logo-click').on('click', function (e) {
		e.preventDefault();
		var slideNumber = $(this).data('index');
		$('#testimonial-slider').slick('slickGoTo', slideNumber, false);
	});

	$('.ba-slider').each(function () {
		var current = $(this);
		// Adjust the slider
		var width = current.width() + 'px';
		current.find('.resize img').css('width', width);
		current.find('.before img').css('max-width', width);
		if ($(window).width() < 481) {
			current.css('height', current.find('.before img').height() + 10);
		}
		// Bind dragging events
		drags(current.find('.handle'), current.find('.resize'), current);
	});

	$('.js-request-demo').on('click', function (e) {
		$('#request-demo').foundation('open');
		e.preventDefault();
	});

	const scroll = updwn({ speed: 150 })

	scroll.up(() => {
		/* up */
		$('header.site-header').addClass('scroll-up');
	});
	scroll.down(() => {
		/* down */
		$('header.site-header').removeClass('scroll-up');
	});

	// scroll.position // => 'up' or 'down'
	var iScrollPos = 0;
	$(window).scroll(function (event) {
		var st = $(this).scrollTop();
		// check if scroll to top
		if (st == 0) {
			$('header.site-header').removeClass('pos-fixed').removeClass('scroll-up').removeClass('transition');
		}
		if (st > iScrollPos + 122) {
			// Scrolling Down
			$('header.site-header').addClass('pos-fixed');
			if (st > iScrollPos + 130) {
				$('header.site-header').addClass('transition');
			}
		}
	});

});

// Update sliders on resize.
$(window).resize(function () {
	$('.section-compare').each(function () {
		var current = $(this);
		var width = current.width() + 'px';
		current.find('.resize img').css('width', width);
	});
});

/* Credit: https://codepen.io/bamf/pen/jEpxOX */
function drags(dragElement, resizeElement, container) {

	var beforeElement = container.find('.before');

	// Initialize the dragging event on mousedown.
	dragElement.on('mousedown touchstart', function (e) {

		$('.section-compare').removeClass('first-time').removeClass('handle-move');

		dragElement.addClass('draggable');
		resizeElement.addClass('resizable');

		beforeElement.addClass('resizable--reverse');

		// Check if it's a mouse or touch event and pass along the correct value
		var startX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;

		// Get the initial position
		var dragWidth = dragElement.outerWidth(),
			posX = dragElement.offset().left + dragWidth - startX,
			containerOffset = container.offset().left,
			containerWidth = container.outerWidth();

		// Set limits
		var offset = 10;
		// tweak for iPhone 7+ and lower, need to tweak CSS for left position of .handle
		if (($(window).width() < 481) || ($(window).width() > 481 && $(window).width() < 769)) {
			offset = 5;
		}
		var minLeft = containerOffset - offset;
		var maxLeft = containerOffset + containerWidth - dragWidth + offset;

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
