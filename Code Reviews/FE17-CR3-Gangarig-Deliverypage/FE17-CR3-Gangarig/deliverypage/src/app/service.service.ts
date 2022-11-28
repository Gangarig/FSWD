import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs'; //to share data between component
import { dishes } from './dish';
import { idishes } from './idish';



@Injectable({
  providedIn: 'root'
})
export class ServiceService {
  
  public cartdishlist :any =[];
  public dishlist = new BehaviorSubject <any>([]);
 
  constructor() { }
  
  total:any=0;
  // bring dishes to cart
  getitems(){
   return this.dishlist.asObservable();
  }
  orderbtn(dish:idishes){
  this.cartdishlist.push(dish);
  this.cartdishlist.next(dish); //data will passed to suscriber
  }
  //add to cart btn
  buybtn(dish:any){
    if(this.cartdishlist.find((val:any) => val.name == dish.name)){
      dish.qtty++;
      this.dishlist.next(this.cartdishlist);
    } else {
    this.cartdishlist.push(dish);
    this.dishlist.next(this.cartdishlist);
    }
  }
  //total amount
  gettotal(){
    let total : number = 0;
    for(let item of this.cartdishlist){
      total += (item.price*item.qtty);
    }
    return total;
  }
  
  //increase qtty
  increaseqtty(i:number){
    this.cartdishlist[i].qtty++;
  
  }
  

   //decrease qtty
   decreaseqtty(i:number){
   if(this.cartdishlist[i].qtty > 1){
      this.cartdishlist[i].qtty--;
    } else {
     this.cartdishlist.splice(i,1);
    }
   

  }
  //empty cart
  removeallfromcart(){
    this.cartdishlist =[];
    this.dishlist.next(this.cartdishlist);
  }

}


  



