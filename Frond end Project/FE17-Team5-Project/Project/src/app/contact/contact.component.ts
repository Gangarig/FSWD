import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { trigger, state, style, animate, transition } from '@angular/animations';



@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.css'],
  animations: [

    //slide in from left side
    trigger('slideFromLeft',[
    transition(':enter',[
      style({ 
        transform: 'translateX(-200%)',
      }),
      animate('1.5s 0.5s ease-in-out')
    ])]),


    // slide in from right side 
    trigger('slideFromRight',[
      transition(':enter',[
        style({
          transform: 'translateX(200%)',
        }),
        animate('1.5s 0.5s ease-in-out')
      ]),
    ])
  ]})

export class ContactComponent implements OnInit {

contactForm = new FormGroup ({
  fname: new FormControl('', Validators.required),
  lname: new FormControl('', Validators.required),
  email: new FormControl('', [Validators.required, Validators.email]),
  phone: new FormControl('', Validators.required),
  shooting: new FormControl('', Validators.required),
  datepicker: new FormControl ('', Validators.required),
  message: new FormControl('', Validators.required)

})

  constructor() { }

  ngOnInit(): void {
  }

  onSubmit(){   
    if(this.contactForm.valid){
      var a = this.contactForm.value;
   
      console.log(a)
   
    }
  }

}
