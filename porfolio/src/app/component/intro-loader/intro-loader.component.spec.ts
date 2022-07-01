import { ComponentFixture, TestBed } from '@angular/core/testing';

import { IntroLoaderComponent } from './intro-loader.component';

describe('IntroLoaderComponent', () => {
  let component: IntroLoaderComponent;
  let fixture: ComponentFixture<IntroLoaderComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ IntroLoaderComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(IntroLoaderComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
