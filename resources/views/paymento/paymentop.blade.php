<x-masters>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Payment Operator Type</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Payment</a></li>
                            <li class="breadcrumb-item active">Operator</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive ">
                                <table id="mydataTable" class="display nowrap">
                                    <thead>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Balance</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($paymentos as $atte)
                                            <tr>
                                                <td>{{ $atte->id }}</td>
                                                <td>{{ $atte->name }}</td>
                                                <td>{{ $atte->balance }}</td>
                                                <td>
                                                    @if ($atte->status == 1)
                                                        <i class="fa fa-check-circle"
                                                            style="font-size:25px;color:rgb(0, 241, 100)"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-icon rounded-pill btn-primary"
                                                        href="{{ route('paymento.show', $atte->id) }}"><i
                                                            class='fas fa-file-invoice' style='font-size:24px'></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 right">
                    <div class="col-md mb-4 mb-md-0">
                        <div class="card">
                            <h5 class="card-header">Add Payment</h5>
                            <div class="card-body">
                                <form action="{{ route('paymento.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input name="name" type="text" class="form-control">
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-master>
