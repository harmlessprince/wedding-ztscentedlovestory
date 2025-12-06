import Paystack from '@paystack/inline-js';

const paystackKey = import.meta.env.VITE_PAYSTACK_KEY;
const popup = new Paystack()
const paystackButton = document.getElementById('paystackButton')
const paystackButton = document.getElementById('send-money-btn')
const email = document.getElementById('email')
const fullName = document.getElementById('fullName')
const phoneNumber = document.getElementById('phoneNumber')
const product = document.getElementById('product')
const amountInput = document.getElementById('amountInput')
paystackButton.addEventListener('click', function () {
    popup.newTransaction({
        key: paystackKey,
        email: email.value,
        phoneNumber: phoneNumber.value,
        amount: amountInput.value * 100,
        channels: ['card', 'bank', 'ussd', 'mobile_money', 'bank_transfer', 'apple_pay'],
        metadata: {
            "fullName": fullName.value,
            "item": product?.value ?? "cash",
            "phoneNumber": phoneNumber.value,
        },
        onSuccess: (transaction) => {
            console.log(transaction);
        },
        onLoad: (response) => {
            console.log("onLoad: ", response);
        },
        onCancel: () => {
            console.log("onCancel");
        },
        onError: (error) => {
            console.log("Error: ", error.message);
        }
    })
})



