<x-masters>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Payment Type</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Payment</a></li>
                            <li class="breadcrumb-item active">Type</li>
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
                                        <th>Name</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($ptypes as $atte)
                                            <tr>
                                                <td>{{ $atte->name }}</td>
                                                <td>
                                                    @if ($atte->status == 1)
                                                        <i class="fa fa-check-circle"
                                                            style="font-size:25px;color:rgb(0, 241, 100)"></i>
                                                    @endif
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
                                <form action="{{ route('ptype.store') }}" method="POST">
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
