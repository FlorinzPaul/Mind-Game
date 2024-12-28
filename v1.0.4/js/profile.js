const updateForm = document.getElementById("updateContainer");
const deleteForm = document.getElementById("deleteContainer");

function showUpdateForm() {
    updateForm.classList.remove("hide");
    deleteForm.classList.add("hide");
}

function showDeleteForm() {
    deleteForm.classList.remove("hide");
    updateForm.classList.add("hide");
}