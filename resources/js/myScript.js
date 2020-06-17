
let AdvancedBtn = document.querySelector("#AdvancedBtn");
let AdvancedFormGroup = document.querySelector("#AdvancedFormGroup");
let SearchInput = document.querySelector("#SearchInput");
let SearchLabel = document.querySelector("#SearchLabel");

AdvancedBtn.addEventListener('click', () => {

    /* AdvancedFormGroup.classList.toggle("collapse"); */
    /* Fatto poi con Bootstrap Class Collapse*/

    SearchInput.classList.toggle("form-control-lg");
    SearchLabel.classList.toggle("d-none");

})


