var row,rowcount;
function addRow() {
    var tr = document.createElement("tr");
    tr.setAttribute("class","table-active");
    tr.setAttribute("id","row"+row);
    tr.innerHTML += `
        <td><input name="item[]" type="text" class="form-control""></td>
        <td>
            <select name="type[]" class="form-control btn-outline-primary"">
                <option value="Edible" class="form-control">Edible</option>
                <option value="Clothing" class="form-control">Clothing</option>
                <option value="Usable" class="form-control">Usable</option>
                <option value="Stationary" class="form-control">Stationary</option>
                <option value="Monetary" class="form-control">Monetary</option>
                <option value="Miscellaneous" class="form-control">Miscellaneous</option>
            </select>
        </td>
        <td><input name="amt[]" type="number" class="form-control"></td>
        <td><input name="unit[]" type="text" class="form-control"></td>
        <td><textarea name="remarks[]" cols="15" rows="1" class="form-control"></textarea></td>
        <td><button class="btn btn-outline-danger btn-lg" onclick="deleteRow(`+row+`)">&minus;</button></td>
    `;
    document.getElementById("dtable").appendChild(tr);
    row++;
    rowcount++;
}

function deleteRow(r) {
    if(rowcount>1) {
        document.getElementById("row"+r).remove();
        rowcount--;
    }
}

function pageinit() {
    row=rowcount=0;
    addRow();
}