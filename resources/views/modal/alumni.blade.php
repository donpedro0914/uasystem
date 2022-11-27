<div id="addAlumni" class="modal fade" aria-labelledby="addTherapist">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Alumni Number</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			</div>
			<div class="modal-body">
				<form id="menuForm" action="{{ route('alumni.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-row">
                        <div class="col-12">
                            <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                    <label>Alumni Number</label>
                                    <input type="text" class="form-control" name="number"/>
                                </div>
                            </div>
                        </div>
						<div class="form-group col-md-12 col-xs-12">
							<div class="clearfix text-right mt-3">
								<button type="submit" id="addStoreBtn" class="btn btn-success">
									Add Alumni Number
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>