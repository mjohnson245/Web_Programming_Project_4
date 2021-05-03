<!DOCTYPE html>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="success.php">
          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <img src="img/cardicon.png" width="150" height="150" id = "icon">
  
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname">
            <label for="ccnum">Card Number</label>
            <input type="text" id="ccnum" name="cardnumber">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear">
              </div>
              <div class="col-50">
                <label for="cvv">Security Code</label>
                <input type="text" id="cvv" name="cvv">
              </div>
              <div class="col-50">
                <label for="cvv">Extra coupon</label>
                <input type="text" id="coupon" name="coupon">
              </div>
            </div>
          </div>
        </div>
        <div class="col-50">
            <label for="fname">Second form</label>
          
            <label for="cname">Address</label>
            <input type="text" id="address" name="address">
            <label for="ccnum">Billing Address</label>
            <input type="text" id="billadress" name="billaddress">
            <label for="expmonth">Phone Number</label>
            <input type="text" id="phonenumber" name="phonenumber">
		<br>

      </form>
    </div>

  </div>

<script>
document.addEventListener("DOMContentLoaded", function(){
  var textbox = document.getElementById("ccnum");
  textbox.addEventListener("keyup", handleEvent, false);
  textbox.addEventListener("blur", handleEvent, false);
}, false);

function getCreditCardType(ccnum){
  var result = "unknown";
  if (/^5[1-5]/.test(ccnum)){
    result = "mastercard";
  }
  else if (/^4/.test(ccnum)){
    result = "visa";
  }
  else if (/^3[47]/.test(ccnum)){
    result = "amex";
  }
  return result;
}

var type = getCreditCardType(ccnum);
switch (type){
  case "mastercard":
    document.getElementById('icon').src = "img/mastercard.png";
    break;

  case "visa":
    document.getElementById('icon').src = "img/visa.png";
    break;

  case "amex":
    document.getElementById('icon').src = "img/express.png";
    break;

  default:
}

function handleEvent(event){
  var value = event.target.value,    
      type = getCreditCardType(value);
  switch (type)
  {
    case "mastercard":
        document.getElementById('icon').src = "img/mastercard.png";
        break;

    case "visa":
        document.getElementById('icon').src = "img/visa.png";
        break;

    case "amex":
        document.getElementById('icon').src = "img/express.png";
        break;

    default:
  }
}


</script>
