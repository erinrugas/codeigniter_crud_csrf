<div class="row">
  <div class="col-lg-12 ">
    <h1 >Crud Page</h1>
  </div>
</div>

<div class="row">
  <div class="col-lg-6 ">
      <table id="users-info" class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Email</th>
          </tr>
        </thead>
        
      </table>
  </div>
  <div class="col-lg-6 ">
    <div class="card">
      <div class="card-header">
        Information Section
      </div>
      <div class="card-body">
            <form method="post" id="add-info-form">
            <input type="hidden" id="token" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash(); ?>" >
            <div class="form-group">
              <label for="">Enter Your Name</label>
              <input type="text" name="name" id="name" class="form-control">
               <div id="invalid-name" class="invalid-feedback">
                </div>
            </div>
            
           
            <div class="form-group">
              
              <label for="">Enter Your Position</label>
              <input type="text" name="position" id="position" class="form-control">
              <div id="invalid-pos" class="invalid-feedback">
                
                </div>
            </div>
            
            <div class="form-group">
              
              <label for="">Enter Email</label>
              <input type="text" name="email" id="email" class="form-control">
              <div id="invalid-email" class="invalid-feedback">
                </div>
            </div>
            
            <div class="form-group ">
              <button class="btn btn-primary " type="submit">Submit</button>
            </div>
          </form>
      </div>
    </div>
      
  </div>
</div>

<script>
    

    $(document).ready(function() {
        $.ajaxSetup({data: {token: CFG.token}});
        $("#add-info-form").on('submit',function(e) {

            $.ajax({
                url: CFG.url + 'information',
                type: "POST",
                data: $(this).serialize(),
                cache: false,
                async: false,
                success: function(data) {
                    var result = JSON.parse(data);
                    var nameError = result.nameErr;
                    var positionError = result.positionErr;
                    var emailError = result.emailErr;
                    
                    if(result.message === "success") {
                       // $.ajaxSetup({data: {token: CFG.token}});
                        $('input:hidden[name="token"]').val(result.token);
                        removeClassIsValid('input');
                        removeClassIsInvalid('input');
                        scrollTop();
                        notification('successfully added your data','success','top','right');
                     
                        $("input").val('');
                        // $("#users-info").dataTable().fnDestroy();
                        // getData();
                        
                    }else {
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

</script>