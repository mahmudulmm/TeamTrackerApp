<x-masters>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Holiday</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Holiday</a></li>
                            <li class="breadcrumb-item active">All Holiday</li>
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
                                        <tr>
                                            <th>Name</th>
                                            <th>start_date</th>
                                            <th>End_date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($holidays as $atte)
                                            <tr>
                                                <td>{{ $atte->name }}</td>
                                                <td>{{ $atte->start_date }}</td>
                                                <td>{{ $atte->end_date }}</td>
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
                            <h5 class="card-header">Select Holiday</h5>
                            <div class="card-body">
                                <form action="{{ route('holidays.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Holidays Type" required />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="start_date">Start Date</label>
                                        <input class="form-control" type="date" name="start_date"
                                            id="start_date"required />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="end_date">End Date</label>
                                        <input type="date" name="end_date" id="end_date" class="form-control" />
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
