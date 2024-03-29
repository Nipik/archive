function openModal(mailId) {
    document.getElementById('modal' + mailId).classList.remove('hidden');
}

function closeModal(mailId) {
    document.getElementById('modal' + mailId).classList.add('hidden');
}

function confirmDelete(mailId) {
    closeModal(mailId);
    document.getElementById('deleteForm' + mailId).submit();
}

function filterTableByCategory() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("categoryFilterInput");
    filter = input.value.toUpperCase();
    table = document.querySelector(".table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[5];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function filterTableByOrganism() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("organismFilterInput");
    filter = input.value.toUpperCase();
    table = document.querySelector(".table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[6];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function filterTableByDispatchDate() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("dispatchDateFilterInput");
    filter = input.value.toUpperCase();
    table = document.querySelector(".table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[3];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function filterTableByReceptionDate() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("receptionDateFilterInput");
    filter = input.value.toUpperCase();
    table = document.querySelector(".table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

//----------------------------------------------Zone de recherche-------------------------------------

function toggleFilterFields() {
    var filterType = document.getElementById("filterType").value;
    var filterFields = document.querySelectorAll(".filter-field");
    for (var i = 0; i < filterFields.length; i++) {
        if (filterFields[i].id === filterType + "Filter") {
            filterFields[i].classList.remove("hidden");
        } else {
            filterFields[i].classList.add("hidden");
        }
    }
}
