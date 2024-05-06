@extends('backend.layouts.app') 

@section('content')

   <section class="section">
      <div class="row" >

        <div class="col-lg-12">
        @include('layouts._message')
          <div class="card" style="background-color:#B0C4DE">
         
            <div class="card-body"  >
              <h5 class="card-title" style="color:#12372a;">Users:
                <a href="{{url('panel/user/add')}}" class="btn btn-primary" style="float: right; margin-top: -12px;background-color: #002244">Add User</a>
              </h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped" >
                <thead >
                  <tr >
                    <th scope="col" style="background-color: #F0F8FF;">#</th>
                    <th scope="col" style="background-color: #F0F8FF;">Name</th>
                    <th scope="col" style="background-color: #F0F8FF;">Email</th>
                    <th scope="col" style="background-color: #F0F8FF;">Email Verified</th>
                    <th scope="col" style="background-color: #F0F8FF;">Status</th>
                    <th scope="col" style="background-color: #F0F8FF;">Created Date</th>
                    <th scope="col" style="background-color: #F0F8FF;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($getRecord as $value)
                  <tr>
                    <th scope="row" style="background-color: #F0F8FF;">{{$value->id}}</th>
                    <td style="background-color: #F0F8FF;">{{$value->name}}</td>
                    <td style="background-color: #F0F8FF;">{{$value->email}}</td>
                    <td style="background-color: #F0F8FF;">
                      {!! !empty($value->email_verified_at)
                      ? '<i class="bi bi-check" style="color: #12372a; font-size: 1.5rem;"></i>'
                      : '<i class="bi bi-x" style="color: #993e3c; font-size: 1.5rem;"></i>'
                      !!}
                    </td>
                    <td style="background-color: #F0F8FF;">{{!empty($value->status) ? 'Active': 'Inactive'}}</td>
                    <td style="background-color: #F0F8FF;">{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                    <td style="background-color: #F0F8FF;">
                      <a href="{{url('panel/user/edit/'.$value->id)}}" class="btn btn-primary btn-sm" style="background-color: #002244">Edit</a>
                      <a onclick="return confirm('Are you sure that you want to delete this user?');" href="{{url('panel/user/delete/'.$value->id)}}" class="btn btn-primary btn-sm"style="background-color: #2E5090">Delete</a>
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