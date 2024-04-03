@include('dash.head')
@include('dash.nav')
@include('dash.header')

<div class="container">
  <div class="row justify-content-center mt-4">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header bg-info text-white">Edit User Data</div>


              <form action="{{ route('users.update', $userData['uid']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- First Column -->
                    <div class="col-md-5 m-2">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $userData['name'] }}">
                        </div>
                        <div class="form-group">
                            <label for="about">About</label>
                            <input type="text" class="form-control" name="about" id="about" value="{{ $userData['about'] }}">
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="text" class="form-control" name="age" id="age" value="{{ $userData['age'] }}">
                        </div>
                        <div class="form-group">
                            <label for="alcohol">Alcohol</label>
                            <input type="text" class="form-control" name="alcohol" id="alcohol" value="{{ $userData['alcohol'] }}">
                        </div>
                        <div class="form-group">
                            <label for="balance">Balance</label>
                            <input type="text" class="form-control" name="balance" id="balance" value="{{ $userData['balance'] }}">
                        </div>
                        <div class="form-group">
                            <label for="bodyType">Body Type</label>
                            <input type="text" class="form-control" name="bodyType" id="bodyType" value="{{ $userData['bodyType'] }}">
                        </div>
                        <div class="form-group">
                            <label for="children">Children</label>
                            <input type="text" class="form-control" name="children" id="children" value="{{ $userData['children'] }}">
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" id="city" value="{{ $userData['city'] }}">
                        </div>
                        {{-- <div class="form-group">
                            <label for="chatList">Chat List</label>
                            <input type="text" class="form-control" name="chatList" id="chatList" value="{{ $userData['chatList'] }}">
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" class="form-control" name="company" id="company" value="{{ $userData['company'] }}">
                        </div> --}}
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" name="country" id="country" value="{{ $userData['country'] }}">
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="text" class="form-control" name="dob" id="dob" value="{{ $userData['dob'] }}">
                        </div>
                        {{-- <div class="form-group">
                            <label for="figureType">Figure Type</label>
                            <input type="text" class="form-control" name="figureType" id="figureType" value="{{ $userData['figureType'] }}">
                        </div> --}}
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <input type="text" class="form-control" name="gender" id="gender" value="{{ $userData['gender'] }}">
                        </div>
                        <div class="form-group">
                            <label for="genotype">Genotype</label>
                            <input type="text" class="form-control" name="genotype" id="genotype" value="{{ $userData['genotype'] }}">
                        </div>
                        <div class="form-group">
                            <label for="height">Height</label>
                            <input type="text" class="form-control" name="height" id="height" value="{{ $userData['height'] }}">
                        </div>
                        <div class="form-group">
                            <label for="hideAccount">Hide Account</label>
                            <input type="checkbox" class="form-check-input" name="hideAccount" id="hideAccount" {{ $userData['hideAccount'] ? 'checked' : '' }}>
                        </div>
                    </div>
                    
                    <!-- Second Column -->
                    <div class="col-md-5 m-2">
                        {{-- <div class="form-group">
                            <label for="hobbies">Hobbies</label>
                            <input type="text" class="form-control" name="hobbies" id="hobbies" value="{{ $userData['hobbies'] }}">
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="languages">Languages</label>
                            <input type="text" class="form-control" name="languages" id="languages" value="{{ $userData['languages'] }}">
                        </div> --}}
                        <div class="form-group">
                            <label for="lastOnline">Last Online</label>
                            <input type="text" class="form-control" name="lastOnline" id="lastOnline" value="{{ $userData['lastOnline'] }}">
                        </div>
                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input type="text" class="form-control" name="latitude" id="latitude" value="{{ $userData['latitude'] }}">
                        </div>
                    
                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <input type="text" class="form-control" name="longitude" id="longitude" value="{{ $userData['longitude'] }}">
                        </div>
                        <div class="form-group">
                            <label for="notification">Notification</label>
                            <input type="checkbox" class="form-check-input" name="notification" id="notification" {{ $userData['notification'] ? 'checked' : '' }}>
                        </div>
                        <div class="form-group">
                            <label for="online">Online</label>
                            <input type="checkbox" class="form-check-input" name="online" id="online" {{ $userData['online'] ? 'checked' : '' }}>
                        </div>
                        <div class="form-group">
                            <label for="paid">Paid</label>
                            <input type="checkbox" class="form-check-input" name="paid" id="paid" {{ $userData['paid'] ? 'checked' : '' }}>
                        </div>
                        <div class="form-group">
                            <label for="partnerType">Partner Type</label>
                            <input type="text" class="form-control" name="partnerType" id="partnerType" value="{{ $userData['partnerType'] }}">
                        </div>
                        <div class="form-group">
                            <label for="phoneNumber">Phone Number</label>
                            <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" value="{{ $userData['phoneNumber'] }}">
                        </div>
                        {{-- <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" class="form-control" name="position" id="position" value="{{ $userData['position'] }}">
                        </div> --}}
                        <div class="form-group">
                            <label for="preference">Preference</label>
                            <input type="text" class="form-control" name="preference" id="preference" value="{{ $userData['preference'] }}">
                        </div>
                        {{-- <div class="form-group">
                            <label for="profileImage">Profile Image</label>
                            <input type="text" class="form-control" name="profileImage" id="profileImage" value="{{ $userData['profileImage'] }}">
                        </div> --}}
                     
                        <div class="form-group">
                            <label for="smoking">Smoking</label>
                            <input type="text" class="form-control" name="smoking" id="smoking" value="{{ $userData['smoking'] }}">
                        </div>
                        <div class="form-group">
                            <label for="specialty">Specialty</label>
                            <input type="text" class="form-control" name="specialty" id="specialty" value="{{ $userData['specialty'] }}">
                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="form-control" name="state" id="state" value="{{ $userData['state'] }}">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" name="status" id="status" value="{{ $userData['status'] }}">
                        </div>
                        <div class="form-group">
                            <label for="university">University</label>
                            <input type="text" class="form-control" name="university" id="university" value="{{ $userData['university'] }}">
                        </div>
                        <div class="form-group">
                            <label for="verified">Verified</label>
                            <input type="checkbox" class="form-check-input" name="verified" id="verified" {{ $userData['verified'] ? 'checked' : '' }}>
                        </div>
                        <div class="form-group">
                            <label for="weight">Weight</label>
                            <input type="text" class="form-control" name="weight" id="weight" value="{{ $userData['weight'] }}">
                        </div>
                    </div>
                </div>
                
                <!-- Add more rows and columns for additional fields if needed -->
            
                <button type="submit" class="btn-sm btn-info m-3">Update</button>
            </form>
            
          </div>
        </div>
    </div>
</div>
</div>


@include('dash.footer')