@extends('backend.layouts.app') 

@section('content')

   <section class="section">
      <div class="row" >

        <div class="col-lg-12">
        @include('layouts._message')
          <div class="card" style="background: url('{{ asset('front/img/lightcolour1.jpg') }}');background-size: cover;">
        
         
            <div class="card-body" style="background: url('{{ asset('front/img/lightcolour.jpg') }}');background-size: cover;"> >
              <h5 class="card-title" style="color: #12372a;">Blogs (Total : {{$getRecord->total()}})
                <a href="{{url('panel/blog/add')}}" class="btn btn-primary" style="float: right; margin-top: -12px;background-color: #002244">Add Blog</a>
              </h5>

              <form class="row" accept="get">
                <div class="col-md-1" style="margin-bottom: 10px" >
                  <label class="form-label">ID</label>
                  <input type="text" name="id" value="{{ Request::get('id') }}" class="form-control" >
                </div>
                @if(Auth::user()->is_admin == 1)

                <div class="col-md-2" style="margin-bottom: 10px">
                  <label class="form-label">Username</label>
                  <input type="text" name="username" value="{{ Request::get('username') }}" class="form-control">
                </div>
                @endif

                <div class="col-md-3" style="margin-bottom: 10px">
                  <label class="form-label">Title</label>
                  <input type="text" name="title" value="{{ Request::get('title') }}" class="form-control">
                </div>
                
                <div class="col-md-2" style="margin-bottom: 10px">
                  <label class="form-label">Category</label>
                  <input type="text" name="category" value="{{ Request::get('category') }}" class="form-control">
                </div>

                <div class="col-md-2" style="margin-bottom: 10px">
                  <label class="form-label">Publish</label>
                  <select class="form-control" name="is_publish">
                    <option value="">Select</option>
                    <option {{ (Request::get('is_publish') == 1) ? 'selected' : '' }} value="1">Yes</option>
                    <option {{ (Request::get('is_publish') == 100) ? 'selected' : '' }} value="100">No</option>
                  </select>
                </div>

                <div class="col-md-2" style="margin-bottom: 10px">
                  <label class="form-label">Status</label>
                  <select class="form-control" name="status">
                    <option value="">Select</option>
                    <option {{ (Request::get('status') == 100) ? 'selected' : '' }} value="100">Active</option>
                    <option {{ (Request::get('status') == 1) ? 'selected' : '' }} value="1">Inactive</option>
                  </select>
                </div>

                <div class="col-md-2" style="margin-bottom: 10px">
                  <label class="form-label">Start Date</label>
                  <input type="date" name="start_date" value="{{ Request::get('start_date') }}" class="form-control">
                </div>

                <div class="col-md-2" style="margin-bottom: 10px">
                  <label class="form-label">End Date</label>
                  <input type="date" name="end_date" value="{{ Request::get('end_date') }}" class="form-control">
                </div>


                <div class="col-md-12" >
                  <button type="submit" class="btn btn-primary"style="background-color: #5072A7;">Search</button>
                  <a href="{{ url('panel/blog/list') }}" class="btn btn-secondary" style="background-color: #6699CC7;">Reset</a>
                </div>
              </form>

              <hr />

              <!-- Table with stripped rows -->
              <table class="table table-striped" >
                <thead >
                  <tr >
                    <th scope="col" style="background: url('{{ asset('front/img/lightcolour1.jpg') }}');background-size: cover;">#</th>
                    <th scope="col" style="background: url('{{ asset('front/img/lightcolour1.jpg') }}');background-size: cover;">Image</th>
                    @if(Auth::user()->is_admin == 1)
                    <th scope="col" style="background-color: #F0F8FF;">Username</th>
                    @endif
                    <th scope="col" style="background: url('{{ asset('front/img/lightcolour1.jpg') }}');background-size: cover;">Title</th>
                    <th scope="col" style="background: url('{{ asset('front/img/lightcolour1.jpg') }}');background-size: cover;">Category</th>
                    <th scope="col" style="background: url('{{ asset('front/img/lightcolour1.jpg') }}');background-size: cover;">Status</th>
                    <th scope="col" style="background: url('{{ asset('front/img/lightcolour1.jpg') }}');background-size: cover;">Publish</th>
                    <th scope="col" style="background: url('{{ asset('front/img/lightcolour1.jpg') }}');background-size: cover;">Created Date</th>
                    <th scope="col" style="background: url('{{ asset('front/img/lightcolour1.jpg') }}');background-size: cover;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($getRecord as $value)
                  <tr>
                    <th scope="row" style="background-color: #F0F8FF;">{{$value->id}}</th>
                    <td style="background-color: #F0F8FF;">
                    @if(!empty($value->getImage()))
                      <img src="{{$value->getImage() }}" alt="" style="height: 100px; width: 100px;">
                    @endif
                    </td>
                    @if(Auth::user()->is_admin == 1)
                    <td style="background-color: #F0F8FF;">{{$value->user_name}}</td>
                    @endif
                    <td style="background-color: #F0F8FF;">{{$value->title}}</td>
                    <td style="background-color: #F0F8FF;">{{$value->category_name}}</td>
                    <td style="background-color: #F0F8FF;">{{ !empty($value->status) ? 'Inactive': 'Active'}}</td>
                    <td style="background-color: #F0F8FF;">
                      {!! !empty($value->is_publish)
                      ? '<i class="bi bi-check" style="color: #12372a; font-size: 1.5rem;"></i>'
                      : '<i class="bi bi-x" style="color: #993e3c; font-size: 1.5rem;"></i>'
                      !!}
                    </td>
                    <td style="background-color: #F0F8FF;">{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                    <td style="background-color: #F0F8FF;">

                    <div style="display: flex; gap: 5px; margin-top: 1rem;">
                        <a href="{{url('panel/blog/edit/'.$value->id)}}" class="btn btn-primary btn-sm" style="background-color:  #5072A7;">Edit</a>
                        <a onclick="return confirm('Are you sure that you want to delete this user?');" href="{{url('panel/blog/delete/'.$value->id)}}" class="btn btn-primary btn-sm" style="background-color: #002244;">Delete</a>
                    </div>

                    </td>
                  </tr>
                  @empty
                    <tr>
                      <td colspan="100%" style="background-color: #F0F8FF;">Record Not Found.</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

              {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}


            </div>
          </div>

        </div>
      </div>
    </section>
    
@endsection