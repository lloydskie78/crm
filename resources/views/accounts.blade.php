@extends('layouts.layout')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Accounts</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Accounts</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="container-fluid">
    <div class="card">
        <!-- /.card-header -->
        <div class="card-header">
            {{-- <button type="button" class="btn btn-primary green-btn" style="float:right;" id="addTemplate"
                data-toggle="modal" data-target="#msgtemplatemodal">
                <i class="fas fa-plus"> Add Template</i>
            </button> --}}
        </div>
        <!-- /.card-body -->
        <div class="card-body mailbox-messages">
            <table id="acctable" class="ui celled table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th class="text-center" width="120px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($accounts as $key => $vals)
                    <tr>
                        <td id="id">{{ $vals->id }}</td>
                        <td>{{ $vals->name }}</td>
                        <td>{{ $vals->email }}</td>
                        <!-- we will also add show, edit, and delete buttons -->
                        <td class="text-center" width="120px">
                            <a class="btn btn-small btn-danger delUser">Delete<i class="fas fa-user-alt-slash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('styles')
<script src="{{ asset('designs/plugins/toastr/toastr.min.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css">
<link rel="stylesheet" href="{{ asset('css/accounts.css') }}">
@endsection

@section('scripts')
<link rel="stylesheet" href="{{ asset('designs/plugins/toastr/toastr.min.css') }}">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.semanticui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{ asset('js/accounts.js') }}"></script>
@endsection