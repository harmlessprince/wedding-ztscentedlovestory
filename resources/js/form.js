document.addEventListener('DOMContentLoaded', () => {
    const ticketForm = document.getElementById('ticketForm');
    const formSection = document.getElementById('formSection');
    const successSection = document.getElementById('successSection');
    const groomGuestBtn = document.getElementById('groomGuestBtn');
    const brideGuestBtn = document.getElementById('brideGuestBtn');
    const guestTypeInput = document.getElementById('guestType');
    const submitBtn = ticketForm?.querySelector('button[type="submit"]');
    // const token = document
    //     .querySelector('meta[name="csrf-token"]')
    //     .getAttribute('content');
    const API_ENDPOINT = 'api/get-ticket';

    function setGuestType(type, activeBtn, inactiveBtn) {
        activeBtn.classList.remove('bg-[#E5D9D9]', 'text-gray-500');
        activeBtn.classList.add('border-2', 'border-maroon', 'bg-[#C9B0B0]', 'text-gray-700');

        inactiveBtn.classList.remove('border-2', 'border-maroon', 'bg-[#C9B0B0]', 'text-gray-700');
        inactiveBtn.classList.add('bg-[#E5D9D9]', 'text-gray-500');

        guestTypeInput.value = type;
    }

    function generateInvitationCode(surname) {
        const prefix = surname.substring(0, 6).toUpperCase().replace(/[^A-Z]/g, 'X');
        const randomNum = Math.floor(1000 + Math.random() * 9000);
        return `${prefix}-${randomNum}`;
    }
    if (groomGuestBtn && brideGuestBtn) {
        if (groomGuestBtn && brideGuestBtn) {
            groomGuestBtn.addEventListener('click', () =>
                setGuestType('GROOM', groomGuestBtn, brideGuestBtn)
            );

            brideGuestBtn.addEventListener('click', () =>
                setGuestType('BRIDE', brideGuestBtn, groomGuestBtn)
            );
        }
    }

    function validateForm(data) {
        if (!data.surname.trim()) return 'Surname is required';
        if (!data.first_name.trim()) return 'First name is required';
        if (!data.phone.trim()) return 'Phone number is required';
        if (!/^\S+@\S+\.\S+$/.test(data.email)) return 'Invalid email address';
        if (!data.side) return 'Please select guest type';

        return null;
    }

    function setFormDisabled(disabled) {
        const elements = ticketForm.querySelectorAll('input, textarea, button');

        elements.forEach(el => {
            el.disabled = disabled;
        });

        if (submitBtn) {
            submitBtn.textContent = disabled ? 'Submitting…' : 'Submit';
            submitBtn.classList.toggle('opacity-60', disabled);
            submitBtn.classList.toggle('cursor-not-allowed', disabled);
        }
    }

    if (ticketForm && formSection && successSection) {
        ticketForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = {
                surname: document.getElementById('surname').value,
                first_name: document.getElementById('firstname').value,
                phone: document.getElementById('phone').value,
                email: document.getElementById('email').value,
                side: guestTypeInput.value,
                message: document.getElementById('message').value
            };


            const error = validateForm(formData);
            if (error) {
                alert(error);
                return;
            }
            const location_url = location.href
            console.log(location_url)
            setFormDisabled(true);
            try {
                const response = await fetch(API_ENDPOINT, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify(formData)
                });

                const result = await response.json();
                console.log(result)

                if (!response.ok || !result.success) {
                    throw new Error(result.message || 'Submission failed');
                }

                // ✅ Populate success data from backend
                const invitationCodeEl = document.getElementById('invitation-code');
                if (invitationCodeEl) {
                    invitationCodeEl.textContent = result.invitation_code;

                    const copyBtn = invitationCodeEl
                        .closest('.invitation-wrapper')
                        ?.querySelector('.copy-btn');

                    if (copyBtn) {
                        copyBtn.setAttribute('data-copy', result.invitation_code);
                    }
                }

                const inviteeNameEl = document.getElementById('invitee_name');
                if (inviteeNameEl) {
                    inviteeNameEl.textContent = result.invite_name;
                }

                // ✅ Switch views
                formSection.classList.add('hidden');
                successSection.classList.remove('hidden');
                window.scrollTo({ top: 0, behavior: 'smooth' });

            } catch (err) {
                alert(err.message);
                console.log(err.message)
                setFormDisabled(false);
            }
        });
    }
})
