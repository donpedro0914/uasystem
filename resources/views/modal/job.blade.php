<div id="addJob" class="modal fade" aria-labelledby="addTherapist">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Job</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			</div>
			<div class="modal-body">
				<form id="menuForm" action="{{ route('jobs.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-row">
                        <h5 class="col-12">Job Information</h5>
                        <div class="col-12">
                            <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                    <label>Job Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter job title.."/>
                                </div>
                                <div class="form-group col-md-12 col-xs-12">
                                    <label>Company</label>
									<select class="form-control" name="company">
										<option>-- Select Company --</option>
										<option value="University of the Assumption">University of the Assumption</option>
										@foreach(App\User::where('role', 2)->get() as $c)
										<option value="{{ $c->name }}">{{ $c->name }}</option>
										@endforeach
									</select>
                                </div>
                                <div class="form-group col-md-12 col-xs-12">
                                    <label>Job Description</label>
                                    <textarea class="form-control" name="description"></textarea>
                                </div>
                                <div class="form-group col-md-12 col-xs-12">
                                    <label>Job Responsibilities</label>
                                    <textarea class="form-control" name="responsibilities"></textarea>
                                </div>
                                <div class="form-group col-md-12 col-xs-12">
                                    <label>Job Requirements</label>
                                    <textarea class="form-control" name="requiremnts"></textarea>
                                </div>
                            </div>
                        </div>
						<div class="form-group col-md-12 col-xs-12">
							<div class="clearfix text-right mt-3">
								<button type="submit" id="addStoreBtn" class="btn btn-success">
									Add Job
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>