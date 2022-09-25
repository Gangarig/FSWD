let a=7, b=14 , c='21' , d='36' , e = 42;
let s,x;
s=a+b+Number(c)+Number(36)+42;
console.log(s);
let f='1', g =15 ; h=8 , i = "1";
x=Number(1)*g*h*Number(1);
console.log(x);
document.write(s/x);
// ex02

const people = ['Greg', 'Mary', 'Devon','James'];
people.shift();
console.table(people);

people.unshift("Matt");
console.table(people);

people.pop();
console.table(people);

people.push("Gangarig");
console.table(people);

console.table(people.slice(2));

console.log(people.indexOf("Mary"));

console.log(people.indexOf("Foo"));

const people2 = ['Greg', 'Mary', 'Devon','James'];

people2.splice(2,1,"Elizabeth","Anna");

console.table(people2);

let withBob;

withBob = people2 + ",Bob";
console.log(withBob);

