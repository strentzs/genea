var popup = document.getElementById('addUserPopup');
var modifyPopup = document.getElementById('modifyUserPopup');
var deletePopup = document.getElementById('deleteUserPopup');
var container = document.querySelector('.container');
var table = document.querySelector('table');
const sortAlphaBtn = document.querySelector("#sortAlpha");

function openPopup() {
    popup.classList.toggle("active");
    popup.style.visibility = "visible";
    popup.style.opacity = "1";
}

function closePopup() {
    popup.classList.remove("active");
    popup.style.visibility = "hidden";
    popup.style.opacity = "0";
}

function openModifyPopup() {
    modifyPopup.classList.toggle("active");
    modifyPopup.style.visibility = "visible";
    modifyPopup.style.opacity = "1";
}

function closeModifyPopup() {
    modifyPopup.classList.remove("active");
    modifyPopup.style.visibility = "hidden";
    modifyPopup.style.opacity = "0";
}

function openDeletePopup() {
    deletePopup.classList.toggle("active");
    deletePopup.style.visibility = "visible";
    deletePopup.style.opacity = "1";
}

function closeDeletePopup() {
    deletePopup.classList.remove("active");
    deletePopup.style.visibility = "hidden";
    deletePopup.style.opacity = "0";
}

function cleanTable() {
    for (var i = table.rows.length - 1; i > 0; i--) {
        table.deleteRow(i);
    }
}

        // Fonction pour compter le nombre de colonne dans le tableau --> Avortée parce que y'arrive pas


// function displayRowCount() {
//     var table = document.getElementById("myTable");
//     var rowCount = table.rows.length;
//     var rowCountElement = document.getElementById("rowCount");
//     rowCountElement.innerHTML = rowCount;
// }

        // Fonction pour trier une colonne par ordre alphabétique --> Avortée parce que y'arrive pas

// function sortAlpha() {
//     const rows = table.querySelectorAll("#table tbody tr");

//     rows.sort(function(a, b) {
//         const aVal = a.querySelector('.sort-column').getAttribute('data-sort');
//         const bVal = b.querySelector('.sort-column').getAttribute('data-sort');
//         return aVal.localeCompare(bVal);
//     });

//     const tbody = document.querySelector('table tbody');
//     tbody.innerHTML = '';
//     rows.forEach(function(row) {
//         tbody.appendChild(row);
//     });
// }