import Paystack from '@paystack/inline-js';
import {clearLocalStorageUser} from "./storage.js";

const paystackKey = import.meta.env.VITE_PAYSTACK_KEY;
const popup = new Paystack()
const paystackButton = document.getElementById('paystackButton')
const email = document.getElementById('email')
const fullName = document.getElementById('fullName')
const phoneNumber = document.getElementById('phoneNumber')
const errorMessageDiv = document.getElementById('errorMessage')
const amountInput = document.getElementById('amountInput')

function getQueryParam(key) {
    return new URL(window.location.href).searchParams.get(key);
}

function validatePaymentForm(data) {
    console.log(data)
    if (!data.email.trim()) return 'Email is required';
    if (!/^\S+@\S+\.\S+$/.test(data.email)) return 'Invalid email address';
    if (data.email.length > 200) return 'Email address is too long';
    if (!data.amount) return 'Amount is required';
    if (data.amount < 50000) return 'Ah ah 😅. Abeg raise am… ₦500 is the minimum';
    return null;
}

async function initializeTransaction(payload) {
    const res = await fetch('/api/transaction/initialize', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
        body: JSON.stringify(payload),
    });

    if (!res.ok) {
        throw new Error('Failed to initialize transaction');
    }

    return await res.json();
}

async function confirmTransaction(payload) {
    const res = await fetch('/api/transaction/confirm', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
        body: JSON.stringify(payload),
    });

    if (!res.ok) {
        throw new Error('Failed to confirm transaction');
    }

    return await res.json();
}

paystackButton.addEventListener('click', async function () {
    try {
        console.log(fullName.value)
        console.log(getQueryParam('id'))
        const formData = {
            email: email.value,
            amount: amountInput.value * 100,
        }
        const error = validatePaymentForm(formData)
        if (error) {
            errorMessageDiv.textContent = error
            return;
        }
        const initResponse = await initializeTransaction({
            amount: formData.amount,
            type: getQueryParam('id') ? 'gift': 'cash',
            wishlist_item_id: getQueryParam('id') ?? null,
            payer_name: fullName.value,
            payer_email: email.value,
            payer_phone: phoneNumber.value,
        });

        const reference = initResponse.reference;

        popup.newTransaction({
            key: paystackKey,
            email: email.value,
            phoneNumber: phoneNumber.value,
            amount: amountInput.value * 100,
            reference: reference,
            channels: ['card', 'bank', 'ussd', 'mobile_money', 'bank_transfer', 'apple_pay'],
            metadata: {
                "fullName": fullName.value,
                "productId": getQueryParam('id') ?? "cash",
                "phoneNumber": phoneNumber.value,
            },
            onSuccess: async (transaction) => {
                console.log(transaction);
                await confirmTransaction({
                    reference: transaction.trxref,
                    amount: transaction.amount,
                });
                clearLocalStorageUser('active')
                window.location.replace(`/payment-success/${reference}`);
            },
            onLoad: (response) => {
                console.log("onLoad: ", response);
            },
            onCancel: () => {
                console.log("onCancel");
                errorMessageDiv.textContent = ""
            },
            onError: (error) => {
                console.log("Error: ", error.message);
            }
        })
    } catch (e) {
        console.log(error)
        alert("An error occurred! Please try again later ):")
    }

})



