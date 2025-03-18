document.addEventListener("DOMContentLoaded", function () {
    const multilingualRadios = document.querySelectorAll('input[name="multilingual"]');
    const checkboxesDiv = document.getElementById("checkboxes");

    multilingualRadios.forEach(radio => {
        radio.addEventListener("change", function () {
            if (this.value === "yes") {
                checkboxesDiv.style.display = "flex";
            } else {
                checkboxesDiv.style.display = "none";
            }
        });
    });

    const otherLanguageRadios = document.querySelectorAll('input[name="other-languages"]');
    const otherLangDiv = document.getElementById("other-lang");

    otherLanguageRadios.forEach(radio => {
        radio.addEventListener("change", function () {
            if (this.value === "yes") {
                otherLangDiv.style.display = "block";
                document.querySelector('input[name="other_lang"]').setAttribute("required", "required");
            } else {
                otherLangDiv.style.display = "none";
                document.querySelector('input[name="other_lang"]').removeAttribute("required");
                document.querySelector('input[name="other_lang"]').value='';
            }
        });
    });
    const latinRadios = document.querySelectorAll('input[name="latin"]');
    const latinDiv = document.getElementById("latindiv");

    latinRadios.forEach(radio => {
        radio.addEventListener("change", function () {
            if (this.value === "yes") {
                latinDiv.style.display = "block";
                document.querySelector('input[name="latinyear"]').setAttribute("required", "required");
            } else {
                latinDiv.style.display = "none";
                document.querySelector('input[name="latinyear"]').removeAttribute("required");
                document.querySelector('input[name="latinyear"]').value='';
            }
        });
    });
    const frenchRadios = document.querySelectorAll('input[name="french"]');
    const frenchDiv = document.getElementById("frenchdiv");

    frenchRadios.forEach(radio => {
        radio.addEventListener("change", function () {
            if (this.value === "yes") {
                frenchDiv.style.display = "block";
                document.querySelector('input[name="frenchyear"]').setAttribute("required", "required");
            } else {
                frenchDiv.style.display = "none";
                document.querySelector('input[name="frenchyear"]').removeAttribute("required");
                document.querySelector('input[name="frenchyear"]').value='';

            }
        });
    });
    const otherRadios = document.querySelectorAll('input[name="others"]');
    const divOther = document.getElementById("div-other");

    otherRadios.forEach(radio => {
        radio.addEventListener("change", function () {
            if (this.value === "yes") {
                divOther.style.display = "block";
                document.querySelector('input[name="other-text"]').setAttribute("required", "required");
                document.querySelector('input[name="other-text1"]').setAttribute("required", "required");
            } else {
                divOther.style.display = "none";
                document.querySelector('input[name="other-text"]').removeAttribute("required");
                document.querySelector('input[name="other-text"]').value='';
                document.querySelector('input[name="other-text1"]').removeAttribute("required");
                document.querySelector('input[name="other-text1"]').value='';
            }
        });
    });
    const supportRadios = document.querySelectorAll('input[name="support"]');
    const supportDiv = document.getElementById("support-id");

    supportRadios.forEach(radio => {
        radio.addEventListener("change", function () {

            if (this.value === "yes") {
                supportDiv.style.display = "block";
                document.querySelector('input[name="support-1"]').setAttribute("required", "required");
                document.querySelector('input[name="support-2"]').setAttribute("required", "required");
            } else {
                supportDiv.style.display = "none";
                document.querySelector('input[name="support-1"]').removeAttribute("required");
                document.querySelector('input[name="support-1"]').value='';
                document.querySelector('input[name="support-2"]').removeAttribute("required");
                document.querySelector('input[name="support-2"]').value='';
                

            }
        });
    });

    const expRadios = document.querySelectorAll('input[name="experience"]');
    const Div_exp = document.getElementById('Exp-div');
    expRadios.forEach(radio => {
        radio.addEventListener("change", function () {
            if (this.value === "yes") {
                Div_exp.style.display = "block";
                document.querySelector('input[name="exp-detail"]').setAttribute("required", "required");
            } else {
                Div_exp.style.display = "none";
                document.querySelector('input[name="exp-detail"]').removeAttribute("required");
                document.querySelector('input[name="exp-detail"]').value='';
                
            }
        });
    });

    const resource_radio = document.querySelectorAll('input[name="resources"]');
    const Div_resource = document.getElementById('resourcesDiv');

    resource_radio.forEach(radio => {
        radio.addEventListener("change", function () {
            if (this.value === "yes") {
                Div_resource.style.display = "block";
            } else {
                Div_resource.style.display = "none";
            }
        });
    });
    

});
