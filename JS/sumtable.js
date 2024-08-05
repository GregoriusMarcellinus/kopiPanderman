function sumQty(jumlah) {
    var total = 0;
    var table = document.getElementById(jumlah);
    var rowCount = table.rows.length;
    for (var i = 0; i < rowCount; i++) {
        var row = table.rows[i];
        var colCount = row.cells.length;
        for (var j = 0; j < cellCount; j++) {
            var node = row.cells[j].childNodes[0];
            if (node.name == "qty[]") {
                total += parseInt(node.value);
            }
        }
    }
    return total;
}