<?php
// Initialize variables with default values and error messages
$fnameErr = $lnameErr = $visitor_emailErr = $contactErr = $countryErr = $motivationErr = '';
$fname = $lname = $visitor_email = $contact = $country = $availability = $reference = $experience = $motivation = '';
$language_arr = [];

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Verify reCAPTCHA response
    $recaptcha_response = $_POST['g-recaptcha-response'];
    $secret_key = '';
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = [
        'secret'   => $secret_key,
        'response' => $recaptcha_response
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        ]
    ];

    $context = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captcha_success = json_decode($verify);

    if (!$captcha_success->success) {
        echo "reCAPTCHA verification failed.";
        exit;
    }

    // Sanitize and validate input data
    $fname          = sanitize_input($_POST['fname']);
    $lname          = sanitize_input($_POST['lname']);
    $visitor_email  = sanitize_input($_POST['visitor_email']);
    $contact        = sanitize_input($_POST['contact']);
    $country        = sanitize_input($_POST['country']);
    $availability   = sanitize_input($_POST['availability']);
    $reference      = sanitize_input($_POST['reference']);
    $experience     = sanitize_input($_POST['experience']);
    $language_arr   = isset($_POST['language']) ? $_POST['language'] : [];
    $motivation     = sanitize_input($_POST['motivation']);

    $ok = true;

    if (empty($fname)) {
        $fnameErr = 'First name is required';
        $ok = false;
    }

    if (empty($lname)) {
        $lnameErr = 'Last name is required';
        $ok = false;
    }

    if (empty($visitor_email)) {
        $visitor_emailErr = 'Email address is required';
        $ok = false;
    } elseif (!filter_var($visitor_email, FILTER_VALIDATE_EMAIL)) {
        $visitor_emailErr = 'Invalid email address format';
        $ok = false;
    }

    if (empty($contact)) {
        $contactErr = 'Teams/Zoom ID is required';
        $ok = false;
    }

    if (empty($country)) {
        $countryErr = 'Country of residence is required';
        $ok = false;
    }

    if (empty($motivation)) {
        $motivationErr = 'Motivation is required';
        $ok = false;
    }

    if ($ok) {
        // Get IP address
        $ip_address = $_SERVER['REMOTE_ADDR'];

        // Fetch IP location data via ip-api.com
        $ip_json = @file_get_contents("https://ip-api.com/json/{$ip_address}?fields=status,country,regionName,city,isp,query");
        if ($ip_json === false) {
            $ip_data = null;
        } else {
            $ip_data = json_decode($ip_json, true);
        }

        if ($ip_data && $ip_data['status'] === 'success') {
            $ip_country = $ip_data['country'] ?? 'Unknown';
            $ip_region  = $ip_data['regionName'] ?? 'Unknown';
            $ip_city    = $ip_data['city'] ?? 'Unknown';
            $ip_isp     = $ip_data['isp'] ?? 'Unknown';
        } else {
            $ip_country = $ip_region = $ip_city = $ip_isp = 'Unknown';
        }

        // Construct email message body
        $email_body = "First name: $fname\n".
                      "Last name: $lname\n".
                      "Email: $visitor_email\n".
                      "Contact (Teams/Zoom): $contact\n".
                      "Country: $country\n".
                      "Availability: $availability\n".
                      "Reference: $reference\n".
                      "Experience: $experience\n".
                      "Language(s): " . (!empty($language_arr) ? implode(", ", $language_arr) : "None selected") . "\n".
                      "Motivation: $motivation\n\n".
                      "------ IP Info ------\n".
                      "IP Address: $ip_address\n".
                      "Country (IP): $ip_country\n".
                      "Region: $ip_region\n".
                      "City: $ip_city\n".
                      "ISP: $ip_isp\n";

        // Set email headers
        $email_headers = "From: info@modops.nl\r\n".
                         "Reply-To: $visitor_email\r\n".
                         "Return-Path: info@modops.nl\r\n".
                         "Content-Type: text/plain; charset=UTF-8\r\n";

        $to = "info@modops.nl, daniel@modops.nl";

        // Send email
        mail($to, 'New job application', $email_body, $email_headers);

        // Redirect to confirmation page
        header('Location: ../conv.php');
        exit;
    }
}

// Function to sanitize input data
function sanitize_input($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    return $input;
}
?>
