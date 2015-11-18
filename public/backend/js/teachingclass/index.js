$('.dataTables-teachingclass').dataTable({
    responsive: true,
    "aoColumnDefs": [
        {'bSortable': false, 'aTargets': [6,5]}
    ],
    "dom": 'T<"clear">lfrtip',
    "tableTools": {
        "sSwfPath": "/backend/theme/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
    },
    "bPaginate": false,
     "bInfo" : false
});
