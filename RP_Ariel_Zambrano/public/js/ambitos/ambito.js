$(function(){
    // Abrir Modal por defecto
    // $('#ambitModal').modal('show'); // Mostrar àmbit

    $("#nRows").val(2); // Valor por defecto
    $(".show-modal").on('click', function(){
        $("#ambitModal").modal(
            { backdrop: 'static', keyboard: true });
    });

    var counter = $('#myTable tbody tr').length;
    if (counter >= 8) $('#addrow').attr('disabled', true).prop('value', "Has arrivat al límit d'àmbits!");

    $("#addrow").on("click", function () {

        var newRow = $("<tr>");
        var cols = "";
        counter = $('#myTable tbody tr').length;
        cols += `<td><input type="text" placeholder="Nom àmbit" class="form-control" name="ambitos[]"/></td>`;
        cols += `<td><textarea type="text" placeholder="Descripció" class="form-control" name="descripcion[]"/></textarea></td>`;
        cols += '<td><a class="deleteRow btn btn-danger d-block">X</a></td>';
        newRow.append(cols);
        counter++;
        $("#nRows").val(counter);
        if (counter >= 8) $('#addrow').attr('disabled', true).prop('value', "Has arrivat al límit d'àmbits!");
        $("table").append(newRow);
    });


    $("table").on("click", ".deleteRow", function () {
        $(this).closest("tr").remove();
        counter -= 1
        $("#nRows").val(counter);
        $('#addrow').attr('disabled', false).prop('value', "Afegir àmbit");
    });
});
/** Esta función nos servirá para pasar la información de nuestros ámbitos al modal de Boostrap mediante la propiedad data-* de HTML */
// $("#table-update tbody").find("tr").on("click", function () {
//     var $tr = $(this).index();
//     var ambito = $("#ambito_"+$tr).val();
//     var descripcion = $("#descripcion_"+$tr).val();
//     $("#ambitoActual").val($tr);
//     $(".modal-body #nombre").val( ambito );
//     $(".modal-body #descripcion").val( descripcion );
// });
