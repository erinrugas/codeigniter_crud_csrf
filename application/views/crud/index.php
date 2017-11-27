<div class="row">
  <div class="col-lg-12 ">
    <h1 >Crud Page</h1>
  </div>
</div>

<div class="row">
  <div class="col-lg-6 ">
      <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Erin Rugas</td>
            <td>Backend Developer</td>
            <td>test@mail.com</td>
          </tr>
        </tbody>
      </table>
  </div>
  <div class="col-lg-6 ">
    <div class="card">
      <div class="card-header">
        Information Section
      </div>
      <div class="card-body">
            <form method="post" id="info-form">

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
        $("#info-form").on('submit',function(e) {

            $.ajax({
                url: base_url + 'information',
                type: "POST",
                data: $("#info-form").serialize(),
                success: function(data) {
                    var result = JSON.parse(data);
                    var nameError = result.nameErr;
                    var positionError = result.positionErr;
                    var emailError = result.emailErr;
                    if(result === 'success') {

                    }else {
                        //name
                        if(nameError == "") { ("#name").removeClass('is-invalid'); ("#name").addClass('is-valid'); $("#invalid-name").html(""); } 
                        else { $("#name").addClass('is-invalid'); $("#invalid-name").html(nameError); } 

                        //email
                        if(emailError == "") { $("#email").removeClass('is-invalid'); $("#email").addClass('is-valid'); $("#invalid-email").html(""); } 
                        else { $("#email").addClass('is-invalid'); $("#invalid-email").html(emailError); }

                        //position
                        if(positionError == "") { $("#position").removeClass('is-invalid'); $("#position").addClass('is-valid'); $("#invalid-pos").html(""); } 
                        else { $("#position").addClass('is-invalid'); $("#invalid-pos").html(positionError); }                        

                    }
                }

            })
          e.preventDefault();
      })
    })

</script>