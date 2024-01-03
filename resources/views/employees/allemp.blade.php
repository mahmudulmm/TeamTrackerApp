<x-masters>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">All Employee</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Employee</a></li>
                            <li class="breadcrumb-item active">List</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <a href="{{ route('addemp') }}" class="btn btn-label-primary">Add Employee</i></a>
                                <hr class="mt-2" />
                            </div>
                            <div class="table-responsive ">
                                <table id="mydataTable" class="display nowrap">
                                    <thead>
                                        <tr>
                                            <th>Emp Details</th>
                                            <th>Position</th>
                                            <th>Gender</th>
                                            <th>Status</th>
                                            <th>Photo</th>
                                            <th>Rating</th>
                                            <th>Leave</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employ)
                                            <tr>
                                                <td>
                                                    <span>Name: {{ $employ->name }}</span><br>
                                                    <span>Email: {{ $employ->email }}</span><br>
                                                    <span>Phone: {{ $employ->phone }}</span><br>
                                                    <span>Address: {{ $employ->address }}</span><br>
                                                    <span>Home :{{ $employ->home }}</span><br>
                                                    <span>Join :{{ $employ->join }}</span>
                                                </td>
                                                <td>{{ $employ->postname }}</td>
                                                <td>{{ $employ->gender }}</td>
                                                <td>
                                                    @if ($employ->status == 1)
                                                        <button type="button" class="btn btn-primary text-white">
                                                            <span class="ti-xs ti ti-star me-1 text-white"></span>Active
                                                        </button>
                                                    @else
                                                        <button type="button" class="btn btn-danger text-white">
                                                            <span class="ti-xs ti ti-bell me-1 text-white"></span>On
                                                            Hold
                                                        </button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ asset('storage/employee_images/' . $employ->photo) }}"
                                                        target="_blank">
                                                        <img src="{{ asset('storage/employee_images/' . $employ->photo) }}"
                                                            alt="Employee Photo" width="100">
                                                    </a>
                                                </td>
                                                <td>{{ $employ->rating }}</td>
                                                <td>{{ $employ->leave }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

</x-masters>
