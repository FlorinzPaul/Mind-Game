// Handle Login/Register button clicks
document.getElementById('loginBtn').onclick = function() {
    showForm('loginModal');
};

document.getElementById('SignupBtn').onclick = function() {
    showForm('registerModal');
};

// Close Login/Registration modals
document.getElementById('closeLogin').onclick = function() {
    closeForm('loginModal');
};

document.getElementById('closeRegister').onclick = function() {
    closeForm('registerModal');
};

document.getElementById('signUp').onclick = function() {
    closeForm('registerModal');
    showForm('loginModal');
    
}

// Function to show the specified form
function showForm(formId) {
    document.getElementById('loginModal').style.display = 'none';
    document.getElementById('registerModal').style.display = 'none';
    document.getElementById(formId).style.display = 'flex';
    document.getElementById('mainContent').classList.add('hidden');
}

// Function to close the specified form
function closeForm(formId) {
    document.getElementById(formId).style.display = 'none';
    document.getElementById('mainContent').classList.remove('hidden');
}

// Close the main content behind the modal
document.getElementById('mainContent').classList.remove('hidden');
