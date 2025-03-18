document.addEventListener("DOMContentLoaded", function () {
    let asthmaRadios = document.querySelectorAll('input[name="asthma"]');
    let asthmaDetails = document.getElementById("asthmaDetails");
    

    // show/hide asthma details based on "asthma" selection
    asthmaRadios.forEach(radio => {
        radio.addEventListener("change", function () {
            if (this.value === "yes") {
                asthmaDetails.style.display = "block";
                document.querySelectorAll("#asthmaDetails input, #asthmaDetails textarea").forEach(el => {
                    el.setAttribute("required", "required");
                });
            } else {
                asthmaDetails.style.display = "none";
                document.querySelectorAll("#asthmaDetails input, #asthmaDetails textarea").forEach(el => {
                    el.removeAttribute("required");
                    el.value = "";
                });
            }
        });
    });
      //total Years input based on "Ongoing?" selection
    let totalYearsGroup = document.getElementById("totalYearsGroup");
    let ongoingRadios = document.querySelectorAll('input[name="ongoing"]');
    //totalYearsGroup.style.display = "none";
    ongoingRadios.forEach(radio => {
        radio.addEventListener("change", function () {
            console.log('28');
            if (this.value === "yes") {
                totalYearsGroup.style.display = "block";
                document.querySelector('input[name="total_years"]').setAttribute("required", "required");
            } else {
                totalYearsGroup.style.display = "none";
                document.querySelector('input[name="total_years"]').removeAttribute("required");
                document.querySelector('input[name="total_years"]').value = "";
            }
        });
    });
    //child Total Years input based on "child_Ongoing year ?" selection
    let childOn=document.querySelectorAll('input[name="child_ongoing"]');
    let childTotalYearsDiv = document.getElementById("childTotalYearsDiv");
    //childTotalYearsDiv.style.display="none";

    childOn.forEach(radio => {
        radio.addEventListener("change", function () {
            console.log('46');
            if (this.value === "yes") {
                childTotalYearsDiv.style.display = "block";
                document.querySelector('input[name="child_ongoing_year"]').setAttribute("required", "required");
            } else {
                childTotalYearsDiv.style.display = "none";
                document.querySelector('input[name="child_ongoing_year"]').removeAttribute("required");
                document.querySelector('input[name="child_ongoing_year"]').value = "";
            }
        });
    }); 
});
