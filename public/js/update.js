/* 
    Ajax for Update 

    You can improve this code

*/

$(document).ready(function() {
    $(document).on('click','.edit-data',function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var pos = $(this).data('position');
        var email = $(this).data('email');
        var token = $(this).data('token');

        $("#add-info-form").attr('id','update-info-form');
        $("#name").val(name);
        $("#position").val(pos);
        $("#email").val(email);
        $("#id").val(id);
        $("#token").val(token);


        $("#update-info-form").on('submit',function(e) {
            $.ajax({
                url: base_url + "update/information",
                type: "POST",
                data: $(this).serialize(),
                cache: false,
                success: function(data) {
                    var result = JSON.parse(data);
                    var nameError = result.nameErr;
                    var positionError = result.positionErr;
                    var emailError = result.emailErr;
                    
                    if(result.message === "success") {
                        $("#update-info-form").attr('id','add-info-form');
                        $('input:hidden[name="token"]').val(result.token);
                        $('input:hidden[name="id"]').val("");

                        removeClassIsValid('input');
                        removeClassIsInvalid('input');
                        scrollTop();
                        notification('successfully updated your data','success','top','right');
                        
                        $("input:text").val('');
                        $("#users-info").dataTable().fnDestroy();
                        getData();
                        
                    } else {

                        //name
                        if(nameError == "") { 
                            $('input:hidden[name="token"]').val(result.token);
                        
                            removeClassIsInvalid("#name"); 
                            addClassIsValid("#name");
                            $("#invalid-name").html(""); 

                        } else { 
                            $('input:hidden[name="token"]').val(result.token);
                            addClassIsInvalid("#name");
                            $("#invalid-name").html(nameError);

                        }

                        //email
                        if(emailError == "") { 
                           $('input:hidden[name="token"]').val(result.token);
                            removeClassIsInvalid('#email');
                            addClassIsValid("#email");
                            $("#invalid-email").html(""); 
                        
                        } else { 
                            $('input:hidden[name="token"]').val(result.token);
                            addClassIsInvalid("#email");
                            $("#invalid-email").html(emailError); 

                        }

                        //position
                        if(positionError == "") { 
                            $('input:hidden[name="token"]').val(result.token);
                            removeClassIsInvalid("#position");
                            addClassIsValid("#position");
                            $("#invalid-pos").html(""); 

                        } else { 
                            $('input:hidden[name="token"]').val(result.token);
                            addClassIsInvalid("#position");
                            $("#invalid-pos").html(positionError); 

                        } 
                    }
                }
          })
          e.preventDefault();
        });

    })
});