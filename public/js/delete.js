$(document).ready(function() {
    $.ajaxSetup({data: {token: CFG.token}});
    
    $(document).on('click','.delete-data',function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var pos = $(this).data('position');
        var email = $(this).data('email');
        var token = $(this).data('token');

        $("#dtoken").val(token);
        $("#deleteid").val(id);

        $(".modal-title").html('Delete');
        $("#confirmation").html('Want to delete ' +name+' ?');
        $("#delete-info").modal('show');
    });

    $("#delete-form").on('submit',function(e) {
        $.ajax({
            url: base_url + 'delete/information',
            type: "POST",
            data: $(this).serialize(),
            cache: false,
            success: function(data) {
                var result = JSON.parse(data);
                // console.log(result);
                if(result.message === 'success') {
                    $('#dtoken').val(result.token);
                    $('#token').val(result.token);
                    $('#delete-info').modal('hide');
                    $("#users-info").dataTable().fnDestroy();
                    getData();
                    scrollTop();
                    notification('successfully deleted','success','top','right');
                } else {
                    notification('failed to delete','danger','top','right');
                }
            }

        })
        e.preventDefault();
    });
})
