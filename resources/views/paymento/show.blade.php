<x-masters>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">
                            All Transactions
                        </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a>
                                    Transaction
                                </a></li>
                            <li class="breadcrumb-item active">Report</li>
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
                                        <th>Pay Method</th>
                                        <th>Cients</th>
                                        <th>order</th>
                                        <th>paid</th>
                                        <th>Balance</th>
                                        <th>date</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $record)
                                            <tr>
                                                <td>
                                                    @php
                                                        $aid = $record->aid;
                                                    @endphp

                                                    @if ($aid == 1)
                                                        <span class="checkmark-icon">
                                                            <span class="icon-text text-success">Bkash
                                                            </span>
                                                        </span>
                                                    @elseif ($aid == 2)
                                                        <span class="checkmark-icon">
                                                            <span class="icon-text text-success">Nagod
                                                            </span>
                                                        </span>
                                                    @elseif ($aid == 3)
                                                        <span class="checkmark-icon">
                                                            <span class="icon-text text-success">Rocket
                                                            </span>
                                                        </span>
                                                    @elseif ($aid == 4)
                                                        <span class="checkmark-icon">
                                                            <span class="icon-text text-success">Bank Transfer
                                                            </span>
                                                        </span>
                                                    @elseif ($aid == 5)
                                                        <span class="checkmark-icon">
                                                            <span class="icon-text text-success">Credit Card
                                                            </span>
                                                        </span>
                                                    @elseif ($aid == 6)
                                                        <span class="checkmark-icon">
                                                            <span class="icon-text text-success">HandCash
                                                            </span>
                                                        </span>
                                                    @elseif ($aid == 7)
                                                        <span class="checkmark-icon">
                                                            <span class="icon-text text-success">Upay</span>
                                                        </span>
                                                    @else
                                                        <span class="icon-text">No Transaction operator found</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span>{{ $cid = $record->organization }}</span><br>
                                                    <span>{{ $cid = $record->namec }}</span><br>
                                                    <span>{{ $cid = $record->designaton }}</span><br>
                                                    <span>{{ $cid = $record->email }}</span>
                                                </td>
                                                <td>{{ $order = $record->order }}</td>
                                                <td>{{ $paid = $record->paid }}</td>
                                                <td>{{ $balance = $record->balance }}</td>
                                                <td>{{ $date = $record->date }}</td>
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
    </x-master>
