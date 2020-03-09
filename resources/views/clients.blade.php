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
            <table id="example1" class="table table-bordered table-hover">
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
                        <th>Suburb</th>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>Number</th>
                        <th>Email</th>
                        <th>Department</th>
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
                <tfoot>
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
                </tfoot>
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
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="inputAgencyName">Agency Name</label>
                            <input type="text" class="form-control" id="agency-name">
                        </div>
                        <div class="form-group col-md">
                            <label for="inputSuburb">Suburb</label>
                            <input type="text" class="form-control" id="suburb">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="inputFirstName">First Name</label>
                            <input type="text" class="form-control" id="first-name">
                        </div>
                        <div class="form-group col-md">
                            <label for="inputLastName">Last Name</label>
                            <input type="text" class="form-control" id="last-name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="inputDepartment">Department</label>
                            <input type="text" class="form-control" id="department">
                        </div>
                        <div class="form-group col-md">
                            <label for="inputNumber">Number</label>
                            <input type="text" class="form-control" id="number">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/clients.js') }}"></script>
@endsection