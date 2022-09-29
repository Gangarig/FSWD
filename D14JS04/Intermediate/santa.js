// function disappear1(){
//         document.getElementById("santa1").style.display=`none`;
// }
// function disappear2(){
//     document.getElementById("santa2").style.display=`none`;
// }
// function disappear3(){
//     document.getElementById("santa3").style.display=`none`;
// }
// function disappear4(){
//     document.getElementById("santa4").style.display=`none`;
// }

for(let i = 1; i <= 4; i++  ){
    document.getElementById("santa"+i).onclick = function(){
        this.style.display=`none`;
    }
}