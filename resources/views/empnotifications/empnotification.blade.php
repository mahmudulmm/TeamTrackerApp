<x-masters>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">NotiFications</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Notification</a></li>
                            <li class="breadcrumb-item active">History</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <a href="{{ route('addempnotification') }}" class="btn btn-label-primary">Add
                                    Notification</i></a>
                                <hr class="mt-2" />
                            </div>
                            <div class="table-responsive ">
                                <table id="mydataTable" class="display nowrap">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($notifications as $atte)
                                            <tr>
                                                <td>{{ $atte->name }}</td>
                                                <td>{{ $atte->descriptions }}</td>
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
