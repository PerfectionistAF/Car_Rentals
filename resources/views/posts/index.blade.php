@extends('admin.layout')
@section('title', 'All Posts')
@section('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage <small>Posts</small></h3>
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
                    <h2>List of Posts</h2>
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
                        <th>User ID</th>
                        <th>Post Title</th>
                        <th>Post Content</th>
                        <th>Post Date</th>
                        <th>Edit</th>
                        <th>Show User</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                        <tbody>
                    @foreach ($posts as $val)
                    
                    <tr>
                        <td>{{$val->user_id}}</td>
                        <td>{{$val->post_title}}</td>
                        <td>{{$val->post_content}}</td>
                        <td>{{$val->post_date}}</td>
                        <td>
                            <a href="/posts-edit/{{$val->id}}">
                                <img src="{{asset('./images/edit.png')}}" alt="Edit">
                            </a>
                        </td>
                        <td>
                            <a href="/posts_user/{{$val->id}}" style="color:blue">Show User</a>
                        </td>
                        <td><a href="/posts-delete/{{$val->id}}">
                                <img src="{{asset('./images/delete.png')}}" alt="Delete">
                            </a>
                        </td>
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
        <!--<a href="{{route('posts-create')}}"><button style="margin: 10px;"><h2 style="color:red">    ADD POST</h2></button></a>
    </body>
<html>-->
