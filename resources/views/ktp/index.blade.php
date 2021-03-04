@extends('master.master')
@section('content')

    {{-- table --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> --}}
        <div class="col-lg-2">
            <a href="#" class="btn btn-outline-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Input KTP</a>
        </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                            <td>
                                <div class="btn btn-outline-warning btn-rounded btn-sm"><i class="fas fa-pencil-alt"></i></div>
                                <div class="btn btn-outline-danger btn-rounded btn-sm"><i class="fa fa-trash"></i></div>
                                {{-- <div class="btn btn-outline-success btn-rounded btn-sm"><i class="fa fa-download"></i></div> --}}
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td>$170,750</td>
                            <td>
                                <div class="btn btn-outline-warning btn-rounded btn-sm"><i class="fas fa-pencil-alt"></i></div>
                                <div class="btn btn-outline-danger btn-rounded btn-sm"><i class="fa fa-trash"></i></div>
                            </td>
                        </tr>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009/01/12</td>
                            <td>$86,000</td>
                            <td>
                                <div class="btn btn-outline-warning btn-rounded btn-sm"><i class="fas fa-pencil-alt"></i></div>
                                <div class="btn btn-outline-danger btn-rounded btn-sm"><i class="fa fa-trash"></i></div>
                            </td>
                        </tr>
                        <tr>
                            <td>Cedric Kelly</td>
                            <td>Senior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>2012/03/29</td>
                            <td>$433,060</td>
                            <td>
                                <div class="btn btn-outline-warning btn-rounded btn-sm"><i class="fas fa-pencil-alt"></i></div>
                                <div class="btn btn-outline-danger btn-rounded btn-sm"><i class="fa fa-trash"></i></div>
                            </td>
                        </tr>
                        <tr>
                            <td>Airi Satou</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>33</td>
                            <td>2008/11/28</td>
                            <td>$162,700</td>
                            <td>
                                <div class="btn btn-outline-warning btn-rounded btn-sm"><i class="fas fa-pencil-alt"></i></div>
                                <div class="btn btn-outline-danger btn-rounded btn-sm"><i class="fa fa-trash"></i></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    {{-- end table --}}

@endsection
