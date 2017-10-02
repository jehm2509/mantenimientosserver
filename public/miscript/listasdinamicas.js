$('#pais').chosen().change(function(event){
        $.get( route('departamentos', event.target.value), function(response){
            $("#departamento").removeAttr('disabled');
            $("#departamento").empty();
            $("#municipio").prop('disabled', true);
            $("#municipio").empty();
            $("#municipio").append("<option selected>Seleccione el Municipio donde labora</option>").trigger('chosen:updated');
            $("#area").prop('disabled', true);
            $("#area").empty();
            $("#area").append("<option selected>Seleccione la localidad donde labora</option>").trigger('chosen:updated');
            $("#localidad").prop('disabled', true);
            $("#localidad").empty();
            $("#localidad").append("<option selected>Seleccione el Area al que pertenece</option>").trigger('chosen:updated');
            for(i=0; i < response.length; i++){
                $("#departamento").append("<option value='" + response[i].idDepartamento + "'>" + response[i].departamento + "</option>").trigger('chosen:updated');
           }
        });

});


$('#departamento').chosen().change(function(event){

    $.get( route('municipios', event.target.value), function(response){
        $("#municipio").removeAttr('disabled');
        $("#municipio").empty();
        $("#municipio").append("<option selected>Seleccione el Municipio donde labora</option>").trigger('chosen:updated');
        $("#area").prop('disabled', true);
        $("#area").empty();
        $("#area").append("<option selected>Seleccione la localidad donde labora</option>").trigger('chosen:updated');
        $("#localidad").prop('disabled', true);
        $("#localidad").empty();
        $("#localidad").append("<option selected>Seleccione el Area al que pertenece</option>").trigger('chosen:updated');
        for(i=0; i < response.length; i++){
            $("#municipio").append("<option value='" + response[i].idMunicipio + "'>" + response[i].municipio + "</option>").trigger('chosen:updated');
        }
    });
});

$('#municipio').chosen().change(function(event){

    $.get( route('localidades', event.target.value), function(response){
        $("#localidad").removeAttr('disabled');
        $("#localidad").empty();
        $("#localidad").append("<option selected>Seleccione la Localidad donde labora</option").trigger('chosen:updated');
        $("#area").prop('disabled', true);
        $("#area").empty();
        $("#area").append("<option selected>Seleccione la localidad donde labora</option>").trigger('chosen:updated');
        for(i=0; i < response.length; i++){
            $("#localidad").append("<option value='" + response[i].idLocalidad + "'>" + response[i].nombre + "</option>").trigger('chosen:updated');
        }
    });
});

$('#localidad').chosen().change(function(event){
    $.get( route('areas', event.target.value), function(response){
        $("#area").removeAttr('disabled');
        $("#area").empty();
        $("#area").append("<option selected>Seleccione el Area al que pertenece el Usuario</option>")
        for(i=0; i < response.length; i++){
            $("#area").append("<option value='" + response[i].idArea + "'>" + response[i].area + "</option").trigger('chosen:updated');
        }
    });
});

$('#area').chosen();


//NOTA IMPORTANTE: Se puede observar que acá se implementa el plugin chosen para los selects dinamos y tambien se puede observar que despues de añadir los options a cada select con la funcion append
//despues se llama a una funcion llamada trigger con el parametro 'chosen:update' el cual lo que hace es actualizar los cambios que se realizan al ejecutarse el evento change ya que de lo contrario
//no funcionarian.