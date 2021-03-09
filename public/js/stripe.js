const stripe = Stripe("pk_test_51ISmrhFRqV5oJPug8Ycmb2A8hRjZ9LPOEguh4PAOo8UUVwNeG0u4HLpHDQhEtPrALDn05xEq5CJxjYop18whiytB00H0H1CzxU");
let elements = stripe.elements();
console.log(stripe);
let card = elements.create('card');
const paymentForm = document.querySelector('#payment-form');
const buttonPay  = document.querySelector('.pay');

// Add an instance of the card UI component into the `card-element` <div>
card.mount('#card-element');

let paymentMethod = null;
paymentForm.addEventListener('click', function() {

    return setupIntent;
});



// $('.card-form').on('submit', function (e) {
//     $('button.pay').attr('disabled', true)
//     if (paymentMethod) {
//         return true
//     }
//     stripe.confirmCardSetup(
//         "{{ $intent->client_secret }}",
//         {
//             payment_method: {
//                 card: card,
//                 billing_details: {name: $('.card_holder_name').val()}
//             }
//         }
//     ).then(function (result) {
//         if (result.error) {
//             $('#card-errors').text(result.error.message)
//             $('button.pay').removeAttr('disabled')
//         } else {
//             paymentMethod = result.setupIntent.payment_method
//             $('.payment-method').val(paymentMethod)
//             $('.card-form').submit()
//         }
//     })
//     return false
// })

// paymentForm.addEventListener('click',function () {
//     buttonPay.disabled=true;
//     if (paymentMethod) {
//         return true
//     }
//     stripe.confirmCardSetup(
//         "{SETUP_INTENT_CLIENT_SECRET}",
//         {
//             payment_method: {
//                 card: card
//                // billing_details: {name: $('.first_name').val()}
//             }
//         }.then(function (result) {
//         if (result.error) {
//             // $('#card-errors').text(result.error.message);
//             buttonPay.disabled=false;
//         } else {
//             paymentMethod = result.setupIntent.payment_method;
//             // $('.payment-method').val(paymentMethod);
//             // $('.card-form').submit();
//         }
//     }));
//     return false
// });

