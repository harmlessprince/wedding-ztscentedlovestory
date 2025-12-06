import Paystack from '@paystack/inline-js';

const paystackKey = import.meta.env.VITE_PAYSTACK_KEY;
const popup = new Paystack()
const paystackButton = document.getElementById('paystackButton')
const email = document.getElementById('email')
const fullName = document.getElementById('fullName')
const phoneNumber = document.getElementById('phoneNumber')
const product = document.getElementById('product')
const amountInput = document.getElementById('amountInput')
function getQueryParam(key) {
    return new URL(window.location.href).searchParams.get(key);
}
paystackButton.addEventListener('click', function () {
    console.log(fullName.value)
    console.log(getQueryParam('id'))
    popup.newTransaction({
        key: paystackKey,
        email: email.value,
        phoneNumber: phoneNumber.value,
        amount: amountInput.value * 100,
        channels: ['card', 'bank', 'ussd', 'mobile_money', 'bank_transfer', 'apple_pay'],
        metadata: {
            "fullName": fullName.value,
            "productId": getQueryParam('id') ?? "cash",
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



