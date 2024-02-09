@extends('admin.layout')


@section('title', 'All Beverages') 
@section('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Beverage</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                  @if(Session::has('login_success'))
                  <div class="alert alert-success" role="alert">
                    {{ Session::get('login_success') }}
                  </div>
                  @endif
                  @if(Session::has('added_success'))
                  <div class="alert alert-success">
                      {{Session::get('added_success')}}
                      @php
                      Session::forget('added_success')
                      @endphp</div>
                  @endif
                  @if(Session::has('deleted_success'))
                  <div class="alert alert-success">
                      {{Session::get('deleted_success')}}
                      @php
                      Session::forget('deleted_success')
                      @endphp</div>
                  @endif
                  @if(Session::has('edited_success'))
                  <div class="alert alert-success">
                      {{Session::get('edited_success')}}
                      @php
                      Session::forget('edited_success')
                      @endphp</div>
                  @endif
                    <h2>List of Beverages</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                      @if(Session::has('admin_error'))
                      <div class="alert alert-danger" role="alert">
                      {{ Session::get('admin_error') }}
                      </div>
                      @endif
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Beverage Image</th>
                          <th>Title</th>
                          <th>Published</th>
                          <th>Special</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>


                      <tbody>

                      @foreach ($beverages as $val)
                        <tr>
                          <td><img src="{{url('../images/'.$val->image)}}" alt="Image"></td>
                          <td> 
                              {{$val->title}}
                          </td>
                          <td>
                          @php
                              if($val->published){
                              echo "Yes";
                              }
                              else{
                              echo "No";
                              }
                          @endphp
                          </td>
                          <td>
                            @php
                              if($val->special){
                              echo "Yes";
                              }
                              else{
                              echo "No";
                              }
                            @endphp
                          </td>
                          <td>
                          <a href="{{route('editBeverage.html', [$val->id])}}"><img src="{{asset('./images/edit.png')}}" alt="Edit"></a>
                          </td>
                          <td>
                            <form action="{{route('beverages-delete', [$val->id])}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <input type="hidden" name="id" value="{{$val->id}}">
                                  <input type="submit" value="Delete">
                            </form>
                          </td>
                        <tr>
                      @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection