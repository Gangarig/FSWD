let temp=Math.floor(Math.random()*40-5);
if (temp >30){
    document.getElementById("text1").innerHTML=`Current Temperature is = ${temp}`;
    document.getElementById("text2").innerHTML=`The weather is really hot`;
    weatherimg(1);
} else if ( temp > 20) {
    document.getElementById("text1").innerHTML=`Current Temperature is = ${temp}`;
    document.getElementById("text2").innerHTML=`The weather is warm`;
    weatherimg(2);
}   else if ( temp > 10) {
    document.getElementById("text1").innerHTML=`Current Temperature is = ${temp}`;
    document.getElementById("text2").innerHTML=`The weather is Moderate`;
    weatherimg(3);
} else {
    document.getElementById("text1").innerHTML=`Current Temperature is = ${temp}`;
    document.getElementById("text2").innerHTML=`The weather is really cold`;
    weatherimg(4);
}
function weatherimg(img) {
    var x = document.createElement("IMG");
    x.setAttribute("src", `${img}.jpg`);
    x.setAttribute("width", "200");
    x.setAttribute("height", "400");
    document.body.appendChild(x);
  }
 