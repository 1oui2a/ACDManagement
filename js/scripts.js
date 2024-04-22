/* PORTFOLIO SLIDESHOW */
document.getElementById('next').onclick = function(){ // when the next button is clicked
    let lists = document.querySelectorAll('.item'); // select all elements with the class name 'item'
    document.getElementById('slide').appendChild(lists[0]); // appendChild() method moves the element to the end of the list
}

document.getElementById('prev').onclick = function(){ 
    let lists = document.querySelectorAll('.item'); 
    document.getElementById('slide').prepend(lists[lists.length - 1]); // prepend() method moves the element to the beginning of the list
}