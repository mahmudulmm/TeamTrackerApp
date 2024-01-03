<x-masters>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Add Employee</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Employee</a></li>
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
                                <a href="{{ route('allemp') }}" class="btn btn-primary">All Employee</a>
                                <hr class="mt-2" />
                            </div>
                            <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data"
                                class="row g-3">
                                @csrf
                                <div class="col-md-6">
                                    <label class="form-label">Eid</label>
                                    <input type="text" class="form-control" placeholder="Employee Id" name="eid"
                                        required />
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" />
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input class="form-control" type="email" name="email"
                                        placeholder="demo@gmail.com" />
                                </div>

                                <div class="col-md-6">
                                    <div class="form-password-toggle">
                                        <label class="form-label" for="formValidationPass">Create Password</label>
                                        <div class="input-group input-group-merge">
                                            <input class="form-control" type="password" name="password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                            <span class="input-group-text cursor-pointer"><i
                                                    class="ti ti-eye-off"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input class="form-control" type="text" name="phone" placeholder="01234-000000"
                                        required />
                                </div>

                                <!-- Personal Info -->
                                <div class="col-md-6">
                                    <label class="form-label">Address</label>
                                    <input class="form-control" type="text" name="address"
                                        placeholder="Address, address" />
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Home</label>
                                    <input class="form-control" type="text" name="home"
                                        placeholder="address, address" />
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Join</label>
                                    <input class="form-control" type="date" name="join" />
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Position</label>
                                    <select name="position" class="form-control">
                                        <option value="0" class="text-center">-- Select --</option>
                                        @foreach ($eposts as $datum)
                                            <option class="text-center" value="{{ $datum->id }}">{{ $datum->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Photo</label>
                                    <input type="file" name="photo" id="photo" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Gender</label>
                                    <div class="form-check custom mb-2">
                                        <input type="radio" name="gender" value="Male" />
                                        <label class="form-check-label">Male</label>
                                    </div>

                                    <div class="form-check custom">
                                        <input type="radio" name="gender" value="Female" />
                                        <label class="form-check-label">Female</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" name="submitButton"
                                        class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
</x-masters>
