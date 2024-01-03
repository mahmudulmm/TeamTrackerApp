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
                                            <th>Eid</th>
                                            <th>Mid</th>
                                            <th>Pid</th>
                                            <th>cid</th>
                                            <th>host</th>
                                            <th>Status</th>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mettstatus as $meguest)
                                            <tr>
                                                <td>{{ $eid = $meguest->eid }}</td>
                                                <td>{{ $mid = $meguest->mid }}</td>
                                                <td>{{ $pid = $meguest->pid }}</td>
                                                <td>{{ $pid = $meguest->cid }}</td>
                                                <td>{{ $host = $meguest->host }}</td>
                                                <td>
                                                    @if ($meguest->status == 1)
                                                        <p class="text-success"> Success</p>
                                                    @endif
                                                </td>
                                                <td>

                                                    <a class="btn btn-icon rounded-pill btn-primary"
                                                        href="{{ route('order.addorder', ['id' => ($id = $meguest->id)]) }}">
                                                        <i class=" ti ti-shopping-cart"></i>
                                                    </a>
                                                </td>
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
