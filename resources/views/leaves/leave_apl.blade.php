<x-masters>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Leave Request</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Leave</a></li>
                            <li class="breadcrumb-item active">Request</li>
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
                                            <th>Status</th>
                                            <th>Eid</th>
                                            <th>Type</th>
                                            <th>FromS</th>
                                            <th>To</th>
                                            <th>Day</th>
                                            <th>Dremaining</th>
                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($leaves as $leave)
                                            <tr>
                                                <td>
                                                    @if ($leave->status == 0)
                                                        <button type="button" class="btn btn-primary text-white">
                                                            Pending
                                                        </button>
                                                    @elseif ($leave->status == 1)
                                                        <button type="button" class="btn btn-success text-white">
                                                            Approved
                                                        </button>
                                                    @elseif ($leave->status == 2)
                                                        <button type="button" class="btn btn-danger text-white">
                                                            Reject
                                                        </button>
                                                    @endif
                                                </td>
                                                <td>{{ $leave->eid }}</td>
                                                <td>{{ $leave->type }}</td>
                                                <td>{{ $leave->from }}</td>
                                                <td>{{ $leave->to }}</td>
                                                <td>{{ $leave->day }}</td>
                                                <td>{{ $leave->dremaining }}</td>
                                                <td>{{ $leave->note }}</td>
                                                <td>
                                                    <form
                                                        method="POST"action="{{ route('leave_apl.updateStatus', $leave) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <select class="btn btn-outline-primary" name="status">
                                                            <option class="text-center"> select</option>
                                                            <option value="0">Pending</option>
                                                            <option value="1"> Approved</option>
                                                            <option value="2"> Reject</option>
                                                        </select>
                                                        <button class="btn btn-primary" type="submit">submit</button>
                                                    </form>
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
