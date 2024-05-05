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

    const addTagButton = document.getElementById('add-tag-button');
    addTagButton.addEventListener('click', function(event) {
        event.stopPropagation();
        event.preventDefault();
    });
});

document.addEventListener('DOMContentLoaded', () => {
    console.log("DOM content loaded");
  
    const tagInput = document.getElementById('tag-input');
    const tagArea = document.getElementById('tag-area');
    const addTagButton = document.getElementById('add-tag-button');
    const tagCounter = document.getElementById('tag-counter');
  
    console.log(tagInput, tagArea, addTagButton);
  
    addTagButton.addEventListener('click', () => {
        event.stopPropagation();
        console.log("Add Tag button clicked");
  
        const tagText = tagInput.value.trim();
        console.log("Tag text:", tagText);

        const currentTags = tagArea.children.length;

        if(tagInput.value === '') {
            return;
        }

        if (currentTags != 4) {
            tagCounter.textContent = `${currentTags}/3`;
        }

        if (currentTags >= 4) {
            tagInput.value = '';
            console.log("Maximum tags reached.");
            return;
        }
  
        if (tagText !== '') {
            const tag = createTag(tagText);
            console.log("Tag created:", tag);
  
            tagArea.appendChild(tag);
            console.log("Tag appended to tag area");
  
            tagInput.value = '';
            console.log("Tag input value cleared");
        }
    });
  
    function createTag(text) {
        const tag = document.createElement('div');
        tag.classList.add('tag');
        tag.textContent = text;
        
        const removeButton = document.createElement('button');
        removeButton.innerHTML = '<i class="fa-solid fa-xmark"></i>';
        removeButton.classList.add('remove-tag-button');
        
        removeButton.addEventListener('click', () => {
            tag.remove();
            tagCounter.textContent = `${tagArea.children.length - 1}/3`;
        });
        
        tag.appendChild(removeButton);
        
        return tag;
    }
});
