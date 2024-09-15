document.addEventListener('DOMContentLoaded', function() {
    const container = document.querySelector('.container');
    const forms = document.querySelectorAll('.form-section');
    const nextButtons = document.querySelectorAll('.nextBtn');
    const backButtons = document.querySelectorAll('.backBtn');
    const sexField = document.querySelector('select[name="sex"]'); 
    const maidenNameField = document.querySelector('input[name="maidenName"]'); 
    
    const disabilityField = document.querySelector('input[name="disability"]'); 
    const genderField = document.querySelector('input[name="gender"]');

    const governmentField =document.querySelector('select[name="governmentResettelment"]');
    const programField =  document.querySelector('input[name="whichProgram"]');

    const barangayField = document.querySelector('select[name="barangay"]');
    const purokField = document.querySelector('select[name="sitioPurok"]');

    const numberFields = document.querySelectorAll('input[type="number"]'); // Select all number input fields

    let currentFormIndex = 0;

    // Set common min and max length for all text fields
    const minLength = 2; // example: minimum of 2 characters
    const maxLength = 255; // example: maximum of 50 characters

    // Set common min and max values for number fields
    const minNumberValue = 1; // example: minimum value of 1
    const maxNumberValue = 100; // example: maximum value of 100


    const numberPattern = /\d/;

    

    // Apply length and number constraints to all input fields
    function applyFieldConstraints() {
        const inputFields = document.querySelectorAll('input');
        inputFields.forEach(field => {
            if (field.type === 'text') {
                field.setAttribute('minlength', minLength);
                field.setAttribute('maxlength', maxLength);

                field.addEventListener('input', function() {
                    if (numberPattern.test(this.value)) {
                        this.value = this.value.replace(numberPattern, '');
                        this.style.borderColor = 'red'; // Highlight invalid input
                    } else {
                        this.style.borderColor = ''; // Reset border color if valid
                    }
                });


            } else if (field.type === 'number') {
                field.setAttribute('min', minNumberValue);
                field.setAttribute('max', maxNumberValue);
                field.addEventListener('input', function() {
                    if (this.value < minNumberValue) {
                        this.value = ''; // Clear the value if it's less than the minimum
                        this.style.borderColor = 'red'; // Highlight invalid input
                    } else if (this.value > maxNumberValue) {
                        this.value = maxNumberValue; // Cap the value at max if it exceeds the limit
                    } else {
                        this.style.borderColor = ''; // Reset border color if valid
                    }
                });
            }
        });
    }

    // Function to adjust container height based on the visible form section
    function adjustContainerHeight() {
        const activeForm = forms[currentFormIndex];
        const activeFormHeight = activeForm.scrollHeight;
        container.style.height = `${activeFormHeight + 200}px`; // Add some padding to prevent overflow
    }

    // Function to show the current form and hide others
    function updateFormVisibility() {
        forms.forEach((form, index) => {
            if (index === currentFormIndex) {
                form.classList.add('active');
                form.classList.remove('prev');
            } else if (index < currentFormIndex) {
                form.classList.remove('active');
                form.classList.add('prev');
            } else {
                form.classList.remove('active');
                form.classList.remove('prev');
            }
        });
        adjustContainerHeight(); // Adjust the container height after visibility update
    }


    // Function to validate required fields in the current form
    function validateFormFields() {
        const currentForm = forms[currentFormIndex];
        const fields = currentForm.querySelectorAll('input[required], select[required]');
        let allFilled = true;

        fields.forEach(field => {
            const minLength = field.getAttribute('minlength');
            const maxLength = field.getAttribute('maxlength');

            // Check if the field is empty or invalid number
            if (!field.value || (field.type === 'number' && (field.value <= 0))) {
                allFilled = false;
                field.style.borderColor = 'red'; // Highlight empty or invalid number fields
            } 
            // Check if the field value does not meet length requirements
            else if ((minLength && field.value.length < minLength) || (maxLength && field.value.length > maxLength)) {
                allFilled = false;
                field.style.borderColor = 'red'; // Highlight fields that do not meet length requirements
            } 
            else {
                field.style.borderColor = ''; // Reset border color if filled and valid
            }
        });

        return allFilled;
    }




    function validateFormFields() {
        const currentForm = forms[currentFormIndex];
        const fields = currentForm.querySelectorAll('input[required], select[required]');
        let allFilled = true;

        fields.forEach(field => {
            // Check if the field is empty or invalid number
            if (!field.value || (field.type === 'number' && (field.value <= 0))) {
                allFilled = false;
                field.style.borderColor = 'red'; // Highlight empty or invalid number fields
            } 
            // Check if the field value does not meet length requirements
            else if (field.type === 'text' && (field.value.length < minLength || field.value.length > maxLength)) {
                allFilled = false;
                field.style.borderColor = 'red'; // Highlight fields that do not meet length requirements
            } 
            else {
                field.style.borderColor = ''; // Reset border color if filled and valid
            }
        });

        return allFilled;
    }

    // Initialize field constraints and field state logic
    applyFieldConstraints();

    
    
    // Combined function to toggle fields based on the selected values
    function updateFieldStates() {
        // Toggle maiden name field based on sex
        if (sexField.value === 'Female') {
            maidenNameField.disabled = false; // Enable the maiden name field
        } else {
            maidenNameField.disabled = true; // Disable the maiden name field
            maidenNameField.value = ''; // Clear the value when disabled
        }

        

        if(governmentField.value === 'Yes'){

            programField.disabled = false;
        }else{

            programField.disabled = true;
            programField.value = '';
        }

        if(barangayField.value === 'Marinig'){

            purokField.disabled = false;
        }else  if (purokField.disabled || !purokField.value) {
            
            purokField.value = '';
        }
            else{
            purokField.disabled = true;
            purokField.value = '';
        }

        

    }

    // Add event listeners for changes in the sex and community group fields
    sexField.addEventListener('change', updateFieldStates);
    
    governmentField.addEventListener('change',updateFieldStates);
    barangayField.addEventListener('change',updateFieldStates);
    
    // Initialize the auto-fill function on DOMContentLoaded
    document.addEventListener('DOMContentLoaded', autoFillAge);

    // Event listener for all Next buttons
    nextButtons.forEach(button => {
        button.addEventListener('click', () => {
            if (validateFormFields()) {
                if (currentFormIndex < forms.length - 1) {
                    currentFormIndex++;
                    updateFormVisibility();
                }
            } else {
                alert('Please fill out all required fields and ensure inputs are valid.');
            }
        });
    });

    // Event listener for all Back buttons
    backButtons.forEach(button => {
        button.addEventListener('click', () => {
            if (currentFormIndex > 0) {
                currentFormIndex--;
                updateFormVisibility();
            }
        });
    });

    // Initial visibility update
    updateFormVisibility();

    // Initial call to set the maiden name and disability field states based on initial values
    updateFieldStates();
});


// function showSuccessModal() {
//     $('#successModal').modal('show');
// }




// Function to calculate age from birthdate
function calculateAge(birthdate) {
    const today = new Date();
    const birthDate = new Date(birthdate);
    let age = today.getFullYear() - birthDate.getFullYear();
    const monthDifference = today.getMonth() - birthDate.getMonth();

    // Check if the birthday has occurred this year
    if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }

    return age;
}

// Function to handle input change and auto-fill age
function autoFillAge() {
    const birthdateField = document.querySelector('input[name="dateOfBirth"]'); // Select the birthdate input
    const ageField = document.querySelector('input[name="age"]'); // Select the age input

    birthdateField.addEventListener('change', function() {
        const birthdate = birthdateField.value;
    
        if (birthdate) {
            const age = calculateAge(birthdate);
            ageField.value = age;
        } else {
            ageField.value = ''; 
        }
    });
}

document.addEventListener('DOMContentLoaded', autoFillAge);



// const urlParams = new URLSearchParams(window.location.search);
// if (urlParams.get('status') === 'success') {
//     document.getElementById('successModal').style.display = 'flex';
// }

// function closeModal() {
//     document.getElementById('successModal').style.display = 'none';
// }


