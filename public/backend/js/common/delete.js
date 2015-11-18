function confirmDelete(e) {
    $('#modal-delete').modal('show');
    $('#btn-delete-ok').click(function () {
        window.location.href=$(e).attr('url');
    });
}