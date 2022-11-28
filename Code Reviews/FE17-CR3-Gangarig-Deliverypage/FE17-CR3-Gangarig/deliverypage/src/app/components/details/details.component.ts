import { Component, OnInit } from '@angular/core';
import { dishes } from 'src/app/dish';
import { idishes } from 'src/app/idish';
import { ActivatedRoute, Params } from '@angular/router';
import { ServiceService } from 'src/app/service.service';
import { MenuComponent } from '../menu/menu.component';
@Component({
  selector: 'app-details',
  templateUrl: './details.component.html',
  styleUrls: ['./details.component.css']
})
export class DetailsComponent implements OnInit {
  cart: idishes ={} as idishes;
  i = 0;
  constructor(private route:ActivatedRoute,private cs:ServiceService) { }
 
  // getting index[dish] of the array
  ngOnInit(): void {
    this.route.params.subscribe((params:Params) => {
      this.i = Number(params["i"]); 
      this.cart = dishes[this.i];
    })
  }
  orderbtn(i:number){
    this.cs.buybtn(dishes[i]);
  }

}
