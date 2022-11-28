import { Component, OnInit } from '@angular/core';
import { idishes } from 'src/app/idish';
import { dishes } from 'src/app/dish';
@Component({
  selector: 'app-aboutus',
  templateUrl: './aboutus.component.html',
  styleUrls: ['./aboutus.component.css']
})
export class AboutusComponent implements OnInit {
  dishes: Array<idishes> = dishes;
  constructor() { }

  ngOnInit(): void {
  }

}
