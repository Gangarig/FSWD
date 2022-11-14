let student = {        //object
    firstName: "John", //property
    lastName: "Doe",
    age: 25,
    gym: true,
    hobbies: ["Swim","Code","Reading"],
    img:"1.jpg",
    printinfo: function(){  //method
        return `${this.firstName} ${this.lastName}`;
    }
}
console.log(student["firstName"]);
console.log(student.age);
console.log(student.printinfo());



class Student {
    firstName;
    lastName;
    age;
    img;
    gym;
    hobbies;
    constructor(fname,lname,age,img,gym,hobbies){
        this.firstName = fname;
        this.lastName = lname;
        this.age = age;
        this.img = img;
        this.gym = gym;
        this.hobbies = hobbies;
    }
}

let student2 = new Student("Gangarig","Nyamsuren","25","1.jpg",false,"coding")