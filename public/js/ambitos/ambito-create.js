$(function(){
    // Abrir Modal por defecto
    // $('#ambitModal').modal({
    //     show: true,
    //     backdrop: 'static',
    //     keyboard: false
    // })
    
    $("#nRows").val(2); // Valor por defecto

    var counter = 3;

    $("#addrow").on("click", function () {
        counter = $('#myTable tbody tr').length;

        var newRow = $("<tr>");
        var cols = "";

        cols += `<td><input type="text" placeholder="Nom àmbit" class="form-control" name="ambitos[]"/></td>`;
        cols += `<td><textarea type="text" placeholder="Descripció" class="form-control" name="descripcion[]"/></textarea></td>`;
        cols += '<td><a class="deleteRow btn btn-danger d-block">X</a></td>';
        newRow.append(cols);
        if (counter == 7) $('#addrow').attr('disabled', true).prop('value', "Has arrivat al límit d'àmbits!");
        $("table").append(newRow);
        counter++;
        $("#nRows").val(counter);
    });

    $("table").on("click", ".deleteRow", function () {
        $(this).closest("tr").remove();
        counter -= 1
        $("#nRows").val(counter);
        $('#addrow').attr('disabled', false).prop('value', "Afegir àmbit");
    });
});
/** Esta función nos servirá para pasar la información de nuestros ámbitos al modal de Boostrap mediante la propiedad data-* de HTML */
$("#table-update tbody").find("tr").on("click", function () {
    var $tr = $(this).index();
    var ambito = $("#ambito_"+$tr).val();
    var descripcion = $("#descripcion_"+$tr).val();
    $(".modal-body #ambito").val( ambito );
    $(".modal-body #descripcion").val( descripcion );
});
