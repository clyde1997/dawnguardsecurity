function passwordvalid(){

    const fullname = document.getElementById('fullname').value;
    const clientdesignation = document.getElementById('clientdesignation').value;
    const username = document.getElementById('username').value;
    const password = document.getElementById("password").value;
    const confirmpassword = document.getElementById('confirmpassword').value;


    if(fullname == "" || clientdesignation == "" || username == "" || password == "" || confirmpassword == ""){

        alert('Please Enter Empty Fields');

    };

    if(password !== confirmpassword){

        alert('Password Does Not Match');

    };
};