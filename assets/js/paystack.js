const paymentcheck = document.querySelector('#payment');

const paymentForm = document.getElementById('paymentForm');

if(paymentForm && paymentcheck){
const msg = document.querySelector('#msg');
    paymentForm.addEventListener("submit", payWithPaystack, false);

    function payWithPaystack(e) {
      e.preventDefault();
    //   sk_test_0c1e37b53c86ede71c266d8746063b79b4e400bd
    // pk_test_51ad60a4075f779215f2d6dbe564138229d9f295
    // sk_live_604b6e1c4483de3c84b47a3a0fd530267209aac6
    // pk_live_2a7fc5a826139554484987f8bd8335a85d9a7856
      let handler = PaystackPop.setup({
        key: 'pk_live_2a7fc5a826139554484987f8bd8335a85d9a7856', // Replaced with your public key
        email: document.getElementById("email-address").value,
        amount:(document.getElementById("amount").value) * 100,
        // ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        // label: "Optional string that replaces customer email"
        onClose: function(){
          msg.innerText = 'You Closed the paystack window';
        },
        callback: function(response){
          let message = 'Payment complete! Reference: ' + response.reference;
          msg.innerText = message;
          window.location.replace('paidland')

      const userform = document.querySelector('#user-details');
      const formdata = new FormData(userform);
      const options = {
        method:'post',
        body: formdata
      }
      fetch('admin-control/saved-verified-process', options)
      .then(res=>res.json())
      .then(data=>msg.innerText=data)
      // .then()
          
        }
      });
    
      handler.openIframe();
    }
}
