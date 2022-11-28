import { Component, OnInit } from '@angular/core';
import { ServiceService } from 'src/app/service.service';
import { DetailsComponent } from '../details/details.component';
import { idishes } from 'src/app/idish';
import { dishes } from 'src/app/dish';
import { ThisReceiver } from '@angular/compiler';


@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent implements OnInit {

  
  constructor( private cs: ServiceService) { }

  cart: Array <idishes> = []; 
  total:number=0;
  totalitems:number=0;
  summe:number =0;
  ngOnInit(): void {
   this.cs.getitems().subscribe(Response=>{
    this.cart=Response;
   });
   for(let item of this.cart){
    this.totalitems+= item.qtty;
   }
   this.total = this.cs.gettotal();
 
  }




  increaseqtty(i:number){
    this.cs.increaseqtty(i);  
    this.total=this.total+this.cart[i].price;  
    this.totalitems++;
  }
  decreaseqtty(i:number){
    this.cs.decreaseqtty(i); 
    this.total=this.total-this.cart[i].price;
    this.totalitems++;
  } 
  removecart(){
   this.cs.removeallfromcart();
  }

}
