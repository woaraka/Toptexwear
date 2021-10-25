@extends('layouts.app')
@section('titleApp', 'Product')
@section('modal')
    <!--Add Category Modal -->
    <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label>Category<span id="required_str">*</span></label>
                                <select name="category" id="category" title="Category" class="form-control @error('category_name') is-invalid @enderror" onchange="getSubCat();" required>
                                    <option value="">Select Category</option>
                                    @foreach($cats as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Sub-category</label>
                                <select name="sub_category" id="sub_category" title="Sub-category" class="form-control @error('sub_category') is-invalid @enderror" required>
                                    <option value="">Select Sub-category</option>
                                </select>
                                @error('sub_category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Product Code<span id="required_str">*</span></label>
                                <input type="text" name="product_code" id="product_code" class="form-control @error('product_code') is-invalid @enderror" value="{{ old('product_code') }}" placeholder="Product Code" required>
                                @error('product_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Name<span id="required_str">*</span></label>
                                <input type="text" name="product_name" id="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ old('product_name') }}" placeholder="Product name" required>
                                @error('product_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Description<span id="required_str">*</span></label>
                                <textarea type="text" name="product_description" id="product_description" class="form-control @error('product_description') is-invalid @enderror" placeholder="Product Description" rows="5" required>{{ old('product_description') }}</textarea>
                                @error('product_description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Size</label>
                                <input type="text" name="product_size" id="product_size" class="form-control @error('product_size') is-invalid @enderror" value="{{ old('product_size') }}" placeholder="Product Size">
                                @error('product_size')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Color</label>
                                <input type="text" name="product_color" id="product_color" class="form-control @error('product_color') is-invalid @enderror" value="{{ old('product_color') }}" placeholder="Product Color">
                                @error('product_color')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Asking Price</label>
                                <input type="number" name="product_asking_price" id="product_asking_price" class="form-control @error('product_asking_price') is-invalid @enderror" value="{{ old('product_asking_price') }}" min="1" placeholder="Asking Price">
                                @error('product_asking_price')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Selling Price</label>
                                <input type="number" name="product_selling_price" id="product_selling_price" class="form-control @error('product_selling_price') is-invalid @enderror" value="{{ old('product_selling_price') }}" min="1" placeholder="Selling Price">
                                @error('product_selling_price')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Image-1(jpeg,jpg,bmp,png. Size: 5 MB)<span id="required_str">*</span></label>
                                <input type="file" name="product_image1" class="form-control @error('product_image1') is-invalid @enderror" id="product_image1" title="Product Image"-1 required>
                                @error('product_image1')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Image-2(jpeg,jpg,bmp,png. Size: 5 MB)</label>
                                <input type="file" name="product_image2" class="form-control @error('product_image2') is-invalid @enderror" id="product_image2" title="Product Image-2">
                                @error('product_image2')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Image-3(jpeg,jpg,bmp,png. Size: 5 MB)</label>
                                <input type="file" name="product_image3" class="form-control @error('product_image3') is-invalid @enderror" id="product_image3" title="Product Image-3">
                                @error('product_image3')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <br><button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!--Edit Category Modal -->
    <div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('product.update','id') }}" id="editProductForm" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12">
                                <label>Category<span id="required_str">*</span></label>
                                <input id="edit_category" type="text" class="form-control" readonly>
                            </div>
                            <div class="col-md-12">
                                <label>Sub-category<span id="required_str">*</span></label>
                                <input id="edit_sub_category" type="text" class="form-control" readonly>
                            </div>
                            <div class="col-md-12">
                                <label>Product Code<span id="required_str">*</span></label>
                                <input type="text" name="update_product_code" id="edit_product_code" class="form-control @error('update_product_code') is-invalid @enderror" value="{{ old('update_product_code') }}" placeholder="Product Code" required>
                                @error('update_product_code')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Name<span id="required_str">*</span></label>
                                <input type="text" name="update_product_name" id="edit_product_name" class="form-control @error('update_product_name') is-invalid @enderror" value="{{ old('update_product_name') }}" placeholder="Product name" required>
                                @error('update_product_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Description<span id="required_str">*</span></label>
                                <textarea type="text" name="update_product_description" id="edit_product_description" class="form-control @error('update_product_description') is-invalid @enderror" placeholder="Product Description" rows="5" required>{{ old('update_product_description') }}</textarea>
                                @error('update_product_description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Size</label>
                                <input type="text" name="update_product_size" id="edit_product_size" class="form-control @error('update_product_size') is-invalid @enderror" value="{{ old('update_product_size') }}" placeholder="Product Size">
                                @error('update_product_size')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Color</label>
                                <input type="text" name="update_product_color" id="edit_product_color" class="form-control @error('update_product_color') is-invalid @enderror" value="{{ old('update_product_color') }}" placeholder="Product Color">
                                @error('update_product_color')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Asking Price</label>
                                <input type="number" name="update_product_asking_price" id="edit_product_asking_price" class="form-control @error('update_product_asking_price') is-invalid @enderror" value="{{ old('update_product_asking_price') }}" min="1" placeholder="Asking Price">
                                @error('update_product_asking_price')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Selling Price</label>
                                <input type="number" name="update_product_selling_price" id="edit_product_selling_price" class="form-control @error('update_product_selling_price') is-invalid @enderror" value="{{ old('update_product_selling_price') }}" min="1" placeholder="Selling Price">
                                @error('update_product_selling_price')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <h6>Fetcher Product<span id="required_str">*</span></h6>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="update_fetcher" id="fetcherRadiosActiveVisible" value="1" required>
                                    <label class="form-check-label" for="fetcherRadiosActiveVisible">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="update_fetcher" id="fetcherRadiosInactiveVisible" value="0" required>
                                    <label class="form-check-label" for="fetcherRadiosInactiveVisible">No</label>
                                </div><br><br>
                            </div>
                            <div class="col-md-12">
                                <h6>Latest Product<span id="required_str">*</span></h6>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="update_latest" id="latestRadiosActiveVisible" value="1" required>
                                    <label class="form-check-label" for="latestRadiosActiveVisible">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="update_latest" id="latestRadiosInactiveVisible" value="0" required>
                                    <label class="form-check-label" for="latestRadiosInactiveVisible">No</label>
                                </div><br><br>
                            </div>
                            <div class="col-md-12">
                                <h6>Stock<span id="required_str">*</span></h6>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="update_stock" id="stockRadiosActiveVisible" value="1" required>
                                    <label class="form-check-label" for="stockRadiosActiveVisible">Available</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="update_stock" id="stockRadiosInactiveVisible" value="0" required>
                                    <label class="form-check-label" for="stockRadiosInactiveVisible">Unavailable</label>
                                </div><br><br>
                            </div>
                            <div class="col-md-12">
                                <h6>Status <span id="required_str">*</span></h6>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="update_status" id="statusRadiosActiveVisible" value="1" required>
                                    <label class="form-check-label" for="statusRadiosActiveVisible">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="update_status" id="statusRadiosInactiveVisible" value="0" required>
                                    <label class="form-check-label" for="statusRadiosInactiveVisible">Inactive</label>
                                </div><br><br>
                            </div>
                            <div class="col-md-12">
                                <label>Image-1(jpeg,jpg,bmp,png. Size: 5 MB)</label>
                                <input type="file" name="update_product_image1" class="form-control @error('update_product_image1') is-invalid @enderror" id="edit_product_image1" title="Product Image"-1>
                                @error('update_product_image1')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Image-2(jpeg,jpg,bmp,png. Size: 5 MB)</label>
                                <input type="file" name="update_product_image2" class="form-control @error('update_product_image1') is-invalid @enderror" id="edit_product_image2" title="Product Image-2">
                                @error('update_product_image2')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Image-3(jpeg,jpg,bmp,png. Size: 5 MB)</label>
                                <input type="file" name="update_product_image3" class="form-control @error('update_product_image3') is-invalid @enderror" id="edit_product_image3" title="Product Image-3">
                                @error('update_product_image3')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <br><button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="col-md-12">
    <div class="tab-content">
        @if (session()->has('notification'))
            <div class="alert alert-success alert-dismissible">
                {!! session('notification') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
            <h4>Product <i title="Add" class="fa fa-plus-square btn" data-toggle="modal" data-target="#addProduct"></i></h4>
            <br><div class="table-responsive">
                <table class="table table-bordered table-sm" id="tbl_product">
                    <thead class="thead-dark">
                    <tr>
                        <th>Category</th>
                        <th>Sub</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Fetcher</th>
                        <th>Latest</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Updated</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->Cate->name }}</td>
                        <td>{{ $product->subCate->name }}</td>
                        <td>{{ $product->code }}</td>
                        <td>{{ $product->name }}</td>
                        <td>@if($product->fetcher) <span class="text-success">Yes<span> @else <span class="text-danger">No</span> @endif</td>
                        <td>@if($product->latest) <span class="text-success">Yes<span> @else <span class="text-danger">No</span> @endif</td>
                        <td>@if($product->stock) <span class="text-success">Yes<span> @else <span class="text-danger">No</span> @endif</td>
                        <td>@if($product->status) <span class="text-success">Yes<span> @else <span class="text-danger">No</span> @endif</td>
                        <td>{{ date('d/m/Y H:i',strtotime($product->updated_at)) }}</td>
                        <td><a href="{{ asset('/storage/product_photo/'.$product->photo1) }}" target="_blank"><img src="{{ asset('/storage/product_photo/'.$product->photo1) }}?ver=100" width="30" height="30" alt=""/></a>
                        @if($product->photo2) <a href="{{ asset('/storage/product_photo/'.$product->photo2) }}" target="_blank"><img src="{{ asset('/storage/product_photo/'.$product->photo2) }}?ver=100" width="30" height="30" alt=""/></a>@endif
                        @if($product->photo3) <a href="{{ asset('/storage/product_photo/'.$product->photo3) }}" target="_blank"><img src="{{ asset('/storage/product_photo/'.$product->photo3) }}?ver=100" width="30" height="30" alt=""/></a>@endif
                        </td>
                        <td><button class="btn" title="Edit" data-toggle="modal" data-target="#editProduct"
                                data-ID = "{{ $product->id }}" data-category = "{{ $product->Cate->name }}"
                                data-sub = "{{ $product->subCate->name }}" data-code = "{{ $product->code }}"
                                data-name = "{{ $product->name }}" data-fetcher = "{{ $product->fetcher }}"
                                data-latest = "{{ $product->latest }}" data-stock = "{{ $product->stock }}"
                                data-asking = "{{ $product->asking }}" data-selling = "{{ $product->selling }}"
                                data-size = "{{ $product->size }}" data-color = "{{ $product->color }}"
                                data-description = "{{ $product->description }}" data-status = "{{ $product->status }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <a class="btn" style="" title="Delete" onclick="return checkDelete()" href="{{ route('product.delete',$product->id) }}">
                                <i class="fas fa-trash-alt"></i>
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
@endsection
@section('script')
    <script>
        const subCate = {!! $sub_cats !!};

        function sub_catego(id)
        {
            for(var i = 0; i < subCate.length; i++)
            {
                if(subCate[i].category_id == id)
                {
                    var ids = subCate[i].id;
                    var name = subCate[i].name;

                    var option = "<option value='"+ids+"'>"+name+"</option>";
                    $("#sub_category").append(option);
                }
            }
            return;
        }

        function getSubCat()
        {
            var cate = $("#category").val();
            $('#sub_category').find('option').not(':first').remove();
            sub_catego(cate);
        }
    </script>
    <script>
        $('#editProduct').on('show.bs.modal', function(e){
            if ( e.relatedTarget != null) {
                var button = $(e.relatedTarget); // Button that triggered the modal
                var modal = $(this);

                var fetcher = button.attr('data-fetcher');
                var latest = button.attr('data-latest');
                var stock = button.attr('data-stock');
                var status = button.attr('data-status');

                var id = button.attr('data-ID');
                var url = '{{ route('product.update', ':id') }}';
                url = url.replace(':id',id);
                $('#editProductForm').attr('action',url);

                modal.find($('#edit_category')).val(button.attr('data-category'));
                modal.find($('#edit_sub_category')).val(button.attr('data-sub'));
                modal.find($('#edit_product_code')).val(button.attr('data-code'));
                modal.find($('#edit_product_name')).val(button.attr('data-name'));
                modal.find($('#edit_product_size')).val(button.attr('data-size'));
                modal.find($('#edit_product_color')).val(button.attr('data-color'));
                modal.find($('#edit_product_asking_price')).val(button.attr('data-asking'));
                modal.find($('#edit_product_selling_price')).val(button.attr('data-selling'));
                modal.find($('#edit_product_description')).val(button.attr('data-description'));

                if(fetcher == 1)
                    $("#fetcherRadiosActiveVisible").prop("checked", true);
                else
                    $("#fetcherRadiosInactiveVisible").prop("checked", true);

                if(latest == 1)
                    $("#latestRadiosActiveVisible").prop("checked", true);
                else
                    $("#latestRadiosInactiveVisible").prop("checked", true);

                if(stock == 1)
                    $("#stockRadiosActiveVisible").prop("checked", true);
                else
                    $("#stockRadiosInactiveVisible").prop("checked", true);

                if(status == 1)
                    $("#statusRadiosActiveVisible").prop("checked", true);
                else
                    $("#statusRadiosInactiveVisible").prop("checked", true);
            }
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#tbl_product').DataTable({
                "order": [],
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                'columnDefs': [{
                    'targets': [8,9,10], // column index (start from 0)
                    'orderable': false, // set orderable false for selected columns
                }],
                response: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search",
                }
            });
        });
    </script>

    @if (count($errors) > 0)
        <script>
            $( document ).ready(function() {
                @if($errors->has('category') || $errors->has('sub_category') || $errors->has('product_name')
                || $errors->has('product_code') || $errors->has('product_description') || $errors->has('product_size')
                || $errors->has('product_color') || $errors->has('product_asking_price') || $errors->has('product_selling_price')
                || $errors->has('product_image1') || $errors->has('product_image2') || $errors->has('product_image3'))
                    $('#addProduct').modal('show');
                @else
                    $('#editProduct').modal('show');
                @endif
            });
        </script>
    @endif
@endsection
