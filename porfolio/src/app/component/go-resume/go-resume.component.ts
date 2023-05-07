import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-go-resume',
  templateUrl: './go-resume.component.html',
  styleUrls: ['./go-resume.component.css']
})
export class GoResumeComponent implements OnInit 
{
  constructor(private router: Router) { }

  ngOnInit(): void 
  {
    window.location.href = "https://drive.google.com/file/d/1mnj4elRgw71VbhUx7praMmZeGXt1slLk/view?usp=sharing";
    setTimeout(() => 
    { 
      this.router.navigateByUrl("") 
    }, 2000);
  }

}