import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-hero',
  templateUrl: './hero.component.html',
  styleUrls: ['./hero.component.css']
})
export class HeroComponent implements OnInit {

  images:string[] = [];

  test() {
    for(let i:number = 1; i <=36; i++) {
      this.images.push(`../../assets/portfolio_images/${i}.jpg`)
    }
    console.log(this.images);
  }


  constructor() { }

  ngOnInit(): void {
    this.test();
  }

}
