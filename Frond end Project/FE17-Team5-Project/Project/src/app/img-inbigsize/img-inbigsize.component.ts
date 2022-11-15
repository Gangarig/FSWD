import { Component, OnInit } from '@angular/core';
import { i_imgpath } from '../i_imgpath';
import { portfolio } from '../imgpath';
import { ActivatedRoute, Params } from '@angular/router';
import { ServiceService } from '../service.service';
@Component({
  selector: 'app-img-inbigsize',
  templateUrl: './img-inbigsize.component.html',
  styleUrls: ['./img-inbigsize.component.css']
})
export class ImgInbigsizeComponent implements OnInit {
  img:i_imgpath={}as i_imgpath;
  i=0; 
  constructor(private route:ActivatedRoute,private cs:ServiceService) { }

  ngOnInit(): void {
    this.route.params.subscribe((params:Params) => {
      this.i = Number(params["i"]); 
      this.img = portfolio[this.i];
    })
  
  }

}
