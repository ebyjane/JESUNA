 <?php
        $mailto="eby.jane@gmail.com";
        $file="thanks.htm";
        $subject = "Mail from Enquiry Form";

        $from="godweiff@godwelling.com";

        $message_body="Welcome to godwelling ";
        mail($mailto,$subject,$message_body,"From:".$from);

		echo "mail send successfully"        
        ?>