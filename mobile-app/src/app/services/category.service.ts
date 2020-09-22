import {Injectable} from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {Observable} from "rxjs";
import {Category} from "../model";

@Injectable({
    providedIn: 'root'
})
export class CategoryService {

    baseUrl = 'http://localhost:8000/api/shop';

    constructor(private http: HttpClient) {
    }

    index() : Observable<{ data: Array<Category> }> {
        let requestUrl = `${this.baseUrl}/categories`;
        return this.http.get<{ data: Array<Category> }>(requestUrl);
    }
}
