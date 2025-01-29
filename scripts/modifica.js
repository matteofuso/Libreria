const deleteFormTitle = document.getElementById("deleteFormTitle");
const deleteFormText = document.getElementById("deleteFormText");
const deleteFormId = document.getElementById("deleteFormId");
const deleteFormResource = document.getElementById("deleteFormResource");

const text = {
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
    deleteFormTitle.innerHTML = text[resource].title;
    deleteFormText.innerHTML = text[resource].text;
    deleteFormId.value = id;
    deleteFormResource.value = resource;
}