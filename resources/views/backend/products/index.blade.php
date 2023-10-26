@extends('layouts.app')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>@lang('site.products') </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('') }}">@lang('site.home')</a>
                </li>

                <li class="active">
                    <strong>@lang('site.products')</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>@lang('site.products') </h5>


                        <div class="ibox-tools">
                            <input id="search-products" style="display:inline; width:25%; direction:rtl;"
                                class="form-control" placeholder="@lang('site.product_search')" />

                            <a href="{{ url('products/create') }}" class="btn btn-primary btn-xs">@lang('site.add_new')</a>
                            <a style="background-color: #1ab394; color:white;"
                                href="{{ url('products/exportProduct' . '/' . $lang) }}"
                                class="btn btn-xs">@lang('site.export')</a>
                            <form enctype="multipart/form-data" id="formImportExcelFile" style="display: inline"
                                action="{{ url('products/importProduct') }}" method="post">
                                <input multiple style="display: none" id="import_file_excel" type="file"
                                    name="import_file" accept=".csv,.xlsx" />
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <label for="import_file_excel">
                                    <a style="background-color: #1ab394; color:white;"
                                        class="btn btn-xs">@lang('site.import')</a>
                                </label>
                            </form>

                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>



                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('site.Photo')</th>
                                        <th>@lang('site.name')</th>
                                        <th>@lang('site.size')</th>
                                        <th>@lang('site.price')</th>
                                        <th>@lang('site.code')</th>
                                        <th>@lang('site.pquantity')</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <!--adding sortableItems id by Aliwi-->
                                <tbody id="sortableItems" class="dynamic_row">
                                    @forelse ($products as $key => $product)
                                        <tr class="gradeX" data-id="{{ $product->id }}">
                                            <td>{{ $products->firstItem() + $key }}</td>
                                            @if (file_exists('uploads/products/' . $product->id . '.jpg'))
                                                <td><img width="100px" src="<?php echo url('uploads/products/thumb/' . $product->id . '.jpg?rand=' . rand(0, 100)); ?>"></td>
                                            @else
                                                <td><img width="100px" src="{{ asset('uploads/product_logo.png') }}"></td>
                                            @endif
                                            <td>
                                                @if (!empty($product->translation->name))
                                                    {{ $product->translation->name }}@else{{ $product->name }}
                                                @endif
                                            </td>


                                            <td>
                                                @if (!empty($product->titles))
                                                    @for ($index = 0; $index < count($product->prices ?? []); $index++)
                                                        {{ $product->titles[$index] }}<br />
                                                    @endfor
                                                @endif
                                                <br />
                                            </td>

                                            <td>
                                                @if (!empty($product->prices))
                                                    @for ($index = 0; $index < count($product->prices ?? []); $index++)
                                                        {{ $product->prices[$index] }}<br />
                                                    @endfor
                                                @endif

                                            </td>
                                            <td>
                                                @for ($index = 0; $index < count($product->codes ?? []); $index++)
                                                    {{ $product->codes[$index] }}<br />
                                                @endfor


                                            </td>
                                            <td>
                                                {{ $product->quantity }}

                                            </td>


                                            <td>
                                                <form id="delete-product" action="{{ url('products/' . $product->id) }}"
                                                    method="POST" class="form-inline">
                                                    <input type="hidden" name="_method" value="delete">
                                                    {{ csrf_field() }}
                                                    <input type="submit" value="@lang('site.delete')"
                                                        class="btn btn-danger btn-xs pull-right btn-delete">
                                                </form>
                                                <a href="{{ url('products/' . $product->id . '/edit') }}"
                                                    class="btn btn-primary btn-xs pull-right"><i
                                                        class="fa fa-pencil-square-o"> </i> </a>
                                                <a href="{{ url('products/relatedproducts/' . $product->id) }}"
                                                    class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus"></i>
                                                </a>

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
                                            {!! $products->render() !!}
                                        </td>
                                    </tr>
                                </tbody>


                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
    <!--adding sortableJs script tag by Aliwi-->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        var options = {
            group: 'share',
            animation: 100,
            store: {
                /**
                 * Get the order of elements. Called once during initialization.
                 * @param   {Sortable}  sortable
                 * @returns {Array}
                 */
                get: function(sortable) {
                    var order = localStorage.getItem(sortable.options.group.name);
                    return order ? order.split("|") : [];
                },

                /**
                 * Save the order of elements. Called onEnd (when the item is dropped).
                 * @param {Sortable}  sortable
                 */
                set: function(sortable) {
                    var order = sortable.toArray();
                    var token = $('meta[name="csrf-token"]').attr('content');
                    var sort = [];
                    $('tr.gradeX').each(function(index, element) {
                        sort.push({
                            id: $(this).attr('data-id'),
                            position: index + 1
                        });
                    });

                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{ url('post-sortable-product') }}",
                        data: {
                            sort: sort,
                            _token: token
                        },
                        success: function(response) {
                            if (response.status == "success") {
                                console.log(response);
                            } else {
                                console.log(response);
                            }
                        }
                    });


                    localStorage.setItem(sortable.options.group.name, order.join("|"));
                },
            },
        };

        events = [
            'onChoose',
            'onStart',
            'onEnd',
            'onAdd',
            'onUpdate',
            'onSort',
            'onRemove',
            'onChange',
            'onUnchoose'
        ].forEach(function(name) {
            options[name] = function(evt) {

            };
        });
        Sortable.create(sortableItems, options);
    </script>
    <script>
        $('body').on('keyup', '#search-products', function() {
            var searchQuery = $(this).val();
            $.ajax({
                method: 'Post',
                url: '<?php echo url('product/search'); ?>',
                dataType: 'json',
                data: {
                    '_token': '{{ csrf_token() }}',
                    searchQuery: searchQuery
                },
                success: function(res) {
                    console.log(res);
                    var tableRow = '';
                    $('.dynamic_row').html('');
                    $.each(res, function(index, value) {
                        var imgsrc = 'uploads/products/thumb/' + value.product_id + '.jpg';
                        var acEdit = '/products/' + value.product_id + '/edit';
                        var acDelete = value.product_id;

                        tableRow = '<tr class="gradeX"><td>' + value.product_id +
                            '</td><td><img width="100px" id="img" src=' + imgsrc +
                            '></td><td> ' + value.name + ' </td><td> </td><td><a data-did="' +
                            acDelete +
                            '"  class="deleteProduct btn btn-danger btn-xs pull-right">@lang('site.delete')</a><a href=' +
                            acEdit +
                            ' class="btn btn-primary btn-xs pull-right"><i class="fa fa-pencil-square-o"> </i> </a></td></tr>'
                        $('.dynamic_row').append(tableRow);
                    });

                }
            });
        });
    </script>
    <script>
        $("body").on("click", ".deleteProduct", function() {
            // $(this).parent(".holdt").remove();

            var form_dataa = {
                id: $(this).attr("data-did"),

            }
            console.log(form_dataa)

            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '<?php echo url('products/removeProduct'); ?>',
                data: form_dataa,
                success: function(msg) {
                    console.log(msg)

                    location.reload();
                }
            });

        });
    </script>

    {{-- Start Import Excel File --}}
    <script>
        document.getElementById("import_file_excel").onchange = function() {
            document.getElementById("formImportExcelFile").submit();
        };
    </script>
    {{-- End Import Excel File --}}

@endsection
