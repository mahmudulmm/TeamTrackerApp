<x-masters>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Post</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Post</a></li>
                            <li class="breadcrumb-item active">Post History</li>
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
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Salary</th>
                                        <th>Emp Id Code</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($eposts as $atte)
                                            <tr>
                                                <td>{{ $atte->id }}</td>
                                                <td>{{ $atte->name }}</td>
                                                <td>{{ $atte->salary }}</td>
                                                <td>{{ $atte->code }}</td>
                                                <td>
                                                    @if ($atte->status == 1)
                                                        <button type="button" class="btn btn-primary text-white">
                                                            <span class="ti-xs ti ti-star me-1 text-white"></span>Active
                                                        </button>
                                                    @else
                                                        <button type="button" class="btn btn-info text-danger">
                                                            <span
                                                                class="ti-xs ti ti-star me-1 text-danger"></span>Deactive
                                                        </button>
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
                            <h5 class="card-header">Add Posts</h5>
                            <div class="card-body">
                                <form action="{{ route('emposts.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input name="name" type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Salary</label>
                                        <input name="salary" type="number" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Code</label>
                                        <input name="code" type="number" class="form-control">
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
