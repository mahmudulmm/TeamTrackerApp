<x-masters>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">NotiFications</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Notification</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 right">
                    <div class="col-md mb-4 mb-md-0">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12">
                                    <a href="{{ route('allnotification') }}" class="btn btn-label-primary">All
                                        Notification</i></a>
                                    <hr class="mt-2" />
                                </div>
                                <form action="{{ route('empnotifications.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <select name="name" class="form-control">
                                            <option value="0" class="text-center">-- Emp Name --</option>
                                            @foreach ($employees as $datum)
                                                <option class="text-center" value="{{ $datum->name }}">
                                                    {{ $datum->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Bio</label>
                                        <textarea class="form-control" name="descriptions" rows="3" required></textarea>
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
</x-masters>
