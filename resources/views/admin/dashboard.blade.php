@extends('layouts.admin_layout')
@section('title', 'Dashboard')
@section('content')
<div class="mt-5 hide_all_pages" id="all_prods">
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
{{-- add category --}}
<div class="row d-none hide_all_pages" id="category_form">
    <form action="{{ route('admin.add-category') }}" method="POST" id="Category" class="col-5 mx-auto">
        @csrf
        <div class="row w-100 g-0">
            <div class="form">
                <div class="form-title w-100 mb-3">
                    <h3 class="text-center">ADD CATEGORY</h3>
                </div>
                <div class="w-100 mb-3">
                    <label for="categoryName" class="form-label">Select Category*</label>
                    <select name="categoryName" id="categoryName" class="categoryName">
                        <option value=""></option>
                        <option value="sportswear">sportswear</option>
                        <option value="nike">nike</option>
                        <option value="adidas">adidas</option>
                        <option value="underamour">underamour</option>
                        <option value="mens">mens</option>
                        <option value="fendi">fendi</option>
                        <option value="guess">guess</option>
                        <option value="valentino">valentino</option>
                        <option value="dior">dior</option>
                        <option value="versace">versace</option>
                        <option value="armani">armani</option>
                        <option value="womens">womens</option>
                        <option value="fendi">fendi</option>
                        <option value="guess">guess</option>
                        <option value="valentino">valentino</option>
                        <option value="dior">dior</option>
                        <option value="versace">versace</option>
                        <option value="armani">armani</option>
                        <option value="kids">kids</option>
                        <option value="fashion">fashion</option>
                        <option value="households">households</option>
                        <option value="interiors">interiors</option>
                        <option value="clothing">clothing</option>
                        <option value="bags">bags</option>
                        <option value="shoes">shoes</option> 
                    </select>
                </div>
                <div class="w-100 mb-3">
                    <label for="slugName" class="form-label">Select Slug*</label>
                    <select name="slugName" id="slugName" class="slugName">
                        <option value=""></option>
                        <option value="sportswear">sportswear</option>
                        <option value="nike">nike</option>
                        <option value="adidas">adidas</option>
                        <option value="underamour">underamour</option>
                        <option value="mens">mens</option>
                        <option value="fendi">fendi</option>
                        <option value="guess">guess</option>
                        <option value="valentino">valentino</option>
                        <option value="dior">dior</option>
                        <option value="versace">versace</option>
                        <option value="armani">armani</option>
                        <option value="womens">womens</option>
                        <option value="fendi">fendi</option>
                        <option value="guess">guess</option>
                        <option value="valentino">valentino</option>
                        <option value="dior">dior</option>
                        <option value="versace">versace</option>
                        <option value="armani">armani</option>
                        <option value="kids">kids</option>
                        <option value="fashion">fashion</option>
                        <option value="households">households</option>
                        <option value="interiors">interiors</option>
                        <option value="clothing">clothing</option>
                        <option value="bags">bags</option>
                        <option value="shoes">shoes</option> 
                    </select>
                </div>
                <div class="w-100 mb-3">
                    <label for="parentCategoryName" class="form-label">Parent Category</label>
                    <select name="parentCategoryName" id="parentCategoryName" class="parentCategoryName">
                        <option value="null">null</option>
                    </select>
                </div>
                <div class="col-12 text-end p-0 m-0">
                    <button type="submit" class="btn btn-primary px-4">ADD</button>
                    <div class="ressponse_message d-none mt-3"></div>
                </div>
            </div>
        </div>
    </form>
</div>
{{-- add brand --}}
<div class="row d-none hide_all_pages" id="brand_form">
    <form action="{{ route('admin.add-brand') }}" method="POST" id="brand" class="col-5 mx-auto brand">
        @csrf
        <div class="row w-100 g-0">
            <div class="form-title w-100 mb-3">
                <h3 class="text-center">ADD Brand</h3>
            </div>
            <div class="w-100 mb-3">
                <label for="name" class="form-label">Select Brand*</label>
                <select name="brand" id="brand" class="brand">
                    <option value=""></option>
                    <option value="acni">acni</option>
                    <option value="albirio">albirio</option>
                    <option value="ronhill">ronhill</option>
                    <option value="oddmolly">oddmolly</option>
                </select>
            </div>
            <div class="col-12 text-end p-0 m-0">
                <button type="submit" class="btn btn-primary px-4">ADD</button>
                <div class="ressponse_message d-none mt-3"></div>
            </div>
        </div>
    </form>
</div>
{{-- product form --}}
<div class="row d-none hide_all_pages" id="product_form">
    <form id="prod_form" action="{{ route('admin.add-product') }}" method="POST" class="col-10 mx-auto brand">
        @csrf
        <div class="row w-100 g-0 justify-content-between">
            <div class="form-title w-100 mb-3 col-12">
                <h3 class="text-center">ADD Product</h3>
            </div>
            <div class="form-group col-3">
                <label for="pname" class="form-label">Product Name*</label>
                <input type="text" class="form-control border-0 shadow-0" value="" name="pname" id="pname" autocomplete="off" >
            </div>
            <div class="form-group col-3">
                <label for="name" class="form-label">Product Price*</label>
                <input type="text" class="form-control border-0 shadow-0" value="" name="price" id="price" autocomplete="off" >
            </div>
            <div class="mb-3 row g-0 col-3">
                <label for="brand" class="form-label">Select Brand*</label>
                <select name="brand_id" id="brand_id" class="brand_id">
                    <option value=""></option>
                </select>
            </div>
            <div class="mb-3 row g-0 col-5">
                <label for="cname" class="form-label">Select Category*</label>
                <select name="category_id" id="category_id" class="category_id">
                    <option value=""></option>
                </select>
            </div>
            <div class="form-group col-5">
                <label for="file" class="form-label">Select file*</label>
                <input type="file" class="form-control border-0 shadow-0" value="" name="file" id="file" autocomplete="off" >
            </div>
            <div class="form-group col-12">
                <label for="name" class="form-label">Product Description*</label>
               <textarea name="description" id="description" cols="20" rows="5"></textarea>
            </div>
            <div class="col-12 text-end p-0 m-0">
                <button type="submit" class="btn btn-primary px-4">ADD</button>
                <div class="ressponse_message d-none mt-3"></div>
            </div>
        </div>
    </form>
</div>
<div class="py-4 d-none hide_all_pages" id="update_product">
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
@endsection
