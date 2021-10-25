@extends('layouts.app')
@section('titleApp', 'Category')
@section('modal')
    <!--Add Category Modal -->
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label>Name<span id="required_str">*</span></label>
                                <input type="text" name="category_name" id="category_name" class="form-control @error('category_name') is-invalid @enderror" value="{{ old('category_name') }}" placeholder="category name" required>
                                @error('category_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Serial</label>
                                <input type="number" name="category_serial" class="form-control" id="category_serial" value="{{ old('category_serial') }}" placeholder="category serial" min="1">
                                @error('category_serial')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Image(jpeg,jpg,bmp,png. Size: 5 MB)<span id="required_str">*</span></label>
                                <input type="file" name="category_image" class="form-control @error('category_image') is-invalid @enderror" id="category_image" title="category image" required>
                                @error('category_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <br><button type="submit" class="btn btn-primary">Add Category</button>
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
    <div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('category.update','id') }}" id="editCategoryForm" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12">
                                <label>Name<span id="required_str">*</span></label>
                                <input type="text" name="update_category_name" id="edit_category_name" class="form-control @error('update_category_name') is-invalid @enderror" value="{{ old('update_category_name') }}" placeholder="category name" required>
                                @error('update_category_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Serial</label>
                                <input type="number" name="update_category_serial" class="form-control" id="edit_category_serial" value="{{ old('update_category_serial') }}" placeholder="category serial" min="1">
                                @error('update_category_serial')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
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
                                </div><br>
                                @error('update_status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Image(jpeg,jpg,bmp,png. Size: 5 MB)</label>
                                <input type="file" name="update_category_image" class="form-control @error('update_category_image') is-invalid @enderror" id="edit_category_image" title="category image">
                                @error('update_category_image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Update Category</button>
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
            <h4>Category <i title="Add" class="fa fa-plus-square btn" data-toggle="modal" data-target="#addCategory"></i></h4>
            <br><div class="table-responsive">
                <table class="table table-bordered" id="tbl_category">
                    <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th>Added</th>
                        <th>Updated</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cats as $cat)
                    <tr>
                        <td>{{ $cat->name }}</td>
                        <td>{{ $cat->order }}</td>
                        <td>@if($cat->status) <span class="text-success">Active<span> @else <span class="text-danger">Inactive</span> @endif</td>
                        <td>{{ date('d/m/Y H:i',strtotime($cat->created_at)) }}</td>
                        <td>{{ date('d/m/Y H:i',strtotime($cat->updated_at)) }}</td>
                        <td><a href="{{ asset('/storage/category_photo/'.$cat->photo) }}" target="_blank"><img src="{{ asset('/storage/category_photo/'.$cat->photo) }}?ver=100" width="30" height="30" alt=""/></a></td>
                        <td>@if($cat->id != 1)<button class="btn" title="Edit" data-toggle="modal" data-target="#editCategory"
                                    data-ID = "{{ $cat->id }}" data-name = "{{ $cat->name }}"
                                    data-serial = "{{ $cat->order }}" data-status = "{{ $cat->status }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <a class="btn" style="" title="Delete" onclick="return checkDelete()" href="{{ route('category.delete',$cat->id) }}">
                                <i class="fas fa-trash-alt"></i>
                            </a>@endif
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
        $('#editCategory').on('show.bs.modal', function(e){
            if ( e.relatedTarget != null) {
                var button = $(e.relatedTarget); // Button that triggered the modal
                var modal = $(this);
                var status = button.attr('data-status');

                var id = button.attr('data-ID');
                var url = '{{ route('category.update', ':id') }}';
                url = url.replace(':id',id);
                $('#editCategoryForm').attr('action',url);

                modal.find($('#edit_category_name')).val(button.attr('data-name'));
                modal.find($('#edit_category_serial')).val(button.attr('data-serial'));

                if(status == 1)
                    $("#statusRadiosActiveVisible").prop("checked", true);
                else
                    $("#statusRadiosInactiveVisible").prop("checked", true);
            }
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#tbl_category').DataTable({
                "order": [],
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                'columnDefs': [{
                    'targets': [3,4,5,6], // column index (start from 0)
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
                @if($errors->has('category_name') || $errors->has('category_serial') || $errors->has('category_image'))
                $('#addCategory').modal('show');
                @else
                $('#editCategory').modal('show');
                @endif
            });
        </script>
    @endif
@endsection
