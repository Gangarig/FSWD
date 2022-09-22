const br= "<br>"
console.log("Hello from the Console");
document.write("Hello from the Browser",br);
const player = ["Martin","Thomas","Peter","Mathias","Niki"];
document.write("The most valuable player of the match is " + player[2] + br);
let logos = ["Tesla","Audi","Renault","Volvo","Mazda","Fiat","Ferrari"];
document.write(logos.sort()+br+br+br+br+br);
let fruits1 = [
    ["apple","banana","kiwi"],
    ["orange","lemon","apple"],
];
document.write(fruits1[0] + " " +fruits1[1][0] + br);
document.write(fruits1[0]+br);
let array2 = ["monkey","horse","dog"];
document.write(array2[2]+" "+ array2[1] + " "+ array2[0] + br + " " + " cat, dog, horse, monkey" + br);
let a = "mango/cherries/kiwi/grapes/pear/peach/orange/lemon";
console.log(a);
let temp = new Array ();
temp = a.split('/');
console.log(temp);
document.write(`${temp.join("<br><br>")}`);
