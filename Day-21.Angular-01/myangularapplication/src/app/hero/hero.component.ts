import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-hero',
  templateUrl: './hero.component.html',
  styleUrls: ['./hero.component.css']
})
export class HeroComponent implements OnInit {
  heroTitle:string = "Code Factory";
  heroInfo:string = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam, consequuntur quae unde dolor, ad reprehenderit rerum impedit debitis quo exercitationem, suscipit dolorem labore? Vel omnis commodi aliquid voluptate praesentium aperiam.";
  heroBtn:string = "Learn more";
  heroUrl:string = "https://codefactory.wien/en/home-en/";
  constructor() { }

  ngOnInit(): void {
  }

}
