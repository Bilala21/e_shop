<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<title>@yield('title') | E-Shopper</title>
		<link href="{{url('css/font-awesome.min.css')}}" rel="stylesheet">
		<link href="{{url('css/prettyPhoto.css')}}" rel="stylesheet">
		<link href="{{url('css/price-range.css')}}" rel="stylesheet">
		<link href="{{url('css/animate.css')}}" rel="stylesheet">
		<link href="{{url('css/main.css')}}" rel="stylesheet">
		<link href="{{url('css/responsive.css')}}" rel="stylesheet">
		<link rel="stylesheet" href="{{url('css/bootstrap5.min.css')}}">      
		<link rel="shortcut icon" href="images/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	</head><!--/head-->
<body style="background: rgb(231, 231, 231);">
    <div class="container-fluid p-0 m-0">
        <div class="row p-0 m-0">
            <div class="top-bar bg-dark fixed-top d-flex justify-content-between p-0">
                <div class="top-dash position-relative p-2 cuser-prointer">
                    <h2 class="fs-6 text-light m-0">Dashboard</h2>
                    <a href="{{route('index')}}" class="btn text-light site-url position-absolute w-100 py-1 ms-4 mt-2 bg-dark d-none">Visit Site</a>
                </div>
                <div class="admin-title bg-dark m-0 p-2 cuser-prointer position-relative ">
                    <h4 class="text-light m-0 p-0 fs-6 text-end">Admin | {{Auth::user()->name}}</h4>
                    <a href="{{route('admin.logout')}}" class="btn text-light site-url logout position-absolute w-100 py-1 mt-2 bg-dark d-none" 
					onclick="event.preventDefault(); document.getElementById('form').submit()"
					>Logout</a>
					<form action="{{route('admin.logout')}} " method="POST" class="d-none" id="form">
						@csrf
					</form>
                </div>
            </div>
            <div class="row justify-content-end p-0 mx-0" style="margin-top:35px">
				<div class="col-2">
					<div class="dashboard-left-side fixed-top p-0 mx-0" style="margin-top:35px !important" id="dashboard_left">
						<div class="pt-5">
							<ul class="m-0 p-0 unstyled-list" id="main-menu">
								<li class="position-relative menu">
									<a href="{{route('admin.add-category')}}" class="text-white nav-item" id="category">
										Add Category
									</a>
								</li>
								<li class="position-relative menu">
									<a href="{{route('admin.add-brand')}}" class="text-white nav-item" id="addbrand">
										Add Brand
									</a>
								</li>
								<li id="addrecord">
									<a href="{{route('admin.add-product')}}" class="text-white nav-item" id="product">Add Product</a>
								</li>
								<li class="position-relative menu">
									<span class='text-white nav-item cursor-pointer'>Posts</span>
									<ul class="unstyled-list p-0 top-0 position-absolute bg-dark submenu setting-menu sub_menu_active">
										<li id="create"><a href="{{route('admin.single/post')}}" class="text-white nav-item" id="">Post</a></li>
										<li><a href="{{route('admin.post/all')}}" class="text-white nav-item">All Posts</a></li>
									</ul>
								</li>
								<li class="position-relative menu" id="menu">
									 <span class='text-white nav-item cursor-pointer'>Pages</span>
									<ul class="unstyled-list p-0 top-0 position-absolute bg-dark submenu setting-menu sub_menu_active">
										<li><a class="text-white nav-item">page-1</a></li>
										<li><a class="text-white nav-item">page-2</a></li>
										<li><a class="text-white nav-item">page-3</a></li>
										<li><a class="text-white nav-item">page-4</a></li>
										<li><a class="text-white nav-item">page-5</a></li>
										<li><a class="text-white nav-item">page-6</a></li>
									</ul>
								</li>
								<li>
									<a href="{{route('admin.users')}}" class="text-white nav-item users" name=".user">Users</a>
								</li>
								<li>
									<a href="{{route('admin.edit',[1])}}" class="text-white nav-item">Update Record</a>
								</li>
								<li class="cuser-prointer">
									<a href="{{route('admin.destory',[1])}}" class='text-white nav-item'>Trash Record</a>
								</li>
								<li class="position-relative menu ">
									<span class='text-white nav-item cursor-pointer'>Settings</span>
									<ul class="unstyled-list p-0 top-0 position-absolute bg-dark submenu setting-menu sub_menu_active">
										<li><a class="text-white nav-item">Update Password</a></li>
										<li><a class="text-white nav-item">Reset Password</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xl-10 col-lg-10 col-md-9 col-sm-9 col-8 me-3 mt-4">
					@yield('content')
				</div>
            </div>
        </div>
    </div>


<script src="{{url('js/jquery.js')}}"></script>
<script src="{{url('js/bootstrap.min.js')}}"></script>
<script src="{{url('js/jquery.scrollUp.min.js')}}"></script>
<script src="{{url('js/price-range.js')}}"></script>
<script src="{{url('js/jquery.prettyPhoto.js')}}"></script>
<script src="{{url('js/admin.js')}}"></script>
</body>
</html>