
import { Component, OnInit } from '@angular/core';
import { CartService } from '../cart.service';
import { FormControl, FormGroup } from '@angular/forms';

@Component({
selector: 'app-cart',
templateUrl: './cart.component.html',
styleUrls: ['./cart.component.css']
})
export class CartComponent implements OnInit {
items:any;

checkoutForm = new FormGroup({
 name: new FormControl(''),
 address: new FormControl('')
});

constructor(private cartService: CartService) {
}
onSubmit() {
  console.warn('Your order has been submitted', this.checkoutForm.value);
  this.items = this.cartService.clearCart();
  this.checkoutForm.reset();
}
ngOnInit() {
        this.items = this.cartService.getItems();
}
}