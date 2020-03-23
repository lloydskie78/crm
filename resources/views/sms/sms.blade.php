@extends('layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>SMS</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">SMS</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->

</section>

<!-- Main content -->
<section class="content">

    <!-- Tenplate table -->
    {{-- <div class="container-fluid">
        <div class="card"> --}}
    {{-- <div class="card-header">
            <button type="button" class="btn btn-primary green-btn" style="float:right;" id="add-banner"
                data-toggle="modal" data-target="#contactModal">
                <i class="fas fa-plus"> Add</i>
            </button>
        </div> --}}
    {{-- <table id="smstable" class="ui celled table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Main Category</th>
                        <th>Sub Category</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                    </tr>
                </tbody> --}}
    {{-- <tbody>
                @foreach($clients as $key => $emp)
                <td></td>
                <td class="details-control" style="width: 13px;">
                    <i class="fa fa-plus-square" aria-hidden=clear"true"></i>
                </td>
                <td id="id">{{ $emp->id }}</td>
    <td>{{ $emp->agency_name }}</td>
    <td>{{ $emp->name }}</td>
    <td>{{ $emp->number }}</td>
    <td>{{ $emp->email }}</td>
    <td>{{ $emp->msg_in }}</td>
    <td>{{ $emp->update }}</td> --}}
    <!-- we will also add show, edit, and delete buttons -->
    {{-- <td>
        
                                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                    <a class="btn btn-small btn-success" href="{{ URL::to('employee/' . $emp->id) }}">Show</a>

    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
    <a class="btn btn-small btn-info" href="{{ URL::to('employee/' . $emp->id . '/edit')}}">Edit</a>

    </td> --}}
    {{-- </tr>
                @endforeach
            </tbody> --}}
    {{-- </table>
        </div>
    </div> --}}
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Single SMS</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            Start creating your amazing application!
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Multiple SMS</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fas fa-minus"></i></button>

            </div>
        </div>
        <div class="card-body">
            Start creating your amazing application!
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->

@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css">
<link rel="stylesheet" href="{{ asset('designs/plugins/toastr/toastr.min.css') }}">
@endsection

@section('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.semanticui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
<script src="{{ asset('designs/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('js/sms.js') }}"></script>
@endsection