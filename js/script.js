/**
 * Created on 19/12/2015.
 */

jQuery(document).ready(function($) {
    $("#form").children().change(function(event) {
        var filters = $("#form").serialize();
        $.post(
            "layout/ajax.php",
            {action: 'filtrer', filters: filters},
            function(data) {
                $("#onaffiche").html(data).show();
            }
        );
    });
});
