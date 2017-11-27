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
            <form action="index_submit" method="get" accept-charset="utf-8">
            <div class="form-group">
              <label for="">Enter Your Name</label>
              <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
              
              <label for="">Enter Your Position</label>
              <input type="text" name="position" class="form-control">
            </div>
            <div class="form-group">
              
              <label for="">Enter Email</label>
              <input type="text" name="email" class="form-control">
            </div>
            
            <div class="form-group ">
              <button class="btn btn-primary " type="submit">Submit</button>
            </div>
          </form>
      </div>
    </div>
      
  </div>
</div>