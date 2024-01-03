<x-masters>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Sector Leader</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Sector Leader</a></li>
                            <li class="breadcrumb-item active">All</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive ">
                                <table id="mydataTable" class="display nowrap">
                                    <thead>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Zone</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $atte)
                                            <tr>
                                                <td>{{ $atte->name }}</td>
                                                <td>{{ $atte->email }}</td>
                                                <td>{{ $atte->phone }}</td>
                                                <td>
                                                    @if ($atte->status == 1)
                                                        <i class="fa fa-check-circle"
                                                            style="font-size:25px;color:rgb(0, 241, 100)"></i>
                                                    @endif
                                                </td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-master>
