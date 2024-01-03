<x-masters>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Groups</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Groups</a></li>
                            <li class="breadcrumb-item active">Group Name</li>
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
                                        <th>Zone</th>
                                        <th>Sector Leader</th>
                                        <th>Team Leader</th>
                                        <th>Note</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($groups as $atte)
                                            <tr>
                                                <td>{{ $atte->name }}</td>
                                                <td>{{ $atte->zid }}</td>
                                                <td>{{ $atte->leader }}</td>
                                                <td>{{ $atte->team }}</td>
                                                <td>{{ $atte->note }}</td>
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
                            <h5 class="card-header">Add Zone</h5>
                            <div class="card-body">
                                <form action="{{ route('group.gstore') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input id="name" name="name" type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Zone</label>
                                        <select name="zid" class="form-control">
                                            <option value="0" class="text-center">-- Zone --</option>
                                            @foreach ($zones as $datum)
                                                <option class="text-center" value="{{ $datum->id }}">
                                                    {{ $datum->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Sector Leader</label>
                                        <select name="leader" class="form-control">
                                            <option value="0" class="text-center">-- Sector Leader --</option>
                                            @foreach ($employees as $datum)
                                                <option class="text-center" value="{{ $datum->id }}">
                                                    {{ $datum->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Team Leader</label>
                                        <select name="team" class="form-control">
                                            <option value="0" class="text-center">-- Team Leader --</option>
                                            @foreach ($employee as $datum)
                                                <option class="text-center" value="{{ $datum->id }}">
                                                    {{ $datum->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Note</label>
                                        <input id="note" name="note" type="text" class="form-control">
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
