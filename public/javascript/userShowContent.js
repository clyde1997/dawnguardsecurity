function showContent(id){

    let employee_details = document.getElementById('employee_details');
    let employeeuploaddocument = document.getElementById('employeeuploaddocument');
    let viewpayslips = document.getElementById('viewpayslips');
    let selectedContent = document.getElementById(id);

    if(employee_details){

        employee_details.style.display = 'none';

    }

    if(employeeuploaddocument){

        employeeuploaddocument.style.display = 'none';

    }

    if(viewpayslips){

        viewpayslips.style.display = 'none';

    }

    if(selectedContent){

        selectedContent.style.display = 'block';
        selectedContent.style.transition = '0.5s ease';

    }

}