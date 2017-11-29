$(document).ready(function() {
    $(document).on('submit','#add-info-form',function(e) {
        $.ajax({
            url: base_url + 'information',
            type: "POST",
            data: $(this).serialize(),
            cache: false,
            success: function(data) {
                var result = JSON.parse(data);
                var nameError = result.nameErr;
                var positionError = result.positionErr;
                var emailError = result.emailErr;
                    
                if(result.message === "success") {
                    $('input:hidden[name="token"]').val(result.token);
                    removeClassIsValid('input');
                    removeClassIsInvalid('input');
                    scrollTop();
                    notification('successfully added your data','success','top','right');
                        
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
    })
})
