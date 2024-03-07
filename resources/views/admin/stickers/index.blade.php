@include('dash.head')
@include('dash.nav')
@include('dash.header')


<div class="container">
  <div class="row justify-content-center mt-4">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header bg-info text-white">Add New Sticker
              </div>

              <div class="card-body">
            
                <form action="{{ route('stickers.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @if(session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
                  @endif
                  <div class="form-group mt-2">
                    <label for="gift_image">Sticker Image File</label>
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
  <h2>Stickers</h2>
  <table class="table">
      <thead>
          <tr>
              <th scope="col">Id</th>
              <th scope="col">Sticker Image</th>
              <th scope="col">Date</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($stickers as $sticker)
          <tr>
              <th scope="row">{{ $sticker->id }}</th>
              <td>
                  @if ($sticker->image)
                  <img src="{{ asset('storage/' . $sticker->image) }}" alt="Sticker Image" style="max-width: 100px;">
                  @else
                  No Image
                  @endif
              </td>
              <td>{{ $sticker->created_at->format('Y-m-d H:i:s') }}</td>
              <td>
                  <form action="{{ route('stickers.destroy', $sticker->id) }}" method="POST">
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