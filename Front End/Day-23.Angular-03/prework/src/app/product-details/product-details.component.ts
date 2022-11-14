import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Params } from '@angular/router';
import { products } from '../products';
import { CartService } from '../cart.service';
import { IProducts } from '../IProducts';

@Component({
selector: 'app-product-details',
templateUrl: './product-details.component.html',
styleUrls: ['./product-details.component.scss'],
})
export class ProductDetailsComponent implements OnInit {
product: IProducts = {} as IProducts;
id: number = 0;

constructor(
  private route: ActivatedRoute,
  private cartService: CartService
) {}

addToCart() {
  window.alert('Your product has been added to the cart!');
  this.cartService.addToCart(this.product);
}

ngOnInit(): void {
  this.route.params.subscribe((params: Params) => {
    this.id = +params['productId'];
    this.product = products[this.id];
  });
}
}