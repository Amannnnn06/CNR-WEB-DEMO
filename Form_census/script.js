document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("form").addEventListener("submit", function (event) {
        let censusChecked = document.querySelector('input[name="census"]:checked');
        let hmForceChecked = document.querySelector('input[name="hm_force"]:checked');

        let censusError = document.getElementById("censusError");
        let hmForceError = document.getElementById("hmForceError");

        // Reset previous errors
        censusError.innerText = "";
        hmForceError.innerText = "";

        let valid = true;

        if (!censusChecked) {
            censusError.innerText = "Please select an option for Ethnic Classification.";
            valid = false;
        }

        if (!hmForceChecked) {
            hmForceError.innerText = "Please select an option for British pupils with parents in the HM forces.";
            valid = false;
        }

        if (!valid) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
});
