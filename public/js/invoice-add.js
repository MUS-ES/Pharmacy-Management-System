

var rows = 0;
const addFields = document.getElementById("add-fields");
const removeFields = document.getElementById("remove-fields");

addFields.addEventListener("click", function addRow() {
    if (typeof addRow.counter == 'undefined')
        addRow.counter = 1;
    var previous = document.getElementById("invoice_medicine_list_div").innerHTML;
    var node = document.createElement("div");
    var cls = document.createAttribute("id");
    cls.value = "medicine_row_" + addRow.counter;
    node.setAttributeNode(cls);
    // var xhttp = new XMLHttpRequest();
    // xhttp.onreadystatechange = function() {
    //   if(xhttp.readyState = 4 && xhttp.status == 200) {
    //     node.innerHTML = xhttp.responseText;
    //     document.getElementById("invoice_medicine_list_div").appendChild(node);
    //   }
    // }


    //alert(addRow.counter);
    addRow.counter++;
    rows++;
}
);



// function removeRow(row_id) {
//   if(rows == 1)
//     alert("Can't delete only one row is there!");
//   else {
//     document.getElementById(row_id).remove();
//     rows--;
//   }
// }
