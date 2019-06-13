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

        // insert main video link
        $('#documentation-modal-main-item').html(getVideoLinkHtml(documentation));

        // build related videos list
        $('#documentation-modal-related-items').hide();
        $('#documentation-modal-related-items ul').html('');

        var relatedList = '';

        documentation.relatedItems.forEach(function(item) {
            var relatedDocumentation = documentationItems[item];
            relatedList += '<li>' + getVideoLinkHtml(relatedDocumentation) + '</li>';
        });

        if (relatedList !== '') {
            $('#documentation-modal-related-items ul').html(relatedList);
            $('#documentation-modal-related-items').show();
        }

        loadDocumentationVideo(documentation.video);
        setActiveVideoLink($('#documentation-modal-main-item .video-link'));
    }

    function getVideoLinkHtml(documentation)
    {
        return '<a href="#" class="video-link" data-video-id="' + documentation.video + '"><span class="play-icon"></span> ' + documentation.title + '</a>'
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
                    autoplay: 1,
                    rel: 0
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
});