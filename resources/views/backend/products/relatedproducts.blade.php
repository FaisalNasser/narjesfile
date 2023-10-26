@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<style>
    .imgplus:before {
        content="+"
    }
</style>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>@lang('site.add_related_products')</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('')}}">@lang('site.home')</a>
            </li>
            <li>
                <a href="{{url('products')}}">@lang('site.products')</a>
            </li>
            <li class="active">
                <strong>@lang('site.add')</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>@lang('site.Edit_Product')</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>


                    </div>
                </div>
                <div class="ibox-content">
                    <form action="{{url('products/saverelatedproducts')}}" class="form-horizontal" method="POST" enctype='multipart/form-data'>
                        <input type="hidden" name="_method" value="post">
                        {{ csrf_field() }}



                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('site.Photo')</th>
                                        <th>@lang('site.name')</th>
                                        <th>@lang('site.price')</th> 
                                        <th></th>
                                    </tr>
                                </thead>
                                <!--adding sortableItems id by Aliwi-->
                                <tbody id="sortableItems" class="dynamic_row">
                                    @forelse ($products as $key => $product)
                                    <tr class="gradeX" data-id="{{ $product->id }}">
                                        <td> {{ $key + 1  }}</td>
                                        @if(file_exists('uploads/products/' . $product->id . '.jpg'))
                                        <td><img width="100px" src="<?php echo url("uploads/products/thumb/" . $product->id . ".jpg?rand=" . rand(0, 100)); ?>"></td>
                                        @else
                                        <td><img width="100px" src="{{ asset('uploads/product_logo.png') }}"></td>
                                        @endif
                                        <td>@if(!empty($product->translation->name)){{ $product->translation->name }}@else{{ $product->name }}@endif</td>



                                        <td>

                                            <input hidden name="lastprice_related_products[{{$key}}][id]" type="text" value="{{$product->id}}">


                                            <?php
                                            $val = 0;

                                            $ids_forPrice = array_column($relatedproductsid, 'id');

                                            if (in_array($product->id, $ids_forPrice)) {
                                                $keyprice = array_search($product->id, $ids_forPrice);
                                                $val = $relatedproductsid[$keyprice]->price;
                                            }
                                            ?>

                                            <input class="form-control" name="lastprice_related_products[{{$key}}][price]" type="text" value="{{$val}}">

                                            <br />


                                        </td>

                                        <td>

                                            <input name="lastprice_related_products[{{ $key }}][checked]" <?php

                                             $ids = array_column($relatedproductsid, 'id');
                                             if (in_array($product->id, $ids)) {
                                              echo "checked";
                                              } ?> type="checkbox" value="true" class="custom-control-input">

                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">
                                            @lang('site.no_record_found')

                                        </td>
                                    </tr>
                                    @endforelse
                                    <tr>
                                        <td colspan="5" style="text-align:center; font-size=16px;">
                                        {!! $products->links() !!}
                                        </td>
                                    </tr>
                                </tbody>


                            </table>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">

                                <a class="btn btn-white" href="{{ url('products') }}">@lang('site.cancel')</a>
                                <button class="btn btn-primary" type="submit">@lang('site.save')</button>
                            </div>
                        </div>

                        <input name="productId" hidden value="{{$productId}}">

                    </form>







                </div>
            </div>
        </div>


    </div>
</div>
<script>
    $(document).ready(function() {
        $('#multiple-checkboxes').multiselect({
            includeSelectAllOption: true,
        });
    });
</script>


@endsection