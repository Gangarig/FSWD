var user_name = " Gangarig";
let br = "<br>";
let hr = "<hr>";
var user_age=25;
var user_id = "123456";
 
console.log (typeof String(user_age));
console.log (typeof +user_id);
console.log (typeof user_name + " " );

// concatenation
 //document.write(
  //  "The user " + user_name + " is " + user_age + " years old and has id number " + user_id + hr 
  //  );
//let string = "The user Gangarig is 25 years old and has id number 123456";
//console.log(string.indexOf("m"));
//console.log(string.split(" "));
//console.table(string.split(""));
//console.log(string.substring(4, 8));
//console.log(string.length);
//console.log(string.charAt(9));
//const numbers = [9,2,3,4,5,6];
//const letters = ["a","b","c","d"];
//console.log(numbers);
//console.table(numbers);
//console.log(numbers.length);
//console.log(numbers[1]);
//console.log(letters[1]);
//console.log(letters[4]);
//const game = [ 
    [1,2,3],
    [4,5,6],
    [7,8,9]
//]
//console.table(game);
//console.log(game[2][0]);



//numbers.push(7);
//numbers.unshift(0);
//console.table(numbers);
//console.log (numbers);
//console.log (numbers.sort());



const weekDays = ["mon" , "tue" , "thu" , "fri" , "sat" , "sun"];

weekDays.splice(2,0,"wed");
console.table(weekDays);
console.table(weekDays.pop());
console.table(weekDays);