<x-masters>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Billing Statement</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Billing</a></li>
                            <li class="breadcrumb-item active">Statement</li>
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
                                            <th>Account</th>
                                            <th>Clients</th>
                                            <th>Order</th>
                                            <th>Paid</th>
                                            <th>Balance</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($statements as $meet)
                                            <tr>

                                                <td>{{ $meet->namep }}</td>

                                                <td>
                                                    <span>{{ $meet->organization }}</span><br>
                                                    <span>{{ $meet->namec }}</span><br>
                                                    <span>{{ $meet->designaton }}</span><br>
                                                    <span>{{ $meet->email }}</span>
                                                </td>
                                                <td>{{ $meet->order }}</td>
                                                <td>{{ $meet->paid }}</td>
                                                <td>{{ $meet->balance }}</td>
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
