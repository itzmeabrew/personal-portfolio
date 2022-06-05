import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AboutPageComponent } from './component/about-page/about-page.component';
import { HomePageComponent } from './component/home-page/home-page.component';

const routes: Routes =
[
  {path: "" , component:HomePageComponent},
  {path: "home" , component:HomePageComponent},
 // {path: "about" , component:AboutPageComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
