function encodeEmail(email) {
    // Encode the email address using base64 encoding
    var encodedEmail = btoa(email);
    return encodedEmail;
}