import { Component, OnInit } from '@angular/core';
import { FormControl } from '@angular/forms';


@Component({

 selector: 'app-home',

 templateUrl: './home.component.html',

 styleUrls: ['./home.component.sass']

})

export class HomeComponent implements OnInit {

         // here we create a property inside the class and we give it a value

        clickCounter :number = 0;

 constructor() { }
 students: Array<{ name: string, age: number }> = [

  {

    name: "David",

    age: 32

  },{

    name: "jime",

    age: 28

  },{

    name:"sabrina",

    age: 26

  }

 ];
 info = new FormGroup({
  firstName: new FormControl(''),
  lastName: new FormControl(''),
  age: new FormControl(''),
  email:new FormControl(''),
});
 name = new FormControl('');



// here we create the method that we will call it when i click the button in html, when i click it will take the property clickCounter and it will add the value (1) to it

 countClick(){

         this.clickCounter ++;

 }

 ngOnInit() {

 }
 onSubmit(){

  // to take the values from the form you can select the property that have the formGroup and then just add .value
  if(this.info.valid){
    var a = this.info.value;
 
    console.log(a)
  }
  }


}