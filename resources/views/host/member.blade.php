<x-masters>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Members</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Members</a></li>
                            <li class="breadcrumb-item active">All</li>
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
                                        <th>Eid</th>
                                        <th>Group</th>
                                        <th>Sector Leader</th>
                                        <th>Team Leader</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($members as $atte)
                                            <tr>
                                                <td>{{ $atte->eid }}</td>
                                                <td>
                                                    <span>{{ $atte->nameg }}</span><br>
                                                    <span>Zone : {{ $atte->zid }}</span>
                                                </td>
                                                <td>{{ $atte->leader }}</td>
                                                <td>{{ $atte->team }}</td>
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
                            <h5 class="card-header">Add Member</h5>
                            <div class="card-body">
                                <form action="{{ route('member.mstore') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Eid</label>
                                        <select name="eid" class="form-control">
                                            <option value="0" class="text-center">-- Eid --</option>
                                            @foreach ($employees as $datum)
                                                <option class="text-center" value="{{ $datum->id }}">
                                                    {{ $datum->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Group</label>
                                        <select name="group" class="form-control">
                                            <option value="0" class="text-center">-- Group --</option>
                                            @foreach ($groups as $datum)
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
                                            @foreach ($employe as $datum)
                                                <option class="text-center" value="{{ $datum->id }}">
                                                    {{ $datum->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <<div class="mb-3">
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
