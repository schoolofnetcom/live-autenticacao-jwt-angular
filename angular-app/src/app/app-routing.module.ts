import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';
import {LoginComponent} from './pages/login/login.component';
import {DashboardComponent} from "./pages/dashboard/dashboard.component";
import {Pagina2Component} from "./pages/pagina2/pagina2.component";
import {AuthGuardService} from "./auth-guard.service";

const routes: Routes = [
    {path: 'login', component: LoginComponent},
    {path: 'dashboard', component: DashboardComponent, canActivate: [AuthGuardService]},
    {path: 'pagina2', component: Pagina2Component},
];

@NgModule({
    imports: [RouterModule.forRoot(routes)],
    exports: [RouterModule],
    providers: [AuthGuardService]
})
export class AppRoutingModule {
}
