@extends('layouts.app')
@section('titleApp', 'Sub-category')
@section('modal')
    <!--Add Category Modal -->
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Sub-category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sub_category.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label>Category<span id="required_str">*</span></label>
                                <select name="category" id="category" title="Category" class="form-control @error('category_name') is-invalid @enderror" required>
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
                                <label>Name<span id="required_str">*</span></label>
                                <input type="text" name="sub_category_name" id="category_name" class="form-control @error('sub_category_name') is-invalid @enderror" value="{{ old('sub_category_name') }}" placeholder="sub-category name" required>
                                @error('sub_category_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <br><button type="submit" class="btn btn-primary">Add Sub-category</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Update Sub-category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sub_category.update','id') }}" id="editCategoryForm" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12">
                                <label>Category<span id="required_str">*</span></label>
                                <select name="update_category" id="edit_category" title="Category" class="form-control @error('update_category') is-invalid @enderror" required>
                                    <option value="">Select Category</option>
                                    @foreach($cats as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                @error('update_category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Name<span id="required_str">*</span></label>
                                <input type="text" name="update_sub_category_name" id="edit_sub_category_name" class="form-control @error('update_sub_category_name') is-invalid @enderror" value="{{ old('update_sub_category_name') }}" placeholder="category name" required>
                                @error('update_sub_category_name')
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
                                @error('update_category_serial')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <br><button type="submit" class="btn btn-primary">Update Sub-category</button>
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
            <h4>Sub-category <i title="Add" class="fa fa-plus-square btn" data-toggle="modal" data-target="#addCategory"></i></h4>
            <br><div class="table-responsive">
                <table class="table table-bordered" id="tbl_category">
                    <thead class="thead-dark">
                    <tr>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Added</th>
                        <th>Updated</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sub_cats as $cat)
                    <tr>
                        <td>{{ $cat->Cate->name }}</td>
                        <td>{{ $cat->name }}</td>
                        <td>@if($cat->status) <span class="text-success">Active<span> @else <span class="text-danger">Inactive</span> @endif</td>
                        <td>{{ date('d/m/Y H:i',strtotime($cat->created_at)) }}</td>
                        <td>{{ date('d/m/Y H:i',strtotime($cat->updated_at)) }}</td>
                        <td><button class="btn" title="Edit" data-toggle="modal" data-target="#editCategory"
                                    data-ID = "{{ $cat->id }}" data-name = "{{ $cat->name }}"
                                    data-cate = "{{ $cat->category_id }}" data-status = "{{ $cat->status }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <a class="btn" style="" title="Delete" onclick="return checkDelete()" href="{{ route('sub_category.delete',$cat->id) }}">
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
        $('#editCategory').on('show.bs.modal', function(e){
            if ( e.relatedTarget != null) {
                var button = $(e.relatedTarget); // Button that triggered the modal
                var modal = $(this);
                var status = button.attr('data-status');

                var id = button.attr('data-ID');
                var url = '{{ route('sub_category.update', ':id') }}';
                url = url.replace(':id',id);
                $('#editCategoryForm').attr('action',url);

                modal.find($('#edit_category')).val(button.attr('data-cate'));
                modal.find($('#edit_sub_category_name')).val(button.attr('data-name'));

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
                    'targets': [3,4,5], // column index (start from 0)
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
                @if($errors->has('category') || $errors->has('sub_category_name'))
                $('#addCategory').modal('show');
                @else
                $('#editCategory').modal('show');
                @endif
            });
        </script>
    @endif
@endsection
