@extends('layouts.app')
@section('titleApp', 'Image Slider')
@section('modal')
    <!--Edit Slider Modal -->
    <div class="modal fade" id="editSlider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Slider Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('slider.update','id') }}" id="editSliderForm" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12">
                                <label>Name</label>
                                <input type="text" name="sliderName" value="{{ old('sliderName') }}" id="edit_slider_name" class="form-control" title="slider name" readonly>
                            </div>
                            <div class="col-md-12">
                                <label>Image(jpeg,jpg,bmp,png. Size: 5 MB)<span id="required_str">*</span></label>
                                <input type="file" name="update_slider_image" class="form-control @error('update_slider_image') is-invalid @enderror" id="edit_slider_image" title="slider image">
                                @error('update_slider_image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Update Slider</button>
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
            <h4>Image Slider</h4>
            <br><div class="table-responsive">
                <table class="table table-bordered" id="tbl_slider">
                    <thead class="thead-dark">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Updated</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sliders as $slider)
                    <tr>
                        <td>{{ $slider->id }}</td>
                        <td>{{ $slider->name }}</td>
                        <td>{{ date('d/m/Y H:i',strtotime($slider->updated_at)) }}</td>
                        <td><a href="{{ asset('/storage/slider_photo/'.$slider->photo) }}" target="_blank"><img src="{{ asset('/storage/slider_photo/'.$slider->photo) }}?ver=100" width="30" height="30" alt=""/></a></td>
                        <td><button class="btn" title="Edit" data-toggle="modal" data-target="#editSlider"
                                    data-ID = "{{ $slider->id }}" data-name = "{{ $slider->name }}">
                                <i class="fas fa-edit"></i>
                            </button>
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
        $('#editSlider').on('show.bs.modal', function(e){
            if ( e.relatedTarget != null) {
                var button = $(e.relatedTarget); // Button that triggered the modal
                var modal = $(this);

                var id = button.attr('data-ID');
                var url = '{{ route('slider.update', ':id') }}';
                url = url.replace(':id',id);
                $('#editSliderForm').attr('action',url);

                modal.find($('#edit_slider_name')).val(button.attr('data-name'));
            }
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#tbl_slider').DataTable({
                "order": [],
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                'columnDefs': [{
                    'targets': [3,4], // column index (start from 0)
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
                @if($errors->has('update_slider_image'))
                    $('#editSlider').modal('show');
                @endif
            });
        </script>
    @endif
@endsection
