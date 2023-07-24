<?php
$path = preg_replace('/wp-content.*$/', '', __DIR__);
require_once($path . "wp-load.php");

if (isset($_POST['form_example_contact_submit'])) {
    // get the data from the fields
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_text_field($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $event = sanitize_text_field($_POST['event']);

    // Message for the person filling the form
    $message = 'Dear ' . $name . ',<br/><br/>';
    $message .= 'We are pleased to inform you that your request to join Kenya Institute of Information and Technology Consultancy courses have been approved. 
<br/><br/>';
    $message .= 'Please note!  To finish your application kindly make payment to our accounts and send payment receipt to consultancy@kiit.ac.ke. <br/><br/>';
    $message .= 'Bank Account Name/Cheque: The Kenya Institute Of Information And Technology.<br/>';
    $message .= 'Bank: Equity<br/>';
    $message .= 'Branch: Nyeri<br/>';
    $message .= 'Account No: 1150163720188<br/>';
    $message .= 'Or Till Number: 5153035<br/><br/>';
   // $message .= 'To make the payment via M-Pesa, click the following link:<br/><br/>';
   // $message .= '<a href="https://www.safaricom.com/pay?business=5153035&amount=1500&currency=KES&reference=INV123456">Click here to pay with M-Pesa</a><br/><br/>';
    $message .= 'If you have any further inquiries or require assistance, please do not hesitate to contact us.<br/><br/>';
    $message .= 'Regards,<br/><br/>';
    $message .= 'Program Manager<br/>';
    $message .= 'Website: <a href="http://www.consultancy.kiit.ac.ke">www.consultancy.kiit.ac.ke</a><br/>';
    $message .= 'Email: <a href="mailto:consultancy@kiit.ac.ke">consultancy@kiit.ac.ke</a><br/>';
    $message .= 'Phone: +254720943002<br/>';
    $message .= 'WhatsApp: +254720035181<br/><br/>';
    $message .= 'Here are your details:<br/><br/>';
    $message .= 'Name: ' . $name . '<br/>';
    $message .= 'Email: ' . $email . '<br/>';
    $message .= 'Phone: ' . $phone . '<br/>';
    $message .= 'Event: ' . $event . '<br/>';

    // Set the recipient and CC email addresses for the person filling the form
    $to = $email;
    $cc = '';

    // Set the email headers for the person filling the form
    $headers = array(
        'Content-Type: text/html'
    );

    // Send the email to the person filling the form
    wp_mail($to, 'Registration Confirmation', $message, $headers);

    // Message for the admin
    $adminMessage = 'Hi,<br/><br/>';
    $adminMessage .= 'The following information has been submitted:<br/><br/>';
    $adminMessage .= 'Name: ' . $name . '<br/>';
    $adminMessage .= 'Email: ' . $email . '<br/>';
    $adminMessage .= 'Phone: ' . $phone . '<br/>';
    $adminMessage .= 'Event: ' . $event . '<br/>';

    // Set the recipient and CC email addresses for the admin
    $adminEmail = 'kiitcollege1@gmail.com';
    $adminCC = 'crispinmanda06@gmail.com';

    // Set the email headers for the admin
    $adminHeaders = array(
        'Content-Type: text/html',
        'Cc: ' . $adminCC
    );

    // Send the email to the admin
    wp_mail($adminEmail, 'Training Registrations', $adminMessage, $adminHeaders);

    echo '<script type="text/javascript">';
    echo 'alert("Form submitted successfully!");';
    echo 'window.location.href = "https://consultancy.kiit.ac.ke/success-page/";';
    echo '</script>';
    exit();
}
?>





