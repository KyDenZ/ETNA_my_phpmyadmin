const BASE_URL = new URL(location).origin + "/ETNA_my_phpmyadmin";

function checkAllInTable() {
    $("#table1 tbody input[type='checkbox']").each(function() {
        $(this).trigger('click');
    });
}

function deleteElement() {
    var idDeleteTables = null;
    var element = null;
    $('input[type=checkbox]:checked').each(function() {
        idDeleteTables = $(this).closest("td").data("id");
        element = $(this).closest("tr");
        if (idDeleteTables) {
            $.ajax({
                url: BASE_URL + "/deleteTable",
                timeout: 4000,
                type: "GET",
                data: "table=" + idDeleteTables + "&bdname=" + $("#dbname").val(),
                success: function(data) {
                    element.remove();
                },
                error: function() {
                    console.log("error");
                }
            });
        }
    });
}

function editElement() {
    var idEditElement = null;
    var element = null;
    $('input[type=checkbox]:checked').each(function() {
        idEditTables = $(this).closest("td").data("id");
        element = $(this).closest("tr");
        console.log($(this));
    });
}

function editField() {
    var idEditElement = null;
    var element = null;
    $('input[type=checkbox]:checked').each(function() {
        idEditTables = $(this).closest("td").data("id");
        $(this).closest("tr").find("td:not(:eq(0)):not(:last-child)").each(function() {
            if ($(this).find("p").length) {
                var val = $(this).find("p").html();
                $(this).find("p").remove();
                $(this).append('<input type="text" value="' + val + '">');
                $(this).css("padding", "0px 4px 0px 4px");
            } else {
                var val = $(this).find("input").val();
                $(this).find("input").remove();
                $(this).append('<p>' + val + '</p>');
                $(this).css("padding", "6px");
            }
        });
    });
}