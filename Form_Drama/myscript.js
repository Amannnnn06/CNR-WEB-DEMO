
document.addEventListener("DOMContentLoaded", function () {

    let interestRadio = document.querySelectorAll('input[name="interest"]');
    let QueDiv = document.getElementById("queDiv");

    interestRadio.forEach(radio => {
        radio.addEventListener("change", function () {
            if (this.value === "Yes") {
                QueDiv.style.display = "block";
                document.querySelectorAll('input[name="school-play"]').forEach(el => el.setAttribute("required", "required"));
                document.querySelectorAll('input[name="outside-production"]').forEach(el => el.setAttribute("required", "required"));
                document.querySelectorAll('input[name="lighting"]').forEach(el => el.setAttribute("required", "required"));
                document.querySelectorAll('input[name="sound"]').forEach(el => el.setAttribute("required", "required"));
                document.querySelectorAll('input[name="set-construction"]').forEach(el => el.setAttribute("required", "required"));
                document.querySelectorAll('input[name="costume"]').forEach(el => el.setAttribute("required", "required"));
                document.querySelectorAll('input[name="stage-management"]').forEach(el => el.setAttribute("required", "required"));
                document.querySelectorAll('input[name="backstage"]').forEach(el => el.setAttribute("required", "required"));
                document.querySelectorAll('input[name="dance-acting"]').forEach(el => el.setAttribute("required", "required"));

            } else {
                QueDiv.style.display = "none";
                document.querySelectorAll('input[name="school-play"]').forEach(el => {
                    el.removeAttribute("required");
                    el.checked = false;
                });
                document.querySelectorAll('input[name="outside-production"]').forEach(el => {
                    el.removeAttribute("required");
                    el.checked = false;
                });
                document.querySelectorAll('input[name="lighting"]').forEach(el => {
                    el.removeAttribute("required");
                    el.checked = false;
                });
                document.querySelectorAll('input[name="sound"]').forEach(el => {
                    el.removeAttribute("required");
                    el.checked = false;
                });
                document.querySelectorAll('input[name="set-construction"]').forEach(el => {
                    el.removeAttribute("required");
                    el.checked = false;
                });
                document.querySelectorAll('input[name="costume"]').forEach(el => {
                    el.removeAttribute("required");
                    el.checked = false;
                });
                document.querySelectorAll('input[name="stage-management"]').forEach(el => {
                    el.removeAttribute("required");
                    el.checked = false;
                });
                document.querySelectorAll('input[name="backstage"]').forEach(el => {
                    el.removeAttribute("required");
                    el.checked = false;
                });
                document.querySelectorAll('input[name="dance-acting"]').forEach(el => {
                    el.removeAttribute("required");
                    el.checked = false;
                });

            }
        });

        const SchlRadio = document.querySelectorAll('input[name="school-play"]');
        const SchlDiv = document.getElementById("ScholDiv");
        const schoolTextArea = document.querySelector('textarea[name="schoolText"]');

        SchlRadio.forEach(radio => {
            radio.addEventListener("change", function () {
                if (this.value === "yes") {
                    SchlDiv.style.display = "block";
                    schoolTextArea.setAttribute("required", "required");
                } else {
                    SchlDiv.style.display = "none";
                    schoolTextArea.removeAttribute("required");
                    schoolTextArea.value = "";
                }
            });
        });

       
        const OutsideRadio = document.querySelectorAll('input[name="outside-production"]');
        const OutsideDiv = document.getElementById("outsideDiv");
        const outsideTextArea = document.querySelector('textarea[name="outsideText"]');

        OutsideRadio.forEach(radio => {
            radio.addEventListener("change", function () {
                if (this.value === "yes") {
                    OutsideDiv.style.display = "block";
                    outsideTextArea.setAttribute("required", "required");
                } else {
                    OutsideDiv.style.display = "none";
                    outsideTextArea.removeAttribute("required");
                    outsideTextArea.value = "";
                }
            });
        });

       
        const BackstageRadio = document.querySelectorAll('input[name="backstage"]');
        const BackstageDiv = document.getElementById("backstageDIv");
        const backstageTextArea = document.querySelector('textarea[name="BackstageText"]');

        BackstageRadio.forEach(radio => {
            radio.addEventListener("change", function () {
                if (this.value === "yes") {
                    BackstageDiv.style.display = "block";
                    backstageTextArea.setAttribute("required", "required");
                } else {
                    BackstageDiv.style.display = "none";
                    backstageTextArea.removeAttribute("required");
                    backstageTextArea.value = "";
                }
            });
        });


        const DanceRadio = document.querySelectorAll('input[name="dance-acting"]');
        const DanceDiv = document.getElementById("Dancediv");
        const danceTextArea = document.querySelector('textarea[name="danceText"]');

        DanceRadio.forEach(radio => {
            radio.addEventListener("change", function () {
                if (this.value === "yes") {
                    DanceDiv.style.display = "block";
                    danceTextArea.setAttribute("required", "required");
                } else {
                    DanceDiv.style.display = "none";
                    danceTextArea.removeAttribute("required");
                    danceTextArea.value = "";
                }
            });
        });


    });





























});