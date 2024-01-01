@extends('admin.layout')
@section('title', 'Edit Post')
@section('content')

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Manage Users</h3>
						</div>

						<div class="title_right">
							<div class="col-md-5 col-sm-5  form-group pull-right top_search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Go!</button>
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
									<h2>Edit User</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />

    <form method="post" action="{{ route('posts-update', [$posts -> id]) }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> 
        @csrf
        
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="user_id">User ID<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="number" name="user_id" value="{{$posts->user_id}}" required="required" class="form-control">
            </div>
		</div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="post_title">Title<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" name="post_title" value="{{$posts->post_title}}" required="required" class="form-control">
            </div>
		</div>
        
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="post_content">Content<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <textarea name="post_content" id="" cols="30" rows="10" value="{{$posts->post_content}}" required="required" class="form-control">
                </textarea>
                <!--<input type="text" name="post_content" value="{{$posts->post_content}}"><br><br>-->
                <!---names of fields in table-->
            </div>
		</div>
        
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="post_date">Date<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="date" name="post_date" value="{{$posts->post_date}}" required="required" class="form-control">
            </div>
		</div>

        <div class="ln_solid"></div>
            <div class="item form-group">
			    <div class="col-md-6 col-sm-6 offset-md-3">
                <button class="btn btn-primary" type="button" onclick="window.location.href='{{route('posts')}}'">Cancel</button>
				<button type="submit" class="btn btn-success">Update</button>
                </div>
			</div>

	</form>
	</div>
	</div>
	</div>
	</div>

	</div>
	</div>
<!-- /page content -->
@endsection
            <!--<input type="submit" value="Update">
    </form>
</body>
</html>-->

