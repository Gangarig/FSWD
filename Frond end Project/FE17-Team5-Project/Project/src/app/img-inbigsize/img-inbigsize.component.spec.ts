import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ImgInbigsizeComponent } from './img-inbigsize.component';

describe('ImgInbigsizeComponent', () => {
  let component: ImgInbigsizeComponent;
  let fixture: ComponentFixture<ImgInbigsizeComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ImgInbigsizeComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ImgInbigsizeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
