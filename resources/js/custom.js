const next = document.querySelector('.next');

const back = document.querySelector('.return');
const slide = document.querySelector('.card-slide');

back.addEventListener('click',(evnt)=>{
evnt.preventDefault();
slide.scrollLeft-=200;
})

next.addEventListener('click',(evnt)=>{
    evnt.preventDefault();
    slide.scrollLeft+=200;

})