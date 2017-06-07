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
    alert('edit');
}