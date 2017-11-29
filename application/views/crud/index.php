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
            <th>Action</th>
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
            <input type="hidden" name="id" id="id">
            <div class="form-group">
              <label for="">Enter Your Name</label>
              <input type="text" name="name" autocomplete="off" id="name" class="form-control">
               <div id="invalid-name" class="invalid-feedback">
                </div>
            </div>
            
           
            <div class="form-group">
              
              <label for="">Enter Your Position</label>
              <input type="text" name="position" autocomplete="off" id="position" class="form-control">
              <div id="invalid-pos" class="invalid-feedback">
                
                </div>
            </div>
            
            <div class="form-group">
              
              <label for="">Enter Email</label>
              <input type="text" name="email" autocomplete="off" id="email" class="form-control">
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

<!-- The Modal -->
<div class="modal fade" id="delete-info">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <h5 id="confirmation"></h5>
          <form id="delete-form" method="post">
              <input type="hidden" name="token" id="dtoken">
              <input type="hidden" name="deleteid" id="deleteid">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Yes</button>
          </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

