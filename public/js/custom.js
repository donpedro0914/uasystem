$(document).ready(function() {

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	var baseurl=window.location.protocol + "//" + window.location.host + "/";

	//Plugins
	$('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });

	$('.date').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    $(".select2").select2();

	$('#alumni').on('keyup change', function() {
        var alumni = $(this).val();
        checkalumni(alumni);
		alumnicheck(alumni);
    });

	function alumnicheck(alumni) {
        $.ajax({
            type: 'POST',
            url: baseurl + '/checkalumnidup',
            data: {'alumni':alumni},
            success: function(data) {
                if(data) {
					$('.alumnicheck').html('<i class="mdi mdi-close-circle text-danger" aria-hidden="true" data-toggle="tooltip" data-placement="right"> <small>Alumni ID has been taken</small></i>');
                } else {
                }
            }
        });
	}
	function checkalumni(alumni) {
        $.ajax({
            type: 'POST',
            url: baseurl + '/checkalumni',
            data: {'alumni':alumni},
            success: function(data) {
                if(data) {
                    $('.reg-field').removeAttr('disabled');
                } else {
                    $('.reg-field').attr('disabled', 'disabled');
                }
            }
        });
    };


	$('.apply-btn').on('click', function(e) {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		e.preventDefault();
		var job_id = $(this).attr('data-id');
		var user_id = $(this).attr('data-user');

		swal({
			title: 'Are you sure you want to apply?',
			text: 'You can not undo once submitted',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes!'
		}).then((result) => {
		  if (result.value) {
		  	$.ajax({
				type:'POST',
				url: baseurl + 'applyjob',
				data:{'job_id':job_id,'user_id':user_id},
				success: function(data) {
					swal(
						'Done!',
						'You have successfully applied to this job!',
						'success'
					  )
					setTimeout(function() {
						location.reload();
					}, 500)
				}
			});
		  }
		});
	});

	$('.approvebtn').on('click', function(e) {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		e.preventDefault();
		var job_id = $(this).attr('data-id');

		swal({
			title: 'Are you sure you want to approve this application?',
			text: 'You can not undo once submitted',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes!'
		}).then((result) => {
		  if (result.value) {
		  	$.ajax({
				type:'POST',
				url: baseurl + 'approveapplication',
				data:{'id':job_id},
				success: function(data) {
					swal(
						'Done!',
						'You have successfully approved this application!',
						'success'
					  )
					setTimeout(function() {
						location.reload();
					}, 500)
				}
			});
		  }
		});
	});

	
	$('.rejectbtn').on('click', function(e) {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		e.preventDefault();
		var job_id = $(this).attr('data-id');

		swal({
			title: 'Are you sure you want to reject this application?',
			text: 'You can not undo once submitted',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes!'
		}).then((result) => {
		  if (result.value) {
		  	$.ajax({
				type:'POST',
				url: baseurl + 'rejectapplication',
				data:{'id':job_id},
				success: function(data) {
					swal(
						'Done!',
						'You have successfully rejected this application!',
						'success'
					  )
					setTimeout(function() {
						location.reload();
					}, 500)
				}
			});
		  }
		});
	});
	
	$('.initialbtn').on('click', function(e) {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		e.preventDefault();
		var job_id = $(this).attr('data-id');

		swal({
			title: 'Are you sure you want to update this application?',
			text: 'You can not undo once submitted',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes!'
		}).then((result) => {
		  if (result.value) {
		  	$.ajax({
				type:'POST',
				url: baseurl + 'initialapplication',
				data:{'id':job_id},
				success: function(data) {
					swal(
						'Done!',
						'You have successfully updated this application!',
						'success'
					  )
					setTimeout(function() {
						location.reload();
					}, 500)
				}
			});
		  }
		});
	});
	
	$('.exambtn').on('click', function(e) {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		e.preventDefault();
		var job_id = $(this).attr('data-id');

		swal({
			title: 'Are you sure you want to update this application?',
			text: 'You can not undo once submitted',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes!'
		}).then((result) => {
		  if (result.value) {
		  	$.ajax({
				type:'POST',
				url: baseurl + 'examapplication',
				data:{'id':job_id},
				success: function(data) {
					swal(
						'Done!',
						'You have successfully updated this application!',
						'success'
					  )
					setTimeout(function() {
						location.reload();
					}, 500)
				}
			});
		  }
		});
	});
	
	$('.finalbtn').on('click', function(e) {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		e.preventDefault();
		var job_id = $(this).attr('data-id');

		swal({
			title: 'Are you sure you want to update this application?',
			text: 'You can not undo once submitted',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes!'
		}).then((result) => {
		  if (result.value) {
		  	$.ajax({
				type:'POST',
				url: baseurl + 'finalapplication',
				data:{'id':job_id},
				success: function(data) {
					swal(
						'Done!',
						'You have successfully updated this application!',
						'success'
					  )
					setTimeout(function() {
						location.reload();
					}, 500)
				}
			});
		  }
		});
	});

	//Delete Function
	$('.btn-delete').on('click', function(e) {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		e.preventDefault();

		swal({
			title: 'Are you sure?',
			text: 'You will not be able to recover this information!',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes!'
		}).then((result) => {
		if (result.value) {

			var id = $(e.currentTarget).attr('data-id');
			var name = $(e.currentTarget).attr('data-name');
			var module = $(e.currentTarget).attr('data-module');

			var url = document.location.origin + "/job/delete/" + id;
			var datatable = "ajax-jobs";
			

			var data = "id="+id;
			$.ajax({
				type: "DELETE",
				url: url,
				data: data,
				success: function(data) {
					$('.' + datatable).DataTable().row($(e.currentTarget).parents('tr')).remove().draw(false);
				}
			});

			swal('Deleted!', name + ' has been deleted', 'success');
		}
		});
	});

});
