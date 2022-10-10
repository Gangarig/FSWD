"use strict";
let Personinfo = [];
class Person {
    constructor(name, age, jobtitle) {
        this.name = name;
        this.age = age;
        this.jobtitle = jobtitle;
        Personinfo.push(this);
    }
    printinfo() {
        return `Hello there, My name is ${this.name} and i am ${this.age} years old, and i am a ${this.jobtitle}`;
    }
}
let Ganaa = new Person("Gangarg", 26, "waiter at AK");
console.log(Ganaa.printinfo());
// Basic 02
class Personwithmoreinfo extends Person {
    constructor(name, age, jobtitle, salary, place) {
        super(name, age, jobtitle);
        this.salary = salary;
        this.joblocation = place;
    }
    printinfo() {
        return `${super.printinfo()} and I get ${this.salary} every month, and i work in ${this.joblocation}.`;
    }
}
let Ganaawithmoredata = new Personwithmoreinfo("Gangarig", 26, "waiter at AK", "secret amount", "Wien");
console.log(Ganaawithmoredata.printinfo());
