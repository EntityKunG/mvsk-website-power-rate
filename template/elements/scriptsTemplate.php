<?php
namespace template\elements;
?>
<script type="text/javascript">
    // Tooltips Initialization
    $(document).ready(function () {
        $('.mdb-select').materialSelect();
        $('[data-toggle="tooltip"]').tooltip();
        $('.btn-floating').unbind('click');
        $('.fixed-action-btn').unbind('click');
    });

    if ($(document.body).height() < $(window).height()) {
        $('#footer').attr('style', 'position: fixed!important; bottom: 0px;');
    } else {
        $('#footer').removeAttr('style');
    }

    $(window).on('resize', function() {
        if ($(document.body).height() < $(window).height()) {
            $('#footer').attr('style', 'position: fixed!important; bottom: 0px;');
        } else {
            $('#footer').removeAttr('style');
        }
    });

    $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
    });

    $('.carouselCourse').on('slide.bs.carousel', function(e) {
        $('#pNormalCollapse').collapse('hide');
        $('#pJEMSCollapse').collapse('hide');
        $('#sNormalCollapse').collapse('hide');
        $('#sSEMSCollapse').collapse('hide');
        $('#sSCiUSCollapse').collapse('hide');
    });

    $('.carouselsmoothanimated').on('slide.bs.carousel', function(e) {
        $(this).find('.carousel-inner').animate({
            height: $(e.relatedTarget).height()
        }, 500);
    });

    $('input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=number], input[type=search], input[type=date], input[type=time], textarea').each(function (element, i) {
        if ((element.value !== undefined && element.value.length > 0) || $(this).attr('placeholder') !== undefined) {
            $(this).siblings('label').addClass('active');
        } else {
            $(this).siblings('label').removeClass('active');
        }});
    $('input[type=email]').val('test').siblings('label').addClass('active');
</script>