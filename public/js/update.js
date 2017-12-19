/* 
    Ajax for Update 

    You can improve this code

*/

$(function() {

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
                        $('input:hidden[name="token"]').val(result.token);
                        if(nameError == "") { 
                        
                            removeClassIsInvalid("#name"); 
                            addClassIsValid("#name");
                            $("#invalid-name").html(""); 

                        } else { 

                            addClassIsInvalid("#name");
                            $("#invalid-name").html(nameError);

                        }

                        //email
                        if(emailError == "") { 

                            removeClassIsInvalid('#email');
                            addClassIsValid("#email");
                            $("#invalid-email").html(""); 
                        
                        } else { 

                            addClassIsInvalid("#email");
                            $("#invalid-email").html(emailError); 

                        }

                        //position
                        if(positionError == "") { 

                            removeClassIsInvalid("#position");
                            addClassIsValid("#position");
                            $("#invalid-pos").html(""); 

                        } else { 
                            
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