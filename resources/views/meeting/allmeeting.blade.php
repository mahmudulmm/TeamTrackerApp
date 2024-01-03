<x-masters>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Meeting History</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Meeting</a></li>
                            <li class="breadcrumb-item active">History</li>
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
                                        <tr>
                                            <th>Organizatrion</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Phone1</th>
                                            <th>Email</th>
                                            <th>Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mettings as $meet)
                                            <tr>
                                                <td>{{ $meet->organization }}</td>
                                                <td>{{ $meet->name }}</td>
                                                <td>{{ $meet->designaton }}</td>
                                                <td>{{ $meet->address }}</td>
                                                <td>{{ $meet->phone }}</td>
                                                <td>{{ $meet->phone1 }}</td>
                                                <td>{{ $meet->email }}</td>
                                                <td>{{ $meet->number }}</td>
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
</x-masters>
