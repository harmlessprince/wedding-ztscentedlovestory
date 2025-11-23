import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.getElementById('menuToggle');
    const menuClose = document.getElementById('menuClose');
    const menuOverlay = document.getElementById('menuOverlay');

    if (menuToggle && menuOverlay && menuClose) {
        menuToggle.addEventListener('click', () => {
            menuOverlay.classList.remove('hidden');
        });

        menuClose.addEventListener('click', () => {
            menuOverlay.classList.add('hidden');
        });

        menuOverlay.addEventListener('click', (e) => {
            if (e.target === menuOverlay) {
                menuOverlay.classList.add('hidden');
            }
        });

        const navLinks = menuOverlay.querySelectorAll('nav a');
        navLinks.forEach(link => {
            link.addEventListener('click', (e) => {

                setTimeout(() => {
                    menuOverlay.classList.add('hidden');
                }, 100);
            });
        });
    }


    const groomTab = document.getElementById('groomTab');
    const brideTab = document.getElementById('brideTab');
    const groomContent = document.getElementById('groomContent');
    const brideContent = document.getElementById('brideContent');

    if (groomTab && brideTab && groomContent && brideContent) {
        groomTab.addEventListener('click', () => {

            groomTab.classList.remove('text-gray-500');
            groomTab.classList.add('bg-[#AC9A59]', 'text-white');
            brideTab.classList.remove('bg-maroon', 'text-white');
            brideTab.classList.add('text-gray-500');


            groomContent.classList.remove('hidden');
            brideContent.classList.add('hidden');
        });

        brideTab.addEventListener('click', () => {
            brideTab.classList.remove('text-gray-500');
            brideTab.classList.add('bg-maroon', 'text-white');
            groomTab.classList.remove('bg-[#AC9A59]', 'text-white');
            groomTab.classList.add('text-gray-500');


            brideContent.classList.remove('hidden');
            groomContent.classList.add('hidden');
        });
    }

    const copyButtons = document.querySelectorAll('.copy-btn');

    copyButtons.forEach(button => {
        button.addEventListener('click', async () => {
            const textToCopy = button.getAttribute('data-copy');

            try {
                await navigator.clipboard.writeText(textToCopy);

                const svg = button.querySelector('svg');
                const originalColor = svg.getAttribute('stroke');
                svg.setAttribute('stroke', '#520100');


                const originalHTML = button.innerHTML;
                button.innerHTML = '<span class="text-maroon text-xs">✓</span>';


                setTimeout(() => {
                    button.innerHTML = originalHTML;
                }, 1000);

            } catch (err) {
                console.error('Failed to copy text: ', err);

                const textArea = document.createElement('textarea');
                textArea.value = textToCopy;
                textArea.style.position = 'fixed';
                textArea.style.opacity = '0';
                document.body.appendChild(textArea);
                textArea.select();
                try {
                    document.execCommand('copy');
                    button.innerHTML = '<span class="text-maroon text-xs">✓</span>';
                    setTimeout(() => {
                        button.innerHTML = originalHTML;
                    }, 1500);
                } catch (err) {
                    console.error('Fallback copy failed: ', err);
                }
                document.body.removeChild(textArea);
            }
        });
    });


    const ticketForm = document.getElementById('ticketForm');
    const formSection = document.getElementById('formSection');
    const successSection = document.getElementById('successSection');
    const groomGuestBtn = document.getElementById('groomGuestBtn');
    const brideGuestBtn = document.getElementById('brideGuestBtn');
    const guestTypeInput = document.getElementById('side');

    if (groomGuestBtn && brideGuestBtn && guestTypeInput) {
        groomGuestBtn.addEventListener('click', () => {
            groomGuestBtn.classList.remove('bg-[#E5D9D9]', 'text-gray-500');
            groomGuestBtn.classList.add('border-2', 'border-maroon', 'bg-[#C9B0B0]', 'text-gray-700');
            brideGuestBtn.classList.remove('border-2', 'border-maroon', 'bg-[#C9B0B0]', 'text-gray-700');
            brideGuestBtn.classList.add('bg-[#E5D9D9]', 'text-gray-500');
            guestTypeInput.value = 'GROOM';
        });

        brideGuestBtn.addEventListener('click', () => {
            brideGuestBtn.classList.remove('bg-[#E5D9D9]', 'text-gray-500');
            brideGuestBtn.classList.add('border-2', 'border-maroon', 'bg-[#C9B0B0]', 'text-gray-700');
            groomGuestBtn.classList.remove('border-2', 'border-maroon', 'bg-[#C9B0B0]', 'text-gray-700');
            groomGuestBtn.classList.add('bg-[#E5D9D9]', 'text-gray-500');
            guestTypeInput.value = 'BRIDE';
        });
    }

    // if (ticketForm && formSection && successSection) {
    //     ticketForm.addEventListener('submit', (e) => {
    //         e.preventDefault();
    //
    //         const formData = {
    //             surname: document.getElementById('surname').value,
    //             firstname: document.getElementById('firstname').value,
    //             phone: document.getElementById('phone').value,
    //             email: document.getElementById('email').value,
    //             guestType: guestTypeInput.value,
    //             message: document.getElementById('message').value
    //         };
    //
    //         console.log('Ticket Submission:', formData);
    //
    //
    //         formSection.classList.add('hidden');
    //         successSection.classList.remove('hidden');
    //
    //
    //         window.scrollTo({ top: 0, behavior: 'smooth' });
    //     });
    // }


    const weddingDate = new Date('February 7, 2026 00:00:00').getTime();

    function updateCountdown() {
        const now = new Date().getTime();
        const distance = weddingDate - now;

        if (distance > 0) {
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            const daysEl = document.getElementById('days');
            const hoursEl = document.getElementById('hours');
            const minutesEl = document.getElementById('minutes');
            const secondsEl = document.getElementById('seconds');

            if (daysEl) daysEl.innerHTML = days + ' <span>:</span>';
            if (hoursEl) hoursEl.innerHTML = hours + ' <span>:</span>';
            if (minutesEl) minutesEl.innerHTML = minutes + ' <span>:</span>';
            if (secondsEl) secondsEl.innerHTML = seconds + ' <span></span>';
        }
    }

    if (document.getElementById('days')) {
        updateCountdown();
        setInterval(updateCountdown, 1000);
    }
});
