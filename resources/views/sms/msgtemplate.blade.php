@extends('layouts.layout')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Templates</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Message Templates</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="container-fluid">
    <div class="card">
        <!-- /.card-header -->
        <div class="card-header">
            <button type="button" class="btn btn-primary green-btn" style="float:right;" id="addTemplate"
                data-toggle="modal" data-target="#msgtemplatemodal">
                <i class="fas fa-plus"> Add Template</i>
            </button>
        </div>
        <!-- /.card-body -->
        <div class="card-body mailbox-messages">
            <table id="temptable" class="table table-bordered table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Main Category</th>
                        <th>Sub Category</th>
                        <th>Title</th>
                        <th>Contents</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($msgtemp as $key => $vals)
                    <tr>
                        <td id="id">{{ $vals->id }}</td>
                        <td>{{ $vals->main_cat }}</td>
                        <td>{{ $vals->sub_cat }}</td>
                        <td>{{ $vals->title }}</td>
                        <td>{{ $vals->contents }}</td>
                        <td class="text-center" width="100px">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                </label>
                            </div>
                        </td>
                        <!-- we will also add show, edit, and delete buttons -->
                        <td class="text-center" width="120px">
                            <a class="btn btn-small btn-warning editModal"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-small btn-danger delModal"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="ajax-token">
    @csrf
</div>


@csrf
<div class="modal fade bd-example-modal-xl" id="msgtemplatemodal" tabindex="-1" role="dialog"
    aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="msgtemplateLabel">Create Template</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="inputTitle">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="inputMsgIn">Contents</label>
                            <textarea class="form-control rounded-0" id="contents" name="contents" rows="10"
                                required></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            {{-- <label for="inputEmail">Main Category</label>
                                <input type="email" class="form-control" id="email" name="email" required> --}}
                            <label for="exampleFormControlSelect1">Main Category</label>
                            <select class="form-control" id="maincatSelect" name="maincatSelect">
                                <option value="item0">--- Select one ---</option>
                                <option value="item1">Client Email</option>
                                <option value="item2">Client Text</option>
                                <option value="item3">Cleaner Email</option>
                                <option value="item4">Cleaner Text</option>
                            </select>
                        </div>
                        <div class="form-group col-md">
                            {{-- <label for="inputNumber">Sub Category</label>
                                <input type="text" class="form-control" id="number" name="number" required> --}}
                            <label for="exampleFormControlSelect1">Sub Category</label>
                            <select class="form-control" id="subcatSelect" name="subcatSelect">
                                <option value="">--- select main category first ---</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="modalCloseButton" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <button onlick="submit()" type="submit" name="submit" id="saveButton" value="Save changes"
                    class="btn btn-primary">Save Template</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css"> --}}
<link rel="stylesheet" href="{{ asset('designs/plugins/toastr/toastr.min.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
<link rel="stylesheet" href="{{ asset('css/msgtemplate.css') }}">
@endsection

@section('scripts')
{{-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.semanticui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"></script>
<script src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>
<script src="{{ asset('designs/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('js/msgtemplate.js') }}"></script>
@endsection