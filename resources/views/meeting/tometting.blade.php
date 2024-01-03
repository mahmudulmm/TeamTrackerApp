<x-masters>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Meeting Schedule</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Meeting</a></li>
                            <li class="breadcrumb-item active">Schedule</li>
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
                                            <th>Host</th>
                                            <th>Eid</th>
                                            <th>cid</th>
                                            <th>Visit</th>
                                            <th>Pid</th>
                                            <th>Time</th>
                                            <th>File</th>
                                            <th>Note</th>
                                            <th>Status</th>
                                            <th>Metting</th>
                                            <th>Duration</th>
                                            <th>Type</th>
                                            <th>Group</th>
                                            <th>In</th>
                                            <th>Out</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($metting_times as $tomeet)
                                            <tr>
                                                <td>{{ $tomeet->host }}</td>
                                                <td>{{ $tomeet->eid }}</td>
                                                <td>{{ $tomeet->cid }}</td>
                                                <td>{{ $tomeet->visit }}</td>
                                                <td>{{ $tomeet->pid }}</td>
                                                <td>{{ $tomeet->time }}</td>
                                                <td>{{ $tomeet->file }}</td>
                                                <td>{{ $tomeet->note }}</td>

                                                <td>
                                                    @if ($tomeet->status == 0)
                                                        <p class="text-primary"> Upcoming</p>
                                                    @elseif ($tomeet->status == 1)
                                                        <p class="text-success"> Success</p>
                                                    @elseif ($tomeet->status == 2)
                                                        <p class="text-info">In Progress</p>
                                                    @elseif ($tomeet->status == 3)
                                                        <p class="text-danger">Cancel</p>
                                                    @endif
                                                </td>
                                                <td>{{ $tomeet->metting }}</td>
                                                <td>{{ $tomeet->duration }}</td>
                                                <td>{{ $tomeet->type }}</td>
                                                <td>{{ $tomeet->group }}</td>
                                                <td>{{ $tomeet->in }}</td>
                                                <td>{{ $tomeet->out }}</td>
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
