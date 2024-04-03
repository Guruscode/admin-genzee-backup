@include('dash.head')
@include('dash.nav')
@include('dash.header')

<div class="container">
  <div class="row justify-content-center mt-4">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header bg-info text-white">Edit User Data</div>


            <form action="{{ route('verifield.update', $userData['uid']) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="row">
                  <!-- First Column -->
                  <div class="col-md-5 m-2">
                      <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" name="name" id="name" value="{{ $userData['name'] }}">
                      </div>
          
                      <!-- Add more input fields for the first column -->
                  </div>
                  
                  <!-- Second Column -->
                  <div class="col-md-5 m-2">
                      <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" name="email" id="email" value="{{ $userData['email'] }}">
                      </div>
                      <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" class="form-control" name="age" id="age" value="{{ $userData['age'] }}">
                    </div>
                    
                      <!-- Add more input fields for the second column -->
                  </div>
                     
              </div>
              
              <!-- Add more rows and columns for additional fields if needed -->

              <button  type="submit" class="btn-sm btn-info m-3">Update </button>
            </form>
          </div>
        </div>
    </div>
</div>
</div>


@include('dash.footer')