import {Injectable} from '@angular/core';
import {HttpErrorResponse, HttpEvent, HttpHandler, HttpInterceptor, HttpRequest} from "@angular/common/http";
import {Observable, throwError} from "rxjs";
import {catchError, flatMap} from "rxjs/operators";
import {AuthService} from "./auth.service";
import {TokenInterceptorService} from "./token-interceptor.service";

@Injectable({
    providedIn: 'root'
})
export class RefreshTokenInterceptorService implements HttpInterceptor {

    constructor(private auth: AuthService, private tokenInterceptor: TokenInterceptorService) {
    }

    //interceptor refresh token


    intercept(req: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
        return next.handle(req)
            .pipe(
                catchError(error => { //{token: 'adfasdf'}
                    const responseError = error as HttpErrorResponse; //casting
                    if (responseError.status === 401) {
                        return this.refreshToken(req, next);
                    }
                    return throwError(error)
                })
            )
        // try{
        //   execucao()
        // }catch (e) {
        //     //recuperar
        //     throw e;
        // }
    }

    refreshToken(req: HttpRequest<any>, next: HttpHandler) {
        return this.auth
            .refresh()
            .pipe(
                flatMap(() => this.tokenInterceptor.intercept(req, next))
            )
        //recuperar
    }


}
