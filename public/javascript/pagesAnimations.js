const content = document.querySelectorAll('.scroll-animations');

window.addEventListener('scroll', checkContent);

checkContent();

function checkContent(){

    const triggerBottom = window.innerHeight / 5 * 4;

    content.forEach(content => {

        const contentTop = content.getBoundingClientRect().top;

        if(contentTop < triggerBottom){

            content.classList.add('show')

        }else{

            content.classList.remove('show');

        }

    });

}