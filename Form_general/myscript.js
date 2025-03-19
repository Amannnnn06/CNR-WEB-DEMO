document.addEventListener("DOMContentLoaded", function () {
    const CareRadio = document.querySelectorAll('input[name="other_care_provider"]');
    const Carediv = document.getElementById('CareDiv');



    CareRadio.forEach(radio => {
        radio.addEventListener("change", function () {
            if (this.value === "yes") {
                Carediv.style.display = "block";
                document.querySelector('textarea[name="careText"]').setAttribute("required", "required");

            } else {
                Carediv.style.display = "none";
                document.querySelector('textarea[name="careText"]').removeAttribute("required");
                document.querySelector('textarea[name="careText"]').value = '';
            }
        });
    });

   

    const checkbox = document.getElementById("NotApply");
    const checkboxDiv = document.getElementById("notapply");
    const parentRequire = document.querySelector('textarea[name="parent_requirements"]');

    checkboxDiv.style.display = "block";
    checkbox.addEventListener("change", function () {
        if (this.checked) {
            checkboxDiv.style.display = "none";
            document.getElementById('nappy').checked = false;
            document.getElementById('wipes').checked = false;
            document.getElementById('cream').checked = false;

            parentRequire.removeAttribute("required");
            parentRequire.value = '';

        } else {
            checkboxDiv.style.display = "block";
            parentRequire.setAttribute("required", "required");
        }
    });
    checkbox.dispatchEvent(new Event('change'));





});