console.log("script")
let dec=document.querySelector('#dcontent');
let encbtn=document.querySelector('#esim');
let encrsim=document.querySelector('#encrsim');
console.log(encbtn,dec);

encbtn.addEventListener('click',function(e){
    console.log("clicked !")
    dec.style.display='none';
    encrsim.style.display='block';
});


//dec

let enc=document.querySelector('#econtent');
let decbtn=document.querySelector('#dsim');
let decrsim=document.querySelector('#decrsim');
// console.log(encbtn,dec);

decbtn.addEventListener('click',function(e){
    console.log("clicked !")
    enc.style.display='none';
    decrsim.style.display='block';
});

let ebtn=document.querySelector('#encback');
let dbtn=document.querySelector('#decback');


ebtn.addEventListener('click',function(e){
    console.log("clicked !")
    enc.style.display='block';
});

dbtn.addEventListener('click',function(e){
    console.log("clicked !")
    dec.style.display='block';
    
});




//nav bar
