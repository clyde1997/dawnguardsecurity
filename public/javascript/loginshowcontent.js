function showContent(id){

    let employeeform = document.getElementById('employeeform');
    let adminform = document.getElementById('adminform');
    let selectedContent = document.getElementById(id);

    if(employeeform){

        employeeform.style.display = 'none';

    }

    if(adminform){

        adminform.style.display = 'none';

    }


    if(selectedContent){

        selectedContent.style.display = 'block';
        selectedContent.style.transition = '0.5s ease';

    }

}