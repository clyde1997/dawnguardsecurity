function sendEmail(){

    let email = "soapmac19@yahoo.com.ph";
    let subject = "Career Application";
    let mailTo = "mailto:" + email + "?subject=" + subject;

    window.location.assign(mailTo);

}