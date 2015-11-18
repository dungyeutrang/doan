/* global urlChangePriod, urlAddClass, urlAddMultiClass */

$('.dataTables-studentlearning').dataTable({
    responsive: true,
    "aoColumnDefs": [
        {'bSortable': false, 'aTargets': [5,6,7]}
    ],
    "dom": 'T<"clear">lfrtip',
    "tableTools": {
        "sSwfPath": "/backend/theme/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
    },
    "bPaginate": false,
     "bInfo" : false
});

var token = $('input[name="_token"]').val();
$(function () {
    $('#priod_id_one').change(function () {
        valSelected = $('#priod_id_one option:selected').val();
        $.ajax({
            url: urlChangePriod,
            type: 'POST',
            data: {_token: token, id: valSelected},
            success: function (data) {
                $('#select-class-one').empty();
                $('#select-class-one').append(data);
            }
        });
    });

    $('#priod_id_multi').change(function () {
        valSelected = $('#priod_id_multi option:selected').val();
        $.ajax({
            url: urlChangePriod,
            type: 'POST',
            data: {_token: token, id: valSelected},
            success: function (data) {
                $('#select-class-multi').empty();
                $('#select-class-multi').append(data);
            }
        });
    });



});
function addNewClass(e) {
    $('#modal-add-one').modal('show');
    $('#btn-select-one').click(function () {
        var studentId = $(e).attr('studentId');
        var classId = $('#select-class-one option:selected').val();
        var priodId = $('#priod_id_one option:selected').val();
        $.ajax({
            url: urlAddClass,
            type: 'POST',
            data: {_token: token, studentId: studentId, classId: classId, priodId: priodId},
            success: function (data, textStatus, jqXHR) {
                location.reload();
            }, error: function (jqXHR, textStatus, errorThrown) {
                alert("add class error ! Please try again");
            },
            dataType: 'json'
        });
    });
}

function addMultiClass() {
    var numbercheck =0;
    var students=[];
    $('.check_add_student_class').each(function(index,e){        
       if($(e).is(':checked')){
           numbercheck++;
           students.push($(e).attr('studentId'));
       }
    });
    if(numbercheck===0){
        alert("Bạn phải chọn sinh viên muốn thêm lớp");
        return ;
    }    
    $('#modal-add-multi').modal('show');
    $('#btn-select-multi').click(function () {        
        var classId = $('#select-class-multi option:selected').val();
        var priodId = $('#priod_id_multi option:selected').val();
        $.ajax({
            url: urlAddMultiClass,
            type: 'POST',
            data: {_token: token, students: students, classId: classId, priodId: priodId},
            success: function (data, textStatus, jqXHR) {
                location.reload();
            }, error: function (jqXHR, textStatus, errorThrown) {
                alert("add class error ! Please try again");
            },
            dataType: 'json'
        });
        
    });
}