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
            <button type="button" class="btn btn-primary green-btn" style="float:right;" id="addTemplate"
                data-toggle="modal" data-target="#accountmodal">
                <i class="fas fa-plus">Add User</i>
            </button>
        </div>
        <!-- /.card-body -->
        <div class="card-body mailbox-messages">
            <table id="acctable" class="ui celled table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>Date Created</th>
                        <th class="text-center">Status</th>
                        <th class="text-center" width="120px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($accounts as $key => $vals)
                    <tr>
                        <td id="id">{{ $vals->id }}</td>
                        <td>{{ $vals->name }}</td>
                        <td>{{ $vals->email }}</td>
                        <td>{{ $vals->usertype }}</td>
                        <td>{{ $vals->created_at }}</td>
                        <td class="text-center">{{ $vals->status }}</td>
                        <!-- we will also add show, edit, and delete buttons -->
                        <td class="text-center" width="120px">
                            <a class="btn btn-small btn-warning editUser"><i class="fas fa-user-edit"></i></a>
                            <a class="btn btn-small btn-danger delUser"><i class="fas fa-user-alt-slash"></i></a>
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
<div class="modal fade bd-example-modal-xl" id="accountmodal" tabindex="-1" role="dialog"
    aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="accountlabel"> Add User</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="inputAgencyName">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group col-md">
                            <label for="inputFirstName">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="inputFirstName">User Type</label>
                            <select class="form-control" id="usertype" name="usertype">
                                <option value="op1">Admininstrator</option>
                                <option value="op2">Team</option>
                            </select>
                        </div>
                        <div class="form-group col-md">
                            <label for="inputFirstName">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="inputFirstName">Test Email</label>
                            <input type="email" class="form-control" id="testmail" name="testmail" required>
                        </div>
                        <div class="form-group col-md">
                            <label for="inputFirstName">Test Number</label>
                            <input type="text" class="form-control" id="testnum" name="testnum" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="inputFirstName">Gateway</label>
                            <select class="form-control" id="gateway" name="gateway">
                                <option value="op1">Domestic North</option>
                                <option value="op2">Domestic South</option>
                                <option value="op3">Specialty North</option>
                                <option value="op4">Specialty South</option>
                            </select>
                        </div>
                        <div class="form-group col-md">
                            <label for="inputFirstName">Gateway Number</label>
                            <input type="text" class="form-control" id="gatewaynum" name="gatewaynum" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="inputFirstName">Status</label>
                            <div class="form-group col-md">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="active"
                                        value="active">
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions1"
                                        id="inactive" value="inactive">
                                    <label class="form-check-label" for="inactive">Inactive</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md">
                            <label for="inputFirstName">User's Department</label>
                            <select class="form-control" id="userdept" name="userdept">
                                <option value="item1">Both</option>
                                <option value="item2">Domestic Bookings</option>
                                <option value="item3">Specialty Bookings</option>
                                <option disabled>----------------------</option>
                                <option value="item4">Commercial Sales</option>
                                <option value="item4">Operations</option>
                                <option value="item4">Administration</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="inputFirstName">Department No.</label>
                            <input type="text" class="form-control" id="deptno" name="deptno" required>
                        </div>
                        <div class="form-group col-md">
                            <label for="inputFirstName">MAC Address</label>
                            <input type="text" class="form-control" id="macadd" name="macadd" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="modalCloseButton" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <button onlick="submit()" type="submit" name="submit" id="saveButton" value="Save changes"
                    class="btn btn-primary">Save Changes</button>
            </div>
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