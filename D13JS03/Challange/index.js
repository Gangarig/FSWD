let Students = ["John","Jane","Gangarig","Saraa","Bob"];
let MathGrades = ["71","85","100","55","65"];
var name = prompt("type your name");
if (Students.includes(name)) {
    let grade = Students.indexOf(name);
    if (Number(MathGrades[grade])>=70) {
        document.getElementById("grade").style.color="green";
    } else if (Number(MathGrades[grade])<70) {
        document.getElementById("grade").style.color="yellow";
    } else if (Number(MathGrades[grade])<60) {
        document.getElementById("grade").style.color="red";
    }
    document.getElementById("text").innerHTML=`Student ${Students[grade]}`;
    document.getElementById("grade").innerHTML=`${MathGrades[grade]} points in Math`;
} else {
    document.write("Student not found");
}
