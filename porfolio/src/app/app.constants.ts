import { Injectable } from "@angular/core";
import {environment } from "../environments/environment"

@Injectable()
export class AppConstants
{
    public static API_ENDPOINT = environment.API_ENDPOINT;
    public static BASE_HREF = '';
}
