<div id="addJob" class="modal fade" aria-labelledby="addTherapist">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Registration</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			</div>
			<div class="modal-body">
				<form id="menuForm" action="{{ route('register') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-row">
                        <h5 class="col-12">Basic Information</h5>
                        <div class="col-12">
                            <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" name="fname"/>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email"/>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone"/>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>Date of Birth</label>
                                    <div class="input-group m-b-30">
                                        <input type="text" class="form-control" name="dob" id="datepicker-autoclose" data-date-format="yyyy-mm-dd" value="{!! date('Y-m-d') !!}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>Gender</label>
                                    @php
                                        $option = array(
                                            'm' => 'Male',
                                            'f' => 'Female',
                                        );
                                    @endphp
                                    {{ Form::select('gender', $option, '', ['class' => 'form-control']) }}
                                </div>
                                <div class="form-group col-md-12 col-xs-12">
                                    <label>Upload CV</label>
                                    <input type="file" id="cv" name="cv">
                                </div>
                                <h5 class="col-12">Owner Information</h5>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label class="requiredinput">Username</label> <span class="usercheck"></span>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username.." pattern=".{4,}" required title="4 characters minimum"/>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password"/>
                                </div>
                            </div>
                        </div>
						<div class="form-group col-md-12 col-xs-12">
							<div class="clearfix text-right mt-3">
								<button type="submit" id="addStoreBtn" class="btn btn-success">
									Register
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>