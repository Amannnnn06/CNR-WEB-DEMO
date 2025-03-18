document.addEventListener("DOMContentLoaded", function () {
    const musicRadio = document.querySelectorAll('input[name="music_lessons"]');
    const musicDiv = document.getElementById("Select-div");

    musicRadio.forEach(radio => {
        radio.addEventListener("change", function () {
            if (this.value === "yes") {
                musicDiv.style.display = "block";
                document.querySelectorAll('input[name="certificate"]').forEach(radio => {
                    radio.setAttribute("required", "");
                });
            } else {
                musicDiv.style.display = "none";
                document.querySelectorAll('input[name="certificate"]').forEach(radio => {
                    radio.removeAttribute("required");
                });
            }
        });
    });

    const hireRadio = document.querySelectorAll('input[name="ensembleMember"]');
    const hireDiv = document.getElementById("Hire-Div");

    hireRadio.forEach(radio => {
        radio.addEventListener("change", function () {
            if (this.value === "yes") {
                hireDiv.style.display = "block";
                document.querySelector('textarea[name="hire-detail"]').setAttribute("required", "required");
                
            } else {
                hireDiv.style.display = "none";
                document.querySelector('textarea[name="hire-detail"]').removeAttribute("required");
                document.querySelector('textarea[name="hire-detail"]').value = '';
            }
        });
    });

    const HireRadio = document.querySelectorAll('input[name="hireInstrument"]');
    const HireDiv = document.getElementById("hire-div");

    HireRadio.forEach(radio => {
        radio.addEventListener("change", function () {
            if (this.value === "yes") {
                HireDiv.style.display = "block";
            } else {
                HireDiv.style.display = "none";
            }
        });
    });

    const instrumentSelect = document.getElementById("instrument1");
    const inputDiv1 = document.getElementById("input-Div1");

    instrumentSelect.addEventListener("change", function () {
        if (this.value !== "") {
            inputDiv1.style.display = "block";

            document.getElementById("standardReached").setAttribute("required", "");
            document.getElementById("yearsLearning").setAttribute("required", "");
            document.querySelector('textarea[name="examBoard"]').setAttribute("required", "required");

            document.querySelectorAll('input[name="ensembleMember"]').forEach(radio => {
                radio.setAttribute("required", "");
            });

            document.querySelectorAll('input[name="hireInstrument"]').forEach(radio => {
                radio.setAttribute("required", "");
            });
        } else {
            inputDiv1.style.display = "none";

            document.getElementById("standardReached").removeAttribute("required");
            document.getElementById("yearsLearning").removeAttribute("required");
            document.querySelector('textarea[name="examBoard"]').removeAttribute("required");

            document.querySelectorAll('input[name="ensembleMember"]').forEach(radio => {
                radio.removeAttribute("required");
            });

            document.querySelectorAll('input[name="hireInstrument"]').forEach(radio => {
                radio.removeAttribute("required");
            });
        }

        const instrumentSelect2 = document.getElementById("instrument2");
        const inputDiv2 = document.getElementById("input-Div2");

        instrumentSelect2.addEventListener("change", function () {
            if (this.value !== "") {
                inputDiv2.style.display = "block";

                document.getElementById("standardReached2").setAttribute("required", "");
                document.getElementById("yearsLearning2").setAttribute("required", "");
                document.querySelector('textarea[name="examBoard2"]').setAttribute("required", "required");

                document.querySelectorAll('input[name="ensembleMember2"]').forEach(radio => {
                    radio.setAttribute("required", "");
                });

                document.querySelectorAll('input[name="hireInstrument2"]').forEach(radio => {
                    radio.setAttribute("required", "");
                });

            } else {
                inputDiv2.style.display = "none";

                document.getElementById("standardReached2").removeAttribute("required");
                document.getElementById("yearsLearning2").removeAttribute("required");
                document.querySelector('textarea[name="examBoard2"]').removeAttribute("required");

                document.querySelectorAll('input[name="ensembleMember2"]').forEach(radio => {
                    radio.removeAttribute("required");
                });

                document.querySelectorAll('input[name="hireInstrument2"]').forEach(radio => {
                    radio.removeAttribute("required");
                });
            }
        });

        const HireRadio2 = document.querySelectorAll('input[name="hireInstrument2"]');
        const HireDiv2 = document.getElementById("hire-div2");

        HireRadio2.forEach(radio => {
            radio.addEventListener("change", function () {
                if (this.value === "yes") {
                    HireDiv2.style.display = "block";
                } else {
                    HireDiv2.style.display = "none";
                }
            });
        });

        const hireRadio2 = document.querySelectorAll('input[name="ensembleMember2"]');
        const hireDiv2 = document.getElementById("Hire-Div2");

        hireRadio2.forEach(radio => {
            radio.addEventListener("change", function () {
                if (this.value === "yes") {
                    hireDiv2.style.display = "block";
                    document.querySelector('textarea[name="hire-detail2"]').setAttribute("required", "required");
                } else {
                    hireDiv2.style.display = "none";
                    document.querySelector('textarea[name="hire-detail2"]').removeAttribute("required");
                    document.querySelector('textarea[name="hire-detail2"]').value = '';
                }
            });
        });


        const certificateRadio = document.querySelectorAll('input[name="certificate"]');
        const certificateDiv = document.getElementById("File-Div");

        certificateRadio.forEach(radio => {
            radio.addEventListener("change", function () {
                if (this.value === "yes") {
                    certificateDiv.style.display = "block";

                } else {
                    certificateDiv.style.display = "none";
                }
            });
        });
    });

























});
