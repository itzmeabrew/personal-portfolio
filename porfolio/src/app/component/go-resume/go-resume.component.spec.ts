import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GoResumeComponent } from './go-resume.component';

describe('GoResumeComponent', () => {
  let component: GoResumeComponent;
  let fixture: ComponentFixture<GoResumeComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GoResumeComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(GoResumeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
