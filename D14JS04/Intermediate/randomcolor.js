function randombgcolor(){
let num1 = Math.floor((Math.random()*255));
let num2 = Math.floor((Math.random()*255));
let num3 = Math.floor((Math.random()*255));
let color = "rgb("+ num1 +","+ num2 +","+ num3 +")";
document.body.style.backgroundColor = color;
document.getElementById("text").innerHTML=`Here is background color rgb(${num1},${num2},${num3})`;
console.log(color)
}

document.getElementById("button").addEventListener("click",randombgcolor);

