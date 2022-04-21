<?php $dash.='-- '; ?>
@foreach($subcategories as $subcategory)
    <tr>
        {{-- <td>{{$_SESSION['i']}}</td> --}}
        <td>{{$dash}}{{$subcategory->name}}</td>
        <td>{{$subcategory->slug}}</td>
        <td>{{$subcategory->parent->name}}</td>
    </tr>
    @if(count($subcategory->subcategory))
        @include('sub-category-list',['subcategories' => $subcategory->subcategory])
    @endif
@endforeach