@extends('layouts.layout')


@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Contacts</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Contacts</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="container-fluid">
    <div class="card">
        <!-- /.card-header -->
        <div class="card-header">
            <button type="button" class="btn btn-primary green-btn" style="float:right;" id="add-banner"
                data-toggle="modal" data-target="#contactModal">
                <i class="fas fa-address-card"> Add Contact</i>
            </button>
            <button type="button" class="btn btn-primary green-btn" style="float:right;" id="add-banner"
                data-toggle="modal" data-target="#fileModel">
                <i class="fas fa-file-upload"> Import Files</i>
            </button>
            <button type="button" class="btn btn-primary green-btn" style="float:left;" id="add-banner"
                data-toggle="modal" data-target="#">
                <i class="fas fa-paper-plane"> Send</i>
            </button>
            <button type="button" class="btn btn-primary green-btn" style="float:left;" id="add-banner"
                data-toggle="modal" data-target="#">
                <i class="fas fa-envelope-open"> Bulk SMS</i>
            </button>
        </div>
        <!-- /.card-body -->
        <div class="card-body mailbox-messages">
            <table id="example1" class="ui celled table">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>ID</th>
                        <th>Agency Name</th>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Email</th>
                        <th>Msg In</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
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
                    <td>{{ $emp->update }}</td>
                    <!-- we will also add show, edit, and delete buttons -->
                    {{-- <td>
                        <a class="btn btn-small btn-success" href="{{ URL::to('employee/' . $emp->id) }}">Show</a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('employee/' . $emp->id . '/edit')}}">Edit</a>
                    </td> --}}
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

<!-- Modal for Forms -->
<form id="upload_csv" method="POST" action="{{ url("/insertData") }}" enctype="multipart/form-data">
    @csrf
    <div class="modal fade bd-example-modal-xl" id="contactModal" tabindex="-1" role="dialog"
        aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">Add Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <div class="form-row">
                            <div class="form-group col-md">
                                <label for="inputAgencyName">Agency Name</label>
                                <input type="text" class="form-control" id="agency-name" name="agency-name" required>
                            </div>
                            <div class="form-group col-md">
                                <label for="inputFirstName">Name</label>
                                <input type="text" class="form-control" id="first-name" name="first-name" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group col-md">
                                <label for="inputNumber">Number</label>
                                <input type="text" class="form-control" id="number" name="number" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md">
                                <label for="inputMsgIn">Msg In</label>
                                {{-- <textarea class="form-control col-xs-12" name="msg" id="msg-in" rows="5"></textarea> --}}
                                <textarea class="msg_in" id="msg_in" name="msg_in" required></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md">
                                <label for="inputUpdate">Update</label>
                                {{-- <textarea class="form-control col-xs-12" name="update" id="update" rows="7"></textarea> --}}
                                {{-- <div class="summernote" id="sumnote2"></div> --}}
                                <textarea class="update" id="update" name="update" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button onlick="submit()" type="submit" name="submit" id="saveButton" value="Save changes"
                        class="btn btn-primary">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

{{-- Modal for file uploading --}}
<form id="upload_csv" method="POST" action="{{ url("/fileImport") }}" enctype="multipart/form-data">
    @csrf
    <div class="modal fade bd-example-modal-xl" id="fileModel" tabindex="-1" role="dialog"
        aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">Import file</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button onlick="submit()" type="submit" name="submit" id="saveButton" value="Save changes"
                        class="btn btn-primary">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/jquery.tabledit.min.js') }}"></script>
<script type="text/javascript"
    src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/js/dataTables.checkboxes.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.semanticui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
<script src="{{ asset('designs/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('js/clients.js') }}"></script>
@endsection

@section('styles')
<link href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/css/dataTables.checkboxes.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css">
<link rel="stylesheet" href="{{ asset('designs/plugins/toastr/toastr.min.css') }}">
<link rel="stylesheet" href="{{asset('css/clients.css')}}" />
@endsection