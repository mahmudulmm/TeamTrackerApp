<x-masters>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">All Product</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Product</a></li>
                            <li class="breadcrumb-item active">All</li>
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
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Details</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $meet)
                                            <tr>

                                                <td>{{ $meet->id }}</td>
                                                <td>{{ $meet->name }}</td>
                                                <td>{{ $meet->pprice }}</td>
                                                <td>{{ $meet->details }}</td>

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
