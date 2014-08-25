
<?php function donateform() {

echo '

<div class="panel mod modthree">
<header>
<h3>Donation </h3>
</header>

<!-- Start of Form -->
<form id="js-formDonate" class="panel__body form" action="https://www.paypal.com/cgi-bin/webscr" method="post">

  <input id="donateXclick" type="hidden" name="cmd" value="_xclick">  

<input type="hidden" name="business" value="bertie@storynory.com">


<input type="hidden" name="no_note" value="1" />
<input type="hidden" name="no_shipping" value="2" />
<input type="hidden" name="tax" value="0" />
<input type="hidden" name="lc" value="US" />
<input type="hidden" name="item_name" value="Donation to Storynory" />
<input type="hidden" name="return" value="https://storynory.dev" />
<input type="hidden" name="cancel_return" value="http://storynory.dev">

<!--  -->
<label> Currency
<select id="donateCurrency" name="currency_code" >
<option value="USD">$ US Dollar</option>
<option value="GBP">£ British Pound</option>
<option value="EUR">Euro</option>
<option value="CAD">Canadian Dollar</option>
<option value="AUD">Australian Dollar</option>
<option value="SGD">Singapore Dollar</option>
</select>
</label>

</br>
<label>
How much would you like to donate? 

<input id="donatePrice" required="required" class="required" type="number" name="amount"  placeholder="please enter figure"  />
</label>
<br/>





<input type="hidden" name="p3" value="1">
<input type="hidden" name="t3" value="M">
<input type="hidden" name="src" value="1">
<input type="hidden" name="sra" value="1">




<label class="checkbox">
<input id="donateRecur"  type="checkbox" name="bn" value="false">
Make this Recurring (monthly)
</label>
<br /><br />
<input type="submit" class="btn default full submit" />


</form>

<footer>
Thank you for your donation!
 <span class="icon right icon-paypal"></span><span class="icon right icon-credit"></span>
</footer>

';

} 

add_shortcode('donate', 'donateform');









?>