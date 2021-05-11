$(function(){
    $("#nRows").val(2); // Valor por defecto
    $(".show-modal").on('click', function(){
        $("#ambitModal").modal({
            backdrop: 'static',
            keyboard: false
        });
    });
    var counter = 3;

    $("#addrow").on("click", function () {
        counter = $('#myTable tbody tr').length;

        var newRow = $("<tr>");
        var cols = "";

        cols += `<td><input type="text" placeholder="Nom àmbit" class="form-control" name="ambito_${counter}"/></td>`;
        cols += `<td><textarea type="text" placeholder="Descripció" class="form-control" name="descripcion_${counter}"/></textarea></td>`;
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
        $('#addrow').attr('disabled', false).prop('value', "Afegir àmbit");
    });
});