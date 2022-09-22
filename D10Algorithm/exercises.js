let br ="<br>";
// ex01
let temp = Math.floor(Math.random()*25)-5;
if (temp < 10) {
    console.log (`The weather is cold current temp: ${temp}c`);
}   else {
    console.log (`The weather is Moderate current temp: ${temp}`);
}


//ex02
const randomFoods = ["pizza","hamburger","ice cream","chocolate"];
function randomFood () {
    let temp2 = Math.floor(Math.random()*3);
    let favoritefood = randomFoods[temp2];
    return "Here is your favorite Food = "+ favoritefood;
}
console.log(randomFood());

//ex03
function crystalGazer (number_of_Children, partners_Name, location, job_title) {
    return `You will be a ${job_title} in a ${location} and married to ${partners_Name} with ${number_of_Children} child.`
}

console.log(crystalGazer ('1','Enkhmurun','Vienna','FTS Developer'));

//ex04
function ageCalculator(birth_year, current_year)
{
    return "You are either " + (current_year-birth_year) + " or " + (current_year-birth_year-1) + " years old";
} 
console.log(ageCalculator(1996,2022));

//ex05
function ageCalculator2(birth_year)
{
    let current_year = new Date().getFullYear()
    return "You are either " + (current_year-birth_year) + " or " + (current_year-birth_year-1) + " years old";
} 
console.log(ageCalculator2(1996));

//ex06

function converter(degrees) {
    return "result is: "+degrees*(Math.PI/180);
}
console.log(converter(90));

//ex07

function boxcalculator(width,height,depth) {
    return "The Area of the box is: "+(width*height)+ "\nThe volume of the box is: "+(width*height*depth);
}
console.log(boxcalculator(10,10,15));

// intermediate ex01
 
let first_letter = (function() {
    let string = "i am a web developer";
    return string.charAt(0).toUpperCase() + string.slice(1);} ());
console.log(first_letter);

// intermediate ex02
function average_Grade(Math,Physics,English) {
    return "Average: "+(Math+Physics+English)/3 +br+ "Sum: "+(Math+Physics+English)+br;
}
document.write(average_Grade(5,4,3))

//Advanced ex01

function timeconverter (Minutes) {
    if (Minutes >= 60) {
        var hours = Math.floor(Minutes/60);
        let b = Minutes % 60;
        return `${Minutes} = ${hours}hour(s) and ${b} minute(s)`;
    }
    else {
        return `${Minutes} = 0 hour(s) and ${Minutes} minute(s)`;
    }
}
console.log(timeconverter(200));

// Challange 01
// ATM note Calculator

function atmnotecalculator (givenamount) {
    if (givenamount >= 10) {
        let euro100 = Math.floor(givenamount/100);
        let euro50 = Math.floor((givenamount%100)/50);
        let euro20 = Math.floor(((givenamount%100)%50)/20);
        let euro10 = Math.floor((((givenamount%100)%50)%20)/10);
                   
    return `100 notes --- ${euro100} ${br} 50 notes ---${euro50}${br} \n 20 notes ---${euro20}${br} \n 10 notes ---${euro10}${br}` 
    } else 
        {
        return 'Wrong amount'
        }
}

document.write(atmnotecalculator(999));
