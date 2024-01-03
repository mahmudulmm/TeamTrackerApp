<x-masters>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">All Order</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Order</a></li>
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
                                            <th>Clients</th>
                                            <th>Products</th>
                                            <th>Type</th>
                                            <th>Price</th>
                                            <th>Payment</th>
                                            <th>Service fee</th>
                                            <th class="text-warning">Billing_date</th>
                                            <th>Agreement</th>
                                            <th>Delivery</th>

                                            <th>Invoice</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($orders as $meet)
                                            <tr>
                                                <td>
                                                    <span>{{ $meet->organization }}</span><br>
                                                    <span>{{ $meet->namec }}</span><br>
                                                    <span>{{ $meet->designaton }}</span><br>
                                                    <span>{{ $meet->email }}</span>
                                                </td>
                                                <td>
                                                    <span>{{ $meet->name }}</span><br>
                                                    <span>{{ $meet->details }}</span>
                                                </td>
                                                <td>{{ $meet->type }}</td>
                                                <td>{{ $meet->price }}</td>
                                                <td>
                                                    <span>Total:{{ $meet->total }}</span><br>
                                                    <span>Pay:{{ $meet->payment }}</span><br>
                                                    <span>Advance:{{ $meet->advance }}</span><br>
                                                    <span>Due:{{ $meet->due }}</span>
                                                </td>
                                                <td>{{ $meet->monthly_fee }}</td>
                                                <td class="text-warning">{{ $meet->billing_date }}</td>
                                                <td>{{ $meet->agreement }}</td>
                                                <td>{{ $meet->delivery }}</td>
                                                <td>
                                                    <a class="btn btn-icon rounded-pill btn-primary" target="_blank"
                                                        rel="noopener noreferrer"
                                                        href="{{ route('invoice.addinvoice', ['id' => ($id = $meet->id)]) }}">
                                                        <i class=" fas fa-receipt"></i>
                                                    </a>
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
