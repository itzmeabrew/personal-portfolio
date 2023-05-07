import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AboutPageComponent } from './component/about-page/about-page.component';
import { GoResumeComponent } from './component/go-resume/go-resume.component';
import { HomePageComponent } from './component/home-page/home-page.component';
import { IntroLoaderComponent } from './component/intro-loader/intro-loader.component';
import { NotFoundComponent } from './component/not-found/not-found.component';

const routes: Routes =
[
  {path: "", component:HomePageComponent},
  {path: "home", component:HomePageComponent},
  {path: "resume", component:GoResumeComponent},
  {path: "not-found", component:NotFoundComponent},
  //{path: "xxtest", pathMatch: "full", component: AboutPageComponent},
  /* {path: "", component:IntroLoaderComponent},
  {path: "welcome", component:HomePageComponent}, */
  {path: "**", pathMatch: "full", component: NotFoundComponent},
 
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
