<div id="addCompany" class="modal fade" aria-labelledby="addTherapist">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Company</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			</div>
			<div class="modal-body">
				<form id="menuForm" action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-row">
                        <h5 class="col-12">Company Information</h5>
                        <div class="col-12">
                            <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                    <label>Company Name</label>
                                    <input type="text" class="form-control" name="name"/>
                                </div>
                                <div class="form-group col-md-12 col-xs-12">
                                    <label>Company Description</label>
                                    <textarea class="form-control" name="description"></textarea>
                                </div>
                                <div class="form-group col-md-12 col-xs-12">
                                    <label>Company Source</label>
                                    <input type="text" class="form-control" name="source"/>
                                </div>
                            </div>
                        </div>
						<div class="form-group col-md-12 col-xs-12">
							<div class="clearfix text-right mt-3">
								<button type="submit" id="addStoreBtn" class="btn btn-success">
									Add Company
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>