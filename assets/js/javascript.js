const BASE_URL = new URL(location).origin + "/ETNA_my_phpmyadmin";

function checkAllInTable() {
    $("#table1 tbody input[type='checkbox']").each(function() {
        $(this).trigger('click');
    });
}

function deleteElement() {
    var idDeleteTables = null;
    $('input[type=checkbox]:checked').each(function() {
        idDeleteTables = $(this).closest("td").data("id");
        if (idDeleteTables) {
            $.ajax({
                url: BASE_URL + "/deleteDatabase",
                timeout: 4000,
                data: "table = " + idDeleteTables,
                success: function(data) {
                    console.log("ok");
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