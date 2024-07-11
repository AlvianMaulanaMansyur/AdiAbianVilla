(function($){
	"use strict";

	// Detect Mobile Device
	var tourmaster_mobile = false;
	if( navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/BlackBerry/i) ||
		navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/Windows Phone/i) ){ 
		tourmaster_mobile = true; 
	}else{ 
		tourmaster_mobile = false; 
	}

	// create the conformation message
	window.tourmaster_front_confirm_box = function(options){

        var settings = $.extend({
			head: '',
			text: '',
			sub: '',
			yes: '',
			no: '',
			success:  function(){}
        }, options);
		
		var confirm_overlay = $('<div class="tourmaster-conform-box-overlay"></div>').appendTo($('body'));
		var confirm_button = $('<span class="tourmaster-confirm-box-button tourmaster-yes">' + settings.yes + '</span>');
		var decline_button = $('<span class="tourmaster-confirm-box-button tourmaster-no">' + settings.no + '</span>');
		
		var confirm_box = $('<div class="tourmaster-confirm-box-wrapper">\
				<div class="tourmaster-confirm-box-head">' + settings.head + '</div>\
				<div class="tourmaster-confirm-box-content-wrapper" >\
					<div class="tourmaster-confirm-box-text">' + settings.text + '</div>\
					<div class="tourmaster-confirm-box-sub">' + settings.sub + '</div>\
				</div>\
			</div>').insertAfter(confirm_overlay);
	
	
		$('<div class="tourmaster-confirm-box-button-wrapper"></div>')
			.append(decline_button).append(confirm_button)
			.appendTo(confirm_box);
		
		// center the alert box position
		confirm_box.css({
			'margin-left': -(confirm_box.outerWidth() / 2),
			'margin-top': -(confirm_box.outerHeight() / 2)
		});
				
		// animate the alert box
		confirm_overlay.css({opacity: 0}).animate({opacity:0.6}, 200);
		confirm_box.css({opacity: 0}).animate({opacity:1}, 200);
		
		confirm_button.click(function(){
			if(typeof(settings.success) == 'function'){ 
				settings.success();
			}
			confirm_overlay.fadeOut(200, function(){
				$(this).remove();
			});
			confirm_box.fadeOut(200, function(){
				$(this).remove();
			});
		});
		decline_button.click(function(){
			confirm_overlay.fadeOut(200, function(){
				$(this).remove();
			});
			confirm_box.fadeOut(200, function(){
				$(this).remove();
			});
		});
		
	} // tourmaster_front_confirm_box

	// tourmaster lightbox
	$.fn.tourmaster_bind_lightbox = function(){

		$(this).on('click', function(){
			var content = $(this).siblings('[data-tmlb-id="' + $(this).attr('data-tmlb') + '"]');

			// check for social login plugin
			if( content.find('.nsl-container-block').length > 0 ){
				var lb_content = content.clone();
				lb_content.find('.nsl-container-block').replaceWith(content.find('.nsl-container-block').clone(true));
			}else if( $(this).attr('data-tmlb') == 'signup' ){
				var lb_content = content.clone(true);
			}else{
				var lb_content = content.clone();
			}
			
			tourmaster_lightbox(lb_content);
		});

	}	
	window.tourmaster_lightbox = function( content ){

		var lightbox_wrap = $('<div class="tourmaster-lightbox-wrapper" ></div>').hide();
		var lightbox_content_wrap = $('<div class="tourmaster-lightbox-content-cell" ></div>');
		lightbox_wrap.append(lightbox_content_wrap);
		lightbox_content_wrap.wrap($('<div class="tourmaster-lightbox-content-row" ></div>'));

		lightbox_content_wrap.append(content);

		var scrollPos = $(window).scrollTop();
		$('html').addClass('tourmaster-lightbox-on');
		$('body').append(lightbox_wrap);
		lightbox_wrap.fadeIn(300);

		// bind lightbox form script
		tourmaster_form_script(lightbox_wrap);

		// rating action
		tourmaster_rating(lightbox_wrap);

		// do a lightbox action
		lightbox_wrap.on('click', '.tourmaster-lightbox-close', function(){
			$('html').removeClass('tourmaster-lightbox-on');
			$(window).scrollTop(scrollPos);
			lightbox_wrap.fadeOut(300, function(){
				$(this).remove();
			});
		});
		lightbox_wrap.on('lightbox_close', function(){
			$('html').removeClass('tourmaster-lightbox-on');
			$(window).scrollTop(scrollPos);
			lightbox_wrap.fadeOut(300, function(){
				$(this).remove();
			});
		});

		// verify 
		lightbox_content_wrap.find('form').not('.tourmaster-register-form').each(function(){

			// required field
			$(this).submit(function(){
				var validate = true;
				var error_box = $(this).find('.tourmaster-lb-submit-error');
				error_box.slideUp(200);

				$(this).find('input[data-required], select[data-required], textarea[data-required]').each(function(){
					if( !$(this).val() ){
						validate = false;
					}
				});

				if( !validate ){
					error_box.slideDown(200);
				}

				return validate;
			});

		});

	} // tourmaster_lightbox

    // ref : http://unscriptable.com/2009/03/20/debouncing-javascript-methods/
	// ensure 1 is fired
	window.tourmaster_debounce = function(func, threshold, execAsap){
		
		var timeout;

		return function debounced(){
			
			var obj = this, args = arguments;
			
			function delayed(){
				if( !execAsap ){
					func.apply(obj, args);
				}
				timeout = null;
			};

			if( timeout ){
				clearTimeout(timeout);
			}else if( execAsap ){
				func.apply(obj, args);
			}
			timeout = setTimeout(delayed, threshold);
		};
	}	
	
	// reduce the event occurance
	window.tourmaster_throttling = function(func, threshold){
		
		var timeout;

		return function throttled(){
			var obj = this, args = arguments;
			
			function delayed(){
				func.apply(obj, args);
				timeout = null;
			};

			if( !timeout ){
				timeout = setTimeout(delayed, threshold);
			}
		};
	}

	// rating
	window.tourmaster_rating = function( container ){

		container.find('.tourmaster-review-form-rating, .tourmaster-tour-search-field-rating').each(function(){

			$(this).children('.tourmaster-rating-select').click(function(){
				$(this).siblings('input').val($(this).attr("data-rating-score"));

				if($(this).is('i')){ $(this).removeClass().addClass('tourmaster-rating-select fa fa-star-half-empty'); }
				$(this).prevAll('i').removeClass().addClass('tourmaster-rating-select fa fa-star');
				$(this).nextAll('i').removeClass().addClass('tourmaster-rating-select fa fa-star-o');
			});

		});

	}

	// set cookie
	window.tourmaster_read_cookie = function( cname ){
		var name = cname + "=";
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for( var i = 0; i <ca.length; i++ ) {
			var c = ca[i];
			while( c.charAt(0) == ' ' ){
				c = c.substring(1);
			}
			if( c.indexOf(name) == 0 ){
				return c.substring(name.length, c.length);
			}
		}
		return "";
	}
	window.tourmaster_set_cookie = function( cname, cvalue, expires ){
		if( typeof(expires) != 'undefined' ){
			if( expires == 0 ){
				expires = 86400;
			}

			var now = new Date();
			var new_time  = now.getTime() + (parseInt(expires) * 1000);
			now.setTime(new_time);

			expires = now.toGMTString();
		}

	    document.cookie = cname + "=" + encodeURIComponent(cvalue) + "; expires=" + expires + "; path=/";
	}

	// form script
	function tourmaster_form_script( container ){
		
		if( typeof(container) == 'undefined' ){
			var date_select = $('.tourmaster-date-select');
			var input_file = $('.tourmaster-file-label');
		}else{
			var date_select = container.find('.tourmaster-date-select');
			var input_file = container.find('.tourmaster-file-label');
		}

		// fill the date option
		date_select.on('change', 'select', function(){
			var parent = $(this).closest('.tourmaster-date-select');
			var date = 0;
			var month = 0;
			var year = 0;

			parent.find('select[data-type]').each(function(){
				if( $(this).attr('data-type') == 'date' ){
					date = parseInt($(this).val());
				}else if( $(this).attr('data-type') == 'month' ){
					month = parseInt($(this).val());
				}else if( $(this).attr('data-type') == 'year' ){
					year = parseInt($(this).val());
				}
			});

			if( date > 0 && month > 0 && year > 0 ){
				parent.siblings('input[name]').val(year + '-' + month + '-' + date);
			}

		});

		// input file 
		input_file.on('change', 'input[type="file"]', function(){
			var label_text = $(this).siblings('.tourmaster-file-label-text');

			if( $(this).val() ){
				label_text.html($(this).val().split('\\').pop());
			}else{
				label_text.html(label_text.attr('data-default'));
			}
		});

	}

	$.fn.tourmaster_video_background = function(){

		if( tourmaster_mobile ){
			$(this).children('[data-background-type="video"]').remove();
			
			if( $(this).attr('data-video-fallback') ){
				$(this).css('background-image', 'url(' + $(this).attr('data-video-fallback') + ')');
			}
		}else{

			var video_wrapper = $(this);
			$(this).children('[data-background-type="video"]').each(function(){

				$(this).tourmaster_set_video_background_position();
					$(window).on('load resize', function(){ 
					$(this).tourmaster_set_video_background_position();
				});

				// script for muting the vimeo/youtube player
				$(this).find('iframe').each(function(){
					if( $(this).attr('data-player-type') == 'vimeo' ){
						var player = $f($(this)[0]);
						
						player.addEvent('ready', function() {
							player.api('setVolume', 0);
						});
					}else if( $(this).attr('data-player-type') == 'youtube' ){

						// assign the script
						if( $('body').children('#tourmaster-youtube-api').length == 0 ){
							$('body').append('<script type="text/javascript" src="https://www.youtube.com/iframe_api" id="tourmaster-youtube-api" ></script>');
						}
						
						// store to global variable
						if( typeof(window.tourmaster_ytb) == 'undefined' ){
							window.tourmaster_ytb = [$(this)[0]];
						}else{
							window.tourmaster_ytb.push($(this)[0]);
						}
						
						// script loading action
						window.onYouTubeIframeAPIReady = function(){
							for( var key in window.tourmaster_ytb ){
								new YT.Player(tourmaster_ytb[key],{
									events: { 
										'onReady': function(e){
											e.target.mute();
										}
									}						
								});
							}
						}
					}
				});
			});
		}

	} // tourmaster_video_background 
	$.fn.tourmaster_set_video_background_position = function(){
			
		var wrapper_bg = $(this).parent();

		// set video height
		var ratio = 640 / 360;
		$(this).each(function(){
			if( (wrapper_bg.width() / wrapper_bg.height()) > ratio ){
				var v_height = wrapper_bg.width() / ratio;
				var v_margin = (wrapper_bg.height() - v_height) / 2;
				$(this).css({width: wrapper_bg.width(), height: v_height, 'margin-left': 0, 'margin-top': v_margin});
			}else{
				var v_width = wrapper_bg.height() * ratio;
				var v_margin = (wrapper_bg.width() - v_width) / 2;
				$(this).css({width: v_width, height: wrapper_bg.height(), 'margin-left': v_margin, 'margin-top': 0});
			}
		});

	} // tourmaster_set_video_background_position

	///////////////////////////////////////////////////
	// goodlayers core function
	///////////////////////////////////////////////////

	$.fn.tourmaster_set_flexslider = function( filter_elem ){

		if( typeof(filter_elem) == 'undefined' ){
			var elem = $(this).find('.tourmaster-flexslider');
		}else{
			var elem = filter_elem.filter('.tourmaster-flexslider');
		}	
	
		elem.each(function(){

			var flex_attr = {
				namespace: 'tourmaster-flex-',
				useCSS: false,
				animation: 'fade',
				animationLoop: true,
				prevText: '<i class="arrow_carrot-left"></i>',
				nextText: '<i class="arrow_carrot-right"></i>'
			};

			if( $(this).find('.tourmaster-flexslider').length > 0 ){ 
				$(this).children('ul.slides').addClass('parent-slides');
				flex_attr.selector = '.parent-slides > li';
			}

			// variable settings
			if( $(this).attr('data-disable-autoslide') ){
				flex_attr.slideshow = false;
			}
			if( $(this).attr('data-pausetime') ){
				flex_attr.slideshowSpeed = parseInt($(this).attr('data-pausetime'));
			}
			if( $(this).attr('data-slidespeed') ){
				flex_attr.animationSpeed = parseInt($(this).attr('data-slidespeed'));
			}else{
				flex_attr.animationSpeed = 500;
			}

			// for carousel
			if( $(this).attr('data-type') == 'carousel' ){
				flex_attr.move = 1;
				flex_attr.animation = 'slide';

				// determine the spaces
				var column_num = parseInt($(this).attr('data-column'));
				flex_attr.itemMargin = 2 * parseInt($(this).children('ul.slides').children('li:first-child').css('margin-right'));
				flex_attr.itemWidth = (($(this).width() + flex_attr.itemMargin) / column_num) - (flex_attr.itemMargin);

				flex_attr.minItems = column_num;
				flex_attr.maxItems = column_num;
				
				var t = $(this);
				$(window).resize(function(){
					if( t.data('tourmaster_flexslider') ){
						var newWidth = ((t.width() + flex_attr.itemMargin) / column_num) - (flex_attr.itemMargin);
						t.data('tourmaster_flexslider').editItemWidth(newWidth);
					}
				});

			}else if( $(this).attr('data-effect') ){
				if( $(this).attr('data-effect') == 'kenburn' ){
					flex_attr.animation = 'fade';
				}else{
					flex_attr.animation = $(this).attr('data-effect');
				}
			}

			// for navigation
			if( !$(this).attr('data-nav') || $(this).attr('data-nav') == 'both' || $(this).attr('data-nav') == 'navigation' || $(this).attr('data-nav') == 'navigation-outer' ){
				if( $(this).attr('data-nav-parent') ){

					if( $(this).attr('data-nav-type') == 'custom' ){
						flex_attr.customDirectionNav = $(this).closest('.' + $(this).attr('data-nav-parent')).find('.flex-prev, .flex-next');
					}else{
						$(this).closest('.' + $(this).attr('data-nav-parent')).each(function(){
							var flex_nav = $('<ul class="tourmaster-flex-direction-nav">' + 
											'<li class="tourmaster-flex-nav-prev"><a class="tourmaster-flex-prev" href="#"><i class="arrow_carrot-left"></i></a></li>' +
											'<li class="tourmaster-flex-nav-next"><a class="tourmaster-flex-next" href="#"><i class="arrow_carrot-right"></i></a></li>' +
										'</ul>');

							var flex_nav_position = $(this).find('.tourmaster-flexslider-nav');
							if( flex_nav_position.length ){
								flex_nav_position.append(flex_nav);
								flex_attr.customDirectionNav = flex_nav.find('.tourmaster-flex-prev, .tourmaster-flex-next');
							}
						});
					}
				}
			}else{
				flex_attr.directionNav = false;
			}
			if( $(this).attr('data-nav') == 'both' || $(this).attr('data-nav') == 'bullet' ){
				flex_attr.controlNav = true;
			}else{
				flex_attr.controlNav = false;
			}

			// for thumbnail 
			if( $(this).attr('data-thumbnail') ){
				var thumbnail_slide = $(this).siblings('.gdlr-core-sly-slider');

				flex_attr.manualControls = thumbnail_slide.find('ul.slides li')
				flex_attr.controlNav = true;
			}

			// center the navigation
			// add active class for kenburn effects
			if( $(this).attr('data-vcenter-nav') ){
				flex_attr.start = function(slider){
					if( slider.directionNav ){
						$(window).resize(function(){
							slider.directionNav.each(function(){
								var margin = -(slider.height() + $(this).outerHeight()) / 2;
								$(this).css('margin-top', margin);
							});
						});
					}
					if( typeof(slider.slides) != 'undefined' ){
						$(window).trigger('resize');
						slider.slides.filter('.tourmaster-flex-active-slide').addClass('tourmaster-active').siblings().removeClass('tourmaster-active');
					}
				};
			}else{
				flex_attr.start = function(slider){
					if( typeof(slider.slides) != 'undefined' ){
						$(window).trigger('resize');
						slider.slides.filter('.tourmaster-flex-active-slide').addClass('tourmaster-active').siblings().removeClass('tourmaster-active');
					}
				}
			}

			// add the action for class
			flex_attr.after = function(slider){
				slider.slides.filter('.tourmaster-flex-active-slide').addClass('tourmaster-active').siblings().removeClass('tourmaster-active');
			}

			// add outer frame class
			if( $(this).find('.tourmaster-outer-frame-element').length > 0 ){
				$(this).addClass('tourmaster-with-outer-frame-element');
			}

			$(this).tourmaster_flexslider(flex_attr);
		});

		return $(this);

	} // tourmaster-set-flexslier

	$.fn.tourmaster_set_image_height = function(){

		var all_image = $(this).find('img');

		all_image.each(function(){
			var img_width = $(this).attr('width');
			var img_height = $(this).attr('height');

			if( img_width && img_height ){
				var parent_item = $(this).parent('.tourmaster-temp-image-wrap');

				if( parent_item.length ){
					parent_item.height((img_height * $(this).width()) / img_width);
				}else{
					parent_item = $('<div class="tourmaster-temp-image-wrap" ></div>');
					parent_item.css('height', ((img_height * $(this).width()) / img_width));
					$(this).wrap(parent_item);
				}
			}else{
				return;
			}
		});
		$(window).resize(function(e){
			all_image.each(function(){
				var parent_item = $(this).parent('.tourmaster-temp-image-wrap');

				if( parent_item.length ){
					$(this).unwrap();
				}
			});
			
			$(window).unbind('resize', e.handleObj.handler, e);
		});

		return $(this);
	} // tourmaster_set_image_height

	// ajax action
	function tourmaster_ajax_action(ajax_section, name, value){

		if( ajax_section.attr('data-target-action') == 'replace' ){
			ajax_section.siblings('.' + ajax_section.attr('data-target')).each(function(){
				var scroll_pos = $(this).offset().top - 100;
				if( typeof(window.traveltour_anchor_offset) != 'undefined' ){
					scroll_pos = scroll_pos - window.traveltour_anchor_offset; 
				}
				if( $(window).scrollTop() > scroll_pos ){
					$('html, body').animate({scrollTop: scroll_pos}, 600, 'easeOutQuad');
				}
			});
		}

		$.ajax({
			type: 'POST',
			url: ajax_section.attr('data-ajax-url'),
			data: { 
				'action': ajax_section.attr('data-tm-ajax'), 
				'settings': ajax_section.data('settings'), 
				'option': { 'name':name, 'value':value } 
			},
			dataType: 'json',
			beforeSend: function(jqXHR, settings){
				// before send action
				if( ajax_section.attr('data-target-action') == 'replace' ){
					ajax_section.siblings('.' + ajax_section.attr('data-target')).animate({opacity: 0}, 150);
				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				console.log(jqXHR, textStatus, errorThrown);
			},
			success: function(data){
				
				if( data.status == 'success' ){
					if( data.content && ajax_section.attr('data-target') ){
						if( ajax_section.attr('data-target-action') == 'append' ){
							var content = $(data.content);
							ajax_section.siblings('.' + ajax_section.attr('data-target')).each(function(){

								if( typeof($.fn.gdlr_core_animate_list_item) == 'function' ){
									if( $(this).attr('data-layout') != 'masonry' || typeof($.fn.isotope) != 'function' ){
										content.addClass('gdlr-core-animate-init');
									}
								}

								$(this).append(content);
								content.tourmaster_flexslider().tourmaster_set_image_height();

								if( $(this).attr('data-layout') == 'masonry' && typeof($.fn.isotope) == 'function' ){
									var addItems = $(this).isotope('addItems', content);
									$(this).isotope('layoutItems', addItems, true);
								}
								
								if( typeof($.fn.gdlr_core_animate_list_item) == 'function' ){
									content.gdlr_core_animate_list_item();
								}
							});

							if( data.load_more ){
								if( data.load_more != 'none' ){
									var load_more = $(data.load_more);
									ajax_section.parent().append(load_more);
									load_more.tourmaster_ajax(load_more);
									load_more.css('display', 'none').slideDown(100);

									ajax_section.remove();
								}else{
									ajax_section.slideUp(100, function(){ $(this).remove(); });
								}
							}
							
						}else if( ajax_section.attr('data-target-action') == 'replace' ){
							var content = $(data.content);
							
							ajax_section.siblings('.' + ajax_section.attr('data-target')).each(function(){
								var fix_height = false;
								var current_height = $(this).height();
								$(this).empty().append(content);
								content.tourmaster_flexslider().tourmaster_set_image_height();

								if( typeof($.fn.gdlr_core_animate_list_item) == 'function' ){
									content.gdlr_core_animate_list_item();
								}
								
								var new_height = $(this).height();
								$(this).css({height:current_height, opacity:1}).animate({'height':new_height}, {'duration':400, 'easing':'easeOutExpo', 'complete': function(){
									if( !fix_height ){ $(this).css('height',''); }
								}});
							});

							// pagination
							if( data.pagination ){
								if( ajax_section.is('.tourmaster-pagination, .gdlr-core-pagination') ){
									ajax_section.slideUp(100, function(){ $(this).remove(); });
								}else{
									ajax_section.siblings('.tourmaster-pagination, .gdlr-core-pagination').slideUp(100, function(){ $(this).remove(); });
								}
								
								if( data.pagination != 'none' ){
									var pagination = $(data.pagination);
									ajax_section.parent().append(pagination);
									pagination.tourmaster_ajax(pagination);
									pagination.css('display', 'none').slideDown(100);
								}
							}

							// load more button
							if( data.load_more ){
								ajax_section.siblings('.tourmaster-load-more-wrap, .gdlr-core-load-more-wrap').slideUp(100, function(){ $(this).remove(); });
								
								if( data.load_more != 'none' ){
									var load_more = $(data.load_more);
									ajax_section.parent().append(load_more);
									load_more.tourmaster_ajax(load_more);
									load_more.css('display', 'none').slideDown(100);
								}
							}

						}
					}

					if( typeof(data.settings) != 'undefined' ){
						ajax_section.data('settings', data.settings);
					}
				}else{
					console.log(data);
				}
			}
		});	

	} // tourmaster_ajax_action


	$.fn.tourmaster_lightgallery = function(){
		
		// ilightbox
		var lightgallery = $(this);
		var lightbox_groups = [];

		lightgallery.each(function(){
			if( $(this).attr('data-lightbox-group') ){
				if( lightbox_groups.indexOf($(this).attr('data-lightbox-group')) == -1 ){
					lightbox_groups.push($(this).attr('data-lightbox-group'));
				}
			}else{
				$(this).lightGallery({ selector: 'this' });
			}
		});

		for( var key in lightbox_groups ){
			var group_selector = '.tourmaster-lightgallery[data-lightbox-group="' + lightbox_groups[key] + '"]';
			
			lightgallery.filter(group_selector).first().lightGallery({ 
				selector: group_selector, 
				selectWithin: 'body',
				thumbnail: false
			});
		}

		// lightbox gallery
		if( typeof(filter_elem) == 'undefined' ){
			var gallery_lb = $(this).find('[data-gallery-lb]');
		}else{
			var gallery_lb = filter_elem.filter('[data-gallery-lb]');
		}

		gallery_lb.click(function(){
			$(this).lightGallery({ 
				dynamic: true,
				dynamicEl: $(this).data('gallery-lb'),
				thumbnail: false
			});

			return false;
		});

		return $(this);
	}

	$.fn.tourmaster_ajax = function( filter_elem ){

		if( typeof(filter_elem) == 'undefined' ){
			var elem = $(this).find('[data-tm-ajax]');
		}else{
			var elem = filter_elem.filter('[data-tm-ajax]');
		}
		
		elem.each(function(){

			var ajax_section = $(this);

			// button click
			$(this).on('click', 'a', function(){
				if( $(this).hasClass('tourmaster-active') ){
					return false;
				}

				$(this).addClass('tourmaster-active').siblings().removeClass('tourmaster-active');

				var name = $(this).attr('data-ajax-name');
				var value = $(this).attr('data-ajax-value');

				tourmaster_ajax_action(ajax_section, name, value);

				return false;
			});

			// filter changed
			$(this).on('change', 'select', function(){
				var name = $(this).attr('data-ajax-name');
				var value = $(this).val();

				tourmaster_ajax_action(ajax_section, name, value);
			});

		});	

	} // tourmaster_ajax

	// on document ready
	$(document).ready(function(){

		var body = $('body');

		// ajax action
		body.tourmaster_ajax();

		// video bg
		$('.tourmaster-background-video-wrap').tourmaster_video_background();

		// confirm button
		$('[data-confirm]').click(function(){
			var confirm_button = $(this);

			tourmaster_front_confirm_box({
				head: confirm_button.attr('data-confirm'),
				text: confirm_button.attr('data-confirm-text'),
				sub: confirm_button.attr('data-confirm-sub'),
				yes: confirm_button.attr('data-confirm-yes'),
				no: confirm_button.attr('data-confirm-no'), 
				success: function(){
					window.location.href = confirm_button.attr('href');
				}
			});

			return false;
		});

		// lightbox popup
		$('[data-tmlb]').tourmaster_bind_lightbox();

		// register form
		$('.tourmaster-register-form').submit(function(){
			var condition_accepted_input = $(this).find('[name="tourmaster-require-acceptance"]');

			if( !condition_accepted_input.is(':checked') ){
				condition_accepted_input.siblings('.tourmaster-notification-box').slideDown(150);
				return false;
			}else{
				condition_accepted_input.siblings('.tourmaster-notification-box').slideUp(150);
			}
		});

		// top bar script
		$('.tourmaster-user-top-bar').each(function(){	
			// if login 
			if( $(this).hasClass('tourmaster-user') ){
				var top_bar_nav = $(this).children('.tourmaster-user-top-bar-nav').children('.tourmaster-user-top-bar-nav-inner');

				$(this).hover(function(){
					top_bar_nav.fadeIn(200);
				}, function(){
					top_bar_nav.fadeOut(200);
				})
			}
		});

		// currency switcher
		$('.tourmaster-currency-switcher').each(function(){	
			var currency_inner = $(this).children('.tourmaster-currency-switcher-inner');
			$(this).hover(function(){
				currency_inner.fadeIn(200);
			}, function(){
				currency_inner.fadeOut(200);
			})
		});

		// refresh login bar
		$('.tourmaster-user-top-bar.tourmaster-refresh').each(function(){
			var user_top_bar = $(this); 

			$.ajax({
				type: 'POST',
				url: user_top_bar.attr('data-ajax-url'),
				data: { action: 'refresh_user_top_bar', redirect: user_top_bar.attr('data-redirect') },
				dataType: 'json',
				success: function(data){ 
					if( typeof(data.content) != 'undefined' ){
						var new_top_bar = $(data.content);
						user_top_bar.replaceWith(new_top_bar);

						// bind lightbox action
						new_top_bar.find('[data-tmlb]').tourmaster_bind_lightbox();

						// bind top bar nav
						if( new_top_bar.hasClass('tourmaster-user') ){
							var top_bar_nav = new_top_bar.children('.tourmaster-user-top-bar-nav').children('.tourmaster-user-top-bar-nav-inner');

							new_top_bar.hover(function(){
								top_bar_nav.fadeIn(200);
							}, function(){
								top_bar_nav.fadeOut(200);
							})
						}
					}
				}
			});	
		});
		
		if( body.hasClass('tourmaster-template-register') ){

			// age combobox set
			tourmaster_form_script();
			
		}else if( body.hasClass('tourmaster-template-user') ){

			// age combobox set
			tourmaster_form_script();

			// print html script
			$('.tourmaster-print').click(function(){
				var printed_id = $(this).attr('data-id');
				if( printed_id ){
					var printed_content = $($('#' + printed_id).html());
					$('body').children().css('display', 'none');
					$('body').append(printed_content);
					window.print();
					printed_content.remove();	
					$('body').children().css('display', '');	
				}
			});

			// upload preview
			$('input[name="profile-image"]').on('change', function(e){
				var temp_image = $(this).closest('label').siblings('img');

				if( e.target.files && e.target.files[0] ){
					var reader = new FileReader();
					reader.onload = function(e_reader){
						temp_image.attr('src', e_reader.target.result);
						temp_image.attr('srcset', '');
					}
					reader.readAsDataURL(e.target.files[0]);
				}
			});

			// deposit item expand
			$('.tourmaster-deposit-item-head').on('click', function(){
				var item = $(this).parent();

				if( item.hasClass('tourmaster-active') ){
					$(this).siblings('.tourmaster-deposit-item-content').css({'display': 'block'}).slideUp(150);
					item.removeClass('tourmaster-active');
				}else{
					$(this).siblings('.tourmaster-deposit-item-content').slideDown(150);
					item.addClass('tourmaster-active');
				}
			});
		
		}

	}); // document.ready

	// responsive video
	$.fn.gdlr_core_fluid_video = function( filter_elem ){
		
		if( typeof(filter_elem) == 'undefined' ){
			var elem = $(this).find('iframe[src*="youtube"], iframe[src*="vimeo"]');
		}else{
			var elem = filter_elem.filter('iframe[src*="youtube"], iframe[src*="vimeo"]');
		}
		
		elem.each(function(){

			// ignore if inside slider
			if( $(this).closest('.ls-container, .master-slider').length <= 0 ){ 
				if( ($(this).is('embed') && $(this).parent('object').length) || $(this).parent('.gdlr-core-fluid-video-wrapper').length ){ return; } 
				if( !$(this).attr('id') ){ $(this).attr('id', 'gdlr-video-' + Math.floor(Math.random()*999999)); }			
			
				var ratio = $(this).height() / $(this).width();
				$(this).removeAttr('height').removeAttr('width');
				
				try{
					$(this).wrap('<div class="gdlr-core-fluid-video-wrapper"></div>').parent().css('padding-top', (ratio * 100)+"%");
					$(this).attr('src', $(this).attr('src'));
				}catch(e){}
			}
		});	

		return $(this);
	}
	$(document).ready(function(){
		$('body').gdlr_core_fluid_video();

		$('.tourmaster-lightgallery').tourmaster_lightgallery();
	});

	$(window).on('load', function(){
		var body = $('body');

		// flexslider
		body.tourmaster_set_flexslider();
	});

})(jQuery);

/*! Froogaloop for vimeo api
* http://a.vimeocdn.com/js/froogaloop2.min.js */
var Froogaloop=function(){function e(a){return new e.fn.init(a)}function g(a,c,b){if(!b.contentWindow.postMessage)return!1;a=JSON.stringify({method:a,value:c});b.contentWindow.postMessage(a,h)}function l(a){var c,b;try{c=JSON.parse(a.data),b=c.event||c.method}catch(e){}"ready"!=b||k||(k=!0);if(!/^https?:\/\/player.vimeo.com/.test(a.origin))return!1;"*"===h&&(h=a.origin);a=c.value;var m=c.data,f=""===f?null:c.player_id;c=f?d[f][b]:d[b];b=[];if(!c)return!1;void 0!==a&&b.push(a);m&&b.push(m);f&&b.push(f); return 0<b.length?c.apply(null,b):c.call()}function n(a,c,b){b?(d[b]||(d[b]={}),d[b][a]=c):d[a]=c}var d={},k=!1,h="*";e.fn=e.prototype={element:null,init:function(a){"string"===typeof a&&(a=document.getElementById(a));this.element=a;return this},api:function(a,c){if(!this.element||!a)return!1;var b=this.element,d=""!==b.id?b.id:null,e=c&&c.constructor&&c.call&&c.apply?null:c,f=c&&c.constructor&&c.call&&c.apply?c:null;f&&n(a,f,d);g(a,e,b);return this},addEvent:function(a,c){if(!this.element)return!1; var b=this.element,d=""!==b.id?b.id:null;n(a,c,d);"ready"!=a?g("addEventListener",a,b):"ready"==a&&k&&c.call(null,d);return this},removeEvent:function(a){if(!this.element)return!1;var c=this.element,b=""!==c.id?c.id:null;a:{if(b&&d[b]){if(!d[b][a]){b=!1;break a}d[b][a]=null}else{if(!d[a]){b=!1;break a}d[a]=null}b=!0}"ready"!=a&&b&&g("removeEventListener",a,c)}};e.fn.init.prototype=e.fn;window.addEventListener?window.addEventListener("message",l,!1):window.attachEvent("onmessage",l);return window.Froogaloop=window.$f=e}();

// flexslider
!function(e){var t=!0;e.tourmaster_flexslider=function(a,n){var i=e(a);i.vars=e.extend({},e.tourmaster_flexslider.defaults,n);var r,s=i.vars.namespace,o=window.navigator&&window.navigator.msPointerEnabled&&window.MSGesture,l=("ontouchstart"in window||o||window.DocumentTouch&&document instanceof DocumentTouch)&&i.vars.touch,c="click touchend MSPointerUp keyup",d="",u="vertical"===i.vars.direction,v=i.vars.reverse,p=i.vars.itemWidth>0,m="fade"===i.vars.animation,f=""!==i.vars.asNavFor,h={};e.data(a,"tourmaster_flexslider",i),h={init:function(){i.animating=!1,i.currentSlide=parseInt(i.vars.startAt?i.vars.startAt:0,10),isNaN(i.currentSlide)&&(i.currentSlide=0),i.animatingTo=i.currentSlide,i.atEnd=0===i.currentSlide||i.currentSlide===i.last,i.containerSelector=i.vars.selector.substr(0,i.vars.selector.search(" ")),i.slides=e(i.vars.selector,i),i.container=e(i.containerSelector,i),i.count=i.slides.length,i.syncExists=e(i.vars.sync).length>0,"slide"===i.vars.animation&&(i.vars.animation="swing"),i.prop=u?"top":"marginLeft",i.args={},i.manualPause=!1,i.stopped=!1,i.started=!1,i.startTimeout=null,i.transitions=!i.vars.video&&!m&&i.vars.useCSS&&function(){var e=document.createElement("div"),t=["perspectiveProperty","WebkitPerspective","MozPerspective","OPerspective","msPerspective"];for(var a in t)if(void 0!==e.style[t[a]])return i.pfx=t[a].replace("Perspective","").toLowerCase(),i.prop="-"+i.pfx+"-transform",!0;return!1}(),i.ensureAnimationEnd="",""!==i.vars.controlsContainer&&(i.controlsContainer=e(i.vars.controlsContainer).length>0&&e(i.vars.controlsContainer)),""!==i.vars.manualControls&&(i.manualControls=e(i.vars.manualControls).length>0&&e(i.vars.manualControls)),""!==i.vars.customDirectionNav&&(i.customDirectionNav=2===e(i.vars.customDirectionNav).length&&e(i.vars.customDirectionNav)),i.vars.randomize&&(i.slides.sort(function(){return Math.round(Math.random())-.5}),i.container.empty().append(i.slides)),i.doMath(),i.setup("init"),i.vars.controlNav&&h.controlNav.setup(),i.vars.directionNav&&h.directionNav.setup(),i.vars.keyboard&&(1===e(i.containerSelector).length||i.vars.multipleKeyboard)&&e(document).bind("keyup",function(e){var t=e.keyCode;if(!i.animating&&(39===t||37===t)){var a=39===t?i.getTarget("next"):37===t&&i.getTarget("prev");i.flexAnimate(a,i.vars.pauseOnAction)}}),i.vars.mousewheel&&i.bind("mousewheel",function(e,t,a,n){e.preventDefault();var r=t<0?i.getTarget("next"):i.getTarget("prev");i.flexAnimate(r,i.vars.pauseOnAction)}),i.vars.pausePlay&&h.pausePlay.setup(),i.vars.slideshow&&i.vars.pauseInvisible&&h.pauseInvisible.init(),i.vars.slideshow&&(i.vars.pauseOnHover&&i.hover(function(){i.manualPlay||i.manualPause||i.pause()},function(){i.manualPause||i.manualPlay||i.stopped||i.play()}),i.vars.pauseInvisible&&h.pauseInvisible.isHidden()||(i.vars.initDelay>0?i.startTimeout=setTimeout(i.play,i.vars.initDelay):i.play())),f&&h.asNav.setup(),l&&i.vars.touch&&h.touch(),(!m||m&&i.vars.smoothHeight)&&e(window).bind("resize orientationchange focus",h.resize),i.find("img").attr("draggable","false"),setTimeout(function(){i.vars.start(i)},200)},asNav:{setup:function(){i.asNav=!0,i.animatingTo=Math.floor(i.currentSlide/i.move),i.currentItem=i.currentSlide,i.slides.removeClass(s+"active-slide").eq(i.currentItem).addClass(s+"active-slide"),o?(a._slider=i,i.slides.each(function(){var t=this;t._gesture=new MSGesture,t._gesture.target=t,t.addEventListener("MSPointerDown",function(e){e.preventDefault(),e.currentTarget._gesture&&e.currentTarget._gesture.addPointer(e.pointerId)},!1),t.addEventListener("MSGestureTap",function(t){t.preventDefault();var a=e(this),n=a.index();e(i.vars.asNavFor).data("tourmaster_flexslider").animating||a.hasClass("active")||(i.direction=i.currentItem<n?"next":"prev",i.flexAnimate(n,i.vars.pauseOnAction,!1,!0,!0))})})):i.slides.on(c,function(t){t.preventDefault();var a=e(this),n=a.index();a.offset().left-e(i).scrollLeft()<=0&&a.hasClass(s+"active-slide")?i.flexAnimate(i.getTarget("prev"),!0):e(i.vars.asNavFor).data("tourmaster_flexslider").animating||a.hasClass(s+"active-slide")||(i.direction=i.currentItem<n?"next":"prev",i.flexAnimate(n,i.vars.pauseOnAction,!1,!0,!0))})}},controlNav:{setup:function(){i.manualControls?h.controlNav.setupManual():h.controlNav.setupPaging()},setupPaging:function(){var t,a,n="thumbnails"===i.vars.controlNav?"control-thumbs":"control-paging",r=1;if(i.controlNavScaffold=e('<ol class="'+s+"control-nav "+s+n+'"></ol>'),i.pagingCount>1)for(var o=0;o<i.pagingCount;o++){if(void 0===(a=i.slides.eq(o)).attr("data-thumb-alt")&&a.attr("data-thumb-alt",""),altText=""!==a.attr("data-thumb-alt")?altText=' alt="'+a.attr("data-thumb-alt")+'"':"",t="thumbnails"===i.vars.controlNav?'<img src="'+a.attr("data-thumb")+'"'+altText+"/>":'<a href="#">'+r+"</a>","thumbnails"===i.vars.controlNav&&!0===i.vars.thumbCaptions){var l=a.attr("data-thumbcaption");""!==l&&void 0!==l&&(t+='<span class="'+s+'caption">'+l+"</span>")}i.controlNavScaffold.append("<li>"+t+"</li>"),r++}i.controlsContainer?e(i.controlsContainer).append(i.controlNavScaffold):i.append(i.controlNavScaffold),h.controlNav.set(),h.controlNav.active(),i.controlNavScaffold.delegate("a, img",c,function(t){if(t.preventDefault(),""===d||d===t.type){var a=e(this),n=i.controlNav.index(a);a.hasClass(s+"active")||(i.direction=n>i.currentSlide?"next":"prev",i.flexAnimate(n,i.vars.pauseOnAction))}""===d&&(d=t.type),h.setToClearWatchedEvent()})},setupManual:function(){i.controlNav=i.manualControls,h.controlNav.active(),i.controlNav.bind(c,function(t){if(t.preventDefault(),""===d||d===t.type){var a=e(this),n=i.controlNav.index(a);a.hasClass(s+"active")||(n>i.currentSlide?i.direction="next":i.direction="prev",i.flexAnimate(n,i.vars.pauseOnAction))}""===d&&(d=t.type),h.setToClearWatchedEvent()})},set:function(){var t="thumbnails"===i.vars.controlNav?"img":"a";i.controlNav=e("."+s+"control-nav li "+t,i.controlsContainer?i.controlsContainer:i)},active:function(){i.controlNav.removeClass(s+"active").eq(i.animatingTo).addClass(s+"active")},update:function(t,a){i.pagingCount>1&&"add"===t?i.controlNavScaffold.append(e('<li><a href="#">'+i.count+"</a></li>")):1===i.pagingCount?i.controlNavScaffold.find("li").remove():i.controlNav.eq(a).closest("li").remove(),h.controlNav.set(),i.pagingCount>1&&i.pagingCount!==i.controlNav.length?i.update(a,t):h.controlNav.active()}},directionNav:{setup:function(){var t=e('<ul class="'+s+'direction-nav"><li class="'+s+'nav-prev"><a class="'+s+'prev" href="#">'+i.vars.prevText+'</a></li><li class="'+s+'nav-next"><a class="'+s+'next" href="#">'+i.vars.nextText+"</a></li></ul>");i.customDirectionNav?i.directionNav=i.customDirectionNav:i.controlsContainer?(e(i.controlsContainer).append(t),i.directionNav=e("."+s+"direction-nav li a",i.controlsContainer)):(i.append(t),i.directionNav=e("."+s+"direction-nav li a",i)),h.directionNav.update(),i.directionNav.bind(c,function(t){t.preventDefault();var a;""!==d&&d!==t.type||(a=e(this).hasClass(s+"next")?i.getTarget("next"):i.getTarget("prev"),i.flexAnimate(a,i.vars.pauseOnAction)),""===d&&(d=t.type),h.setToClearWatchedEvent()})},update:function(){var e=s+"disabled";1===i.pagingCount?i.directionNav.addClass(e).attr("tabindex","-1"):i.vars.animationLoop?i.directionNav.removeClass(e).removeAttr("tabindex"):0===i.animatingTo?i.directionNav.removeClass(e).filter("."+s+"prev").addClass(e).attr("tabindex","-1"):i.animatingTo===i.last?i.directionNav.removeClass(e).filter("."+s+"next").addClass(e).attr("tabindex","-1"):i.directionNav.removeClass(e).removeAttr("tabindex")}},pausePlay:{setup:function(){var t=e('<div class="'+s+'pauseplay"><a href="#"></a></div>');i.controlsContainer?(i.controlsContainer.append(t),i.pausePlay=e("."+s+"pauseplay a",i.controlsContainer)):(i.append(t),i.pausePlay=e("."+s+"pauseplay a",i)),h.pausePlay.update(i.vars.slideshow?s+"pause":s+"play"),i.pausePlay.bind(c,function(t){t.preventDefault(),""!==d&&d!==t.type||(e(this).hasClass(s+"pause")?(i.manualPause=!0,i.manualPlay=!1,i.pause()):(i.manualPause=!1,i.manualPlay=!0,i.play())),""===d&&(d=t.type),h.setToClearWatchedEvent()})},update:function(e){"play"===e?i.pausePlay.removeClass(s+"pause").addClass(s+"play").html(i.vars.playText):i.pausePlay.removeClass(s+"play").addClass(s+"pause").html(i.vars.pauseText)}},touch:function(){var e,t,n,r,s,l,c,d,f,h=!1,g=0,S=0,x=0;o?(a.style.msTouchAction="none",a._gesture=new MSGesture,a._gesture.target=a,a.addEventListener("MSPointerDown",function(e){e.stopPropagation(),i.animating?e.preventDefault():(i.pause(),a._gesture.addPointer(e.pointerId),x=0,r=u?i.h:i.w,l=Number(new Date),n=p&&v&&i.animatingTo===i.last?0:p&&v?i.limit-(i.itemW+i.vars.itemMargin)*i.move*i.animatingTo:p&&i.currentSlide===i.last?i.limit:p?(i.itemW+i.vars.itemMargin)*i.move*i.currentSlide:v?(i.last-i.currentSlide+i.cloneOffset)*r:(i.currentSlide+i.cloneOffset)*r)},!1),a._slider=i,a.addEventListener("MSGestureChange",function(e){e.stopPropagation();var t=e.target._slider;if(t){var i=-e.translationX,o=-e.translationY;s=x+=u?o:i,h=u?Math.abs(x)<Math.abs(-i):Math.abs(x)<Math.abs(-o),e.detail!==e.MSGESTURE_FLAG_INERTIA?(!h||Number(new Date)-l>500)&&(e.preventDefault(),!m&&t.transitions&&(t.vars.animationLoop||(s=x/(0===t.currentSlide&&x<0||t.currentSlide===t.last&&x>0?Math.abs(x)/r+2:1)),t.setProps(n+s,"setTouch"))):setImmediate(function(){a._gesture.stop()})}},!1),a.addEventListener("MSGestureEnd",function(a){a.stopPropagation();var i=a.target._slider;if(i){if(i.animatingTo===i.currentSlide&&!h&&null!==s){var o=v?-s:s,c=o>0?i.getTarget("next"):i.getTarget("prev");i.canAdvance(c)&&(Number(new Date)-l<550&&Math.abs(o)>50||Math.abs(o)>r/2)?i.flexAnimate(c,i.vars.pauseOnAction):m||i.flexAnimate(i.currentSlide,i.vars.pauseOnAction,!0)}e=null,t=null,s=null,n=null,x=0}},!1)):(c=function(s){i.animating?s.preventDefault():(window.navigator.msPointerEnabled||1===s.touches.length)&&(i.pause(),r=u?i.h:i.w,l=Number(new Date),g=s.touches[0].pageX,S=s.touches[0].pageY,n=p&&v&&i.animatingTo===i.last?0:p&&v?i.limit-(i.itemW+i.vars.itemMargin)*i.move*i.animatingTo:p&&i.currentSlide===i.last?i.limit:p?(i.itemW+i.vars.itemMargin)*i.move*i.currentSlide:v?(i.last-i.currentSlide+i.cloneOffset)*r:(i.currentSlide+i.cloneOffset)*r,e=u?S:g,t=u?g:S,a.addEventListener("touchmove",d,!1),a.addEventListener("touchend",f,!1))},d=function(a){g=a.touches[0].pageX,S=a.touches[0].pageY,s=u?e-S:e-g;(!(h=u?Math.abs(s)<Math.abs(g-t):Math.abs(s)<Math.abs(S-t))||Number(new Date)-l>500)&&(a.preventDefault(),!m&&i.transitions&&(i.vars.animationLoop||(s/=0===i.currentSlide&&s<0||i.currentSlide===i.last&&s>0?Math.abs(s)/r+2:1),i.setProps(n+s,"setTouch")))},f=function(o){if(a.removeEventListener("touchmove",d,!1),i.animatingTo===i.currentSlide&&!h&&null!==s){var c=v?-s:s,u=c>0?i.getTarget("next"):i.getTarget("prev");i.canAdvance(u)&&(Number(new Date)-l<550&&Math.abs(c)>50||Math.abs(c)>r/2)?i.flexAnimate(u,i.vars.pauseOnAction):m||i.flexAnimate(i.currentSlide,i.vars.pauseOnAction,!0)}a.removeEventListener("touchend",f,!1),e=null,t=null,s=null,n=null},a.addEventListener("touchstart",c,!1))},resize:function(){!i.animating&&i.is(":visible")&&(p||i.doMath(),m?h.smoothHeight():p?(i.slides.width(i.computedW),i.update(i.pagingCount),i.setProps()):u?(i.viewport.height(i.h),i.setProps(i.h,"setTotal")):(i.vars.smoothHeight&&h.smoothHeight(),i.newSlides.width(i.computedW),i.setProps(i.computedW,"setTotal")))},smoothHeight:function(e){if(!u||m){var t=m?i:i.viewport;e?t.animate({height:i.slides.eq(i.animatingTo).height()},e):t.height(i.slides.eq(i.animatingTo).height())}},sync:function(t){var a=e(i.vars.sync).data("tourmaster_flexslider"),n=i.animatingTo;switch(t){case"animate":a.flexAnimate(n,i.vars.pauseOnAction,!1,!0);break;case"play":a.playing||a.asNav||a.play();break;case"pause":a.pause()}},uniqueID:function(t){return t.filter("[id]").add(t.find("[id]")).each(function(){var t=e(this);t.attr("id",t.attr("id")+"_clone")}),t},pauseInvisible:{visProp:null,init:function(){var e=h.pauseInvisible.getHiddenProp();if(e){var t=e.replace(/[H|h]idden/,"")+"visibilitychange";document.addEventListener(t,function(){h.pauseInvisible.isHidden()?i.startTimeout?clearTimeout(i.startTimeout):i.pause():i.started?i.play():i.vars.initDelay>0?setTimeout(i.play,i.vars.initDelay):i.play()})}},isHidden:function(){var e=h.pauseInvisible.getHiddenProp();return!!e&&document[e]},getHiddenProp:function(){var e=["webkit","moz","ms","o"];if("hidden"in document)return"hidden";for(var t=0;t<e.length;t++)if(e[t]+"Hidden"in document)return e[t]+"Hidden";return null}},setToClearWatchedEvent:function(){clearTimeout(r),r=setTimeout(function(){d=""},3e3)}},i.flexAnimate=function(t,a,n,r,o){if(i.vars.animationLoop||t===i.currentSlide||(i.direction=t>i.currentSlide?"next":"prev"),f&&1===i.pagingCount&&(i.direction=i.currentItem<t?"next":"prev"),!i.animating&&(i.canAdvance(t,o)||n)&&i.is(":visible")){if(f&&r){var c=e(i.vars.asNavFor).data("tourmaster_flexslider");if(i.atEnd=0===t||t===i.count-1,c.flexAnimate(t,!0,!1,!0,o),i.direction=i.currentItem<t?"next":"prev",c.direction=i.direction,Math.ceil((t+1)/i.visible)-1===i.currentSlide||0===t)return i.currentItem=t,i.slides.removeClass(s+"active-slide").eq(t).addClass(s+"active-slide"),!1;i.currentItem=t,i.slides.removeClass(s+"active-slide").eq(t).addClass(s+"active-slide"),t=Math.floor(t/i.visible)}if(i.animating=!0,i.animatingTo=t,a&&i.pause(),i.vars.before(i),i.syncExists&&!o&&h.sync("animate"),i.vars.controlNav&&h.controlNav.active(),p||i.slides.removeClass(s+"active-slide").eq(t).addClass(s+"active-slide"),i.atEnd=0===t||t===i.last,i.vars.directionNav&&h.directionNav.update(),t===i.last&&(i.vars.end(i),i.vars.animationLoop||i.pause()),m)l?(i.slides.eq(i.currentSlide).css({opacity:0,zIndex:1}),i.slides.eq(t).css({opacity:1,zIndex:2}),i.wrapup(x)):(i.slides.eq(i.currentSlide).css({zIndex:1}).animate({opacity:0},i.vars.animationSpeed,i.vars.easing),i.slides.eq(t).css({zIndex:2}).animate({opacity:1},i.vars.animationSpeed,i.vars.easing,i.wrapup));else{var d,g,S,x=u?i.slides.filter(":first").height():i.computedW;p?(d=i.vars.itemMargin,g=(S=(i.itemW+d)*i.move*i.animatingTo)>i.limit&&1!==i.visible?i.limit:S):g=0===i.currentSlide&&t===i.count-1&&i.vars.animationLoop&&"next"!==i.direction?v?(i.count+i.cloneOffset)*x:0:i.currentSlide===i.last&&0===t&&i.vars.animationLoop&&"prev"!==i.direction?v?0:(i.count+1)*x:v?(i.count-1-t+i.cloneOffset)*x:(t+i.cloneOffset)*x,i.setProps(g,"",i.vars.animationSpeed),i.transitions?(i.vars.animationLoop&&i.atEnd||(i.animating=!1,i.currentSlide=i.animatingTo),i.container.unbind("webkitTransitionEnd transitionend"),i.container.bind("webkitTransitionEnd transitionend",function(){clearTimeout(i.ensureAnimationEnd),i.wrapup(x)}),clearTimeout(i.ensureAnimationEnd),i.ensureAnimationEnd=setTimeout(function(){i.wrapup(x)},i.vars.animationSpeed+100)):i.container.animate(i.args,i.vars.animationSpeed,i.vars.easing,function(){i.wrapup(x)})}i.vars.smoothHeight&&h.smoothHeight(i.vars.animationSpeed)}},i.wrapup=function(e){m||p||(0===i.currentSlide&&i.animatingTo===i.last&&i.vars.animationLoop?i.setProps(e,"jumpEnd"):i.currentSlide===i.last&&0===i.animatingTo&&i.vars.animationLoop&&i.setProps(e,"jumpStart")),i.animating=!1,i.currentSlide=i.animatingTo,i.vars.after(i)},i.animateSlides=function(){!i.animating&&t&&i.flexAnimate(i.getTarget("next"))},i.pause=function(){clearInterval(i.animatedSlides),i.animatedSlides=null,i.playing=!1,i.vars.pausePlay&&h.pausePlay.update("play"),i.syncExists&&h.sync("pause")},i.play=function(){i.playing&&clearInterval(i.animatedSlides),i.animatedSlides=i.animatedSlides||setInterval(i.animateSlides,i.vars.slideshowSpeed),i.started=i.playing=!0,i.vars.pausePlay&&h.pausePlay.update("pause"),i.syncExists&&h.sync("play")},i.stop=function(){i.pause(),i.stopped=!0},i.canAdvance=function(e,t){var a=f?i.pagingCount-1:i.last;return!!t||(!(!f||i.currentItem!==i.count-1||0!==e||"prev"!==i.direction)||(!f||0!==i.currentItem||e!==i.pagingCount-1||"next"===i.direction)&&(!(e===i.currentSlide&&!f)&&(!!i.vars.animationLoop||(!i.atEnd||0!==i.currentSlide||e!==a||"next"===i.direction)&&(!i.atEnd||i.currentSlide!==a||0!==e||"next"!==i.direction))))},i.getTarget=function(e){return i.direction=e,"next"===e?i.currentSlide===i.last?0:i.currentSlide+1:0===i.currentSlide?i.last:i.currentSlide-1},i.setProps=function(e,t,a){var n=function(){var a=e||(i.itemW+i.vars.itemMargin)*i.move*i.animatingTo;return-1*function(){if(p)return"setTouch"===t?e:v&&i.animatingTo===i.last?0:v?i.limit-(i.itemW+i.vars.itemMargin)*i.move*i.animatingTo:i.animatingTo===i.last?i.limit:a;switch(t){case"setTotal":return v?(i.count-1-i.currentSlide+i.cloneOffset)*e:(i.currentSlide+i.cloneOffset)*e;case"setTouch":return e;case"jumpEnd":return v?e:i.count*e;case"jumpStart":return v?i.count*e:e;default:return e}}()+"px"}();i.transitions&&(n=u?"translate3d(0,"+n+",0)":"translate3d("+n+",0,0)",a=void 0!==a?a/1e3+"s":"0s",i.container.css("-"+i.pfx+"-transition-duration",a),i.container.css("transition-duration",a)),i.args[i.prop]=n,(i.transitions||void 0===a)&&i.container.css(i.args),i.container.css("transform",n)},i.setup=function(t){if(m)i.slides.css({width:"100%",float:"left",marginRight:"-100%",position:"relative"}),"init"===t&&(l?i.slides.css({opacity:0,display:"block",webkitTransition:"opacity "+i.vars.animationSpeed/1e3+"s ease",zIndex:1}).eq(i.currentSlide).css({opacity:1,zIndex:2}):0==i.vars.fadeFirstSlide?i.slides.css({opacity:0,display:"block",zIndex:1}).eq(i.currentSlide).css({zIndex:2}).css({opacity:1}):i.slides.css({opacity:0,display:"block",zIndex:1}).eq(i.currentSlide).css({zIndex:2}).animate({opacity:1},i.vars.animationSpeed,i.vars.easing)),i.vars.smoothHeight&&h.smoothHeight();else{var a,n;"init"===t&&(i.viewport=e('<div class="'+s+'viewport"></div>').css({overflow:"hidden",position:"relative"}).appendTo(i).append(i.container),i.cloneCount=0,i.cloneOffset=0,v&&(n=e.makeArray(i.slides).reverse(),i.slides=e(n),i.container.empty().append(i.slides))),i.vars.animationLoop&&!p&&(i.cloneCount=2,i.cloneOffset=1,"init"!==t&&i.container.find(".clone").remove(),i.container.append(h.uniqueID(i.slides.first().clone().addClass("clone")).attr("aria-hidden","true")).prepend(h.uniqueID(i.slides.last().clone().addClass("clone")).attr("aria-hidden","true"))),i.newSlides=e(i.vars.selector,i),a=v?i.count-1-i.currentSlide+i.cloneOffset:i.currentSlide+i.cloneOffset,u&&!p?(i.container.height(200*(i.count+i.cloneCount)+"%").css("position","absolute").width("100%"),setTimeout(function(){i.newSlides.css({display:"block"}),i.doMath(),i.viewport.height(i.h),i.setProps(a*i.h,"init")},"init"===t?100:0)):(i.container.width(200*(i.count+i.cloneCount)+"%"),i.setProps(a*i.computedW,"init"),setTimeout(function(){i.doMath(),i.newSlides.css({width:i.computedW,marginRight:i.computedM,float:"left",display:"block"}),i.vars.smoothHeight&&h.smoothHeight()},"init"===t?100:0))}p||i.slides.removeClass(s+"active-slide").eq(i.currentSlide).addClass(s+"active-slide"),i.vars.init(i)},i.doMath=function(){var t=i.slides.first(),a=i.vars.itemMargin,n=i.vars.minItems,r=i.vars.maxItems;"function"==typeof window.matchMedia?(window.matchMedia("(max-width: 767px)").matches&&(n=1,r=1),window.matchMedia("(max-width: 419px)").matches&&(n=1,r=1)):(e(window).innerWidth()<767&&(n=1,r=1),e(window).innerWidth()<419&&(n=1,r=1)),i.w=void 0===i.viewport?i.width():i.viewport.width(),i.h=t.height(),i.boxPadding=t.outerWidth()-t.width(),p?(i.itemT=i.vars.itemWidth+a,i.itemM=a,i.minW=n?n*i.itemT:i.w,i.maxW=r?r*i.itemT-a:i.w,i.itemW=i.minW>i.w?(i.w-a*(n-1))/n:i.maxW<i.w?(i.w-a*(r-1))/r:i.vars.itemWidth>i.w?i.w:i.vars.itemWidth,i.visible=Math.floor((i.w+i.itemM)/(i.itemW+i.itemM)),i.move=i.vars.move>0&&i.vars.move<i.visible?i.vars.move:i.visible,i.pagingCount=Math.ceil((i.count-i.visible)/i.move+1),i.last=i.pagingCount-1,i.limit=1===i.pagingCount?0:i.vars.itemWidth>i.w?i.itemW*(i.count-1)+a*(i.count-1):(i.itemW+a)*i.count-i.w-a):(i.itemW=i.w,i.itemM=a,i.pagingCount=i.count,i.last=i.count-1),i.computedW=i.itemW-i.boxPadding,i.computedM=i.itemM},i.update=function(e,t){i.doMath(),p||(e<i.currentSlide?i.currentSlide+=1:e<=i.currentSlide&&0!==e&&(i.currentSlide-=1),i.animatingTo=i.currentSlide),i.vars.controlNav&&!i.manualControls&&("add"===t&&!p||i.pagingCount>i.controlNav.length?h.controlNav.update("add"):("remove"===t&&!p||i.pagingCount<i.controlNav.length)&&(p&&i.currentSlide>i.last&&(i.currentSlide-=1,i.animatingTo-=1),h.controlNav.update("remove",i.last))),i.vars.directionNav&&h.directionNav.update()},i.addSlide=function(t,a){var n=e(t);i.count+=1,i.last=i.count-1,u&&v?void 0!==a?i.slides.eq(i.count-a).after(n):i.container.prepend(n):void 0!==a?i.slides.eq(a).before(n):i.container.append(n),i.update(a,"add"),i.slides=e(i.vars.selector+":not(.clone)",i),i.setup(),i.vars.added(i)},i.removeSlide=function(t){var a=isNaN(t)?i.slides.index(e(t)):t;i.count-=1,i.last=i.count-1,isNaN(t)?e(t,i.slides).remove():u&&v?i.slides.eq(i.last).remove():i.slides.eq(t).remove(),i.doMath(),i.update(a,"remove"),i.slides=e(i.vars.selector+":not(.clone)",i),i.setup(),i.vars.removed(i)},i.editItemWidth=function(e){i.vars.itemWidth=e,h.resize()},h.init()},e(window).blur(function(e){t=!1}).focus(function(e){t=!0}),e.tourmaster_flexslider.defaults={namespace:"tourmaster-flex-",selector:".slides > li",animation:"fade",easing:"swing",direction:"horizontal",reverse:!1,animationLoop:!0,smoothHeight:!1,startAt:0,slideshow:!0,slideshowSpeed:7e3,animationSpeed:600,initDelay:0,randomize:!1,fadeFirstSlide:!0,thumbCaptions:!1,pauseOnAction:!0,pauseOnHover:!1,pauseInvisible:!0,useCSS:!0,touch:!0,video:!1,controlNav:!0,directionNav:!0,prevText:"Previous",nextText:"Next",keyboard:!0,multipleKeyboard:!1,mousewheel:!1,pausePlay:!1,pauseText:"Pause",playText:"Play",controlsContainer:"",manualControls:"",customDirectionNav:"",sync:"",asNavFor:"",itemWidth:0,itemMargin:0,minItems:1,maxItems:0,move:0,allowOneSlide:!0,start:function(){},before:function(){},after:function(){},end:function(){},added:function(){},removed:function(){},init:function(){}},e.fn.tourmaster_flexslider=function(t){if(void 0===t&&(t={}),"object"==typeof t)return this.each(function(){var a=e(this),n=t.selector?t.selector:".slides > li",i=a.find(n);1===i.length&&!0===t.allowOneSlide||0===i.length?(i.fadeIn(400),t.start&&t.start(a)):void 0===a.data("tourmaster_flexslider")&&new e.tourmaster_flexslider(this,t)});var a=e(this).data("tourmaster_flexslider");switch(t){case"play":a.play();break;case"pause":a.pause();break;case"stop":a.stop();break;case"next":a.flexAnimate(a.getTarget("next"),!0);break;case"prev":case"previous":a.flexAnimate(a.getTarget("prev"),!0);break;default:"number"==typeof t&&a.flexAnimate(t,!0)}}}(jQuery);