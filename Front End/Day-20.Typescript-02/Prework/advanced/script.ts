"use strict";
let vehiceldata = [];

//main class
class Vehicles {
        name:  String;
        brand: String;
        constructor(name:String, brand:String) {
        this.name = name;
        this.brand = brand;
        
        vehiceldata.push(this);
    }
    printInfo() {
        return `Name-${this.name} <br> 
                Brand-${this.brand}<br>`;
    }
}
//child class
class Truck extends Vehicles {
    model:String;
    kilometers:Number;
    year_of_production:Number;
    price: Number;
    number_of_seats:number;
    constructor (name:string , brand:string , model:string , kilometers:Number,year_of_production:Number,price: Number,number_of_seats:number){
        super(name,brand);
        this.model = model;
        this.kilometers = kilometers;
        this.year_of_production = year_of_production;
        this.price = price ;
        this.number_of_seats = number_of_seats; 
        
    }
    printInfo() {
        return `
                model-${this.model} <br>
                kilometers-${this.kilometers}<br>
                built in year- ${this.year_of_production}<br>
                price- ${this.price}$ <br>
                nubmer of seats- ${this.number_of_seats}`;
    }
}
//child class
class Bike extends Vehicles {
    model:String;
    kilometers:Number;
    year_of_production:Number;
    price: Number;
    number_of_seats:number;
    constructor (name:string , brand:string , model:string , kilometers:Number,year_of_production:Number,price:Number,number_of_seats:number){
        super(name,brand);
        this.model = model;
        this.kilometers = kilometers;
        this.year_of_production = year_of_production;
        this.price = price ;
        this.number_of_seats = number_of_seats; 
    }
    printInfo() {
        return `
        model-${this.model} <br>
        kilometers-${this.kilometers}<br>
        built in year- ${this.year_of_production}<br>
        price- ${this.price}$<br>
        nubmer of seats- ${this.number_of_seats}`;
    }
}
let rav4 = new Vehicles ("Rav4", "Toyota");
let supra = new Vehicles ("Supra" , "Toyota");
console.log(rav4.printInfo());
console.log(supra.printInfo());
let ducati = new Bike ("Ducati","Ducati","00000",10000,2020,25000,1);
let cybertruck = new Truck ("Cybertruck","Tesla","00000",100,2022,70000,4);
console.log(ducati.printInfo());
console.log(cybertruck.printInfo());
function truckfunction(){
document.getElementById("cybertruck").innerHTML = cybertruck.printInfo();
};
function bikefunction(){
document.getElementById("ducati").innerHTML = ducati.printInfo();
};
function price (value) {
    if(value<100) {
        return `${Bike.price}`
    }   else {
        return `${Bike.price / 2}`
    }
};