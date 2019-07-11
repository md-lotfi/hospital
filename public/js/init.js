$(document).ready(function(){
    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');


        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-submenu .show').removeClass("show");
        });
        return false;
    });

    $('#confirmModalSubmit').click(function(){
        $('#formSbm').submit();
    });

    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });

    $('.dynamic').change(function(){
        if($(this).val() != '')
        {
            var select = $(this).attr("id");
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            //var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"/service/router/ajax/call",
                method:"GET",
                data:{select:select, value:value, dependent:dependent},
                success:function(result)
                {
                    //alert(result);
                    $('#'+dependent).html(result);
                },
                error:function(result)
                {
                    console.log(result);
                }

            })
        }
    });

    $('#service').change(function(){
        $('#unite').html('');
        $('#salle').html('');
        $('#lit').html('');
    });

    $('#unite').change(function(){
        $('#salle').html('');
        $('#lit').html('');
    });

    $('#salle').change(function(){
        $('#lit').html('');
    });
});