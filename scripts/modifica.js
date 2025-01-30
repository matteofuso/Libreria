const deleteFormTitle = document.getElementById("deleteFormTitle");
const deleteFormText = document.getElementById("deleteFormText");
const deleteFormId = document.getElementById("deleteFormId");
const deleteFormResource = document.getElementById("deleteFormResource");

const textElimina = {
    "libri": {
        "title": "Elimina libro",
        "text": "Sei sicuro di voler eliminare il libro?<br>Questa azione non è reversibile.",
    },
    "autori": {
        "title": "Elimina autore",
        "text": "Sei sicuro di voler eliminare l'autore?<br>Questa azione non è reversibile.",
    },
    "generi": {
        "title": "Elimina genere",
        "text": "Sei sicuro di voler eliminare il genere?<br>Questa azione non è reversibile.",
    },
}

function deleteResource(resource, id){
    deleteFormTitle.innerHTML = textElimina[resource].title;
    deleteFormText.innerHTML = textElimina[resource].text;
    deleteFormId.value = id;
    deleteFormResource.value = resource;
}

const editLibroFormId = document.getElementById("editLibroFormId");
const editLibroFormResource = document.getElementById("editLibroFormResource");

function editLibro(btn, id){
    row = btn.parentElement.parentElement;
    id = row.cells[0].innerHTML;
    titolo = row.cells[1].innerHTML;
    autore = row.cells[2].innerHTML;
    genere = row.cells[3].innerHTML;
    prezzo = row.cells[4].innerHTML.slice(0, -2);
    anno = row.cells[5].innerHTML;

    document.getElementById("title").value = titolo;
    document.getElementById("price").value = prezzo;
    document.getElementById("year").value = anno;

    // loop the select
    authors = document.getElementById("author").options;
    for (let i = 0; i < authors.length; i++) {
        if (authors[i].text === autore) {
            authors[i].selected = true;
            break;
        }
    }

    genres = document.getElementById("genre").options;
    for (let i = 0; i < genres.length; i++) {
        if (genres[i].text === genere) {
            genres[i].selected = true;
            break;
        }
    }

    document.getElementById("new-genre").parentElement.classList.add("d-none")
    document.getElementById("new-author").parentElement.classList.add("d-none")

    editLibroFormId.value = id;
    editLibroFormResource.value = "libri";
}

const textModifica = {
    "autori": {
        "title": "Modifica autore",
        "label": "Modifica il nome dell'autore",
        "placeholder": "J.K. Rowlink"
    },
    "generi": {
        "title": "Modifica genere",
        "label": "Modifica la denominazione del genere",
        "placeholder": "Fantasy"
    },
}

const editFormTitle = document.getElementById("editFormTitle");
const newResourceLabel = document.getElementById("new-resource-label");
const newResource = document.getElementById("new-resource");
const editFormId = document.getElementById("editFormId");
const editFormResource = document.getElementById("editFormResource");

function editResource(btn, resource, id){
    row = btn.parentElement.parentElement;
    console.log(row.cells)

    editFormTitle.innerHTML = textModifica[resource].title;
    newResourceLabel.innerHTML = textModifica[resource].label;
    newResource.placeholder = textModifica[resource].placeholder;
    newResource.value = row.cells[1].innerHTML;

    editFormId.value = id;
    editFormResource.value = resource;
}