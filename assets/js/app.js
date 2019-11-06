'use strict';

var map_location = [47.035107, 28.8180988];

jQuery(document).ready(function ($) {

	$('#js-list').magnificPopup({
		delegate: '.list-item-link',
		type: 'image',
		gallery: {
			enabled: true
		}
	});

	$('#js-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		gallery: {
			enabled: true
		}
	});

	// First Page Slider
	if ($('.owl-carousel.fullscreen').length) {
		$('.owl-carousel.fullscreen').owlCarousel({
			items: 1,
			loop: true,
			autoplay: true,
			autoplayTimeout: 4000,
			smartSpeed: 750,
			autoplayHoverPause: false,
			animateOut: 'fadeOut',
			animateIn: 'fadeIn',
			mouseDrag: false,
			touchDrag: false,
			dots: false,
		});
	}

	// Clients Slider
	if ($('.owl-carousel.clients').length) {
		$('.owl-carousel.clients').owlCarousel({
			loop: true,
			autoplay: true,
			autoplayTimeout: 3000,
			autoplayHoverPause: false,
			mouseDrag: false,
			touchDrag: false,
			dots: false,
			responsive: {
				0: {items: 1},
				600: {items: 3},
				1000: {items: 5}
			}
		});
	}


	// Inputs Phone
	$('[type=tel]').inputmask({
		mask: '+373 (99) 999 999',
		showMaskOnHover: false,
		placeholder: '#'
	});

	// Services Navbar
	let topHeader = $('#js-topbar');
	let fixedTopHeader = function () {
		let topHeaderOffset = topHeader.offset().top + $('#js-topbar').outerHeight();
		$(window).on('scroll', function () {
			let scroll = $(window).scrollTop();
			if (scroll >= topHeaderOffset) topHeader.addClass('fixed'); else topHeader.removeClass('fixed');
		});
	};
	fixedTopHeader();

	let stickyOffset = $('.section.section-services').offset().top + $('.section.section-services').outerHeight();
	let topPs = 0;
	let header = $('#js-header');
	let topBar = $('#js-topbar');

	$(window).on('scroll', function () {
		let sticky = $('.sticky');
		let scroll = $(window).scrollTop();

		let st = $(this).scrollTop();
		if (st > topPs) {
			header.removeClass('fixed');
			header.css('top', 0);
			$('body').css('padding-top', 0);
		} else {
			header.addClass('fixed');
			header.css('top', topHeader.outerHeight());
			$('body').css('padding-top', header.outerHeight() + topBar.outerHeight());
			topBar.addClass('fixed');
			// if(st === 0){
			// 	$('body').css('padding-top', header.outerHeight() + topBar.outerHeight());
			// 	topBar.addClass('fixed');
			// }else {
			// 	$('body').css('padding-top', 0);
			// }
		}
		topPs = st;

		if (scroll >= stickyOffset) {
			sticky.addClass('in-view');
			sticky.css('top', topHeader.outerHeight());
		} else {
			sticky.removeClass('in-view');
			sticky.css('top', '-100%');
		}
	});

	// Popup CallBack
	// $('[data-mfp-src="#callback-form"]').magnificPopup({
	// 	type: 'inline',
	// 	preloader: false,
	// 	removalDelay: 750,
	// 	mainClass: 'mfp-fade'
	// });
	// $('[data-mfp-src="#order-form"]').magnificPopup({
	// 	type: 'inline',
	// 	preloader: false,
	// 	removalDelay: 750,
	// 	mainClass: 'mfp-fade'
	// });

	// Popup Gallery
	$('.gallery-nav').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function titleSrc(item) {
				return item.el.attr('title') + '<small>copyrights sonaris.md</small>';
			}
		}
	});

	// mobile Navbar Toggle
	$('[data-toggle="navbar"]').on('click', function () {
		$('.header-nav').toggleClass('open');
	});
	$('[data-toggle="navbar"]').on('blur', function () {
		$('.header-nav').removeClass('open');
	});

	let headerModal = function () {
		$('#js-request-a-call').on('click', function () {
			$('body').addClass('fixed');
			$('#js-form-header').fadeIn(500);
			$('#js-overlay').fadeIn(300);
		});

	};
	headerModal();

	let closeModal = function(){
		$('#js-overlay, .form-header__close').on('click', function () {
			$('#js-form-header').fadeOut(500);
			$('#js-overlay').fadeOut(300);
			$('body').removeClass('fixed');
			$('#js-single-portfolio-form').fadeOut(500);
		});
	};
	closeModal();

	let singlePortfolioModal = function () {
		$('#js-show-single-portfolio-popup').on('click', function () {
			$('body').addClass('fixed');
			$('#js-single-portfolio-form').fadeIn(500);
			$('#js-overlay').fadeIn(300);
		});
	};
	singlePortfolioModal();

	let showSearch = function () {
		$('#js-search-icon').on('click', function () {
			$('#js-search').css('display', 'flex');
			$('#js-close-search').show();
		});
	};
	showSearch();

	$('#js-close-search').on('click', function () {
		$('#js-search').hide();
		$('#js-close-search').hide();
	});

	let showPhonePopup = function(){
		$('input[type="tel"]').on('click', function () {
			let htmlElement = '';
			if(location.href.includes('ru')){
				if(!$(this).next().hasClass('phone-popup')){
					let htmlElement = '<span class="phone-popup">вводите номер телефона без "0"</span>';
					$(htmlElement).insertAfter($('input[type="tel"]'));
				}
			}else if(location.href.includes('en')){
				if(!$(this).next().hasClass('phone-popup')) {
					let htmlElement = '<span class="phone-popup">enter phone number without "0"</span>';
					$(htmlElement).insertAfter($('input[type="tel"]'));
				}
			}else{
				if(!$(this).next().hasClass('phone-popup')) {
					let htmlElement = '<span class="phone-popup">introduceti numarul de telefon fara "0"</span>';
					$(htmlElement).insertAfter($('input[type="tel"]'));
				}
			}
		});

		$('input[type="tel"]').on('blur', function () {
			$('.phone-popup').remove();
		});
	};
	showPhonePopup();
});
