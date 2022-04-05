<?php
     if (isset($_GET['var_PHP_data'])) {
       echo $_GET['var_PHP_data'];
     } else {
     ?>
     <!DOCTYPE html>
     <html>
       <head>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
            <script src="http://malsup.github.com/jquery.form.js"></script> 
         <script>
             $(document).ready(function() {
                 $('#sub').click(function() {
                     var var_data = "Hello World";
                     $.ajax({
                         url: 'load-data1.php',
                         type: 'GET',
                          data: { var_PHP_data: var_data },
                          success: function(data) {
    console.log(data);
    var test = data;
    console.log(test);
    $("#input").val(data);
    $('#result').html(data)
}
                      });
                  });
              });
         </script>
       </head>
       <body>
         <input type="submit" value="Submit" id="sub"/>
         
<form method = "post">
    
      
		</select>
		buy or sell :<select name="trade_sort">
  		<option value="Buy">Buy</option>
  		<option value="Sell">Sell</option>
  		
		</select>
		select currency pair :<select id="curr_pair" name="curr_pair">
  		<option value="EURUSD">EUR/USD</option>
  		<option value="GBPUSd">GBP/USD</option>
  		<option value="USDJPY">USD/JPY</option>
  		<option value="EURGBP">EUR/GBP</option>
  		<option value="USDCAD">USD/CAD</option>
  		<option value="AUDUSD">AUD/USD</option>
  		<option value="EURJPY">EUR/JPY</option>
  		<option value="GBPEUR">GBP/EUR</option>
  		<option value="USDCFH">USD/CFH</option>
  		<option value="EURCFH">EUR/CFH</option>
  		
		</select>
		Trade Date :<input type="text" name="date1" id="date1" alt="date" class="IP_calendar" title="Y/m/d">
		Amount :<input type="number" min="0" value="1000" step="1.0" name="amount">
        stoploss :<input type="number" min="0.00" value="0.00" step="0.01" name="stoploss">
        start price :<input id ="input" type="number"  min="0" value="<?php echo $test; ?>" step="0.00001" name="start_price">
 
    	<input type="hidden" name="closingDate" id="closingDate">
    	<input type="hidden" name="status" id="status">
        <input type="hidden"  min="0" value="1.0000" step="0.01" name="pip">
         <input type="hidden"  min="0" value="1.0000" step="0.01" name="pl1">
         <input type="hidden"  min="0" value="1.0000" step="0.01" name="pl2">
         <input type="hidden"  min="0" value="1.0000" step="0.01" name="multiplier" id="multiplier">
       
        <input type="submit" name="gg" value ="save trade">
    
    </form>


       </body>
     </html>
    <?php } ?>