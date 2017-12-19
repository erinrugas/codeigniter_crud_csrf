/* 
    Ajax for Create 

    You can improve this code

*/
$(function() {
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
    })
})
