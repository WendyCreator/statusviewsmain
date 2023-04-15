<div class="form-group row">
                                                    <label for="">Date of Recording</label>
                                                    <?php 
                                                    $ddate = explode('/', $row['ddate']);
                                                    
                                                    ?>
            <div class="col-md-4">
                <select name="day" id="" class="form-control">
                <option value="<?=$ddate[2]?>"><?=$ddate[2]?></option> 
                <?php for($i=1; $i<=31; $i++){
                    if(strlen($i)==1){  $i= '0'.$i; }
                    ?>
                <option value="<?php echo $i; ?>"> <?php echo $i; ?> </option> 
                <?php } ?>

                </select>
            </div>

            <div class="col-md-4">
                <select name="month" id="" class="form-control">
                <option value="<?=$ddate[2]?>"><?=$ddate[1]?></option>  
                <option value="01">Jan</option>          
                <option value="02">Feb</option>          
                <option value="03">Mar</option>          
                <option value="04">Apr</option>          
                <option value="05">May</option>          
                <option value="06">Jun</option>          
                <option value="07">Jul</option>          
                <option value="08">Aug</option>          
                <option value="09">Sep</option>          
                <option value="10">Oct</option>          
                <option value="11">Nov</option>          
                <option value="12">Dec</option>          
                </select>
            </div>

            <div class="col-md-4">
                <select name="year" id="" class="form-control">
                <option value="<?=$ddate[0]?>"><?=$ddate[0]?></option>  
                <?php for($i=2025; $i>=1970; $i--){ ?>
                <option value="<?php echo $i; ?>"> <?php echo $i; ?> </option> 
                <?php } ?>          
                </select>
            </div>
        </div>

        
    <script>
    (function(d, w, c) {
        w.ChatraID = 'LtDrvRjMTnkTetM55';
        var s = d.createElement('script');
        w[c] = w[c] || function() {
            (w[c].q = w[c].q || []).push(arguments);
        };
        s.async = true;
        s.src = 'https://call.chatra.io/chatra.js';
        if (d.head) d.head.appendChild(s);
    })(document, window, 'Chatra');
</script>

        <!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+2348054452870", // WhatsApp number
            call_to_action: "Message us", // Call to action
            button_color: "#FF6550", // Color of button
            position: "right", // Position may be 'right' or 'left'
            pre_filled_message: "A Staff of Climax Properties will get back to you ", // WhatsApp pre-filled message
        };
        var proto = 'https:', host = "getbutton.io", url = proto + '//static.' + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->