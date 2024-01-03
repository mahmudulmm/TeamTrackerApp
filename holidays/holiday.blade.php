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
										<table  id="mydataTable" class="display nowrap" >
                        <thead>
											      <tr>
												    <th>Name</th>
														<th>Date</th>
                            <th>Action</th>             
                          </tr>
												</thead>
											 <tbody>
                         @foreach($holidays as $atte)
											          <tr>			
												        <td>{{$atte->name}}</td>
                                <td>{{$atte->date}}</td>
                                <td></td>
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
                      <form class="browser-default-validation">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-name">Name</label>
                          <input
                            type="text"
                            class="form-control"
                            id="basic-default-name"
                            placeholder="Holidays Type"
                            required />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-email">Date</label>
                          <input
                            type="date"
                            id="basic-default-email"
                            class="form-control"
                            required />
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