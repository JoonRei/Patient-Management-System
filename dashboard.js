function searchPatients() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("patientTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (var j = 0; j < td.length; j++) {
            txtValue = td[j].textContent || td[j].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
                break;
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}


document.getElementById("searchInput").addEventListener("keyup", searchPatients);


function toggleForm() {
    var form = document.getElementById("add-patient-form");
    form.classList.toggle("show");
} function toggleForm() {
    var form = document.getElementById("add-patient-form");
    form.classList.toggle("show");
}