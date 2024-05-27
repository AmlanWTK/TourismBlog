@extends('backend.layouts.app') 

@section('content')

   <section class="section">
      <div class="row" >

        <div class="col-lg-12">
        @include('layouts._message')
          <div class="card"style="background: url('{{ asset('front/img/lightcolour1.jpg') }}');background-size: cover;">
        
         
            <div class="card-body" >
              <h5 class="card-title" style="color: #12372a;">Category:
                <a href="{{url('panel/category/add')}}" class="btn btn-primary" style="float: right; margin-top: -12px;background-color: #002244">Add Category</a>
              </h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped" >
                <thead >
                  <tr >
                    <th scope="col" style="background-color:#F0F8FF ;">#</th>
                    <th scope="col" style="background-color: #F0F8FF;">Name</th>
                    <th scope="col" style="background-color: #F0F8FF;">Slug</th>
                    <th scope="col" style="background-color: #F0F8FF;">Title</th>
                    <th scope="col" style="background-color: #F0F8FF;">Meta Title</th>
                    <th scope="col" style="background-color: #F0F8FF;">Meta Description</th>
                    <th scope="col" style="background-color: #F0F8FF;">Meta Keywords</th>
                    <th scope="col" style="background-color: #F0F8FF;">Menu</th>
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
                    <td style="background-color: #F0F8FF;">{{$value->slug}}</td>
                    <td style="background-color: #F0F8FF;">{{$value->title}}</td>
                    <td style="background-color: #F0F8FF;">{{$value->meta_title}}</td>
                    <td style="background-color: #F0F8FF;">{{$value->meta_description}}</td>
                    <td style="background-color: #F0F8FF;">{{$value->meta_keywords}}</td>
                    <td style="background-color: #F0F8FF;">
                      {!! !empty($value->is_menu)
                      ? '<i class="bi bi-check" style="color: #12372a; font-size: 1.5rem;"></i>'
                      : '<i class="bi bi-x" style="color: #993e3c; font-size: 1.5rem;"></i>'
                      !!}
                    </td>
                    <td style="background-color: #F0F8FF;">{{ !empty($value->status) ? 'Inactive': 'Active'}}</td>
                    <td style="background-color: #F0F8FF;">{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                    <td style="background-color: #F0F8FF;">
                    <div style="display: flex; gap: 5px;">
                       <a href="{{url('panel/category/edit/'.$value->id)}}" class="btn btn-primary btn-sm" style="background-color:#002244;">Edit</a>
                          <a onclick="return confirm('Are you sure that you want to delete this user?');" href="{{url('panel/category/delete/'.$value->id)}}" class="btn btn-primary btn-sm" style="background-color: #002244;">Delete</a>
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