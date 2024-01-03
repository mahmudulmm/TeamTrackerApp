<x-masters>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Add Order</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Order</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="col-12">
                                <a href="{{ route('allorder') }}" class="btn btn-primary">All Order</a>
                                <hr class="mt-2" />
                            </div>
                            @if (Session::has('success'))
                                <div id="success-message" class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                                <script>
                                    setTimeout(function() {
                                        document.getElementById('success-message').style.display = 'none';
                                    }, 5000);
                                </script>
                            @endif
                            @if ($errors->any())
                                <div id="err-message" class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <script>
                                    setTimeout(function() {
                                        document.getElementById('err-message').style.display = 'none';
                                    }, 5000);
                                </script>
                            @endif

                            <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data "
                                class="row g-3">
                                @csrf

                                <div class="col-md-6">
                                    {{-- <label class="form-label">Eid</label> --}}
                                    <input type="hidden" class="form-control" placeholder="Employee Id" id="eid"
                                        name="eid" value="{{ $eidValue }}" readonly />
                                </div>

                                <div class="col-md-6">
                                    {{-- <label class="form-label">Mid</label> --}}

                                    <input type="hidden" class="form-control" placeholder="Mid Id" id="mid"
                                        name="mid" value="{{ $midValue }}" readonly />
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Type</label>
                                    <input type="text" class="form-control" placeholder="Pid Id" id="pid"
                                        name="pid" value="{{ $pidValue }}" hidden />
                                    <select id="type" name="type" class="form-control">

                                        <option class="text-center">-- Select --</option>
                                        @foreach ($ptypes as $datum)
                                            <option class="text-center" value="{{ $datum->name }}">{{ $datum->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Payment Method</label>
                                    <select id="aid" name="aid" class="form-control">
                                        <option class="text-center">-- Select --</option>
                                        @foreach ($paymentos as $datum)
                                            <option class="text-center" value="{{ $datum->id }}">{{ $datum->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Price</label>
                                    <input type="text" class="form-control" placeholder="price" id="price"
                                        name="price" />
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Payment</label>
                                    <input type="text" class="form-control" placeholder="payment" id="payment"
                                        name="payment" />
                                </div>

                                <input type="hidden" name="cid" value="{{ $cidValue }}">
                                <input type="hidden" name="total">
                                <input type="hidden" name="advance">
                                <input type="hidden" name="due">
                                <input type="hidden" name="billing_date">

                                <div class="col-md-6">
                                    <label class="form-label">Agreement</label>
                                    <input type="date" class="form-control" id="agreement" name="agreement"
                                        value="{{ date('m/d/Y') }}" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Delivery</label>
                                    <input type="date" class="form-control" id="delivery" placeholder="delivery"
                                        name="delivery" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Service fee</label>
                                    <input type="text" class="form-control" placeholder="monthly_fee"
                                        id="monthly_fee" name="monthly_fee" />
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <!---- Start Calculation------>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const priceInput = document.getElementById('price');
                        const paymentInput = document.getElementById('payment');

                        paymentInput.addEventListener('input', function() {
                            const price = parseFloat(priceInput.value) || 0;
                            const payment = parseFloat(paymentInput.value) || 0;

                            // Calculate the other fields
                            const total = price;
                            const advance = Math.max(payment - price, 0);
                            const due = Math.max(price - payment, 0);

                            // Update the hidden input fields
                            document.querySelector('input[name="total"]').value = total;
                            document.querySelector('input[name="advance"]').value = advance;
                            document.querySelector('input[name="due"]').value = due;
                        });
                    });
                </script>

                <!---- End Calculation------>
</x-masters>
