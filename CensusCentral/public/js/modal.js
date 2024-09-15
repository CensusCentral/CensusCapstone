
let viewMemberData = [];

// Get the modal
var modal = document.getElementById("householdModal");

// Get the button that opens the modal
var btn = document.getElementById("openModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// Get the close button
var closeBtn = document.getElementById("closeModal");

// Get the modal content
var modalContent = document.querySelector(".modal-content");

// When the user clicks the button, open the modal 
btn.onclick = function(event) {
    modal.style.display = "block";
    event.stopPropagation(); // Stop the event from propagating to the window
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    resetForm();
    modal.style.display = "none";
    
}

// When the user clicks on the close button, close the modal
closeBtn.onclick = function() {
    modal.style.display = "none";
}

// Prevent clicks inside the modal content from closing the modal
modalContent.onclick = function(event) {
    event.stopPropagation();
}

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//     if (event.target == modal) {
//         resetForm();
//         modal.style.display = "none";

        
//     }

    
// }

// Form submission
// document.getElementById("householdForm").onsubmit = function(e) {
//     e.preventDefault();
//     // Here you would typically collect the form data and send it to a server
//     console.log("Form submitted");
//     modal.style.display = "none";
// }




// Form submission


// Modify the existing event listeners to only hide the modal without resetting the form
span.onclick = function() {
    modal.style.display = "none";
}

closeBtn.onclick = function() {
    modal.style.display = "none";
}

// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// }

// Add a new function to open the modal and ensure the form is clear
function openModal() {
    document.getElementById("householdForm").reset();
    modal.style.display = "block";
}

// Update the button that opens the modal to use the new openModal function
document.getElementById("openModal").onclick = function(event) {
    openModal();
    event.stopPropagation(); // Stop the event from propagating to the window
}


function viewMember(memberData) {
   // Populate the form fields with the member data
document.querySelector("input[name='memberlastName']").value = memberData.memberlastName;
document.querySelector("input[name='memberfirstName']").value = memberData.memberfirstName;
document.querySelector("input[name='memberMiddleName']").value = memberData.memberMiddleName;
document.querySelector("input[name='memberDOB']").value = memberData.memberDOB;
document.querySelector("input[name='memberAge']").value = memberData.memberAge;
document.querySelector("select[name='memberSex']").value = memberData.memberSex;
document.querySelector("input[name='memberRelationToHead']").value = memberData.memberRelationToHead;
document.querySelector("select[name='memberCivilStatus']").value = memberData.memberCivilStatus;
document.querySelector("input[name='memberOccupation']").value = memberData.memberOccupation;
document.querySelector("input[name='memberPlaceOfWork']").value = memberData.memberPlaceOfWork;
document.querySelector("select[name='memberEducAttaintment']").value = memberData.memberEducAttaintment;
document.querySelector("select[name='memberOfCommunityGroup']").value = memberData.memberOfCommunityGroup;
document.querySelector("input[name='memberAnyDisability']").value = memberData.memberAnyDisability;
document.querySelector("input[name='memberGenderIdentification']").value = memberData.memberGenderIdentification;
document.querySelector("input[name='memberEstimatedIncome']").value = memberData.memberEstimatedIncome;

 

    // Disable all input fields
    const inputs = document.querySelectorAll("#householdForm input, #householdForm select");
    inputs.forEach(input => {
        input.style.border = ""; // Resets to default border
        input.disabled = true; // Disable input
    });
 
    document.querySelector("#householdForm .pop-buttons").style.display = "none";

    // Open the modal
    document.getElementById("householdModal").style.display = "block";

}






////FUNCTION: INEENABLE NIYA YUNG FORMS ULI GALING SA VIEWING
function resetForm() {
    const inputs = document.querySelectorAll("#householdForm input, #householdForm select");
    inputs.forEach(input => input.disabled = false);
    document.querySelector("#householdForm .pop-buttons").style.display = "block";
    document.getElementById("householdForm").reset(); // Optionally reset the form

}

// Make sure the close button also resets the form
document.getElementById("closeModal").onclick = function() {
    document.getElementById("householdModal").style.display = "none";
    document.querySelector("#householdForm .pop-buttons").style.display = "block";
    resetForm(); // Re-enable fields
};

span.onclick= function() {
    document.getElementById("householdModal").style.display = "none";
    document.querySelector("#householdForm .pop-buttons").style.display = "block";
    resetForm(); // Re-enable fields
};

// window.onclick = function(event) {
//     if (event.target == document.getElementById("householdModal")) {
//         document.getElementById("householdModal").style.display = "none";
//         document.querySelector("#householdForm .pop-buttons").style.display = "block";
//         resetForm(); // Re-enable fields
//     }
// };


//THIS FUNCTION WILL STORE THE ARRAY IN THE HIDDEN INPUT BOX IN THE MEMBER SECTION FORM
function collectMemberData() {
    const memberData = {

        memberlastName: document.querySelector("input[name='memberlastName']").value,
        memberfirstName: document.querySelector("input[name='memberfirstName']").value,
        memberMiddleName: document.querySelector("input[name='memberMiddleName']").value || null,
        memberMaidenName: document.querySelector("input[name='memberMaidenName']").value || null,
        memberDOB: document.querySelector("input[name='memberDOB']").value,
        memberAge: document.querySelector("input[name='memberAge']").value,
        memberSex: document.querySelector("select[name='memberSex']").value,
        memberRelationToHead: document.querySelector("input[name='memberRelationToHead']").value,
        memberCivilStatus: document.querySelector("select[name='memberCivilStatus']").value,
        memberOccupation: document.querySelector("input[name='memberOccupation']").value || null,
        memberPlaceOfWork: document.querySelector("input[name='memberPlaceOfWork']").value || null,
        memberEducAttaintment: document.querySelector("select[name='memberEducAttaintment']").value,
        memberOfCommunityGroup: document.querySelector("select[name='memberOfCommunityGroup']").value,
        memberAnyDisability: document.querySelector("input[name='memberAnyDisability']").value || null,
        memberGenderIdentification: document.querySelector("input[name='memberGenderIdentification']").value || null,
        memberEstimatedIncome: document.querySelector("input[name='memberEstimatedIncome']").value || null
    };

    let membersData = JSON.parse(document.getElementById('membersData').value || '[]');
    membersData.push(memberData);
    
    document.getElementById('membersData').value = JSON.stringify(membersData);
    console.log("Current viewMemberData:", membersData);
}


document.getElementById("householdForm").onsubmit = function(e) {
    e.preventDefault();

  

    collectMemberData();
    
    // Collect form data
    var formData = new FormData(this);
    var tableBody = document.querySelector("#resultsTable tbody");
    
    // Create a new row for the form data
    var row = tableBody.insertRow();
    
    // Define the order of fields as they should appear in the table
    var fields = ['memberlastName', 'memberfirstName', 'memberMiddleName', 'memberDOB', 'memberAge', 'memberSex', 'memberRelationToHead'];
    
    // Add cells to the row for each field
    fields.forEach(function(field) {
        var cell = row.insertCell();
        cell.textContent = formData.get(field) || ''; // Use empty string if field is not present
    });


    // Add actions buttons to the row
    var actionCell = row.insertCell();
    actionCell.innerHTML = `
        
        <div class="button-group">

    
           <div class="action-button" onclick="viewMember({
            memberlastName: '${formData.get('memberlastName')}',
            memberfirstName: '${formData.get('memberfirstName')}',
            memberMiddleName: '${formData.get('memberMiddleName')}',
            memberRelationToHead: '${formData.get('memberRelationToHead')}',
            memberMaidenName: '${formData.get('memberMaidenName')}',
            memberSex: '${formData.get('memberSex')}',
            memberDOB: '${formData.get('memberDOB')}',
            memberAge: '${formData.get('memberAge')}',
            memberCivilStatus: '${formData.get('memberCivilStatus')}',
            memberOccupation: '${formData.get('memberOccupation')}',
            memberPlaceOfWork: '${formData.get('memberPlaceOfWork')}',
            memberEducAttaintment: '${formData.get('memberEducAttaintment')}',
            memberOfCommunityGroup: '${formData.get('memberOfCommunityGroup')}',
            memberAnyDisability: '${formData.get('memberAnyDisability')}',
            memberGenderIdentification: '${formData.get('memberGenderIdentification')}',
            memberEstimatedIncome: '${formData.get('memberEstimatedIncome')}'
        })">View</div>
           
        </div>
    `;
    
    // Clear the form fields
    resetForm();
    
    // Hide the modal
    modal.style.display = "none";
    
    // Show the results table
    document.getElementById("resultsTableContainer").style.display = "block";
   
    
    console.log("Form submitted and new table row created");
}





// Example of how to reset viewMemberData when the modal is closed
document.querySelector(".close").onclick = function() {
    document.getElementById("householdModal").style.display = "none";
    resetForm();  // Optionally reset form when modal is closed
};


document.addEventListener('DOMContentLoaded', function() {
    if (viewMemberData.length > 0) {
        refreshTable();
    }

    const sexField = document.querySelector('select[name="sex"]');

});


document.getElementById('householdForm').addEventListener('submit', function(event) {

    event.preventDefault(); // Prevent form submission

    // Clear previous errors
    const errorMessages = document.querySelectorAll('.error-message');
    errorMessages.forEach(function(message) {
        message.remove();
    });

    // Validate all required fields are filled
    if (!validateFormFields()) {
        // If not all required fields are filled, return without submitting
        return;
    }

    // If form passes the validateFormFields check, continue with additional specific validations
    const lastName = document.querySelector('input[name="memberlastName"]');
    const firstName = document.querySelector('input[name="memberfirstName"]');
    const dob = document.querySelector('input[name="memberDOB"]');
    const age = document.querySelector('input[name="memberAge"]');
    const sex = document.querySelector('select[name="memberSex"]');
    const relationToHead = document.querySelector('input[name="memberRelationToHead"]');
    const civilStatus = document.querySelector('select[name="memberCivilStatus"]');
    
    let isValid = true;

    // Validation logic
    if (lastName.value.trim() === '') {
        isValid = false;
        displayError(lastName, 'Last Name is required.');
    }

    if (firstName.value.trim() === '') {
        isValid = false;
        displayError(firstName, 'First Name is required.');
    }

    if (dob.value === '') {
        isValid = false;
        displayError(dob, 'Date of Birth is required.');
    } else {
        const dobDate = new Date(dob.value);
        const today = new Date();
        if (dobDate > today) {
            isValid = false;
            displayError(dob, 'Date of Birth cannot be in the future.');
        }
    }

    if (age.value.trim() === '' || age.value <= 0) {
        isValid = false;
        displayError(age, 'Age is required and must be a positive number.');
    }

    if (sex.value === '') {
        isValid = false;
        displayError(sex, 'Sex is required.');
    }

    if (relationToHead.value.trim() === '') {
        isValid = false;
        displayError(relationToHead, 'Relation to Household Head is required.');
    }

    if (civilStatus.value === '') {
        isValid = false;
        displayError(civilStatus, 'Civil Status is required.');
    }

    // If the form is valid, submit it
    if (isValid) {
        this.submit();
    }
});

function validateFormFields() {
    const fields = document.querySelectorAll('#householdForm input[required], #householdForm select[required]');
    let allFilled = true;

    fields.forEach(field => {
        if (!field.value) {
            allFilled = false;
            field.style.borderColor = 'red'; // Highlight empty fields
        } else {
            field.style.borderColor = ''; // Reset border color if filled
        }
    });

    return allFilled;
}

function displayError(element, message) {
    const errorMessage = document.createElement('div');
    errorMessage.classList.add('error-message');
    errorMessage.style.color = 'red';
    errorMessage.innerText = message;
    element.parentNode.appendChild(errorMessage);
}

