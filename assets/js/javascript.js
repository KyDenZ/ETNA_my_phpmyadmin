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
        idDeleteTables = $(this).closest("tr").find('td:eq(1) a').html();
        element = $(this).closest("tr");
        if (idDeleteTables) {
            $.ajax({
                url: BASE_URL + "/deleteTable",
                timeout: 4000,
                type: "GET",
                data: "table=" + idDeleteTables + "&dbname=" + $("#dbname").val(),
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
        $(this).closest("tr").find("td:not(:eq(0), :eq(3)):not(:last-child)").each(function() {
            console.log($(this));
            if ($(this).find("p").length) {
                var val = $(this).find("p").html();
                $(this).find("p").remove();
                $(this).append('<input type="text" value="' + val + '">');
                $(this).css("padding", "0px");
                $("#edit").hide();
                $("#check").show();
            } else {
                var val = $(this).find("input").val();
                $(this).find("input").remove();
                $(this).append('<p>' + val + '</p>');
                $(this).css("padding", "6px");
                $("#edit").show();
                $("#check").hide();
            }
        });
    });
}

function editField() {
    $('input[type=checkbox]:checked').each(function() {
        $(this).closest("tr").find("td:not(:eq(0), :eq(3)):not(:last-child)").each(function() {
            if ($(this).find("p").length) {
                var val = $(this).find("p").html();
                $(this).find("p").remove();
                $(this).append('<input type="text" value="' + val + '">');
                $(this).css("padding", "0px");
                $("#edit").hide();
                $("#check").show();
            } else {
                var val = $(this).find("input").val();
                $(this).find("input").remove();
                $(this).append('<p>' + val + '</p>');
                $(this).css("padding", "6px");
                $("#edit").show();
                $("#check").hide();
            }
        });
    });
    if ($("#edit").is(":visible"))
        valideField();
}

function valideField() {
    var dbname = $("#bdd_name").val();
    $('tbody input[type=checkbox]:checked').each(function() {
        var data = {
            "oldName": $(this).closest("tr").find("td").data("id"),
            "field": $(this).closest("tr").find('td:eq(1) p').html(),
            "dbname": dbname,
            "type": $(this).closest("tr").find('td:eq(2) p').html(),
            "isNull": $(this).closest("tr").find('td:eq(4) p').html(),
            "defineDefault": $(this).closest("tr").find('td:eq(5) p').html(),
            "tableName": $("#table_name").val()
        };
        idEditTable = $(this).closest("td").find('td:eq(1)');
        element = $(this).closest("tr");
        if (idEditTable) {
            $.ajax({
                url: BASE_URL + "/editTable",
                timeout: 4000,
                type: "POST",
                dataType: "json",
                data: data,
                success: function(data) {
                    $(this).closest("tr").find('td:eq(1) p').html()
                },
                error: function() {
                    console.log("error");
                }
            });
        }
    });
}

function sqlRequest() {
    var sql = $("#requestSQL").val();
    console.log(sql);
    if (sql) {
        $.ajax({
            url: BASE_URL + "/sql",
            timeout: 4000,
            type: "POST",
            dataType: "json",
            data: { "requestSQL": sql },
            success: function(data) {
                $("#rslt-sql").html(data);
            },
            error: function() {
                console.log("error");
            }
        });
    }
}