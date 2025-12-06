import './bootstrap';
import './form.js';
import './invitation_template.js';
import './wishlist.js';
const amountInput = document.getElementById('amountInput');

document.addEventListener('DOMContentLoaded', () => {


    const amountButtons = document.querySelectorAll('.amount-btn');
    const venueBackground = document.getElementById('venueBackground');
    if (venueBackground) {
        const images = ['img/venue.png', 'img/venue2.png', 'img/venue3.png'];
        let currentIndex = 0;

        const preloadedImages = [];
        let loadedCount = 0;

        images.forEach((src, index) => {
            const img = new Image();
            img.src = src;
            img.onload = () => {
                loadedCount++;
                if (loadedCount === images.length) {
                    startRotation();
                }
            };
            img.onerror = () => {
                console.error(`Failed to load image: ${src}`);
                loadedCount++;
                if (loadedCount === images.length) {
                    startRotation();
                }
            };
            preloadedImages.push(img);
        });

        function startRotation() {
            setInterval(() => {
                venueBackground.style.opacity = '0.5';
                setTimeout(() => {
                    currentIndex = (currentIndex + 1) % images.length;
                    venueBackground.style.backgroundImage = `url('${images[currentIndex]}')`;
                    venueBackground.style.opacity = '1';
                }, 2000);
            }, 4000);
        }
    }

    const currentPath = window.location.pathname;
    const currentHash = window.location.hash;
    const navLinks = document.querySelectorAll('footer .nav-link');

    navLinks.forEach(link => {
        const href = link.getAttribute('href');
        link.classList.remove('active');
        link.classList.add('text-white/60');
        link.classList.remove('text-white');

        if (href === '/' && currentPath === '/index.html' || href === '/' && currentPath === '/') {
            link.classList.add('active', 'text-white');
            link.classList.remove('text-white/60');
        } else if (href.includes('#') && currentHash && href.includes(currentHash)) {
            link.classList.add('active', 'text-white');
            link.classList.remove('text-white/60');
        } else if (href.includes(currentPath) && currentPath !== '/' && currentPath !== '/index.html') {
            link.classList.add('active', 'text-white');
            link.classList.remove('text-white/60');
        }
    });


    window.addEventListener('hashchange', () => {
        const hash = window.location.hash;
        navLinks.forEach(link => {
            const href = link.getAttribute('href');
            link.classList.remove('active', 'text-white');
            link.classList.add('text-white/60');

            if (href.includes('#') && hash && href.includes(hash)) {
                link.classList.add('active', 'text-white');
                link.classList.remove('text-white/60');
            }
        });
    });

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



    const downloadInviteBtn = document.getElementById('downloadInviteBtn');
    if (downloadInviteBtn) {
        downloadInviteBtn.addEventListener('click', async () => {
            try {
                const imgEl = document.getElementById('inviteAttachment');
                if (!imgEl) {
                    alert('No attachment available to download');
                    return;
                }

                const src = imgEl.getAttribute('src');
                const res = await fetch(src, { cache: 'no-cache' });
                if (!res.ok) throw new Error('Failed to fetch image');
                const blob = await res.blob();
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                const nameMatch = src.split('/').pop() || 'invitation.png';
                a.download = nameMatch;
                document.body.appendChild(a);
                a.click();
                a.remove();
                URL.revokeObjectURL(url);
            } catch (err) {
                console.error('Download failed', err);
                alert('Download failed. If the image is hosted externally, please save it manually.');
            }
        });
    }


    const codeForm = document.getElementById('codeForm');
    const codeFormSection = document.getElementById('codeFormSection');
    const invitationSection = document.getElementById('invitationSection');
    const invitationCodeInput = document.getElementById('invitationCode');
    const displayedCode = document.getElementById('displayedCode');
    const inviteeName = document.getElementById('inviteeName');
    const pasteBtn = document.getElementById('pasteBtn');
    const clearBtn = document.getElementById('clearBtn');
    const invitationDownloadBtn = document.getElementById('downloadBtn');


    if (pasteBtn) {
        pasteBtn.addEventListener('click', async () => {
            try {
                const text = await navigator.clipboard.readText();
                invitationCodeInput.value = text.trim();
            } catch (err) {
                console.error('Failed to read clipboard:', err);
                alert('Unable to paste. Please enter the code manually.');
            }
        });
    }

    if (codeForm) {
        codeForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const code = invitationCodeInput.value.trim().toUpperCase();

            if (!code) {
                alert('Please enter an invitation code');
                return;
            }
            console.log('Ticket ID:', code);


            // Todo, backend will return the actual name
            const displayName = code;

            displayedCode.textContent = code;
            inviteeName.textContent = displayName;

            codeFormSection.classList.add('hidden');
            invitationSection.classList.remove('hidden');

            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }


    if (clearBtn) {
        clearBtn.addEventListener('click', () => {
            invitationCodeInput.value = '';
            invitationSection.classList.add('hidden');
            codeFormSection.classList.remove('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }


    if (invitationDownloadBtn) {
        invitationDownloadBtn.addEventListener('click', async () => {
            try {
                const imgEl = document.getElementById('invitationImage');
                if (!imgEl) {
                    alert('No invitation available to download');
                    return;
                }

                const src = imgEl.getAttribute('src');
                const res = await fetch(src, { cache: 'no-cache' });
                if (!res.ok) throw new Error('Failed to fetch image');

                const blob = await res.blob();
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = src.split('/').pop() || 'invitation.png';
                document.body.appendChild(a);
                a.click();
                a.remove();
                URL.revokeObjectURL(url);
            } catch (err) {
                console.error('Download failed', err);
                alert('Download failed. Please try again.');
            }
        });
    }

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


    const cashBtn = document.getElementById('cashBtn');
    const wishlistBtn = document.getElementById('wishlistBtn');
    const giftMain = document.getElementById('giftMain');
    const wishlistPage = document.getElementById('wishlistPage');
    const cashModal = document.getElementById('cashModal');
    const cashModalContent = document.getElementById('cashModalContent');
    const closeModal = document.getElementById('closeModal');
    const backBtn = document.getElementById('backBtn');


    async function loadWishlist() {
        const wishlistContainer = document.getElementById('wishlistContainer');
        if (!wishlistContainer) return;

        try {
        //     const { wishlistItems, formatPrice } = await import('./wishlist.js');
        //
        //     wishlistContainer.innerHTML = '';
        //
        //     wishlistItems.forEach(item => {
        //         const itemCard = document.createElement('div');
        //         itemCard.className = 'bg-[#E5D9D9] rounded-2xl p-6';
        //         itemCard.innerHTML = `
        //   <h3 class="text-gray-800 text-lg font-normal mb-1">${item.name}</h3>
        //   <p class="text-gray-800 text-2xl font-bold mb-4">${formatPrice(item.price)}</p>
        //   <div class="flex gap-3">
        //     <button class="send-money-btn flex-1 bg-[#C9B0B0] text-maroon py-3 rounded-full font-medium hover:opacity-90 transition" data-item-id="${item.id}">
        //       Send Money
        //     </button>
        //     <button class="buy-online-btn flex-1 bg-maroon text-white py-3 rounded-full font-medium hover:opacity-90 transition" data-item-id="${item.id}" data-url="${item.buyOnlineUrl}">
        //       Buy online
        //     </button>
        //   </div>
        // `;
        //         wishlistContainer.appendChild(itemCard);
        //     });


            document.querySelectorAll('.send-money-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    const id = btn.getAttribute('data-item-id');
                    const amount = btn.getAttribute('data-item-amount');
                    updateQuery('amount', amount)
                    updateQuery('id', id)
                    openModalFunc(parseInt(amount))
                });
            });


            document.querySelectorAll('.buy-online-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    const url = btn.getAttribute('data-url');
                    console.log(url)
                    if (url && url !== '#') {
                        window.open(url, '_blank');
                    } else {
                        console.log('Buy online for item:', btn.getAttribute('data-item-id'));
                    }
                });
            });

        } catch (error) {
            console.error('Failed to load wishlist:', error);
        }
    }
    function closeModalFunc(){
        const amountInput = document.getElementById('amountInput')

        if (amountInput){
            amountInput.value = null
        }

        cashModalContent.classList.remove('translate-y-0');
        cashModalContent.classList.add('translate-y-full');
        setTimeout(() => {
            cashModal.classList.add('hidden');
            cashModal.classList.remove('flex');
        }, 300);
        amountButtons.forEach(btn => {
            btn.classList.remove('bg-maroon', 'text-white');
        });
        clearAllQueries()
    }
    function openModalFunc(amount = null){

        cashModal.classList.remove('hidden');
        cashModal.classList.add('flex');

        const amountInput = document.getElementById('amountInput')

        if (amountInput && amount){
            amountInput.value = amount
        }

        setTimeout(() => {
            cashModalContent.classList.remove('translate-y-full');
            cashModalContent.classList.add('translate-y-0');
        }, 10);
    }

    if (cashBtn && cashModal && cashModalContent) {
        cashBtn.addEventListener('click', () => {
            openModalFunc()
        });
    }

    if (closeModal && cashModal && cashModalContent) {

        closeModal.addEventListener('click', closeModalFunc);

        cashModal.addEventListener('click', (e) => {
            if (e.target === cashModal) {
                closeModalFunc();
            }
        });
    }



    if (amountButtons.length > 0 && amountInput) {
        amountButtons.forEach(button => {
            button.addEventListener('click', () => {
                amountButtons.forEach(btn => {
                    btn.classList.remove('bg-maroon', 'text-white');
                });


                button.classList.add('bg-maroon', 'text-white');

                const amount = button.getAttribute('data-amount');
                amountInput.value = amount;
            });
        });

        amountInput.addEventListener('input', () => {
            amountButtons.forEach(btn => {
                btn.classList.remove('bg-maroon', 'text-white');
            });
        });
    }

    if (wishlistBtn && giftMain && wishlistPage) {
        wishlistBtn.addEventListener('click', async () => {
            giftMain.classList.add('hidden');
            wishlistPage.classList.remove('hidden');
            await loadWishlist();
        });
    }

    if (backBtn && giftMain && wishlistPage) {
        backBtn.addEventListener('click', () => {
            wishlistPage.classList.add('hidden');
            giftMain.classList.remove('hidden');
        });
    }
    function addQueryParam(key, value) {
        const url = new URL(window.location.href);

        if (value === null || value === undefined || value === '') {
            url.searchParams.delete(key);
        } else {
            url.searchParams.set(key, value);
        }

        window.history.replaceState({}, '', url);
    }
    function removeQueryParam(key) {
        const url = new URL(window.location.href);
        url.searchParams.delete(key);
        window.history.replaceState({}, '', url);
    }
    function getQueryParam(key) {
        return new URL(window.location.href).searchParams.get(key);
    }
    function updateQuery(key, value = null) {
        const url = new URL(window.location.href);

        value === null
            ? url.searchParams.delete(key)
            : url.searchParams.set(key, value);

        window.history.replaceState({}, '', url);
    }
    function clearAllQueries() {
        const url = new URL(window.location.href);
        url.search = '';
        window.history.replaceState({}, '', url);
    }
});
