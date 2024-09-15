document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('addAccountModal');
    const addAccountBtn = document.querySelector('.add-account-btn');
    const closeBtns = document.querySelectorAll('.close-btn');
    const cancelBtns = document.querySelectorAll('.cancel-btn');
    const addAccountForm = document.getElementById('addAccountForm');
    const editAccountModal = document.getElementById('editAccountModal');
    const editAccountForm = document.getElementById('editAccountForm');
    const accountsTableBody = document.getElementById('accountsTableBody');

    let accountId = 0;
    let currentEditRow;

    addAccountBtn.onclick = function() {
        modal.style.display = 'block';
    };

    closeBtns.forEach(btn => {
        btn.onclick = function() {
            modal.style.display = 'none';
            editAccountModal.style.display = 'none';
        };
    });

    cancelBtns.forEach(btn => {
        btn.onclick = function() {
            modal.style.display = 'none';
            editAccountModal.style.display = 'none';
        };
    });

    window.onclick = function(event) {
        if (event.target == modal || event.target == editAccountModal) {
            modal.style.display = 'none';
            editAccountModal.style.display = 'none';
        }
    };

    const togglePasswordVisibility = (input, button) => {
        if (input.type === 'password') {
            input.type = 'text';
            button.innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            input.type = 'password';
            button.innerHTML = '<i class="fas fa-eye"></i>';
        }
    };

    const addTogglePasswordListeners = () => {
        document.querySelectorAll('.toggle-password-visibility').forEach(button => {
            button.addEventListener('click', () => {
                const input = button.previousElementSibling;
                togglePasswordVisibility(input, button);
            });
        });
    };

    // addAccountForm.onsubmit = function(event) {
    //     event.preventDefault();

    //     const username = document.getElementById('username').value;
    //     const password = document.getElementById('password').value;
    //     const confirmPassword = document.getElementById('confirm-password').value;
    //     const userType = document.getElementById('user-type').value; // Get user type

    //     if (password !== confirmPassword) {
    //         alert('Passwords do not match!');
    //         return;
    //     }

    //     accountId++;
    //     const hashedPassword = btoa(password); // Using base64 encoding as a simple hash

    //     const newRow = document.createElement('tr');
    //     newRow.innerHTML = `
    //         <td>${accountId}</td>
    //         <td>${username}</td>
    //         <td>
    //             <span class="password-text" data-password="${hashedPassword}">******</span>
    //             <button class="toggle-password">Show</button>
    //         </td>
    //         <td>${userType}</td> <!-- Display user type -->
    //         <td>
    //             <div class="status-indicator inactive"></div>
    //         </td>
    //         <td>
    //             <button class="edit-btn"><i class="fas fa-pencil-alt"></i></button>
    //             <button class="delete-btn"><i class="fas fa-trash"></i></button>
    //         </td>
    //     `;
    //     accountsTableBody.appendChild(newRow);

    //     // Add event listeners for new buttons
    //     newRow.querySelector('.toggle-password').addEventListener('click', function() {
    //         const passwordText = newRow.querySelector('.password-text');
    //         if (this.textContent === 'Show') {
    //             passwordText.textContent = atob(passwordText.dataset.password); // Decode the password for display
    //             this.textContent = 'Hide';
    //         } else {
    //             passwordText.textContent = '******';
    //             this.textContent = 'Show';
    //         }
    //     });

    //     newRow.querySelector('.delete-btn').addEventListener('click', function() {
    //         accountsTableBody.removeChild(newRow);
    //     });

    //     newRow.querySelector('.edit-btn').addEventListener('click', function() {
    //         currentEditRow = newRow;
    //         document.getElementById('edit-username').value = currentEditRow.children[1].textContent;
    //         document.getElementById('edit-user-type').value = currentEditRow.children[3].textContent; // Set user type
    //         editAccountModal.style.display = 'block';
    //     });

    //     // Clear the form and close the modal
    //     addAccountForm.reset();
    //     modal.style.display = 'none';
    // };

    // editAccountForm.onsubmit = function(event) {
    //     event.preventDefault();

    //     const password = document.getElementById('edit-password').value;
    //     const confirmPassword = document.getElementById('edit-confirm-password').value;

    //     if (password !== confirmPassword) {
    //         alert('Passwords do not match!');
    //         return;
    //     }

    //     const hashedPassword = btoa(password); // Using base64 encoding as a simple hash

    //     // Update the password in the current edit row
    //     const passwordText = currentEditRow.querySelector('.password-text');
    //     passwordText.dataset.password = hashedPassword;
    //     passwordText.textContent = '******';

    //     // User type is read-only and does not need updating in the table row

    //     editAccountForm.reset();
    //     editAccountModal.style.display = 'none';
    // };

    addTogglePasswordListeners();
});
