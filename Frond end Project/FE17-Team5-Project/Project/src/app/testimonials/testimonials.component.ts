import { Component, OnInit } from '@angular/core';
import { Ireviews } from './Ireviews';
import { reviews } from './reviews';
import { trigger, state, style, animate, transition } from '@angular/animations'


@Component({
  selector: 'app-testimonials',
  templateUrl: './testimonials.component.html',
  styleUrls: ['./testimonials.component.css'],
  animations: [

    //slide in from left side
    trigger('slideFromLeft',[
    transition(':enter',[
      style({ 
        transform: 'translateX(-200%)',
      }),
      animate('1s 0.5s ease-in-out')
    ])]),


    // slide in from right side 
    trigger('slideFromRight',[
      transition(':enter',[
        style({
          transform: 'translateX(200%)',
        }),
        animate('1s 0.5s ease-in-out')
      ]),
    ])
  ]})

export class TestimonialsComponent implements OnInit {
  reviews:Ireviews[]= reviews;

  constructor() { }

  ngOnInit(): void {
  }

}
