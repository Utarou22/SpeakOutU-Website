function toggleDropdown(accountDropdown) {
    var dropdown = document.getElementById(accountDropdown);
    var dropdownContent = dropdown.querySelector('.account-subdropdown');
    dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
}