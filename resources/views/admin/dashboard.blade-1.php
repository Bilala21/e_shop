@extends('layouts.admin_layout')
@section('title', 'Dashboard')
@section('content')
    <div class="dashboard-right-side mx-0" style="height:auto">
        <div class="container">
            {{-- show all products --}}

            <div class="mt-5 page" id="all_prods">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Description</th>
                            <th scope="col" width='120'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            {{-- show all products --}}


            {{-- add category --}}
            <div class="show_category_form py-4 page ">
                <form action="{{ route('admin.add-category') }}" method="POST" id="addCategory">
                    @csrf
                    <div class="form-title">
                        <h3 class="text-center">ADD CATEGORY</h3>
                    </div>
                    <div class="mb-3 row justify-content-between">
                        <div class="col-12">
                            <label for="name" class="form-label">Select Category</label>
                            {{-- <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"> --}}
                            <div class="d-none" id="res"></div>
                            <select name="name" id="category_name" class="category_name">
                                <option value=""></option>
                                <option value="sportswear">sportswear</option>
                                <option value="mens">mens</option>
                                <option value="womens">womens</option>
                                <option value="kids">kids</option>
                                <option value="fashion">fashion</option>
                                <option value="households">households</option>
                                <option value="interiors">interiors</option>
                                <option value="clothing">clothing</option>
                                <option value="bags">bags</option>
                                <option value="shoes">shoes</option>
                                
                            </select>
                            @error('name')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 text-end p-0 m-0">
                        <button type="submit" class="btn btn-primary px-4">ADD</button>
                    </div>
                </form>
            </div>
            {{-- end add category --}}


            {{-- add subcategory --}}
            <div class="show_subcategory_form py-4 page ">
                <form action="{{ route('admin.add-sub-category') }}" method="POST" id="sub_category">
                    @csrf
                    <div class="form-title">
                        <h3 class="text-center">ADD Sub CATEGORY</h3>
                    </div>
                    <div class="mb-3 row justify-content-between">
                        <div class="col-12">
                            <label for="name" class="form-label">Select Category</label>
                            {{-- <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"> --}}
                            <div class="d-none" id="res"></div>
                            <select name="sname" id="sname" class="sname">
                                <option value=""></option>
                                <option value="nike">nike</option>
                                <option value="under armour">under armour</option>
                                <option value="adidas">adidas</option>
                                <option value="puma">puma</option>
                                <option value="asics">asics</option>
                                <option value="fendi">fendi</option>
                                <option value="guess">guess</option>
                                <option value="valentino">valentino</option>
                                <option value="dior">dior</option>
                                <option value="versace">versace</option>
                                <option value="armani">armani</option>
                                <option value="prada">prada</option>
                                <option value="dolce and gabbana">dolce and gabbana</option>
                                <option value="chanel">chanel</option>
                                <option value="gucci">gucci</option>
                                
                            </select>
                            @error('name')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 text-end p-0 m-0">
                        <button type="submit" class="btn btn-primary px-4">ADD</button>
                    </div>
                </form>
            </div>
            {{-- end subcategory --}}


            {{-- add brand --}}
            <div class="show_brand_form py-4 page">
                <form  id="add_brand" action="{{route('admin.add-brand') }}" method="POST">
                    @csrf
                    <div class="form-title">
                        <h3 class="text-center">ADD BRAND</h3>
                    </div>
                    <div class="mb-3 row justify-content-between">
                        <div class="col-12">
                            <label for="name" class="form-label">Select Brand</label>
                            {{-- <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"> --}}
                            <div class="d-none" id="res"></div>
                            <select name="brandname" id="brandname" class="brandname">
                                <option value=""></option>
                                <option value="acne">acne</option>
                                <option value="grune erde">grune erde</option>
                                <option value="albiro">albiro</option>
                                <option value="ronhill">ronhill</option>
                                <option value="oddmolly">oddmolly</option>
                                <option value="boudestijn">boudestijn</option>
                                <option value="interiors">interiors</option>
                                <option value="rosch creative culture">rosch creative culture</option>
                                <option value="bags">bags</option>
                                <option value="shoes">shoes</option>                            </select>
                            @error('name')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 text-end p-0 m-0">
                        <button type="submit" class="btn btn-primary px-4">ADD</button>
                    </div>
                </form>
            </div>
            {{-- end add brand --}}


            {{-- add product --}}
            <div class="add-record show_page py-4 page" id="add_product">
                <form id="p_form" action="{{ route('admin.add-product') }}" method="POST">
                    @csrf
                    <div class="row g-0">
                        <div class="mb-3 col-3 px-2">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 col-3 px-2">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>
                        <div class="mb-3 col-3 ps-2 position-relative">
                            <label for="price" class="form-label">Select Category</label>
                            <input type="text" class="form-control select_cat" id="selected_category"
                                name="selected_category" autocomplete="off" data-id="1">
                            <input type="hidden" class="form-control select_cat_id" id="selected_category_id"
                                name="selected_category_id" autocomplete="off">
                            <div class="position-absolute show_cat d-none w-100 bg-white rounded m-0">
                                <ul class="p-0 unstyledlist add_cate">
                                </ul>
                            </div>
                        </div>
                        <div class="mb-3 col-3 ps-2 position-relative">
                            <label for="price" class="form-label">Select Brand</label>
                            <input type="text" class="form-control select_brand" id="selected_brand"
                                name="selected_brand" id="" autocomplete="off">
                                <input type="hidden" class="form-control select_brand_id" id="selected_brand_id"
                                name="selected_brand_id" autocomplete="off">
                            <div class="position-absolute show_brand d-none w-100 bg-white rounded m-0">
                                <ul class="p-0 unstyledlist add_brand">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="decsription" class="form-label">Description</label>
                        <textarea name="decsription" id="decsription" cols="30" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        {{-- <label for="Thumbnail" class="form-label">Thumbnail</label> --}}
                        <input type="file" class="" id="file" name="file">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                    <div class="d-none mt-3 bg-success py-3 text-enter" id="pro_res"></div>
                    <div class="d-none mt-3" id="res"></div>
                </form>
            </div>
            {{-- end add product --}}

            {{-- view post --}}
            <div class="post d-none single-post">
                <p>dsfddsfsdsddfsfd</p>
            </div>
            {{-- end view post --}}

            {{-- post --}}

            {{-- end post --}}

            {{-- all user --}}
            <div class="page alluser page">dsfddsffsdfdsffsdfds</div>
            {{-- end all users --}}

            {{-- update form --}}
            <div class="py-4 page" id="update_product">
                <form id="p_form" action="{{ route('admin.update') }}" method="POST">
                    @csrf
                    <div class="row g-0">
                        <div class="mb-3 col-10 px-2">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control price" id="price" name="price" value="">
                            <input type="hidden" class="form-control up_id" id="up_id" name="up_id" value="">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                    <div class="d-none mt-3 bg-success py-3 text-enter" id="pro_res"></div>
                    <div class="d-none mt-3" id="res"></div>
                </form>
            </div>
            {{-- end update form --}}
        </div>
    </div>
@endsection
