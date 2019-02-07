import {Injectable} from '@angular/core';
import {HttpEvent, HttpHandler, HttpInterceptor, HttpRequest} from "@angular/common/http";
import {Observable} from "rxjs";

@Injectable({
    providedIn: 'root'
})
export class TokenInterceptorService implements HttpInterceptor {

    constructor() {
    }

    intercept(req: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
        const newRequest = this.hasToken() ? this.getAuthRequest(req) : req;
        return next.handle(newRequest);
    }

    hasToken() {
        return window.localStorage.getItem('token') !== null;
    }

    getAuthRequest(req: HttpRequest<any>) {
        return req.clone({
            setHeaders: {
                Authorization: 'Bearer ' + window.localStorage.getItem('token')
            }
        })
    }
}
