$(function() {
	// waypoints
	$('.animation').waypoint({
        handler: function(direction) {
            $(this.element).addClass('animated');
            $(this.element).find('.count-to').each(function() {
                if (!$(this).hasClass('count-to-started')) {
                    $(this).addClass('count-to-started');
                    countToStart($(this)); 
                }
            });

        },
        offset: '70%'
    });

    // count to
    function countTo($elem, finalNumber, actualNumber, step, interval)
    {
        setTimeout(function() {
            var number = actualNumber + step;

            if (number > finalNumber) {
                number = finalNumber;
            }

            $elem.html(Math.round(number));

            if (number != finalNumber) {
                countTo($elem, finalNumber, number, step, interval);
            }
        }, interval);
    }

    function countToStart($elem)
    {
        var interval = 20;
        var iterations = parseInt($elem.data('count-duration')) / interval;
        var finalNumber = parseInt($elem.data('count-to'));
        var step = finalNumber / iterations;

        countTo($elem, finalNumber, 0, step, interval);
    }

    // nav
    var autoRemoveHover = false;

    $('.main-nav > ul > li > a').on('mouseover', function() {
        var $li = $(this).parent();

        $('.main-nav > ul > li').each(function() {
            if ($(this) != $li) {
                $(this).removeClass('hover');
            }
        });

        autoRemoveHover = false;

    	$li.addClass('hover');
    });

    $('.main-nav > ul > li > a').on('mouseleave', function() {
    	var $li = $(this).parent();

        autoRemoveHover = true;

    	setTimeout(function() {
            if (autoRemoveHover) {
                $li.removeClass('hover');
            }
    	}, 200);
    });

    $('.sub-nav').on('mouseover', function() {
        var $li = $(this).parent();

        $('.main-nav > ul > li').each(function() {
            if ($(this) != $li) {
                $(this).removeClass('hover');
            }
        });

        autoRemoveHover = false;

        $li.addClass('hover');
    });

    $('.sub-nav').on('mouseleave', function() {
        var $li = $(this).parent();

        autoRemoveHover = true;

        setTimeout(function() {
            if (autoRemoveHover) {
                $li.removeClass('hover');
            }
        }, 200);
    });

    // nav mobile
    $('#header-nav-btn').on('click', function() {
        $('#header-nav').addClass('open');
    });
    $('#header-nav-close').on('click', function() {
        $('#header-nav').removeClass('open');
    });

    // checkbox
    function toggleCheckbox($checkbox)
    {
        var $label = $checkbox.parent().find('.form-check-label');

        if ($checkbox.is(':checked')) {
            $label.addClass('checked');
        }
        else {
            $label.removeClass('checked');
        }
    }

    $('.form-check-input').each(function() {
        toggleCheckbox($(this));
    });

    $('.form-check-input').on('change', function() {
        toggleCheckbox($(this));
    });

    // partners country select
    $('#partners-country-select').on('change', function() {
        $('.partners-list-item').hide();
        $('.partners-tag-' + $(this).val()).show();
    });

    // partners country select
    $('.datepicker').datepicker();

    // features nav
    $('#features-nav-select').on('change', function() {
        var index = $(this).val();

        // reset
        $('#features .features-nav li a').removeClass('active');
        $('#features .features-nav li a').attr('aria-selected', 'false');
        $('#features .features-content .tab-pane').removeClass('active');
        $('#features .features-content .tab-pane').removeClass('show');

        $('#features .features-nav li:nth-child(' + index + ') a').addClass('active');
        $('#features .features-nav li:nth-child(' + index + ') a').attr('aria-selected', 'true');
        $('#features .features-content .tab-pane:nth-child(' + index + ')').addClass('active');
        $('#features .features-content .tab-pane:nth-child(' + index + ')').addClass('show');
    });
    $('#features .features-nav li a').on('click', function() {
        $('#features-nav-select').val($(this).data('tab'));
    });

    // select2 initialization
    $(document).ready(function() {
        var $select2 = $('.select2-form-control').select2();
        $select2.each(function() {
            $(this).data('select2').$container.addClass("form-control");
        });
    });

    // popopver
    $('[data-toggle="popover"]').popover();

    // video modal
    var docYtPlayer = null;

    $('.video-modal-trigger').on('click', function() {
        loadDocumentationModal($(this).data('documentation-id'));
    });

    $('#documentation-modal').on('click', '.video-link', function() {
        loadDocumentationVideo($(this).data('video-id'));
        setActiveVideoLink($(this));
        return false;
    });

    $('#documentation-modal').on('hidden.bs.modal', function() {
        stopDocumentationVideo();
    });

    function loadDocumentationModal(documentationId)
    {
        var documentation = documentationItems[documentationId];

        // set modal title
        $('#documentation-modal .modal-title').html(documentation.title);
        $('#documentation-modal-main-item-title').html(documentation.title);

        // insert main video link
        $('#documentation-modal-main-items ul').html(getVideoLinkHtml(documentation));

        // build related videos list
        $('#documentation-modal-related-items').hide();
        $('#documentation-modal-related-items ul').html('');

        var relatedList = '';

        documentation.relatedItems.forEach(function(item) {
            var relatedDocumentation = documentationItems[item];
            relatedList += getVideoLinkHtml(relatedDocumentation);
        });

        if (relatedList !== '') {
            $('#documentation-modal-related-items ul').html(relatedList);
            $('#documentation-modal-related-items').show();
        }

        loadDocumentationVideo(documentation.video[0]['videoId']);
        setActiveVideoLink($('#documentation-modal-main-items ul li:first-child a'));
    }

    function getVideoLinkHtml(documentation)
    {
        var videoLinks = '';

        documentation.video.forEach(function(item) {
            videoLinks += '<li><a href="#" class="video-link" data-video-id="' + item.videoId + '"><span class="play-icon"></span> ' + item.title + '</a></li>';
        });

        return videoLinks;
    }

    function setActiveVideoLink($link)
    {
        $('#documentation-modal .video-link.active').removeClass('active');

        $link.addClass('active');
    }
    
    function loadDocumentationVideo(video)
    {
        if (docYtPlayer === null) {
            docYtPlayer = new YT.Player('documentation-modal-video', {
                videoId: video,
                playerVars: {
                    color: 'white',
                    autoplay: 1
                },
            });
        }
        else {
            docYtPlayer.loadVideoById(video);
        }
    }

    function stopDocumentationVideo()
    {
        if (docYtPlayer !== null) {
            docYtPlayer.stopVideo();
        }
    }

    // cookie bar
    if (!$.cookie('cookiebar') == 1) {
        $('#cookie-bar').removeClass('hidden');
    }

    $('#cookie-bar button').click(function() {
        $('#cookie-bar').addClass('slide-down');
        
        $.cookie('cookiebar', 1, {expires: 30, path: '/'});

        return false;
    });

    $('.changelog-trigger').on('click', function() {
        $(this).closest('tr').next().find('.changelog').slideToggle();
    });
});

(function(window)
{
    var loader = {};

    loader.show = function(elemId)
    {
        var conf = {
            message: '<i class=\"fa fa-spinner fa-spin\" style=\"font-size: 36px\"></i>',
            //timeout: 2000,
            overlayCSS: {
                backgroundColor: '#fff',
                opacity: 0.8,
                cursor: 'wait'
            },
            css: {
                border: 0,
                color: '#fff',
                padding: 0,
                backgroundColor: 'transparent'
            }
        };

        if (elemId !== undefined) {
            $('#' + elemId).block(conf);
        } else {
            $.blockUI(conf);
        }
    };

    loader.hide = function(elemId)
    {
        if (elemId !== undefined) {
            $('#' + elemId).unblock();
        } else {
            $.unblockUI();
        }
    };

    window.loader = loader;
})(window);

/**
 * Services section
 */
(function(window)
{
    var ServicesSection = {};

    // Set from template
    ServicesSection.updateBillUrl = "";

    // Set from template
    ServicesSection.previewQuoteUrl = "";

    ServicesSection.updateBill = function()
    {
        $.ajax({
            url: ServicesSection.updateBillUrl,
            method: 'POST',
            data: $('#services_form').serialize()
        }).done(function(data) {
            $('#bill_sum').text(data);
        });
    };

    ServicesSection.previewQuote = function()
    {
        $('#preview-quote-modal-content').html('');
        loader.show('preview-quote-modal-content');

        $.ajax({
            url: ServicesSection.previewQuoteUrl,
            method: 'POST',
            data: $('#services_form').serialize()
        }).done(function(data) {
            $('#preview-quote-modal-content').html(data);

            loader.hide('preview-quote-modal-content');
        });
    };

    window.ServicesSection = ServicesSection;
})(window);

/**
 * Location
 */
(function(window)
{
    var Location = {};

    Location.loadStates = function(countryId, elemId, url)
    {
        url += "/" + countryId;
        $.ajax({
            url: url,
            method: 'GET'
        }).done(function(data) {
            $('#' + elemId).empty().select2({
                data: JSON.parse(data)
            }).each(function() {
                $(this).data('select2').$container.addClass("form-control");
            });
        });
    };

    Location.loadCities = function(stateId, elemId, url)
    {
        url += "/" + stateId;
        $.ajax({
            url: url,
            method: 'GET'
        }).done(function(data) {
            $('#' + elemId).empty().select2({
                data: JSON.parse(data)
            }).each(function() {
                $(this).data('select2').$container.addClass("form-control");
            });
        });
    };

    window.Location = Location;
})(window);
