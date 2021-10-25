@extends('layouts.app')
@section('titleApp', 'Client')
@section('modal')
    <!--Add Category Modal -->
    <div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('client.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label>Name<span id="required_str">*</span></label>
                                <input type="text" name="client_name" id="client_name" class="form-control @error('client_name') is-invalid @enderror" value="{{ old('client_name') }}" placeholder="Client name" required>
                                @error('client_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Contact</label>
                                <textarea type="text" name="client_contact" id="client_contact" class="form-control @error('client_contact') is-invalid @enderror" placeholder="Client contact" rows="3">{{ old('client_contact') }}</textarea>
                                @error('client_contact')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Serial</label>
                                <input type="number" name="client_serial" class="form-control" id="client_serial" value="{{ old('client_serial') }}" placeholder="Client serial" min="1">
                                @error('client_serial')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Image(jpeg,jpg,bmp,png. Size: 5 MB)<span id="required_str">*</span></label>
                                <input type="file" name="client_image" class="form-control @error('client_image') is-invalid @enderror" id="client_image" title="Client image" required>
                                @error('client_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <br><button type="submit" class="btn btn-primary">Add Client</button>
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
    <div class="modal fade" id="editClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('client.update','id') }}" id="editClientForm" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12">
                                <label>Name<span id="required_str">*</span></label>
                                <input type="text" name="update_client_name" id="edit_client_name" class="form-control @error('update_client_name') is-invalid @enderror" value="{{ old('update_client_name') }}" placeholder="Client name" required>
                                @error('update_client_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Contact</label>
                                <textarea type="text" name="update_client_contact" id="edit_client_contact" class="form-control @error('update_client_contact') is-invalid @enderror" placeholder="Client contact" rows="3">{{ old('update_client_contact') }}</textarea>
                                @error('update_client_contact')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Serial</label>
                                <input type="number" name="update_client_serial" class="form-control" id="edit_client_serial" value="{{ old('update_client_serial') }}" placeholder="Client serial" min="1">
                                @error('update_client_serial')
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
                                <br><label>Image(jpeg,jpg,bmp,png. Size: 5 MB)</label>
                                <input type="file" name="update_client_image" class="form-control @error('update_client_image') is-invalid @enderror" id="update_client_image" title="Client image">
                                @error('update_client_image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Update Contact</button>
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
            <h4>Client <i title="Add" class="fa fa-plus-square btn" data-toggle="modal" data-target="#addClient"></i></h4>
            <br><div class="table-responsive">
                <table class="table table-bordered" id="tbl_client">
                    <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th>Added</th>
                        <th>Updated</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->contact }}</td>
                        <td>{{ $client->order }}</td>
                        <td>@if($client->status) <span class="text-success">Active<span> @else <span class="text-danger">Inactive</span> @endif</td>
                        <td>{{ date('d/m/Y H:i',strtotime($client->created_at)) }}</td>
                        <td>{{ date('d/m/Y H:i',strtotime($client->updated_at)) }}</td>
                        <td><a href="{{ asset('/storage/client_photo/'.$client->photo) }}" target="_blank"><img src="{{ asset('/storage/client_photo/'.$client->photo) }}?ver=100" width="30" height="30" alt=""/></a></td>
                        <td><button class="btn" title="Edit" data-toggle="modal" data-target="#editClient"
                                    data-ID = "{{ $client->id }}" data-name = "{{ $client->name }}" data-contact = "{{ $client->contact }}"
                                    data-serial = "{{ $client->order }}" data-status = "{{ $client->status }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <a class="btn button" style="" title="Delete" onclick="return checkDelete()" href="{{ route('client.delete',$client->id) }}">
                                <i class="fas fa-trash"></i>
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
        $('#editClient').on('show.bs.modal', function(e){
            if ( e.relatedTarget != null) {
                var button = $(e.relatedTarget); // Button that triggered the modal
                var modal = $(this);
                var status = button.attr('data-status');

                var id = button.attr('data-ID');
                var url = '{{ route('client.update', ':id') }}';
                url = url.replace(':id',id);
                $('#editClientForm').attr('action',url);

                modal.find($('#edit_client_name')).val(button.attr('data-name'));
                modal.find($('#edit_client_contact')).val(button.attr('data-contact'));
                modal.find($('#edit_client_serial')).val(button.attr('data-serial'));

                if(status == 1)
                    $("#statusRadiosActiveVisible").prop("checked", true);
                else
                    $("#statusRadiosInactiveVisible").prop("checked", true);
            }
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#tbl_client').DataTable({
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
