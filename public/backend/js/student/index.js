$('.dataTables-student').dataTable({
    responsive: true,
    "aoColumnDefs": [
        {'bSortable': false, 'aTargets': [8,9]}
    ],
    "dom": 'T<"clear">lfrtip',
    "tableTools": {
        "sSwfPath": "/backend/theme/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
    },
    "bPaginate": false,
     "bInfo" : false
});