//console.log("hi");
//document.write("hello from the browser");
let user_name;
let user_age = 17;
let user_nick = "Bob";
let var1 , var2 , var3 , var4 ;
//console.log(var1,var2,var3,var4);

// if statement
// if(2 < 5){
//     console.log("yes it is smaller");
// } else {
//     console.log("No it is not smaller");
// } 
// if (user_age >= 18) {
//     console.log("The user is already an adult");
// } else {
//     console.log("The user is underage");
// }
// console.log(user_name);
// if (!user_name) { 
//     console.log("The variable is initialized"); // ture
// }   else {
//     document.write(" The variable isnt initialized"); // false
// }


// switch 
// let weekday = new Date().getDay();
// console.log(weekday);
//  switch (weekday) {
//     case 0:
//         console.log('Today is Sunday')
//         break;
//         case 1:
//         console.log('Today is Monday');
//         break;
//         case 2:
//         console.log('Today is Tuesday');
//         break;
//         case 3:
//         console.log('Today is Wednesday');
//         break;
//         case 4:
//         console.log('Today is Thursday');
//         break;
//         case 5:
//         console.log('Today is Friday');
//         break;
//         case 6:
//         console.log('Today is Saturday');
//         break;
    
//     default:
//         console.log('Day not found');
//         break;
// }

// function printUserName (first_name, last_Name) {
//     //some code will come here
// console.log ((`Hello ${first_name} ${last_Name)`);
// }

// printUserName('John', 'Doe');
// const greeting = () => {
//     console.log(name);
//     alert(name);
//     return "Hello " + name;

// }
// console.log(greeting("Mark"));
// alert(greeting("Marta"));

const math = (num1, num2)=>{
    let result = num1 + num2;
    return result;
}
console.log(math (2,3)); 
let randomNumber = Math.floor(Math.random()*1099)+1;
console.log(randomNumber);
