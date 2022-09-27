let temp=Math.floor(Math.random()*40-5);
if (temp >30){
    document.getElementById("text1").innerHTML=`Current Temperature is = ${temp}`;
    document.getElementById("text2").innerHTML=`The weather is really hot`;
    
} else if ( temp > 20) {
    document.getElementById("text1").innerHTML=`Current Temperature is = ${temp}`;
    document.getElementById("text2").innerHTML=`The weather is warm`;

}   else if ( temp > 10) {
    document.getElementById("text1").innerHTML=`Current Temperature is = ${temp}`;
    document.getElementById("text2").innerHTML=`The weather is Moderate`;

} else {
    document.getElementById("text1").innerHTML=`Current Temperature is = ${temp}`;
    document.getElementById("text2").innerHTML=`The weather is really cold`;

}
function weatherimg(<img>) {
    var x = document.createElement("IMG");
    x.setAttribute("src", "Veryhot.jpg");
    x.setAttribute("width", "342");
    x.setAttribute("height", "870");
    document.body.appendChild(x);
  }
  weatherimg();