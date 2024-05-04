function toggleDropdown(accountDropdown) {
    var dropdown = document.getElementById(accountDropdown);
    var dropdownContent = dropdown.querySelector('.account-subdropdown');
    dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
}

function toggleCreatePostOverlay() {
    var overlay = document.getElementById("create-post-overlay");
    if (overlay.style.display === "none" || overlay.style.display === "") {
        overlay.style.display = "flex";
    } else {
        overlay.style.display = "none";
    }
}

document.addEventListener('click', function(event) {
    var dropdown = document.getElementById('account-dropdown');
    var dropdownContent = dropdown.querySelector('.account-subdropdown');

    if (!dropdown.contains(event.target)) {
        dropdownContent.style.display = 'none';
    }
});

document.addEventListener('DOMContentLoaded', function() {
    var cancelButton = document.querySelector('.cancel-button');

    cancelButton.addEventListener('click', function() {
        toggleCreatePostOverlay();
    });
});