document.addEventListener("DOMContentLoaded", function () {
    let Adhdradio=document.querySelectorAll('input[name="ADHD"]');
    let AdhdDiv = document.getElementById("ADHD-div");
    Adhdradio.forEach(radio => {
        radio.addEventListener("change", function () {
            console.log('46');
            if (this.value === "yes") {
                AdhdDiv.style.display = "flex";
                document.querySelector('input[name="ADHD-diagnosis"]').setAttribute("required", "required");
                document.querySelector('textarea[name="ADHD-trig"]').setAttribute("required", "required");
                document.querySelector('input[name="ADHD-ongoing"]').setAttribute("required", "required");
            } else {
                AdhdDiv.style.display = "none";
                document.querySelector('input[name="ADHD-diagnosis"]').removeAttribute("required");
                document.querySelector('input[name="ADHD-diagnosis"]').value = "";
                document.querySelector('textarea[name="ADHD-trig"]').removeAttribute("required");
                document.querySelector('textarea[name="ADHD-trig"]').value = "";
                document.querySelectorAll('input[name="ADHD-ongoing"]').forEach(el => {
                    el.removeAttribute("required");
                    el.checked = false
                });
                
            }
        });
    }); 

    // Autism Spectrum
let autismRadio = document.querySelectorAll('input[name="autism"]');
let autismDiv = document.getElementById("autism-div");

autismRadio.forEach(radio => {
    radio.addEventListener("change", function () {
        if (this.value === "yes") {
            autismDiv.style.display = "flex";
            document.querySelector('input[name="autism-diagnosis"]').setAttribute("required", "required");
            document.querySelector('textarea[name="autism-trig"]').setAttribute("required", "required");
            document.querySelectorAll('input[name="autism-ongoing"]').forEach(el => el.setAttribute("required", "required"));
        } else {
            autismDiv.style.display = "none";
            document.querySelector('input[name="autism-diagnosis"]').removeAttribute("required");
            document.querySelector('input[name="autism-diagnosis"]').value = "";
            document.querySelector('textarea[name="autism-trig"]').removeAttribute("required");
            document.querySelector('textarea[name="autism-trig"]').value = "";
            document.querySelectorAll('input[name="autism-ongoing"]').forEach(el => {
                el.removeAttribute("required");
                el.checked = false;
            });
        }
    });
});

// Allergy
let allergyRadio = document.querySelectorAll('input[name="allergy"]');
let allergyDiv = document.getElementById("allergy-div");

allergyRadio.forEach(radio => {
    radio.addEventListener("change", function () {
        if (this.value === "yes") {
            allergyDiv.style.display = "flex";
            document.querySelector('input[name="allergy-diagnosis"]').setAttribute("required", "required");
            document.querySelector('textarea[name="allergy-trig"]').setAttribute("required", "required");
            document.querySelectorAll('input[name="allergy-ongoing"]').forEach(el => el.setAttribute("required", "required"));
        } else {
            allergyDiv.style.display = "none";
            document.querySelector('input[name="allergy-diagnosis"]').removeAttribute("required");
            document.querySelector('input[name="allergy-diagnosis"]').value = "";
            document.querySelector('textarea[name="allergy-trig"]').removeAttribute("required");
            document.querySelector('textarea[name="allergy-trig"]').value = "";
            document.querySelectorAll('input[name="allergy-ongoing"]').forEach(el => {
                el.removeAttribute("required");
                el.checked = false;
            });
        }
    });
});

// Asthma
let asthmaRadio = document.querySelectorAll('input[name="asthma"]');
let asthmaDiv = document.getElementById("asthma-div");

asthmaRadio.forEach(radio => {
    radio.addEventListener("change", function () {
        if (this.value === "yes") {
            asthmaDiv.style.display = "flex";
            document.querySelector('input[name="asthma-diagnosis"]').setAttribute("required", "required");
            document.querySelector('textarea[name="asthma-trig"]').setAttribute("required", "required");
            document.querySelectorAll('input[name="asthma-ongoing"]').forEach(el => el.setAttribute("required", "required"));
        } else {
            asthmaDiv.style.display = "none";
            document.querySelector('input[name="asthma-diagnosis"]').removeAttribute("required");
            document.querySelector('input[name="asthma-diagnosis"]').value = "";
            document.querySelector('textarea[name="asthma-trig"]').removeAttribute("required");
            document.querySelector('textarea[name="asthma-trig"]').value = "";
            document.querySelectorAll('input[name="asthma-ongoing"]').forEach(el => {
                el.removeAttribute("required");
                el.checked = false;
            });
        }
    });
});

// Bed Wetting / Soiling
let bedRadio = document.querySelectorAll('input[name="bed"]');
let bedDiv = document.getElementById("bed-div");

bedRadio.forEach(radio => {
    radio.addEventListener("change", function () {
        if (this.value === "yes") {
            bedDiv.style.display = "flex";
            document.querySelector('input[name="bed-diagnosis"]').setAttribute("required", "required");
            document.querySelector('textarea[name="bed-trig"]').setAttribute("required", "required");
            document.querySelectorAll('input[name="bed-ongoing"]').forEach(el => el.setAttribute("required", "required"));
        } else {
            bedDiv.style.display = "none";
            document.querySelector('input[name="bed-diagnosis"]').removeAttribute("required");
            document.querySelector('input[name="bed-diagnosis"]').value = "";
            document.querySelector('textarea[name="bed-trig"]').removeAttribute("required");
            document.querySelector('textarea[name="bed-trig"]').value = "";
            document.querySelectorAll('input[name="bed-ongoing"]').forEach(el => {
                el.removeAttribute("required");
                el.checked = false;
            });
        }
    });
});

// Chicken Pox
let poxRadio = document.querySelectorAll('input[name="pox"]');
let poxDiv = document.getElementById("pox-div");

poxRadio.forEach(radio => {
    radio.addEventListener("change", function () {
        if (this.value === "yes") {
            poxDiv.style.display = "flex";
            document.querySelector('input[name="pox-diagnosis"]').setAttribute("required", "required");
            document.querySelector('textarea[name="pox-trig"]').setAttribute("required", "required");
            document.querySelectorAll('input[name="pox-ongoing"]').forEach(el => el.setAttribute("required", "required"));
        } else {
            poxDiv.style.display = "none";
            document.querySelector('input[name="pox-diagnosis"]').removeAttribute("required");
            document.querySelector('input[name="pox-diagnosis"]').value = "";
            document.querySelector('textarea[name="pox-trig"]').removeAttribute("required");
            document.querySelector('textarea[name="pox-trig"]').value = "";
            document.querySelectorAll('input[name="pox-ongoing"]').forEach(el => {
                el.removeAttribute("required");
                el.checked = false;
            });
        }
    });
});

// Dental Problems
let dentalRadio = document.querySelectorAll('input[name="dental"]');
let dentalDiv = document.getElementById("dental-div");

dentalRadio.forEach(radio => {
    radio.addEventListener("change", function () {
        if (this.value === "yes") {
            dentalDiv.style.display = "flex";
            document.querySelector('input[name="dental-diagnosis"]').setAttribute("required", "required");
            document.querySelector('textarea[name="dental-trig"]').setAttribute("required", "required");
            document.querySelectorAll('input[name="dental-ongoing"]').forEach(el => el.setAttribute("required", "required"));
        } else {
            dentalDiv.style.display = "none";
            document.querySelector('input[name="dental-diagnosis"]').removeAttribute("required");
            document.querySelector('input[name="dental-diagnosis"]').value = "";
            document.querySelector('textarea[name="dental-trig"]').removeAttribute("required");
            document.querySelector('textarea[name="dental-trig"]').value = "";
            document.querySelectorAll('input[name="dental-ongoing"]').forEach(el => {
                el.removeAttribute("required");
                el.checked = false;
            });
        }
    });
});

// Diabetes
let diabetesRadio = document.querySelectorAll('input[name="diabetes"]');
let diabetesDiv = document.getElementById("diabetes-div");

diabetesRadio.forEach(radio => {
    radio.addEventListener("change", function () {
        if (this.value === "yes") {
            diabetesDiv.style.display = "flex";
            document.querySelector('input[name="diabetes-diagnosis"]').setAttribute("required", "required");
            document.querySelector('textarea[name="diabetes-trig"]').setAttribute("required", "required");
            document.querySelectorAll('input[name="diabetes-ongoing"]').forEach(el => el.setAttribute("required", "required"));
        } else {
            diabetesDiv.style.display = "none";
            document.querySelector('input[name="diabetes-diagnosis"]').removeAttribute("required");
            document.querySelector('input[name="diabetes-diagnosis"]').value = "";
            document.querySelector('textarea[name="diabetes-trig"]').removeAttribute("required");
            document.querySelector('textarea[name="diabetes-trig"]').value = "";
            document.querySelectorAll('input[name="diabetes-ongoing"]').forEach(el => {
                el.removeAttribute("required");
                el.checked = false;
            });
        }
    });
});

// Eating Disorder
let eatingRadio = document.querySelectorAll('input[name="eating"]');
let eatingDiv = document.getElementById("eating-div");

eatingRadio.forEach(radio => {
    radio.addEventListener("change", function () {
        if (this.value === "yes") {
            eatingDiv.style.display = "flex";
            document.querySelector('input[name="eating-diagnosis"]').setAttribute("required", "required");
            document.querySelector('textarea[name="eating-trig"]').setAttribute("required", "required");
            document.querySelectorAll('input[name="eating-ongoing"]').forEach(el => el.setAttribute("required", "required"));
        } else {
            eatingDiv.style.display = "none";
            document.querySelector('input[name="eating-diagnosis"]').removeAttribute("required");
            document.querySelector('input[name="eating-diagnosis"]').value = "";
            document.querySelector('textarea[name="eating-trig"]').removeAttribute("required");
            document.querySelector('textarea[name="eating-trig"]').value = "";
            document.querySelectorAll('input[name="eating-ongoing"]').forEach(el => {
                el.removeAttribute("required");
                el.checked = false;
            });
        }
    });
});

// Ear / Nose / Throat (ENT)
let earRadio = document.querySelectorAll('input[name="ear"]');
let earDiv = document.getElementById("ear-div");

earRadio.forEach(radio => {
    radio.addEventListener("change", function () {
        if (this.value === "yes") {
            earDiv.style.display = "flex";
            document.querySelector('input[name="ear-diagnosis"]').setAttribute("required", "required");
            document.querySelector('textarea[name="ear-trig"]').setAttribute("required", "required");
            document.querySelectorAll('input[name="ear-ongoing"]').forEach(el => el.setAttribute("required", "required"));
        } else {
            earDiv.style.display = "none";
            document.querySelector('input[name="ear-diagnosis"]').removeAttribute("required");
            document.querySelector('input[name="ear-diagnosis"]').value = "";
            document.querySelector('textarea[name="ear-trig"]').removeAttribute("required");
            document.querySelector('textarea[name="ear-trig"]').value = "";
            document.querySelectorAll('input[name="ear-ongoing"]').forEach(el => {
                el.removeAttribute("required");
                el.checked = false;
            });
        }
    });
});

// Epilepsy
let epilepsyRadio = document.querySelectorAll('input[name="epilepsy"]');
let epilepsyDiv = document.getElementById("epilepsy-div");

epilepsyRadio.forEach(radio => {
    radio.addEventListener("change", function () {
        if (this.value === "yes") {
            epilepsyDiv.style.display = "flex";
            document.querySelector('input[name="epilepsy-diagnosis"]').setAttribute("required", "required");
            document.querySelector('textarea[name="epilepsy-trig"]').setAttribute("required", "required");
            document.querySelectorAll('input[name="epilepsy-ongoing"]').forEach(el => el.setAttribute("required", "required"));
        } else {
            epilepsyDiv.style.display = "none";
            document.querySelector('input[name="epilepsy-diagnosis"]').removeAttribute("required");
            document.querySelector('input[name="epilepsy-diagnosis"]').value = "";
            document.querySelector('textarea[name="epilepsy-trig"]').removeAttribute("required");
            document.querySelector('textarea[name="epilepsy-trig"]').value = "";
            document.querySelectorAll('input[name="epilepsy-ongoing"]').forEach(el => {
                el.removeAttribute("required");
                el.checked = false;
            });
        }
    });
});

// Hay Fever
let hayRadio = document.querySelectorAll('input[name="hay"]');
let hayDiv = document.getElementById("hay-div");

hayRadio.forEach(radio => {
    radio.addEventListener("change", function () {
        if (this.value === "yes") {
            hayDiv.style.display = "flex";
            document.querySelector('input[name="hay-diagnosis"]').setAttribute("required", "required");
            document.querySelector('textarea[name="hay-trig"]').setAttribute("required", "required");
            document.querySelectorAll('input[name="hay-ongoing"]').forEach(el => el.setAttribute("required", "required"));
        } else {
            hayDiv.style.display = "none";
            document.querySelector('input[name="hay-diagnosis"]').removeAttribute("required");
            document.querySelector('input[name="hay-diagnosis"]').value = "";
            document.querySelector('textarea[name="hay-trig"]').removeAttribute("required");
            document.querySelector('textarea[name="hay-trig"]').value = "";
            document.querySelectorAll('input[name="hay-ongoing"]').forEach(el => {
                el.removeAttribute("required");
                el.checked = false;
            });
        }
    });
});

// Heart Disease
let heartRadio = document.querySelectorAll('input[name="heart"]');
let heartDiv = document.getElementById("heart-div");

heartRadio.forEach(radio => {
    radio.addEventListener("change", function () {
        if (this.value === "yes") {
            heartDiv.style.display = "flex";
            document.querySelector('input[name="heart-diagnosis"]').setAttribute("required", "required");
            document.querySelector('textarea[name="heart-trig"]').setAttribute("required", "required");
            document.querySelectorAll('input[name="heart-ongoing"]').forEach(el => el.setAttribute("required", "required"));
        } else {
            heartDiv.style.display = "none";
            document.querySelector('input[name="heart-diagnosis"]').removeAttribute("required");
            document.querySelector('input[name="heart-diagnosis"]').value = "";
            document.querySelector('textarea[name="heart-trig"]').removeAttribute("required");
            document.querySelector('textarea[name="heart-trig"]').value = "";
            document.querySelectorAll('input[name="heart-ongoing"]').forEach(el => {
                el.removeAttribute("required");
                el.checked = false;
            });
        }
    });
});

// Kidney Disease
let kidneyRadio = document.querySelectorAll('input[name="kidney"]');
let kidneyDiv = document.getElementById("kidney-div");

kidneyRadio.forEach(radio => {
    radio.addEventListener("change", function () {
        if (this.value === "yes") {
            kidneyDiv.style.display = "flex";
            document.querySelector('input[name="kidney-diagnosis"]').setAttribute("required", "required");
            document.querySelector('textarea[name="kidney-trig"]').setAttribute("required", "required");
            document.querySelectorAll('input[name="kidney-ongoing"]').forEach(el => el.setAttribute("required", "required"));
        } else {
            kidneyDiv.style.display = "none";
            document.querySelector('input[name="kidney-diagnosis"]').removeAttribute("required");
            document.querySelector('input[name="kidney-diagnosis"]').value = "";
            document.querySelector('textarea[name="kidney-trig"]').removeAttribute("required");
            document.querySelector('textarea[name="kidney-trig"]').value = "";
            document.querySelectorAll('input[name="kidney-ongoing"]').forEach(el => {
                el.removeAttribute("required");
                el.checked = false;
            });
        }
    });
});

// Mental Health
let mentalRadio = document.querySelectorAll('input[name="mental"]');
let mentalDiv = document.getElementById("mental-div");

mentalRadio.forEach(radio => {
    radio.addEventListener("change", function () {
        if (this.value === "yes") {
            mentalDiv.style.display = "flex";
            document.querySelector('input[name="mental-diagnosis"]').setAttribute("required", "required");
            document.querySelector('textarea[name="mental-trig"]').setAttribute("required", "required");
            document.querySelectorAll('input[name="mental-ongoing"]').forEach(el => el.setAttribute("required", "required"));
        } else {
            mentalDiv.style.display = "none";
            document.querySelector('input[name="mental-diagnosis"]').removeAttribute("required");
            document.querySelector('input[name="mental-diagnosis"]').value = "";
            document.querySelector('textarea[name="mental-trig"]').removeAttribute("required");
            document.querySelector('textarea[name="mental-trig"]').value = "";
            document.querySelectorAll('input[name="mental-ongoing"]').forEach(el => {
                el.removeAttribute("required");
                el.checked = false;
            });
        }
    });
});

// Poor Relationship with Food
let poorRadio = document.querySelectorAll('input[name="poor"]');
let poorDiv = document.getElementById("poor-div");

poorRadio.forEach(radio => {
    radio.addEventListener("change", function () {
        if (this.value === "yes") {
            poorDiv.style.display = "flex";
            document.querySelector('input[name="poor-diagnosis"]').setAttribute("required", "required");
            document.querySelector('textarea[name="poor-trig"]').setAttribute("required", "required");
            document.querySelectorAll('input[name="poor-ongoing"]').forEach(el => el.setAttribute("required", "required"));
        } else {
            poorDiv.style.display = "none";
            document.querySelector('input[name="poor-diagnosis"]').removeAttribute("required");
            document.querySelector('input[name="poor-diagnosis"]').value = "";
            document.querySelector('textarea[name="poor-trig"]').removeAttribute("required");
            document.querySelector('textarea[name="poor-trig"]').value = "";
            document.querySelectorAll('input[name="poor-ongoing"]').forEach(el => {
                el.removeAttribute("required");
                el.checked = false;
            });
        }
    });
});

// Sight Problems
let sightRadio = document.querySelectorAll('input[name="sight"]');
let sightDiv = document.getElementById("sight-div");

sightRadio.forEach(radio => {
    radio.addEventListener("change", function () {
        if (this.value === "yes") {
            sightDiv.style.display = "flex";
            document.querySelector('input[name="sight-diagnosis"]').setAttribute("required", "required");
            document.querySelector('textarea[name="sight-trig"]').setAttribute("required", "required");
            document.querySelectorAll('input[name="sight-ongoing"]').forEach(el => el.setAttribute("required", "required"));
        } else {
            sightDiv.style.display = "none";
            document.querySelector('input[name="sight-diagnosis"]').removeAttribute("required");
            document.querySelector('input[name="sight-diagnosis"]').value = "";
            document.querySelector('textarea[name="sight-trig"]').removeAttribute("required");
            document.querySelector('textarea[name="sight-trig"]').value = "";
            document.querySelectorAll('input[name="sight-ongoing"]').forEach(el => {
                el.removeAttribute("required");
                el.checked = false;
            });
        }
    });
});

// Skin Problems
let skinRadio = document.querySelectorAll('input[name="skin"]');
let skinDiv = document.getElementById("skin-div");

skinRadio.forEach(radio => {
    radio.addEventListener("change", function () {
        if (this.value === "yes") {
            skinDiv.style.display = "flex";
            document.querySelector('input[name="skin-diagnosis"]').setAttribute("required", "required");
            document.querySelector('textarea[name="skin-trig"]').setAttribute("required", "required");
            document.querySelectorAll('input[name="skin-ongoing"]').forEach(el => el.setAttribute("required", "required"));
        } else {
            skinDiv.style.display = "none";
            document.querySelector('input[name="skin-diagnosis"]').removeAttribute("required");
            document.querySelector('input[name="skin-diagnosis"]').value = "";
            document.querySelector('textarea[name="skin-trig"]').removeAttribute("required");
            document.querySelector('textarea[name="skin-trig"]').value = "";
            document.querySelectorAll('input[name="skin-ongoing"]').forEach(el => {
                el.removeAttribute("required");
                el.checked = false;
            });
        }
    });
});


let awareRadio=document.querySelectorAll('input[name="aware"]');
let awareDiv = document.getElementById("aware-div");
//childTotalYearsDiv.style.display="none";

awareRadio.forEach(radio => {
    radio.addEventListener("change", function () {
       
        if (this.value === "yes") {
            awareDiv.style.display = "flex";
            document.querySelector('input[name="aware-text"]').setAttribute("required", "required");
        } else {
            awareDiv.style.display = "none";
            document.querySelector('input[name="aware-text"]').removeAttribute("required");
            document.querySelector('input[name="aware-text"]').value = "";
        }
    });
});

let fitRadio=document.querySelectorAll('input[name="fit"]');
let fitDiv = document.getElementById("fit-div");


fitRadio.forEach(radio => {
    radio.addEventListener("change", function () {
       
        if (this.value === "no") {
            fitDiv.style.display = "flex";
            document.querySelector('input[name="fit-text"]').setAttribute("required", "required");
        } else {
            fitDiv.style.display = "none";
            document.querySelector('input[name="fit-text"]').removeAttribute("required");
            document.querySelector('input[name="fit-text"]').value = "";
        }
    });
});
let epiRadio=document.querySelectorAll('input[name="epi"]');
let epiDiv = document.getElementById("epi-div");
epiRadio.forEach(radio => {
    radio.addEventListener("change", function () {
       
        if (this.value === "yes") {
            epiDiv.style.display = "flex";
            
        } else {
            epiDiv.style.display = "none";  
        }
    });
});

let epiMedRadio=document.querySelectorAll('input[name="epi-med"]');
let epiMedDiv = document.getElementById("epi-med-div");


epiMedRadio.forEach(radio => {
    radio.addEventListener("change", function () {
       
        if (this.value === "yes") {
            epiMedDiv.style.display = "block";
            document.querySelector('input[name="med-name"]').setAttribute("required", "required");
            document.querySelector('input[name="dosage"]').setAttribute("required", "required");
            document.querySelector('input[name="reason"]').setAttribute("required", "required");
            document.querySelector('input[name="review-date"]').setAttribute("required", "required");
        } else {
            epiMedDiv.style.display = "none";
            document.querySelector('input[name="med-name"]').removeAttribute("required");
            document.querySelector('input[name="med-name"]').value = "";
            document.querySelector('input[name="dosage"]').removeAttribute("required");
            document.querySelector('input[name="dosage"]').value = "";
            document.querySelector('input[name="reason"]').removeAttribute("required");
            document.querySelector('input[name="reason"]').value = "";
            document.querySelector('input[name="review-date"]').removeAttribute("required");
            document.querySelector('input[name="review-date"]').value = "";
        }
    });
});


let vaccinationRadios = document.querySelectorAll('input[name="vaccination"]');
let fileDiv = document.getElementById("vaccination-file-div");
let textDiv = document.getElementById("vaccination-text-div");

let fileInput = document.getElementById("file-upload");
let textArea = document.querySelector('textarea[name="vaccination-text"]');


vaccinationRadios.forEach(radio => {
    radio.addEventListener("change", function () {
        if (this.value === "yes") {
            fileDiv.style.display = "block";
            textDiv.style.display = "none";

            // Set required attribute on file input
            fileInput.setAttribute("required", "required");
            textArea.removeAttribute("required");
            textArea.value = "";

        } else if (this.value === "no") {
            // Show text area
            textDiv.style.display = "block";
            fileDiv.style.display = "none";

            // Set required attribute on textarea
            textArea.setAttribute("required", "required");
            fileInput.removeAttribute("required");
            fileInput.value = "";
        }
    });
});

let intoleranceRadio=document.querySelectorAll('input[name="intolerance"]');
let intoleranceDiv = document.getElementById("intolerance-div");
intoleranceRadio.forEach(radio => {
    radio.addEventListener("change", function () {
        console.log('46');
        if (this.value === "yes") {
            intoleranceDiv.style.display = "block";
            document.querySelector('input[name="intolerance-text"]').setAttribute("required", "required");
        } else {
            intoleranceDiv.style.display = "none";
            document.querySelector('input[name="intolerance-text"]').removeAttribute("required");
            document.querySelector('input[name="intolerance-text"]').value = "";
        }
    });
}); 

let restrictionsRadio=document.querySelectorAll('input[name="restrictions"]');
let restrictionsDiv = document.getElementById("restrictions-div");
restrictionsRadio.forEach(radio => {
    radio.addEventListener("change", function () {
        console.log('46');
        if (this.value === "yes") {
            restrictionsDiv.style.display = "block";
            document.querySelector('input[name="restrictions-text"]').setAttribute("required", "required");
        } else {
            restrictionsDiv.style.display = "none";
            document.querySelector('input[name="restrictions-text"]').removeAttribute("required");
            document.querySelector('input[name="restrictions-text"]').value = "";
        }
    });
}); 


let signsRadio=document.querySelectorAll('input[name="sign"]');
let signDiv = document.getElementById("sign-div");
signsRadio.forEach(radio => {
    radio.addEventListener("change", function () {
       
        if (this.value === "yes") {
            signDiv.style.display = "block";
            document.querySelector('input[name="sign-text"]').setAttribute("required", "required");
        } else {
            signDiv.style.display = "none";
            document.querySelector('input[name="sign-text"]').removeAttribute("required");
            document.querySelector('input[name="sign-text"]').value = "";
        }
    });
}); 
















});


