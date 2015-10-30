<?php
	$incoming_number = $_REQUEST['From'];
	$incoming_text   = $_REQUEST['Body'];

    if (empty($incoming_number)) {
        $text = 'Nothing to see here. Move along now.';
    } else {
	    $text = exec('. /home/pi/.bash_aliases; timeout 60 /usr/bin/python /home/pi/devbot/receive_texts_twilio.py ' . $incoming_number . ' ' . $incoming_text . ' > /dev/null 2>/dev/null &');
    }

	header('content-type: text/xml');
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>

<Response>
	<Message></Message>
</Response>