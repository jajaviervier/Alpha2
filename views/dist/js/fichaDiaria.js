$(document).ready(function(){
	$("#formu-nuevo-fichaDiaria").submit(function (e) {
		e.preventDefault()
		var datos = new FormData($(this)[0])
    datos.append("idFuncionarioForaneo", $('#idFuncionario').val());
    datos.append("idcascoForaneo", $('#idCasco').val());
    datos.append("idChalecoForaneo", $('#idChaleco').val());
    datos.append("idRadioForaneo", $('#idRadio').val());
    datos.append("idAccesoriosForaneo", $('#idAccesorios').val());
    datos.append("idArmasForaneo", $('#idArmas').val());
    datos.append("idVehiculoForaneo", $('#idVehiculos').val());
    datos.append("idQuimicosForaneo", $('#idQuimicos').val());


console.log(datos)
		$.ajax({
			url: 'ajax/ajaxfichaDiaria.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta) {
				console.log(respuesta)
				switch(respuesta) {
					case "1":
					swal({
						type: 'success',
						title: 'Excelente',
						text: 'fichaDiaria creada con exito!'
					  }).then((result) => {
						if (result.value) {
							window.location = "fichaDiaria"
						  }
					  })
						break;
					case "2":
					swal({
						type: 'error',
						title: 'Error',
						text: 'Vehiculo ya registrada'//se muestra un mensaje si el dato ya existe!
					  }).then((result) => {
						if (result.value) {

						}
					  })
						break;
					default:
					swal({
						type: 'error',
						title: 'Error',
						text: 'Algo salió mal'
					  }).then((result) => {
						if (result.value) {

						}
					  })
				}
			}

		})

	})

	$("body .table-dark").on("click", ".btnEliminarfichaDiaria", function(){
		var idfichaDiaria = $(this).attr("idfichaDiaria")

		var datos = new FormData()
		datos.append("id_fichaDiaria", idfichaDiaria);
		datos.append("tipoOperacion", "eliminarfichaDiaria");
		swal({
		  title: '¿Estás seguro de eliminar?',
		  text: "Los cambios no son reversibles!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Si, Eliminar!'
		}).then((result) => {
		  if (result.value) {
		  	$.ajax({
				url: 'ajax/ajaxfichaDiaria.php',
				type: 'POST',
				data: datos,
				processData: false,
				contentType: false,
				success: function(respuesta) {
					console.log(respuesta)
					if ( respuesta == "ok") {
						swal(
					      'Eliminado!',
					      'Su archivo a sido eliminadso.',
					      'success'
					    ).then((result) => {
						  if (result.value) {
						    window.location = "fichaDiaria"
						  }
						})
					}
				}

			})
		  }
		})






	})

	$("#formu-editar-fichaDiaria").submit(function (e) {
		e.preventDefault()

		var datos = new FormData($(this)[0])

		$.ajax({
			url: 'ajax/ajaxfichaDiaria.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta) {
				console.log(respuesta)
				if (respuesta == "ok") {
					swal({
					  type: 'success',
					  title: 'Actualizado',
					  text: 'fichaDiaria actualizado con éxito'
					}).then((result) => {
					  if (result.value) {
					    window.location = "fichaDiaria"
					  }
					})
				}
			}

		})

	})


	$("body .table-dark").on("click", ".btnEditarfichaDiaria", function(){
		var idfichaDiaria = $(this).attr("idfichaDiaria");

		var datos = new FormData()
		datos.append("id_fichaDiaria", idfichaDiaria)
		datos.append("tipoOperacion", "editarfichaDiaria")
		$.ajax({
			url: 'ajax/ajaxfichaDiaria.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta) {
				console.log(respuesta);
				var valor = JSON.parse(respuesta)
				console.log(valor.id_fichaDiaria)
				console.log(valor.numeroFicha)

				$('#formu-editar-fichaDiaria input[name="numeroFicha"]').val(valor.numerofichaDiaria)
				$('#formu-editar-fichaDiaria select[name="idFuncionarioForaneo"]').val(valor.funcionariofichaDiaria)
				$('#formu-editar-fichaDiaria select[name="idcascoForaneo"]').val(valor.cascofichaDiaria)
				$('#formu-editar-fichaDiaria select[name="idChalecoForaneo"]').val(valor.chalecofichaDiaria)

        $('#formu-editar-fichaDiaria select[name="idRadioForaneo"]').val(valor.radiofichaDiaria)
        $('#formu-editar-fichaDiaria select[name="idAccesoriosForaneo"]').val(valor.accesoriosfichaDiaria)
        $('#formu-editar-fichaDiaria select[name="idArmasForaneo"]').val(valor.armafichaDiaria)
        $('#formu-editar-fichaDiaria select[name="idVehiculoForaneo"]').val(valor.vehiculofichaDiaria)
        $('#formu-editar-fichaDiaria select[name="idQuimicosForaneo"]').val(valor.quimicofichaDiaria)


				$('#formu-editar-fichaDiaria input[name="id_fichaDiaria"]').val(valor.id_fichaDiaria)

			}

		})

	})
})