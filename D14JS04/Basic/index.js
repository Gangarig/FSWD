function fullname(){
    var fname = document.getElementById("f_name").value;
    var lname = document.getElementById("l_name").value;
    var div1 = document.getElementById("div1");
    var div2 = document.getElementById("div2");
    var prof = document.getElementById("profession").value;
    if (fname.length > 5) {
        div1.innerHTML = `<h1> First Name is : ${fname}</h1>`;
        div2.innerHTML =  `<h2> Last Name is : ${lname}</h2>`;
        document.getElementById("div1").style.color = "green";
        document.getElementById("div2").style.color = "green";
    }  else {   
        div1.innerHTML = `<h1> First Name is : ${fname}</h1>`;
        div2.innerHTML =  `<h2> Last Name is : ${lname}</h2>`;
        document.getElementById("div1").style.color = "red";
        document.getElementById("div2").style.color = "red";
    }
    if (prof == document.getElementById("It").value)
    {
        document.getElementById("div1").style.backgroundColor = "purple";
        document.getElementById("div2").style.backgroundColor = "purple";
    }   else {
        document.getElementById("div1").style.backgroundColor = "yellow";
        document.getElementById("div2").style.backgroundColor = "yellow";
    }
}
