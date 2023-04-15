const paymentcheck = document.querySelector('#payment');

const paymentForm = document.getElementById('paymentForm');

if(paymentForm && paymentcheck){
const msg = document.querySelector('#msg');
    paymentForm.addEventListener("submit", payWithPaystack, false);

    function payWithPaystack(e) {
      e.preventDefault();
    //   sk_test_0c1e37b53c86ede71c266d8746063b79b4e400bd
    
      let handler = PaystackPop.setup({
        key: 'pk_test_51ad60a4075f779215f2d6dbe564138229d9f295', // Replace with your public key
        email: document.getElementById("email-address").value,
        amount: document.getElementById("amount").value * 100,
        // ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        // label: "Optional string that replaces customer email"
        onClose: function(){
          msg.innerText = 'You Closed the paystack window';
        },
        callback: function(response){
          let message = 'Payment complete! Reference: ' + response.reference;
          msg.innerText = message;

      const userform = document.querySelector('#user-details');
      const formdata = new FormData(userform);
      const options = {
        method:'post',
        body: formdata
      }
      fetch('admin-control/saved-verified-process', options)
      .then(res=>res.json())
      .then(data=>msg.innerText=data)
          
        }
      });
    
      handler.openIframe();
    }
}
