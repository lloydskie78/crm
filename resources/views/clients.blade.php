@extends('layouts.layout')


@section('content')
<div class="container-fluid">
    <div class="card">
        <!-- /.card-header -->
        <div class="card-header">
            <button type="button" class="btn btn-primary green-btn" style="float:right;" id="add-banner"
                data-toggle="modal" data-target="#contactModal">
                <i class="fas fa-plus"> Contact</i>
            </button>
        </div>
        <!-- /.card-body -->
        <div class="card-body mailbox-messages">
            <table class="table table-bordered table-hover" id="example1">
                <thead>
                    <tr>
                        <th>
                            <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                                <i class="far fa-square"></i>
                            </button>
                        </th>
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
                {{-- <tbody>
                    <tr>
                        <td>
                            <div class="icheck-primary">
                                <input type="checkbox" value="" id="check1" />
                                <label for="check1"></label>
                            </div>
                        </td>
                        <td>1</td>
                        <td>Kay Burton</td>
                        <td>South Yara</td>
                        <td>JUSTIN</td>
                        <td></td>
                        <td>0 400 001</td>
                        <td>example@kayburton.com.au</td>
                        <td>Manager</td>
                        <td>
                            <div class="actions" style="text-align:center; ">   
                                <a type="button" class="btn btn-warning" id="edit-contact"><i class="fas fa-edit"
                                        style="color:dark"></i></a>
                                <a type="button" class="btn btn-danger" id="delete-contact"><i class="fas fa-trash-alt"
                                        style="color:dark"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="icheck-primary">
                                <input type="checkbox" value="" id="check2" />
                                <label for="check2"></label>
                            </div>
                        </td>
                        <td>2</td>
                        <td>O'Brien</td>
                        <td>Chelsea</td>
                        <td>Bronwyn</td>
                        <td>Payne</td>
                        <td>0 400 002</td>
                        <td>bronwyn.payne@obre.com.au</td>
                        <td>Sales</td>
                        <td>
                            <div class="actions" style="text-align:center; ">
                                <a type="button" class="btn btn-warning" id="edit-contact"><i class="fas fa-edit"
                                        style="color:dark"></i></a>
                                <a type="button" class="btn btn-danger" id="delete-contact"><i class="fas fa-trash-alt"
                                        style="color:dark"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="icheck-primary">
                                <input type="checkbox" value="" id="check3" />
                                <label for="check3"></label>
                            </div>
                        </td>
                        <td>3</td>
                        <td>O'Brien</td>
                        <td>Hastings</td>
                        <td>Bronwyn</td>
                        <td>Payne</td>
                        <td>0 400 003</td>
                        <td>bronwyn.payne@obre.com.au</td>
                        <td>Sales</td>
                        <td>
                            <div class="actions" style="text-align:center; ">
                                <a type="button" class="btn btn-warning" id="edit-contact"><i class="fas fa-edit"
                                        style="color:dark"></i></a>
                                <a type="button" class="btn btn-danger" id="delete-contact"><i class="fas fa-trash-alt"
                                        style="color:dark"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="icheck-primary">
                                <input type="checkbox" value="" id="check4" />
                                <label for="check4"></label>
                            </div>
                        </td>
                        <td>4</td>
                        <td>Ray White</td>
                        <td>Ferntree Gully</td>
                        <td>Kirsty</td>
                        <td>Edwards</td>
                        <td>0 400 004</td>
                        <td>kirsty.edwards@raywhite.com.au</td>
                        <td>Sales</td>
                        <td>
                            <div class="actions" style="text-align:center; ">
                                <a type="button" class="btn btn-warning" id="edit-contact"><i class="fas fa-edit"
                                        style="color:dark"></i></a>
                                <a type="button" class="btn btn-danger" id="delete-contact"><i class="fas fa-trash-alt"
                                        style="color:dark"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="icheck-primary">
                                <input type="checkbox" value="" id="check4" />
                                <label for="check4"></label>
                            </div>
                        </td>
                        <td>5</td>
                        <td>Barry Plant</td>
                        <td>Keysborough</td>
                        <td>Cathy</td>
                        <td>Mcrae</td>
                        <td>0 400 005</td>
                        <td>cdunlo@barryplant.com.au</td>
                        <td>Sales</td>
                        <td>
                            <div class="actions" style="text-align:center; ">
                                <a type="button" class="btn btn-warning" id="edit-contact"><i class="fas fa-edit"
                                        style="color:dark"></i></a>
                                <a type="button" class="btn btn-danger" id="delete-contact"><i class="fas fa-trash-alt"
                                        style="color:dark"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="icheck-primary">
                                <input type="checkbox" value="" id="check4" />
                                <label for="check4"></label>
                            </div>
                        </td>
                        <td>6</td>
                        <td>Hocking Stuart</td>
                        <td>Frankston</td>
                        <td>Holly</td>
                        <td>Bowman</td>
                        <td>0 400 006</td>
                        <td>hbowman@hockingstuart.com.au</td>
                        <td>Sales</td>
                        <td>
                            <div class="actions" style="text-align:center; ">
                                <a type="button" class="btn btn-warning" id="edit-contact"><i class="fas fa-edit"
                                        style="color:dark"></i></a>
                                <a type="button" class="btn btn-danger" id="delete-contact"><i class="fas fa-trash-alt"
                                        style="color:dark"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody> --}}
                {{-- <tfoot>
                    <tr>
                        <th>
                            <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                                <i class="far fa-square"></i>
                            </button>
                        </th>
                        <th></th>
                        <th>ID</th>
                        <th>Agency Name</th>
                        <th>Suburb</th>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>Number</th>
                        <th>Email</th>
                        <th>Department</th>
                    </tr>
                </tfoot> --}}
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-xl" id="contactModal" tabindex="-1" role="dialog"
    aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">Add Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" id="tab1">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                role="tab" aria-controls="pills-home" aria-selected="true">Manual Input</a>
                        </li>
                        <li class="nav-item" id="tab2">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">Populate via File
                                Import</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="form-row">
                                <div class="form-group col-md">
                                    <label for="inputAgencyName">Agency Name</label>
                                    <input type="text" class="form-control" id="agency-name">
                                </div>
                                <div class="form-group col-md">
                                    <label for="inputFirstName">First Name</label>
                                    <input type="text" class="form-control" id="first-name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group col-md">
                                    <label for="inputNumber">Number</label>
                                    <input type="text" class="form-control" id="number">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md">
                                    <label for="inputMsgIn">Msg In</label>
                                    {{-- <textarea class="form-control col-xs-12" name="msg" id="msg-in" rows="5"></textarea> --}}
                                    <div class="summernote" id="sumnote1"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md">
                                    <label for="inputUpdate">Update</label>
                                    {{-- <textarea class="form-control col-xs-12" name="update" id="update" rows="7"></textarea> --}}
                                    <div class="summernote" id="sumnote2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveButton">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/jquery.tabledit.js') }}"></script>
<script src="{{ asset('js/jquery.tabledit.min.js') }}"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('js/clients.js') }}"></script>
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('css/clients.css')}}" />
@endsection