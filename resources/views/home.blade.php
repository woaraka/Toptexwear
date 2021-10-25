@extends('layouts.app')
@section('titleApp', 'Dashboard')
@section('content')
<div class="col-md-12">
    <div class="tab-content">
        <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
            <h2 class="text-center text-success"><u>Dashboard</u></h2>
            <div class="cart-page">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>SL</th>
                                <th>Content</th>
                                <th>Total</th>
                                <th>Picture Size</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <tr>
                                <td>01</td>
                                <td>Category</td>
                                <td>{{ $category }}</td>
                                <td>150×80</td>
                            </tr>
                            <tr>
                                <td>02</td>
                                <td>Sub-category</td>
                                <td>{{ $sub_category }}</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>03</td>
                                <td>Product</td>
                                <td>{{ $product }}</td>
                                <td>300×300</td>
                            </tr>
                            <tr>
                                <td>04</td>
                                <td>Client</td>
                                <td>{{ $client }}</td>
                                <td>150×80</td>
                            </tr>
                            <tr>
                                <td>05</td>
                                <td>Slider</td>
                                <td>{{ $slider }}</td>
                                <td>600×400</td>
                            </tr>
                            <tr>
                                <td>06</td>
                                <td>Total Product Photo</td>
                                <td>{{ $files }}</td>
                                <td>300×300</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
