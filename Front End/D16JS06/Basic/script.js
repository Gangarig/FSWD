// var sandwiches = `{ 
//     "sandwich": "hamburger", 
//     "calories": "260" 
//     }`;
// var fries = `{
//      "fries_size": "Large French Fries", 
//      "calories": "570" 
//      }`;

let data1 = JSON.parse(sandwiches);
let data2 = JSON.parse(fries);
console.log(data1);
console.log(data2);
// print the following message within the browser: 
// My favorite sandwich is a Hamburger which has approximately 260 
// calories, along with it I enjoy eating Large French Fries which have about
// 570 calories.
document.write(`My favorite sandwich is ${data1.sandwich} which has approximately ${data1.calories} 
calories, along with it I enjoy eating ${data2.fries_size} which have about ${data2.calories} calories.`);

