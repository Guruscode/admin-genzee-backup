@include('dash.head')
@include('dash.nav')
@include('dash.header')

<div class="container">
  <div class="row justify-content-center mt-4">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header bg-info text-white">Add New Gift</div>

              <div class="card-body">
                  <!-- Gift Cost Input -->
                  <form action="{{ route('gifts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                  <div class="form-group">
                      <label for="gift_cost">Gift Cost (In Credits)</label>
                      <input type="number" class="form-control @error('cost') is-invalid @enderror" id="gift_cost" name="cost" value="3">
                      @error('cost')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                  </div>
                
                  <div class="form-group mt-2">
                    <label for="gift_image">Gift Image File</label>
                    <div class="input-group">
                        <div class="custom-file m-3">
                          <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                          @error('image')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                     
                    </div>
                </div>
                
                  <!-- Submit Button -->
                  <button type="submit" class="btn btn-info">Add</button>
                </form>
              </div>
          </div>
      </div>
  </div>
</div>


<div class="container mt-4">
  <h2>Gifts</h2>
  <table class="table">
      <thead>
          <tr>
              <th scope="col">Id</th>
              <th scope="col">Gift Image</th>
              <th scope="col">cost</th>
              <th scope="col">Date</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($gifts as $gift)
          <tr>
              <th scope="row">{{ $gift->id }}</th>
              <td>
                  @if ($gift->image)
                  <img src="{{ asset('storage/' . $gift->image) }}" alt="Sticker Image" style="max-width: 100px;">
                  @else
                  No Image
                  @endif
              </td>
              <td>{{$gift->cost}}</td>
              <td>{{ $gift->created_at->format('Y-m-d H:i:s') }}</td>
              <td>
                  <form action="{{ route('gifts.destroy', $gift->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Remove</button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>

@include('dash.footer')