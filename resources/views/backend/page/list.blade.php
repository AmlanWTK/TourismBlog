@extends('backend.layouts.app') 

@section('content')

   <section class="section">
      <div class="row" >

        <div class="col-lg-12">
        @include('layouts._message')
          <div class="card" style="background-color:#B0C4DE;">
         
            <div class="card-body" >
              <h5 class="card-title" style="color: #002244;">Pages
                <a href="{{url('panel/page/add')}}" class="btn btn-primary" style="float: right; margin-top: -12px;background-color: #002244">Add Blog</a>
              </h5>

              

              <!-- Table with stripped rows -->
              <table class="table table-striped" >
                <thead >
                  <tr >
                    <th scope="col" style="background-color: #F0F8FF;">#</th>
                    <th scope="col" style="background-color: #F0F8FF;">Slug</th>
                    <th scope="col" style="background-color: #F0F8FF;">Title</th>
                    <th scope="col" style="background-color: #F0F8FF;">Meta Title</th>
                     <th scope="col" style="background-color: #F0F8FF;">Created Date</th>
                    <th scope="col" style="background-color: #F0F8FF;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($getRecord as $value)
                  <tr>
                    <th scope="row" style="background-color: #F0F8FF;">{{$value->id}}</th>
                
                    <td style="background-color: #F0F8FF;">{{$value->slug}}</td>
                    <td style="background-color: #F0F8FF;">{{$value->title}}</td>
                    <td style="background-color: #F0F8FF;">{{$value->meta_title}}</td>
                    <td style="background-color: #F0F8FF;">{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                    <td style="background-color: #F0F8FF;">
                      <a href="{{url('panel/page/edit/'.$value->id)}}" class="btn btn-primary btn-sm" style="background-color: #002244;">Edit</a>
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

             
            </div>
          </div>

        </div>
      </div>
    </section>
    
@endsection