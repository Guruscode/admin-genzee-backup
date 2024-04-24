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
              <div class="row m-4">
                <!-- First Column -->
                <div class="col-md-5 m-2">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $userData['name'] }}">
                    </div>
                    <div class="form-group  m-2">
                        <label for="about">About</label>
                        <input type="text" class="form-control" name="about" id="about" value="{{ $userData['about'] }}">
                    </div>
                    <div class="form-group  m-2">
                        <label for="age">Age</label>
                        <input type="text" class="form-control" name="age" id="age" value="{{ $userData['age'] }}">
                    </div>
                  
                
                    <div class="form-group  m-2">
                        <label for="children">Children</label>
                        <input type="text" class="form-control" name="children" id="children" value="{{ $userData['children'] }}">
                    </div>
                    <div class="form-group  m-2">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" id="city" value="{{ $userData['city'] }}">
                    </div>
                   
                    <div class="form-group  m-2">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" name="country" id="country" value="{{ $userData['country'] }}">
                    </div>
                    <div class="form-group  m-2">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $userData['email'] }}">
                    </div>
                    <div class="form-group  m-2">
                        <label for="dob">Date of Birth</label>
                        <input type="text" class="form-control" name="dob" id="dob" value="{{ $userData['dob'] }}">
                    </div>
                  
                    <div class="form-group m-2">
                        <label for="gender">Gender</label>
                        <select class="form-select" name="gender" id="gender">
                            <option value="male" {{ $userData['gender'] == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $userData['gender'] == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    
                    <div class="form-group  m-2">
                        <label for="genotype">Genotype</label>
                        <input type="text" class="form-control" name="genotype" id="genotype" value="{{ $userData['genotype'] }}">
                    </div>
                    <div class="form-group  m-2">
                        <label for="height">Height</label>
                        <input type="text" class="form-control" name="height" id="height" value="{{ $userData['height'] }}">
                    </div>
                    <div class="form-group m-2">
                        <label for="hideAccount">Hide Account</label>
                        <select class="form-select" name="hideAccount" id="hideAccount">
                            <option value="true" {{ $userData['hideAccount'] ? 'selected' : '' }}>Yes</option>
                            <option value="false" {{ !$userData['hideAccount'] ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    
                </div>
                
                <!-- Second Column -->
                <div class="col-md-5 m-2">
                  
                  
                    <div class="form-group  m-2">
                        <label for="lastOnline">Last Online</label>
                        <input type="text" class="form-control" name="lastOnline" id="lastOnline" value="{{ $userData['lastOnline'] }}">
                    </div>
                    <div class="form-group  m-2">
                        <label for="latitude">Latitude</label>
                        <input type="text" class="form-control" name="latitude" id="latitude" value="{{ $userData['latitude'] }}">
                    </div>
                
                    <div class="form-group  m-2">
                        <label for="longitude">Longitude</label>
                        <input type="text" class="form-control" name="longitude" id="longitude" value="{{ $userData['longitude'] }}">
                    </div>
               
                    <div class="form-group m-2">
                        <label for="online">Online</label>
                        <select class="form-select" name="online" id="online">
                            <option value="true" {{ $userData['online'] ? 'selected' : '' }}>Yes</option>
                            <option value="false" {{ !$userData['online'] ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    
                    <div class="form-group m-2">
                        <label for="paid">Payment status ~ Yes = Odogwu-Classy | No = Trenches</label>
                        <select class="form-select" name="paid" id="paid">
                            <option value="true" {{ $userData['paid'] ? 'selected' : '' }}>Yes</option>
                            <option value="false" {{ !$userData['paid'] ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    
                
                    <div class="form-group  m-2">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" value="{{ $userData['phoneNumber'] }}">
                    </div>
                    
                    <div class="form-group  m-2">
                        <label for="preference">Preference</label>
                        <input type="text" class="form-control" name="preference" id="preference" value="{{ $userData['preference'] }}">
                    </div>
                   
                 

                    <div class="form-group  m-2">
                        <label for="state">State</label>
                        <input type="text" class="form-control" name="state" id="state" value="{{ $userData['state'] }}">
                    </div>
                    <div class="form-group  m-2">
                        <label for="status">Relationship Status</label>
                        <input type="text" class="form-control" name="status" id="status" value="{{ $userData['status'] }}">
                    </div>
                    <div class="form-group  m-2">
                        <label for="university">University</label>
                        <input type="text" class="form-control" name="university" id="university" value="{{ $userData['university'] }}">
                    </div>
                    <div class="form-group m-2">
                        <label for="verified">Verified</label>
                        <select class="form-select" name="verified" id="verified">
                            <option value="true" {{ $userData['verified'] ? 'selected' : '' }}>Yes</option>
                            <option value="false" {{ !$userData['verified'] ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    
                    <div class="form-group  m-2">
                        <label for="weight">Weight</label>
                        <input type="text" class="form-control" name="weight" id="weight" value="{{ $userData['weight'] }}">
                    </div>
                </div>
            </div>
            
          
              <button  type="submit" class="btn-sm btn-info m-3">Update </button>
            </form>
          </div>
        </div>
    </div>
</div>
</div>


@include('dash.footer')