@extends('admin.layout')


@section('title', 'All Users')  <!--no end section since <title></title>-->
@section('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage <small>Users</small></h3>
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
                    <h2>List of Users</h2>
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
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Delete</th>
                          <th>Edit</th>
                        </tr>
                      </thead>


                      <tbody>
                      @foreach ($users as $val)
                      <?php
                      #$name = "Tony Adam";
                      #$email = "tony@gmail.com";
                      #$active = "Yes";
                      #for($i=0; $i<=5; $i++){
                      ?>
                        <tr>
                        <td> 
                            {{$val->fullname}}
                        </td>
                        <td>
                            {{$val->email}}
                        </td>
                        <td>
                            <a href="/users-delete/{{$val->id}}" style="color:blue">Delete</a>
                        </td>
                          <td><a href="{{route('editUser.html')}}"><img src="{{asset('./images/edit.png')}}" alt="Edit"></a></td>
                        </tr>
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
