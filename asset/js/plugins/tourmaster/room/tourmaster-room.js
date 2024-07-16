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

	// Detect Screen
	var tourmaster_display = 'desktop';
	if( typeof(window.matchMedia) == 'function' ){
		$(window).on('load resize', function(){
			if( window.matchMedia('(max-width: 419px)').matches ){
				tourmaster_display = 'mobile-portrait';
			}else if( window.matchMedia('(max-width: 767px)').matches ){
				tourmaster_display = 'mobile-landscape'
			}else if( window.matchMedia('(max-width: 999px)').matches ){
				tourmaster_display = 'tablet'
			}else{
				tourmaster_display = 'desktop';
			}
		});
	}else{
		$(window).on('load resize', function(){
			if( $(window).innerWidth() <= 419 ){
				tourmaster_display = 'mobile-portrait';
			}else if( $(window).innerWidth() <= 767 ){
				tourmaster_display = 'mobile-landscape'
			}else if( $(window).innerWidth() <= 999 ){
				tourmaster_display = 'tablet'
			}else{
				tourmaster_display = 'desktop';
			}
		});
	}	

    function tourmaster_get_form_array_data( object, name, value ){
        var name_match = name.match(/^[A-Za-z\-\_]+/);
        if( name_match ){
            if( typeof(object[name_match[0]]) != 'object' ){
                object[name_match[0]] = {};
            }
            var last_name = name.replace(name_match[0], '');
            object[name_match[0]] = tourmaster_get_form_array_data(object[name_match[0]], last_name, value);
        }else{
            var array_match = name.match(/\[(\d+)\]/);
            if( array_match ){
                if( typeof(object[array_match[1]]) != 'object' ){
                    object[array_match[1]] = {};
                }
                var last_name = name.replace(array_match[1], '');
                object[array_match[1]] = tourmaster_get_form_array_data(object[array_match[1]], last_name, value);
            }else{
                return value;
            }
        }

        return object;
    } 
    function tourmaster_get_form_data( form ){
		var ret = {};

		form.find('input[name], select[name], textarea[name]').each(function(){
			var key = $(this).attr('name');
			var value;

			if( $(this).is('[type="checkbox"]') ){
				var value = $(this).is(':checked')? $(this).val(): 0;
			}else if( $(this).is('[type="radio"]') ){
				if( $(this).is(':checked') ){
					var value = $(this).val();
				}else{
					return;
				}
			}else{
				var value = $(this).val();
			}

			if( (key.lastIndexOf('[]') == (key.length - 2)) ){
				key = key.substr(0, key.length - 2);
				if( typeof(ret[key]) != 'object' ){
					ret[key] = []
				}

				ret[key].push(value);
			}else{
                ret = tourmaster_get_form_array_data(ret, $(this).attr('name'), value);	
				// ret[$(this).attr('name')] = value;
			}
		});	

		return ret;
	}

	// tour booking bar
	function tourmaster_room_booking_ajax( ajax_url, ajax_settings, ajax_data ){

		var ajax_settings = $.extend({
			beforeSend: function( jqXHR, settings ){},
			error: function( jqXHR, textStatus, errorThrown ){

				// print error message for debug purpose
				console.log(jqXHR, textStatus, errorThrown);
			},
			success: function( data ){ 
				// console.log('success', data); 
			}
		}, ajax_settings);

		var ajax_data = $.extend({
			action: '',
		}, ajax_data);

		$.ajax({
			type: 'POST',
			url: ajax_url,
			data: ajax_data,
			dataType: 'json',
			beforeSend: ajax_settings.beforeSend,
			error: ajax_settings.error,
			success: ajax_settings.success
		});
	}   

    // single review
    $.fn.tourmaster_room_single_review = function(){
        var review_section = $(this);
        var review_filter = $(this).find('#tourmaster-single-review-filter');
        var review_content = $(this).find('#tourmaster-single-review-content');

        // bind the filter
        var sort_by = review_filter.find('[data-sort-by]');

        sort_by.click(function(){
            if( $(this).hasClass('tourmaster-active') ) return false;

            $(this).addClass('tourmaster-active').siblings('[data-sort-by]').removeClass('tourmaster-active');
            tourmaster_room_get_review_ajax({
                'action': 'get_single_room_review',
                'room_id': review_content.attr('data-room-id'),
                'sort_by': $(this).attr('data-sort-by'),
            }, review_content);
        });

        review_content.on('click', '[data-paged]', function(){
            tourmaster_room_get_review_ajax({
                'action': 'get_single_room_review',
                'room_id': review_content.attr('data-room-id'),
                'paged': $(this).attr('data-paged'),
                'sort_by': sort_by.filter('.tourmaster-active').attr('data-sort-by'),
            }, review_content, review_section);
        });

    }
    function tourmaster_room_get_review_ajax( ajax_data, content_section, scroll_to = null ){
        content_section.animate({opacity: 0.2}, 200);

        $.ajax({
            type: 'POST',
            url: content_section.attr('data-ajax-url'),
            data: ajax_data,
            dataType: 'json',
            error: function( jqXHR, textStatus, errorThrown ){

                content_section.animate({opacity: 1}, 200);

                // print error message for debug purpose
                console.log(jqXHR, textStatus, errorThrown);
            },
            success: function( data ){

                if( typeof(data.content) != 'undefined' ){
                    var old_height = content_section.outerHeight();
                    content_section.html(data.content);

                    var new_height = content_section.outerHeight();
                    content_section.css({'height': old_height});
                    content_section.animate({height: new_height}, 200 , function(){
                        content_section.css({height: 'auto'});
                    });
                }	

                content_section.animate({opacity: 1}, 200);

                if( scroll_to != null ){
                    $('body, html').animate({'scrollTop': scroll_to.offset().top - 150 });
                }

            }
        });
    }	

    $.fn.tourmaster_room_amount_selection = function(){

        $(this).each(function(){
            var display = $(this).find('.tourmaster-custom-amount-display');
            var option_wrap = $(this).find('.tourmaster-custom-amount-selection-wrap');
            
            var label = $(this).find('.tourmaster-custom-amount-display .tourmaster-tail');
            var items = $(this).find('.tourmaster-custom-amount-selection-item');

            function set_amount_selection_label(){
                label.html('');
                items.each(function(){
                    var amount_input = $(this).find('input');
                    var amount_text = $(this).attr('data-label')? $(this).attr('data-label') + ' ': '';
                    amount_text += amount_input.val();

                    label.append('<span class="tourmaster-space" ></span>');
                    label.append(amount_text);
                });
            }

            items.on('click', '.tourmaster-plus, .tourmaster-minus', function(){
                var amount_item = $(this).closest('.tourmaster-custom-amount-selection-item');
                var amount_text = $(this).siblings('.tourmaster-amount');
                var amount_input = amount_item.find('input');
                var amount = parseInt(amount_input.val());

                if( $(this).hasClass('tourmaster-plus') ){
                    amount_input.val(amount + 1)
                    amount_text.html(amount + 1);
                }else if( $(this).hasClass('tourmaster-minus') ){
                    amount_input.val(amount - 1)
                    amount_text.html(amount - 1);
                }
                amount_input.trigger('change');

                set_amount_selection_label();
            });

            // click display event
            display.on('click', function(){
                display.addClass('tourmaster-active');
                option_wrap.fadeIn(150);
            });

            // close amount box when clicking outside the element
            $(document).on('click', function(e){
                if( !display.hasClass('tourmaster-active') ) return;
                if( $(e.target).closest(display).length ) return;
                if( $(e.target).closest(option_wrap).length ) return;

                display.removeClass('tourmaster-active');
                option_wrap.fadeOut(150);
            });
            
        }); // amount selection

    }

    $(document).ready(function(){

        var body = $('body');
        var login_lb = $('[data-tmlb-id="room-proceed-without-login"]');

        // search filter
        body.on('click', '.tourmaster-room-search-tax-wrap .tourmaster-close-filter', function(){
            var content_fitler = $(this).parent('.tourmaster-label').siblings('.tourmaster-filter');

            if( $(this).hasClass('tourmaster-active') ){
                $(this).removeClass('tourmaster-active');
                content_fitler.slideDown(150);
            }else{
                $(this).addClass('tourmaster-active');
                content_fitler.slideUp(150);
            }
        });

        // initiate cart button
        var cart_button = $('#tourmaster-room-navigation-checkout-button').each(function(){
            var cart_wrap = $(this).closest('.tourmaster-room-navigation-checkout-wrap');
            var cart_items = $(this).siblings('.tourmaster-room-cart-item-wrap');
            var checkout_button = cart_items.find('.tourmaster-checkout-button');

            cart_items.on('click', '.tourmaster-remove', function(){
                var index = $(this).closest('li').index();
                var cart_cookie = tourmaster_read_cookie('tourmaster-room-cart');
                if( cart_cookie != '' ){
                    cart_cookie = JSON.parse(cart_cookie);
                }else{
                    cart_cookie = [];
                }
                cart_cookie.splice(index, 1);
                tourmaster_set_cookie('tourmaster-room-cart', JSON.stringify(cart_cookie), 31536000);

                $(this).closest('li').slideUp(50, function(){ $(this).remove(); });
                if( cart_cookie.length == 0 ){
                    cart_wrap.removeClass('tourmaster-active');
                    cart_button.html(cart_button.attr('data-label') + '<span class="tourmaster-count">0</span>');
                }
            });

            $(this).on('clear', function(){
                cart_wrap.removeClass('tourmaster-active');
                cart_button.html(cart_button.attr('data-label') + '<span class="tourmaster-count">0</span>');
            }); 

            $(this).on('click', function(){
                if( cart_wrap.hasClass('tourmaster-active') ) return false;
            });

            // check if login before proceeding
            if( login_lb.length ){
                checkout_button.on('click', function(){

                    var lb_content = login_lb.clone();

                    // check for social login plugin
                    if( lb_content.find('.nsl-container-block').length > 0 ){
                        lb_content.find('.nsl-container-block').replaceWith(login_lb.find('.nsl-container-block').clone(true));
                    }

                    // change link ot cart link
                    lb_content.find('input[name="redirect_to"]').each(function(){
                        $(this).val($(this).val().replace('type=booking', 'type=cart'));
                    });
                    lb_content.find('.tourmaster-continue-button').each(function(){
                        $(this).attr('href', $(this).attr('href').replace('type=booking', 'type=cart'));
                    });
                    lb_content.find('.tourmaster-register-button').each(function(){
                        $(this).attr('href', $(this).attr('href').replace('redirect=room-payment', 'redirect=room-payment-cart'));
                    });
                    
                    tourmaster_lightbox(lb_content);

                    return false;
                });
            }
        });
        

        // change booking tab
        if( body.hasClass('single-room') ){

            body.find('.tourmaster-room-booking-bar-wrap').each(function(){
                var title_wrap = $(this).find('.tourmaster-room-booking-bar-title');
                var content_wrap = $(this).find('.tourmaster-room-booking-bar-content');
    
                title_wrap.on('click', '[data-room-tab]', function(){
                    var tab_id = $(this).attr('data-room-tab');
                    $(this).addClass('tourmaster-active').siblings().removeClass('tourmaster-active');
    
                    var target_tab = content_wrap.find('[data-room-tab="' + tab_id + '"]');
                    target_tab.siblings().hide().removeClass('tourmaster-active');
                    target_tab.addClass('tourmaster-active').fadeIn(150);
                });
            });

            body.find('#tourmaster-room-booking-form').each(function(){

                // change room amount
                $(this).on('change', 'input[name="room_amount"]', function(){
                    var room_amount = parseInt($(this).val());
                    var guest_selection = $(this).closest('.tourmaster-room-amount-selection').siblings('.tourmaster-room-booking-guest-selection');
                    var current_guest_selection = guest_selection.children().length;

                    if( room_amount == 1 ){
                        guest_selection.addClass('tourmaster-one');
                    }else{
                        guest_selection.removeClass('tourmaster-one');
                    }

                    if( current_guest_selection < room_amount ){
                        for( var i = current_guest_selection + 1; i <= room_amount; i++ ){
                            var template = guest_selection.children().first().clone();
                            template.find('.tourmaster-number').html(i);
                            template.css('display', 'none');
                            guest_selection.append(template);
                            template.slideDown(150);
                            template.tourmaster_room_amount_selection();    
                        }
                    }else{
                        guest_selection.children().each(function(index){
                            console.log(index);
                            if( room_amount < index + 1 ){
                                console.log(1);
                                $(this).slideUp(150, function(){ $(this).remove() });
                            }
                        });
                    }
                    guest_selection.children().each(function(index){
                        
                    });
                    var template = guest_selection.children().first();

                    
                });
                
                var booking_area = $(this).closest('.tourmaster-room-booking-bar-wrap');
                
                // booking summary area
                function bind_booking_bar_summary(content_area, cart_row, form, input_data){
                    content_area.find('.tourmaster-go-back').on('click', function(){
                        content_area.remove();
                        booking_area.fadeIn(150);
                    });

                    content_area.on('click', '.tourmaster-add-to-cart', function(){

                        // set cookie
                        var cart_cookie = tourmaster_read_cookie('tourmaster-room-cart');
                        if( cart_cookie != '' ){
                            cart_cookie = JSON.parse(cart_cookie);
                        }else{
                            cart_cookie = [];
                        }
                        cart_cookie.push(input_data);
                        tourmaster_set_cookie('tourmaster-room-cart', JSON.stringify(cart_cookie), 31536000);
                        
                        var current_time = (new Date()).getTime();
                        tourmaster_set_cookie('tourmaster-room-current-id', '', current_time);

                        // animation
                        $(this).html($(this).attr('data-complete')).addClass('tourmaster-active').css('opacity', 0);
                        $(this).animate({opacity: 1}, {duration: 150});
                        setTimeout(function(){ 
                            content_area.remove();
                            booking_area.fadeIn(150);
                        }, 2000);

                        // add item to cart
                        if( cart_button.length ){
                            var cart_wrap = cart_button.closest('.tourmaster-room-navigation-checkout-wrap');
                            var cart_items = cart_button.siblings('.tourmaster-room-cart-item-wrap');
                            cart_items.find('ul').append(cart_row);
                            cart_wrap.addClass('tourmaster-active');

                            cart_button.find('.tourmaster-count').html(cart_cookie.length);
                            cart_button.html(cart_button.attr('data-checkout-label') + '<span class="tourmaster-count">' + cart_cookie.length + '</span>');
                
                        }
                    });

                    content_area.on('click', '.tourmaster-checkout', function(){
                        tourmaster_set_cookie('tourmaster-room-booking-detail', JSON.stringify(input_data), 31536000);

                        var current_time = (new Date()).getTime();
                        tourmaster_set_cookie('tourmaster-room-current-id', '', current_time);

                        // check if login before proceeding
                        if( login_lb.length ){
                            var lb_content = login_lb.clone();

                            // check for social login plugin
                            if( lb_content.find('.nsl-container-block').length > 0 ){
                                lb_content.find('.nsl-container-block').replaceWith(login_lb.find('.nsl-container-block').clone(true));
                            }

                            tourmaster_lightbox(lb_content);

                            return false;
                        }else{
                            window.location.href = form.attr('action');
                        }
                        
                    });
                }

                // submit input
                $(this).on('click', 'input[type="submit"]', function(){

                    var submit_button = $(this);
                    if( submit_button.hasClass('tourmaster-now-loading') ) return false;
                    submit_button.addClass('tourmaster-now-loading');

                    var error = $(this).siblings('.tourmaster-room-booking-submit-error');
                    error.slideUp(200, function(){ $(this).remove() });

                    var form = $(this).closest('form');
                    var input_data = tourmaster_get_form_data(form);
                    
                    tourmaster_room_booking_ajax(form.attr('data-ajax-url'), {
                        success: function( data ){
                            if( typeof(data) != 'undefined' ){
                                if( data.status == 'success' ){
                                    booking_area.hide();

                                    var content_area = $(data.content).css('display', 'none');
                                    content_area.insertAfter(booking_area);
                                    content_area.fadeIn(150);
                                    bind_booking_bar_summary(content_area, data.cart_row, form, input_data);
                                }else if( data.status == 'failed' ){
                                    var error_message = $('<div class="tourmaster-room-booking-submit-error" ></div>');
                                    error_message.append(data.message);
                                    error_message.css('display', 'none');
                                    error_message.insertBefore(submit_button);
                                    error_message.slideDown(150);

                                    console.log(data);
                                }
                                
                            }

                            submit_button.removeClass('tourmaster-now-loading');
                        }
                    }, {
                        action: form.attr('data-action'),
                        data: input_data
                    });

                    return false;
                });

            });

        }

        // on single room
        if( body.hasClass('single-room')){

            // submit booking form
            $('#tourmaster-enquiry-form').find('input[type="submit"]').click(function(){
                if( $(this).hasClass('tourmaster-now-loading') ){ return false; }

                var form = $(this).closest('form');
                var form_button = $(this);
                var message_box = form.find('.tourmaster-enquiry-form-message').not('.tourmaster-enquiry-term-message');

                var condition_accepted_input = form.find('[name="tourmaster-require-acceptance"]');
                if( condition_accepted_input.length && !condition_accepted_input.is(':checked') ){
                    condition_accepted_input.siblings('.tourmaster-enquiry-form-message').slideDown(150);
                    return false;
                }else{
                    condition_accepted_input.siblings('.tourmaster-enquiry-form-message').slideUp(150);
                }

                var validate = true;
                form.find('input[data-required], select[data-required], textarea[data-required]').each(function(){
                    if( !$(this).val() ){
                        validate = false;
                    }
                });

                if( !validate ){
                    if( form.attr('data-validate-error') ){
                        message_box.removeClass('tourmaster-success').addClass('tourmaster-failed');
                        message_box.html(form.attr('data-validate-error'));
                        message_box.slideDown(300);
                    }
                }else{

                    message_box.slideUp(300);
                    form_button.addClass('tourmaster-now-loading');

                    $.ajax({
                        type: 'POST',
                        url: form.attr('data-ajax-url'),
                        data: { action: form.attr('data-action'), data: tourmaster_get_form_data(form) },
                        dataType: 'json',
                        error: function( jqXHR, textStatus, errorThrown ){
                            // print error message for debug purpose
                            console.log(jqXHR, textStatus, errorThrown);
                        },
                        success: function( data ){
                            if( typeof(grecaptcha) != 'undefined' ){
                                form.find('#g-recaptcha-response').val('gdlr-verfied');
                            }
                            
                            form_button.removeClass('tourmaster-now-loading');

                            if( typeof(data.message) != 'undefined' ){
                                if( data.status == 'success' ){
                                    form.find('input[name], textarea[name], select[name]').not('[name="tour-id"]').val('');
                                    message_box.removeClass('tourmaster-failed').addClass('tourmaster-success');
                                }else{
                                    message_box.removeClass('tourmaster-success').addClass('tourmaster-failed');
                                }

                                message_box.html(data.message);
                                message_box.slideDown(300);
                            }
                            
                        }
                    });
                }

                return false;
            });

            // single review
            $('#tourmaster-room-single-review').tourmaster_room_single_review();
        }
        
        // amount selection
        $('.tourmaster-room-amount-selection').tourmaster_room_amount_selection();

        
        // custom datepicker
        $('.tourmaster-custom-datepicker-wrap').each(function(){

            var dp_wrap = $(this);
            var dp_parent = dp_wrap.closest('.tourmaster-room-date-selection');
            var start_date_wrap = dp_wrap.siblings('.tourmaster-custom-start-date');
            var start_date_input = start_date_wrap.find('[name="start_date"]');
            var start_date_label = start_date_wrap.find('.tourmaster-tail');
            var end_date_wrap = dp_wrap.siblings('.tourmaster-custom-end-date');
            var end_date_input = end_date_wrap.find('[name="end_date"]');
            var end_date_label = end_date_wrap.find('.tourmaster-tail');

            var step = 1;
            var date_format = dp_wrap.attr('data-date-format');

            var start_date = start_date_input.val()? new Date(start_date_input.val() + 'T00:00:00'): '';
            var end_date = end_date_input.val()? new Date(end_date_input.val() + 'T00:00:00'): '';
            if( dp_parent.attr('data-avail-date') ){
                var avail_date = dp_parent.attr('data-avail-date').split(',');
                var min_date = new Date(avail_date[0] + 'T00:00:00');
                var max_date = new Date(avail_date[avail_date.length-1] + 'T00:00:00');
            }else{
                var avail_date = false;
                if( !start_date ){
                    var min_date = new Date(dp_parent.attr('data-current-date') + 'T00:00:00');
                }else{
                    var min_date = start_date;
                }
                var max_date = null;
            }

            var dp_title = $(this).children('.tourmaster-custom-datepicker-title');
            var dp_val;
            if( start_date && end_date ){
                dp_val = {
                    'start_date': $.datepicker.formatDate('yy-mm-dd', start_date),
                    'start_label': $.datepicker.formatDate(date_format, start_date),
                    'end_date': $.datepicker.formatDate('yy-mm-dd', end_date),
                    'end_label': $.datepicker.formatDate(date_format, end_date)
                };
            }else{
                dp_val = {
                    'start_date': '',
                    'start_label': '',
                    'end_date': '',
                    'end_label': ''
                };
            }

            function set_dp_title(){
                dp_title.html(dp_val.start_label + ' - ' + dp_val.end_label);
            }
            function close_dp(){
                dp_parent.removeClass('tourmaster-active');
                dp_wrap.fadeOut(150);
            }
            function set_dp_location(){
                dp_wrap.css({ 'right': '', 'left': '' });
                
                if( dp_parent.is('.tourmaster-vertical, .tourmaster-mobile') ){
                    if( step == 1 ){
                        dp_wrap.css('top', start_date_wrap.outerHeight());
                    }else if( step == 2 ){
                        dp_wrap.css('top', '');
                    }
                }else{
                    dp_wrap.css('top', '');
                }

                // check left position
                if( dp_wrap.offset().left + dp_wrap.outerWidth() > $(window).width() ){
                    dp_wrap.css({ 'right': '0', 'left': 'auto' });
                }
            }

            // initiate calendar
            var next_end_date_avail = true;
            var number_of_months = dp_parent.hasClass('tourmaster-horizontal')? 2: 1;
            var dp = dp_wrap.find('.tourmaster-custom-datepicker-calendar').datepicker({
                numberOfMonths: number_of_months,
                stepMonths: 1,
                minDate: min_date,
                maxDate: max_date,
                defaultDate: start_date,
                changeMonth: true,
                changeYear: true,

                // determine selectable date
                beforeShowDay: function(date){
                    
                    var tmp_date  = date.getFullYear() + '-';
                    tmp_date += ('0' +(date.getMonth() + 1)).slice(-2) + '-';
                    tmp_date += ('0' + date.getDate()).slice(-2);

                    var selectable = true;

                    if( step == 1 ){
                        if( avail_date && avail_date.indexOf(tmp_date) < 0 ){
                            selectable = false;
                        }

                        if( start_date && end_date ){
                            if( date.getTime() == start_date.getTime() ){
                                next_end_date_avail = true;
                                return [selectable, 'tourmaster-start', ''];
                            }else if( date.getTime() == end_date.getTime() ){
                                return [selectable, 'tourmaster-end', ''];
                            }else if( date.getTime() > start_date.getTime() && date.getTime() < end_date.getTime() ){
                                return [selectable, 'tourmaster-interval', ''];
                            }
                        }

                    }else if( step == 2 ){

                        if( !next_end_date_avail ){
                            selectable = false;
                        }
                        if( avail_date && avail_date.indexOf(tmp_date) < 0 ){
                            next_end_date_avail = false;
                        }

                        if( date.getTime() < start_date.getTime() ){
                            return [false, '', ''];
                        }else if( date.getTime() == start_date.getTime() ){
                            next_end_date_avail = true;
                            return [false, 'tourmaster-start', ''];
                        }else if( date.getTime() == end_date.getTime() ){
                            return [selectable, 'tourmaster-end', ''];
                        }else if( date.getTime() > start_date.getTime() && date.getTime() < end_date.getTime() ){
                            return [selectable, 'tourmaster-interval', ''];
                        }

                    }
                    
                    return [selectable, '', ''];
                },

                // for date range
                onSelect: function( dateText, inst ){
                    var selected_date = inst.selectedYear + '-';
                    selected_date += ('0' +(inst.selectedMonth + 1)).slice(-2) + '-';
                    selected_date += ('0' + inst.selectedDay).slice(-2);

                    // start date
                    if( step == 1 ){
                        start_date = new Date(selected_date + 'T00:00:00');
                        dp_val.start_date = $.datepicker.formatDate('yy-mm-dd', start_date)
                        dp_val.start_label = $.datepicker.formatDate(date_format, start_date);
                        start_date_input.val(dp_val.start_date);
                        start_date_label.html(dp_val.start_label);

                        end_date = new Date(start_date.getTime() + 86400000);
                        dp_val.end_date = $.datepicker.formatDate('yy-mm-dd', end_date);
                        dp_val.end_label = $.datepicker.formatDate(date_format, end_date);
                        end_date_input.val(dp_val.end_date);
                        end_date_label.html(dp_val.end_label);

                        step = 2;
                        set_dp_location();
                        
                    // end date
                    }else if( step == 2 ){
                        end_date = new Date(selected_date + 'T00:00:00');
                        dp_val.end_date = $.datepicker.formatDate('yy-mm-dd', end_date);
                        dp_val.end_label = $.datepicker.formatDate(date_format, end_date);
                        end_date_input.val(dp_val.end_date);
                        end_date_label.html(dp_val.end_label);
                            
                        step = 1;

                        if( dp_parent.is('.tourmaster-vertical, .tourmaster-mobile') ){
                            close_dp();
                        }
                    }

                    dp_parent.addClass('tourmaster-selected');
                    dp_parent.attr('data-step', step);
                    set_dp_title();
                },
                
            }); // tourmaster-custom-datepicker-wrap
            set_dp_title();

            // click display event
            dp_wrap.siblings('.tourmaster-custom-start-date').on('click', function(){
                step = 1;
                dp_parent.addClass('tourmaster-active');
                dp_wrap.fadeIn(150);
                dp_parent.attr('data-step', step);
                set_dp_location();

                dp.datepicker('refresh');
            });
            dp_wrap.siblings('.tourmaster-custom-end-date').on('click', function(){
                step = 2;
                dp_parent.addClass('tourmaster-active');
                dp_wrap.fadeIn(150);
                dp_parent.attr('data-step', step);
                set_dp_location();

                dp.datepicker('refresh');
            });

            // close datepicker when clicking outside the element
            dp_wrap.on('click', '.tourmaster-custom-datepicker-close', function(){
                close_dp();
            });
            $(document).on('click', function(e){
                if( !dp_parent.hasClass('tourmaster-active') ) return;
                if( $(e.target).is('.ui-datepicker-prev, .ui-datepicker-next') ) return;
                if( !$(e.target).closest('.tourmaster-custom-start-date, .tourmaster-custom-end-date, .tourmaster-custom-datepicker-wrap').length ){
                    close_dp();
                }
            });

            // resize action
            $(window).on('load resize', function(){
                if( dp_parent.hasClass('tourmaster-horizontal') ){
                    if( tourmaster_mobile || tourmaster_display == 'mobile-landscape' || tourmaster_display == 'mobile-portrait' ){
                        if( !dp_parent.hasClass('tourmaster-mobile') ){
                            dp_parent.addClass('tourmaster-mobile');
                            dp.datepicker('option', 'numberOfMonths', 1);
                        }
                    }else{
                        if( dp_parent.hasClass('tourmaster-mobile') ){
                            dp_parent.removeClass('tourmaster-mobile');
                            dp.datepicker('option', 'numberOfMonths', number_of_months);
                        }
                    }
                }
                
            });
        }); // custom datepicker.

        // payment only page
        $('#tourmaster-room-payment-display-page').each(function(){
            
            var payment_page = $(this);
            
            var step_wrap = $(this).find('.tourmaster-room-payment-step');
            var step3_wrap = payment_page.find('#tourmaster-step3-wrap');
            var step4_wrap = payment_page.find('#tourmaster-step4-wrap');

            var price_sidebar = $(this).find('.tourmaster-room-price-sidebar');
            var pay_full_amount = true;

            function change_step( step ){
                step_wrap.attr('data-step', step);
                step_wrap.children().removeClass('tourmaster-active');
                step_wrap.children().slice(0, step).addClass('tourmaster-active');
            }
            function display_errors(elem, message){
                var error_html = $('<div class="tourmaster-error-message" ></div>').html(message);
                error_html.insertBefore(elem);
                error_html.slideDown(150);
            }
            
            // select type
            price_sidebar.on('click', '.tourmaster-room-pay-type-item', function(){
                var deposit_amount_wrap = $(this).closest('.tourmaster-room-pay-type').siblings('.tourmaster-deposit-amount');
                $(this).addClass('tourmaster-active').siblings().removeClass('tourmaster-active');

                if( $(this).hasClass('tourmaster-deposit') ){
                    pay_full_amount = false;
                    deposit_amount_wrap.slideDown(150);
                }else if( $(this).hasClass('tourmaster-full') ){
                    pay_full_amount = true;
                    deposit_amount_wrap.slideUp(150);
                }
            });

            // pay now
            price_sidebar.on('click', '.tourmaster-pay-now', function(){
                
                $(this).siblings('.tourmaster-error-message').slideUp(150, function(){ $(this).remove(); });

                var term_service = price_sidebar.find('[name="term-and-service"]');
                if( term_service.length ){
                    if( !term_service.is(':checked') ){
                        display_errors($(this), term_service.attr('data-error'));
                        return;
                    }
                }

                var payment_method = $(this).closest('.tourmaster-room-payment-method-wrap').find('.tourmaster-payment-selection').val();

                // pay for the room
                if( $(this).hasClass('tourmaster-now-loading') ) return;
                $(this).addClass('tourmaster-now-loading');

                tourmaster_room_booking_ajax(payment_page.attr('data-ajax-url'), {
                    success: function(data){
                        if( payment_method == 'paypal' && data.payment_content ){
                            body.append(data.payment_content);
                        }else if( data.payment_content ){
                            var content = $('<div class="tourmaster-room-payment-lb" ></div>').html(data.payment_content);
                            tourmaster_lightbox(content);

                            content.on('payment_complete', function(){
                                step3_wrap.hide();
                                step4_wrap.fadeIn(150);
                                change_step(4);

                                var current_time = (new Date()).getTime();
                                tourmaster_set_cookie('tourmaster-room-current-id', '', current_time);

                                $(this).closest('.tourmaster-lightbox-wrapper').trigger('lightbox_close');
                            });
                        }
                        $(this).removeClass('tourmaster-now-loading');
                    }
                }, {
                    action: 'tourmaster_room_payd_now',
                    'tid': payment_page.attr('data-tid'),
                    'pay_full_amount': pay_full_amount,
                    'payment_method': payment_method
                });
            });

            // pay woocommerce
            step3_wrap.on('click', '.tourmaster-pay-woocommerce', function(){
                
                $(this).siblings('.tourmaster-error-message').slideUp(150, function(){ $(this).remove(); });

                var term_service = step3_wrap.find('[name="term-and-service"]');
                if( term_service.length ){
                    if( !term_service.is(':checked') ){
                        display_errors($(this), term_service.attr('data-error'));
                        return;
                    }
                }
                
                // book the room
                if( $(this).hasClass('tourmaster-now-loading') ) return;
                $(this).addClass('tourmaster-now-loading');

                tourmaster_room_booking_ajax(payment_page.attr('data-ajax-url'), {
                    success: function(data){
                        // do something here
                        if( typeof(data.redirect_url) != 'undefined' ){
                            window.location.replace(data.redirect_url);
                        }
                        
                        $(this).removeClass('tourmaster-now-loading');
                    }
                }, {
                    action: 'tourmaster_room_payd_woocommerce',
                    'tid': payment_page.attr('data-tid'),
                });
            });

        });

        // if on room payment page
        $('#tourmaster-room-payment-page').each(function(){
            var payment_page = $(this);
            var step_wrap = $(this).find('.tourmaster-room-payment-step');
            var step2_wrap = payment_page.find('#tourmaster-step2-wrap');
            var step3_wrap = payment_page.find('#tourmaster-step3-wrap');
            var step4_wrap = payment_page.find('#tourmaster-step4-wrap');

            var service_form = payment_page.find('.tourmaster-room-service-form');
            var price_sidebar = $(this).find('.tourmaster-room-price-sidebar-wrap');
            
            var booking_details = JSON.parse(payment_page.attr('data-booking-details'));
            var last_coupon_code = '';
            
            var pay_full_amount = true;

            function change_step( step ){
                step_wrap.attr('data-step', step);
                step_wrap.children().removeClass('tourmaster-active');
                step_wrap.children().slice(0, step).addClass('tourmaster-active');
            }

            // step 2
            // remove booking
            service_form.on('click', '.tourmaster-room-remove-room', function(){
                var i = $(this).attr('data-i');
                var j = $(this).attr('data-j');

                tourmaster_front_confirm_box({
                    head: service_form.attr('data-remove-head'),
                    text: service_form.attr('data-remove-text'),
                    sub: service_form.attr('data-remove-sub'),
                    yes: service_form.attr('data-remove-yes'),
                    no: service_form.attr('data-remove-no'), 
                    success: function(){
                        if( payment_page.attr('data-type') == 'cart' ){
                            var bd = tourmaster_read_cookie('tourmaster-room-cart');
                            bd = JSON.parse(bd);

                            if( parseInt(bd[i]['room_amount']) <= 1 ){
                                bd.splice(i, 1);
                            }else{
                                bd[i]['room_amount'] = parseInt(bd[i]['room_amount']) - 1;
                                bd[i]['adult'].splice(j, 1);
                                bd[i]['children'].splice(j, 1);
                            }

                            tourmaster_set_cookie('tourmaster-room-cart', JSON.stringify(bd), 31536000);
                        }else{
                            tourmaster_set_cookie('tourmaster-room-booking-detail', '', 31536000);
                        }

                        window.location.reload();
                    }
                });

                return false;
            });

            // service selection
            function set_service_input(checkbox, input_box){
                if( checkbox.is(':checked') ){
                    input_box.val(1);
                    if( input_box.is('[type="text"]') ){
                        input_box.prop('disabled', false);
                    }
                }else{
                    input_box.val('');
                    if( input_box.is('[type="text"]') ){
                        input_box.prop('disabled', true);
                    }
                }
            }
            service_form.find('input[type="checkbox"]').each(function(){
                var checkbox = $(this);
                var input_box = $(this).closest('.tourmaster-service').find('input[type="text"], input[type="hidden"]');
                set_service_input(checkbox, input_box);
            });
            service_form.on('change', 'input[type="checkbox"]', function(){
                var checkbox = $(this);
                var input_box = $(this).closest('.tourmaster-service').find('input[type="text"], input[type="hidden"]');
                set_service_input(checkbox, input_box);
            });
            service_form.on('change', tourmaster_debounce(function(){
                var form_data = tourmaster_get_form_data(service_form);

                tourmaster_room_booking_ajax(payment_page.attr('data-ajax-url'), {
                    success: function(data){
                        console.log(data);

                        // update price sidebar
                        if( data.price_sidebar ){
                            var price_sidebar_content = $(data.price_sidebar);
                            price_sidebar_content.find('.tourmaster-room-coupon-code').val(last_coupon_code);
                            price_sidebar.children('.tourmaster-room-price-sidebar').replaceWith(price_sidebar_content);
                        }

                        // update service price
                        if( data.service_prices ){
                            var i = 0, j = 0;
                            service_form.find('.tourmaster-room-price-summary-block').each(function(){
                                $(this).find('.tourmaster-service-total .tourmaster-tail').each(function(){
                                    if( data.service_prices[i][j] ){
                                        $(this).html(data.service_prices[i][j]);
                                    }
                                    j++;
                                });

                                i++; j = 0;
                            });
                        }
                        
                    }
                }, {
                    action: 'tourmaster_room_service_selected',
                    data: { 
                        'services': form_data['service'],
                        'booking_details': booking_details
                    }
                });

            }, 1000));

            // checking coupon
            price_sidebar.on('input change', '.tourmaster-room-coupon-code', tourmaster_debounce(function(e){
                var coupon_input = $(this);
                var coupon_code = coupon_input.val();
                if( coupon_code == last_coupon_code ) return;
                
                last_coupon_code = coupon_code;
                if( coupon_code == '' ) return;

                coupon_input.siblings('.tourmaster-message').fadeOut(100, function(){ $(this).remove(); });

                if( coupon_code ){
                    tourmaster_room_booking_ajax(payment_page.attr('data-ajax-url'), {
                        success: function(data){
                            var message = $('<div class="tourmaster-message" ></div>').html(data.message).css('display', 'none');
                            message.insertAfter(coupon_input);
                            message.fadeIn(100);
                        }
                    }, {
                        action: 'tourmaster_room_check_coupon_code',
                        data: { 'coupon_code': coupon_code }
                    });
                }
			}, 1000));

            // price breakdown
            step2_wrap.on('click', '.tourmaster-price-breakdown-title', function(){
                var content = $(this).find('.tourmaster-room-single-price-breakdown');
                tourmaster_lightbox(content.clone());
            });

            // go to step 3
            price_sidebar.on('click', '.tourmaster-step2-checkout', function(){
                var payment_button = $(this);
                if( payment_button.hasClass('tourmaster-now-loading') ) return;
                payment_button.addClass('tourmaster-now-loading');

                var service_form_data = tourmaster_get_form_data(service_form);
                tourmaster_room_booking_ajax(payment_page.attr('data-ajax-url'), {
                    success: function(data){
                        step2_wrap.hide();
                        step3_wrap.fadeIn(150);
                        step3_wrap.find('.tourmaster-room-sidebar-summary-wrap').html(data.price_sidebar);
                        change_step(3);
                    }
                }, {
                    action: 'tourmaster_room_checkout_step',
                    data: { 
                        'coupon_code': price_sidebar.find('.tourmaster-room-coupon-code').val(),
                        'services': service_form_data['service'],
                        'booking_details': booking_details,
                    }
                });
            });

            // step 3
            var contact_form = step3_wrap.find('.tourmaster-room-contact-detail-wrap');

            function display_errors(elem, message){
                var error_html = $('<div class="tourmaster-error-message" ></div>').html(message);
                error_html.insertBefore(elem);
                error_html.slideDown(150);
            }
            function get_booking_data(){
                var service_form_data = tourmaster_get_form_data(service_form);
                var contact_info = tourmaster_get_form_data(contact_form);
                var required_billing = contact_form.find('.tourmaster-payment-billing-separate').is(':checked');
                
                contact_info['required-billing'] = required_billing;
                
                return { 
                    'coupon_code': price_sidebar.find('.tourmaster-room-coupon-code').val(),
                    'services': service_form_data['service'],
                    'booking_details': booking_details,
                    'contact_info': contact_info
                }
            }
            function validate_contact_form(){

                // validate required fields
                var validate = true;
                var required_billing = contact_form.find('.tourmaster-payment-billing-separate').is(':checked');
                contact_form.find('input[data-required], select[data-required], textarea[data-required]').each(function(){
                    if( !required_billing && $(this).is('[name^="billing_"]') ) return;
                    if( !$(this).val() ){ validate = false; }
                });

                return validate;
            }
            function clear_cart(){
                var current_time = (new Date()).getTime();
                if( payment_page.attr('data-type') == 'cart' ){
                    tourmaster_set_cookie('tourmaster-room-cart', '', current_time);
                }
                tourmaster_set_cookie('tourmaster-room-booking-detail', '', current_time);
                tourmaster_set_cookie('tourmaster-room-current-id', '', current_time);
                cart_button.trigger('clear');
            }
            
            step3_wrap.on('change', '.tourmaster-payment-billing-separate', function(){
                var billing_wrap = $(this).closest('.tourmaster-payment-billing-separate-wrap').siblings('.tourmaster-room-payment-billing-wrap');

                if( $(this).is(':checked') ){
                    billing_wrap.slideDown(300);
                }else{
                    billing_wrap.slideUp(300);
                }
            });

            step3_wrap.on('click', '.tourmaster-room-pay-type-item', function(){
                var deposit_amount_wrap = $(this).closest('.tourmaster-room-pay-type').siblings('.tourmaster-deposit-amount');
                $(this).addClass('tourmaster-active').siblings().removeClass('tourmaster-active');

                if( $(this).hasClass('tourmaster-deposit') ){
                    pay_full_amount = false;
                    deposit_amount_wrap.slideDown(150);
                }else if( $(this).hasClass('tourmaster-full') ){
                    pay_full_amount = true;
                    deposit_amount_wrap.slideUp(150);
                }
            });

            // book and pay later
            step3_wrap.on('click', '.tourmaster-pay-later', function(){
                
                $(this).siblings('.tourmaster-error-message').slideUp(150, function(){ $(this).remove(); });

                var term_service = step3_wrap.find('[name="term-and-service"]');
                if( term_service.length ){
                    if( !term_service.is(':checked') ){
                        display_errors($(this), term_service.attr('data-error'));
                        return;
                    }
                }

                var validate = validate_contact_form();
                if( !validate ){
                    display_errors($(this), step3_wrap.attr('data-required-error'));
                    return false;
                }
                
                // book the room
                if( $(this).hasClass('tourmaster-now-loading') ) return;
                $(this).addClass('tourmaster-now-loading');

                tourmaster_room_booking_ajax(payment_page.attr('data-ajax-url'), {
                    success: function(data){
                        step3_wrap.hide();
                        step4_wrap.fadeIn(150);
                        change_step(4);

                        $(this).removeClass('tourmaster-now-loading');

                        // clear cart
                        clear_cart();
                    }
                }, {
                    action: 'tourmaster_room_pay_later',
                    data: get_booking_data()
                });
            });
            
            // pay now
            step3_wrap.on('click', '.tourmaster-pay-now', function(){

                $(this).siblings('.tourmaster-error-message').slideUp(150, function(){ $(this).remove(); });

                var term_service = step3_wrap.find('[name="term-and-service"]');
                if( term_service.length ){
                    if( !term_service.is(':checked') ){
                        display_errors($(this), term_service.attr('data-error'));
                        return;
                    }
                }

                var validate = validate_contact_form();
                if( !validate ){
                    display_errors($(this), step3_wrap.attr('data-required-error'));
                    return false;
                }

                var payment_method = $(this).closest('.tourmaster-room-payment-method-wrap').find('.tourmaster-payment-selection').val();

                // book the room
                if( $(this).hasClass('tourmaster-now-loading') ) return;
                $(this).addClass('tourmaster-now-loading');

                tourmaster_room_booking_ajax(payment_page.attr('data-ajax-url'), {
                    success: function(data){
                        if( payment_method == 'paypal' && data.payment_content ){
                            body.append(data.payment_content);
                        }else if( data.payment_content ){
                            var content = $('<div class="tourmaster-room-payment-lb" ></div>').html(data.payment_content);
                            tourmaster_lightbox(content);
                            if( typeof(data.order_id) != 'undefined' ){
                                tourmaster_set_cookie('tourmaster-room-current-id', data.order_id, 31536000);
                            }

                            content.on('payment_complete', function(){
                                step3_wrap.hide();
                                step4_wrap.fadeIn(150);
                                change_step(4);

                                $(this).closest('.tourmaster-lightbox-wrapper').trigger('lightbox_close');
                                clear_cart();
                            });
                        }
                        $(this).removeClass('tourmaster-now-loading');
                    }
                }, {
                    action: 'tourmaster_room_pay_now',
                    data: get_booking_data(),
                    'pay_full_amount': pay_full_amount,
                    'payment_method': payment_method
                });
            });

            // pay woocommerce
            step3_wrap.on('click', '.tourmaster-pay-woocommerce', function(){
                
                $(this).siblings('.tourmaster-error-message').slideUp(150, function(){ $(this).remove(); });

                var term_service = step3_wrap.find('[name="term-and-service"]');
                if( term_service.length ){
                    if( !term_service.is(':checked') ){
                        display_errors($(this), term_service.attr('data-error'));
                        return;
                    }
                }

                var validate = validate_contact_form();
                if( !validate ){
                    display_errors($(this), step3_wrap.attr('data-required-error'));
                    return false;
                }
                
                // book the room
                if( $(this).hasClass('tourmaster-now-loading') ) return;
                $(this).addClass('tourmaster-now-loading');

                tourmaster_room_booking_ajax(payment_page.attr('data-ajax-url'), {
                    success: function(data){
                        // do something here
                        if( typeof(data.redirect_url) != 'undefined' ){
                            window.location.replace(data.redirect_url);
                        }
                        
                        $(this).removeClass('tourmaster-now-loading');

                        // clear cart
                        clear_cart();
                    }
                }, {
                    action: 'tourmaster_room_pay_woocommerce',
                    data: get_booking_data()
                });
            });

        });
    });

    $(window).on('load', function(){


    });

})(jQuery);