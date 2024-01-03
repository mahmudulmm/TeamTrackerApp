<x-masters>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Attendence</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Employee</a></li>
                            <li class="breadcrumb-item active">Attendence</li>
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
                                            <th>Date</th>
                                            <th>In Time</th>
                                            <th>Out Time</th>
                                            <th>lin</th>
                                            <th>lout</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($attandances as $atte)
                                            <tr>
                                                <td>{{ $atte->eid }}</td>
                                                <td>{{ $atte->date }}</td>
                                                <td>{{ $atte->in }}</td>
                                                <td>{{ $atte->out }}</td>
                                                <td>{{ $atte->lin }}</td>
                                                <td>{{ $atte->lout }}</td>
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
