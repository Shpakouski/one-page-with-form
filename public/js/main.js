// Toggle mobile menu visibility
document.addEventListener('DOMContentLoaded', () => {
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileMenu = document.getElementById('mobileMenu');

    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', () => {
            const isVisible = mobileMenu.style.display === 'block';
            mobileMenu.style.display = isVisible ? 'none' : 'block';
        });
    }
});

// Change the displayed language in the dropdown
function changeLanguage(language) {
    document.getElementById('selectedLanguage').textContent = language;
}

// Add phones
document.addEventListener('DOMContentLoaded', () => {
    const phoneContainer = document.getElementById('phone-container');

    phoneContainer.addEventListener('click', (event) => {
        if (event.target.classList.contains('btn-add-phone')) {
            const phoneCount = phoneContainer.children.length;
            if (phoneCount >= 5) return; // Limit to 5 phones

            const phoneRow = document.createElement('div');
            phoneRow.classList.add('d-flex', 'align-items-center', 'mb-2');
            phoneRow.innerHTML = `
                <select name="country_code[]" class="form-select w-auto me-2 text-white border-0">
                    <option value="+375">🇧🇾 +375</option>
                    <option value="+7">🇷🇺 +7</option>
                    <option value="+1">🇺🇸 +1</option>
                </select>
                <input type="tel" name="phone[]" class="form-control flex-grow-1">
                <button type="button" class="btn btn-add-phone ms-2 text-white border-0">+</button>
            `;
            phoneContainer.appendChild(phoneRow);
        }
    });
});

//Check Form
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('mainForm');
    const submitBtn = document.getElementById('submitBtn');
    const emailField = document.getElementById('email');
    const phoneField = document.querySelector('[name="phone[]"]');
    const emailPhoneError = document.getElementById('email-phone-error');

    // Disable Enter key for form submission
    form.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') event.preventDefault();
    });

    // Client-side validation
    form.addEventListener('input', () => {
        let isValid = true;

        // Email or phone validation
        if (!emailField.value && !phoneField.value) {
            emailPhoneError.textContent = 'Необходимо заполнить Email или Телефон';
            emailPhoneError.classList.add('active');
            isValid = false;
        } else {
            emailPhoneError.textContent = '';
            emailPhoneError.classList.remove('active');
        }

        // Check all required fields
        form.querySelectorAll('[required]').forEach((field) => {
            if (!field.value) {
                setError(field, 'Это поле обязательно для заполнения');
                isValid = false;
            } else {
                clearError(field);
            }
        });

        // Enable the submit button if all validations pass
        submitBtn.disabled = !isValid;
    });

    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        submitBtn.disabled = true;

        const formData = new FormData(form);
        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content},
            });

            if (response.ok) {
                document.querySelector('.form-wrapper').innerHTML = '<p>Успешно отправлено!</p>';
            } else {
                const errors = await response.json();
                Object.keys(errors).forEach((field) => {
                    const input = document.querySelector(`[name="${field}"]`);
                    setError(input, errors[field]);
                });
            }
        } catch (error) {
            alert('Ошибка при отправке формы');
        } finally {
            submitBtn.disabled = false;
        }
    });

    function setError(field, message) {
        const errorMessage = field.parentElement.querySelector('.error-message');
        field.classList.add('error');
        errorMessage.textContent = message;
        errorMessage.classList.add('active');
    }

    function clearError(field) {
        const errorMessage = field.parentElement.querySelector('.error-message');
        field.classList.remove('error');
        errorMessage.textContent = '';
        errorMessage.classList.remove('active');
    }
});


