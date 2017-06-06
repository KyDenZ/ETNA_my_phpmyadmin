function checkAllInTable() {
    $("#table1 tbody input[type='checkbox']").each(function() {
        $(this).trigger('click');
    });
}

function deleteElement() {
    alert('delete');
}

function editElement() {
    alert('edit');
}