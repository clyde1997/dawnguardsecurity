function showContent(id){

    let adminrecords = document.getElementById('adminrecords');
    let employeemanagement = document.getElementById('employeemanagement');
    let inquirymanagement = document.getElementById('inquirymanagement');
    let clientManagement = document.getElementById('client_management');
    let uploadpPayslip = document.getElementById('upload_payslip');
    let addcareers = document.getElementById('addcareers');

    let selectedContent = document.getElementById(id);

    if(adminrecords){

        adminrecords.style.display = 'none';

    }

    if(employeemanagement){

        employeemanagement.style.display = 'none';

    }

    if(inquirymanagement){

        inquirymanagement.style.display = 'none';

    }

    if(uploadpPayslip){

        uploadpPayslip.style.display = 'none';

    }

    if(addcareers){

        addcareers.style.display = 'none';

    }

    if(clientManagement){


        clientManagement.style.display = 'none';

    }

   

    if(selectedContent){

        selectedContent.style.display = 'block';
        selectedContent.style.transition = '0.5s ease';

    }

}