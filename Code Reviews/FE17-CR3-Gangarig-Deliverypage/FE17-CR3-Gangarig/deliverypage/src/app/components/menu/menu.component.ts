import { Component, OnInit } from '@angular/core';
import { dishes } from 'src/app/dish';
import { idishes } from 'src/app/idish';
import { ServiceService } from 'src/app/service.service';
import { DetailsComponent } from '../details/details.component';

@Component({
  selector: 'app-menu',
  templateUrl: './menu.component.html',
  styleUrls: ['./menu.component.css']
})
export class MenuComponent implements OnInit {
  dishes : Array<idishes> = dishes;
  
  constructor(private cs:ServiceService) { }

  ngOnInit(): void {
    
  }
  buybtn(i:number){
    this.cs.buybtn(dishes[i]);
  }


}
