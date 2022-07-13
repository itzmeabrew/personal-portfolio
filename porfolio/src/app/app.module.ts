import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomePageComponent } from './component/home-page/home-page.component';
import { AboutPageComponent } from './component/about-page/about-page.component';
import { FooterComponent } from './component/footer/footer.component';
import { HttpClientModule } from  '@angular/common/http';
import { FormControl, FormsModule, ReactiveFormsModule } from '@angular/forms';
import { ToastrModule } from 'ngx-toastr';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { NotFoundComponent } from './component/not-found/not-found.component';
import { NgParticlesModule } from 'ng-particles';
import { IntroLoaderComponent } from './component/intro-loader/intro-loader.component';


@NgModule({
  declarations: [
    AppComponent,
    HomePageComponent,
    AboutPageComponent,
    FooterComponent,
    NotFoundComponent,
    IntroLoaderComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpClientModule,
    NgParticlesModule,
    BrowserAnimationsModule,
    ReactiveFormsModule,
    AppRoutingModule,
    ToastrModule.forRoot({
      timeOut: 3000,
      positionClass: 'toast-top-right',
      preventDuplicates: true,
    }),
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
