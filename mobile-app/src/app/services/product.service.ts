import {Injectable} from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {Observable} from "rxjs";
import {Product} from "../model";

@Injectable({
    providedIn: 'root'
})
export class ProductService {

    baseUrl = 'http://localhost:8000/api/shop';

    constructor(private http: HttpClient) {
    }

    index(): Observable<{ data: Array<Product> }> {
        let requestUrl = `${this.baseUrl}/products`;
        return this.http.get<{ data: Array<Product> }>(requestUrl);
    }
}
