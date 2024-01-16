document.addEventListener("DOMContentLoaded", function () {
    const prescriptionsContainer = document.getElementById("prescriptions-container");
    const addPrescriptionBtn = document.getElementById("add-prescription-btn");

    // Function to fetch and display prescriptions
    function fetchPrescriptions() {
        // Implement AJAX/Fetch to get prescriptions from the backend
        // Example: fetch('/api/prescriptions').then(response => response.json()).then(data => displayPrescriptions(data));
        // Ensure to replace the example with your actual API endpoint and handling logic
        const dummyData = [
            { PrescriptionID: 1, PatientID: 101, DoctorID: 201, Date: "2024-01-15", Medications: "Med1, Med2" },
            { PrescriptionID: 2, PatientID: 102, DoctorID: 202, Date: "2024-01-14", Medications: "Med3, Med4" }
        ];

        displayPrescriptions(dummyData);
    }

    // Function to display prescriptions on the page
    function displayPrescriptions(prescriptions) {
        prescriptionsContainer.innerHTML = "";
        prescriptions.forEach(prescription => {
            const prescriptionDiv = document.createElement("div");
            prescriptionDiv.innerHTML = `
                <p><strong>Prescription ID:</strong> ${prescription.PrescriptionID}</p>
                <p><strong>Patient ID:</strong> ${prescription.PatientID}</p>
                <p><strong>Doctor ID:</strong> ${prescription.DoctorID}</p>
                <p><strong>Date:</strong> ${prescription.Date}</p>
                <p><strong>Medications:</strong> ${prescription.Medications}</p>
                <hr>
            `;
            prescriptionsContainer.appendChild(prescriptionDiv);
        });
    }

    // Event listener for 'Add Prescription' button
    addPrescriptionBtn.addEventListener("click", function () {
        // Implement logic to open a modal or redirect to the prescription form page for adding new prescriptions
        // Example: window.location.href = '/add-prescription'; // Replace with your actual route
    });

    // Fetch and display prescriptions on page load
    fetchPrescriptions();
});

