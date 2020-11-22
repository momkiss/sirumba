$( document ).ready(function() {

	

	// Message
	$("#but1").click(function(){
		var message = $("#message").val();
		if(message == ""){
			message  = "Your message";
		}
		swal(message);
	});

	// With message and title
	$("#but2").click(function(){
		var message = $("#message").val();
		var title = $("#title").val();
		if(message == ""){
			message  = "Your message";
		}
		if(title == ""){
			title = "Your message";
		}
		swal(title,message);
	});

	// Show image
	$("#but3").click(function(){
		var message = $("#message").val();
		var title = $("#title").val();
		if(message == ""){
			message  = "Your message";
		}
		if(title == ""){
			title = "Your message";
		}
		swal({
			title: title,
			text: message,
			imageUrl: '../assets/images/brand/logo.png'
		});
	});

	// Timer
	$("#but4").click(function(){
		var message = $("#message").val();
		var title = $("#title").val();
		if(message == ""){
			message  = "Your message";
		}
		if(title == ""){
			title = "Your message";
		}
		message += "(close after 2 seconds)";
		swal({
			title: title,
			text: message,
			timer: 2000,
			showConfirmButton: false
		});
	});

	//
	$("#click").click(function(){
		var type = $("#type").val();
		swal({
			title: "Title",
			text: "Your message",
			type: type
		});
	});

	// Prompt
	$("#prompt").click(function(){

		swal({
			title: "Add",
			text: "Enter your message",
			type: "input",
			showCancelButton: true,
			closeOnConfirm: false,
			inputPlaceholder: "Your message"
		},function(inputValue){


			if (inputValue != "") {
				swal("Input","You have entered : " + inputValue);

			}
		});
	});

	// Confirm
	$("#confirm").click(function(){
		swal({
			title: "Alert",
			text: "Are you really want to exit",
			type: "warning",
			showCancelButton: true,
			confirmButtonText: 'Exit',
			cancelButtonText: 'Stay on the page'
		});
	});


	$("#click").click(function(){
		swal('Congratulations!', 'Your message has been succesfully sent', 'success');
	});
	$("#click1").click(function(){
		swal({
			title: "Alert",
			text: "Waring alert",
			type: "warning",
			showCancelButton: true,
			confirmButtonText: 'Exit',
			cancelButtonText: 'Stay on the page'
		});
	});
	$("#click2").click(function(){
		swal({
			title: "Alert",
			text: "Danger alert",
			type: "error",
			showCancelButton: true,
			confirmButtonText: 'Exit',
			cancelButtonText: 'Stay on the page'
		});
	});


});



function hapus(id,el)
{	
	
	swal({
		title: "Yakin menghapus data ini?",
		text: "Data sudah dihapus tidak dapat dikembalikan lagi.",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
		.then((willDelete) => {
			if (willDelete) {
				var token = $("meta[name='csrf-token']").attr("content");
				$.ajax({
					url: BASE_URL+'/admin/'+el+'/'+id,
					type: 'DELETE',
					data: {
						"_token": token,
					},
					success: function (res) {
						alertSelesai(res.pesan, 'permohonan');
					}
				});
			} 
		});
}

function alertSelesai(pesan, el)
{
	swal("Berhasil !", pesan, "success");
	var table = $('#tabel-'+el).DataTable();
	table.ajax.reload();
	
}

function alertError(pesan) {
	swal("Peringatan !", pesan, "error");
}