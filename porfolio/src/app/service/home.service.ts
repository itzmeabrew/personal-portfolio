import { Injectable } from '@angular/core';
import { HttpClient } from  '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class HomeService 
{
  API_ENDPOINT = "https://api.abrewabraham.dev/";
  //API_ENDPOINT = "http://localhost:8080/";

  constructor(private http: HttpClient) { }

  public sendMail(mail: any): Observable<any> 
  {
    return this.http.post(this.API_ENDPOINT + "api/sendmail", mail);
  }
}
