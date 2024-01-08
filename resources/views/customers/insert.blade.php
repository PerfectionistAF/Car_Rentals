@extends('admin.layout')

@section('content')
@section('title', 'Add Customer') 

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Manage Customers</h3>
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
									<h2>Add Customer</h2>
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
    
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
        @php
        Session::forget('success')
        @endphp</div>
    @endif
 
    <form method="post" action="{{route('customers-store')}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
        @csrf

        
            <label   for="name">Customer Name<span class="required">*</span>
            </label>
            
                <input type="text" name="customer_name" value="{{old('customer_name')}}" 
                class="form-control @error('customer_name') is-invalid @enderror">
            @error('customer_name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            
           <!----CLASSES REMOVED TO SEE ERROR--->
           <!----REMOVE FRONTEND VALIDATION, required--->
        
            <label for="email">Email<span class="required">*</span>
            </label> <!--nullable attributes and required ones according to database table-->
            
                <input type="email" name="customer_email"  
                class="form-control @error('customer_email') is-invalid @enderror">
            @error('customer_email')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            
        

        <div class="ln_solid"></div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<button class="btn btn-primary" type="button" onclick="window.location.href='{{route('customers')}}'">Cancel</button>
					<button type="submit" class="btn btn-success">Add</button>
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
            <!--<input type="submit" value="Add Customer">
    </form>
</body>
</html>-->