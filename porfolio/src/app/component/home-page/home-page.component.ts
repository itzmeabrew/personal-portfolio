import { AfterViewInit, Component, HostListener, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { ToastrService } from 'ngx-toastr';
import { HomeService } from '../../service/home.service';

@Component({
  selector: 'app-home-page',
  templateUrl: './home-page.component.html',
  styleUrls: ['./home-page.component.css']
})
export class HomePageComponent implements OnInit,AfterViewInit
{
  contact_form: FormGroup = new FormGroup(
  {
    name: new FormControl(null,
      [
        Validators.required,
        Validators.maxLength(45)
      ]),
    email: new FormControl(null,
      [
        Validators.required,
        Validators.email,
        Validators.maxLength(45)
      ]),
    subject: new FormControl(null,
      [
        Validators.required,
        Validators.maxLength(45),
      ]),
    body: new FormControl(null,
      [
      Validators.required,
      Validators.maxLength(200),
      ])
  });

  btnStatus: boolean = false;
  btnMobile: boolean = null;

  //skillSection: HTMLElement = null;
  prgBar: Array<HTMLElement> = new Array();
    
  constructor(private msx: HomeService, private toastr: ToastrService) { }

  ngOnInit(): void 
  {
    this.onResize();
  }

  ngAfterViewInit(): void
  {
    //this.skillSection = this.selector("#skills");
    this.prgBar = <Array<HTMLElement>>this.selector(".progress-bar", true)
    this.animateScroll();
    ///console.log(this.prgBar);
  }

  public contactMe(): void
  {
    if(this.contact_form.valid)
    {
      console.log(this.contact_form.value);
      const formData = this.contact_form.value;
      const mailReq = { mailid:"abrewabraham@gmail.com", subject:formData.subject,body:formData.email + "\t" + formData.name + "\n\n" + formData.body };

      this.btnStatus=true;
      this.msx.sendMail(mailReq).subscribe((response) => 
      {
        console.log(response);
        
        console.log("Message sent successfully");
        this.toastr.success("Message sent successfully");
        this.btnStatus=false;
        this.contact_form.reset();
      },

      (error) =>
      {
        console.error(error + "Error sending message");
        this.toastr.error("Error sending message");
        this.btnStatus=false;
      });
    }
    else
    {
      this.toastr.warning("Please fill all the fields with valid details");
    }
  }

  public calculateAge(): number
  {
    const today = new Date();
    const dob = new Date("1998-12-14");

    let age = today.getFullYear()-dob.getFullYear();
    const m = today.getMonth()-dob.getMonth();

    if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) 
    {
        age--;
    }
    return age;
  }

  private animateScroll(): void
  {
    this.prgBar.forEach((prg) =>
    {
      const pValue = prg.dataset['progress'];
      //prg.setAttribute("style", "transition: width 0.5s ease-in-out;width:5%");
      //prg.style.opacity = "1";
      prg.style.width = pValue + "%";
      //console.log(pValue);
    });
  }

  /*private hideScroll(): void
  {
    this.prgBar.forEach((prg) =>
    {
      //prg.style.opacity = "0";
      //console.log(pValue);
    });
  } */

  @HostListener('window:resize', ['$event'])
  private onResize(event?) :void
  {
    const vWidth = window.innerWidth;
    const vHeight = window.innerHeight;
    //console.log(vWidth, vHeight);
    if(vWidth < 768)
    {
      this.btnMobile = true;
      //console.log("Mobile");
    }
    /* else if(vWidth >= 416 && vWidth <= 767)
    {
      this.btnMobile = true;
      console.log("Mobile 2");
    } */
    else
    {
      this.btnMobile = false;
     //console.log("Desktop");
    }
   //  event.target.innerWidth;
   //console.log(vWidth, vHeight);
  }

  /* @HostListener('window:scroll', ['$event'])
  private onScroll(event) : void
  {
    const sectionPos = this.skillSection.getBoundingClientRect().top;
    const screenPos = window.innerHeight;

    if(sectionPos < screenPos)
    {
      console.log("show progress");
      this.animateScroll();
    }
    else
    {
      console.log("hide progress");
      this.hideScroll();
    }
  } */


  ////////////////////////////////////////////// UI Toolkit /////////////////////////////////////

  private selector(el: string , all = false): any
  {
    el = el.trim();
    if (all) 
    {
      return Array.from(document.querySelectorAll(el));
    }
    else
    {
      return document.querySelector(el);
    }
  }

  private scrollTo(el): void
  {
    window.scrollTo({top: 0,behavior: 'smooth'});
  }

  public navBarTogle(id: string): void
  {
    const elem = document.getElementById(id);
    const closex = document.querySelector(".mobile-nav-toggle");

    elem.classList.toggle('navbar-mobile');
    closex.classList.toggle('fa-ellipsis');
    closex.classList.toggle('fa-xmark');
  }

  public scrollToSection(hasx: string, event: Event): void 
  {
    const slc = <HTMLElement>this.selector(hasx);
    const target = <HTMLElement>event.target;
    //console.log(target);
    
    //const navLink =<HTMLElement> this.selector("#navbar .nav-link");

    if(slc)
    {
      event.preventDefault();

      let navbar = <HTMLElement>this.selector('#navbar')
      let header = <HTMLElement>this.selector('#header')
      let sections = <Array<HTMLElement>>this.selector('section', true)
      let navlinks = <Array<HTMLElement>>this.selector('#navbar .nav-link', true)

      navlinks.forEach((item) =>
      {
        item.classList.remove('active');
      });
      target.classList.add('active');
      
      if (navbar.classList.contains('navbar-mobile')) 
      {
        navbar.classList.remove('navbar-mobile');
        const navbarToggle = <HTMLElement>this.selector('.mobile-nav-toggle');
        navbarToggle.classList.toggle('fa-ellipsis');
        navbarToggle.classList.toggle('fa-xmark');
      }

      if (hasx == '#header')
      {
        header.classList.remove('header-top');
        sections.forEach((item) => 
        {
          item.classList.remove('section-show');
        });
        return;
      }

      if (!header.classList.contains('header-top'))
      {
        header.classList.add('header-top');
        setTimeout(function()
        {
          sections.forEach((item) => 
          {
            item.classList.remove('section-show');
          });
          slc.classList.add('section-show');
        }, 350);
      } 
      else 
      {
        sections.forEach((item) => {
          item.classList.remove('section-show');
        })
        slc.classList.add('section-show');
      }
      this.scrollTo(hasx);
    }

  }

}
