import {Component, OnInit} from '@angular/core';
import {Category, Product} from "../../model";
import {CategoryService} from "../../services/category.service";
import {ProductService} from "../../services/product.service";

@Component({
    selector: 'app-home',
    templateUrl: './home.page.html',
    styleUrls: ['./home.page.scss'],
})
export class HomePage implements OnInit {

    sliderConfig = {
        centeredSlides: true,
        autoplay: {delay: 4000},
        loop: true
    };

    categories: Array<Category> = [];
    products: Array<Product> = [];

    constructor(
        private categoryService: CategoryService,
        private productService: ProductService
    ) {
    }

    ngOnInit() {
        this.getCategories();
        this.getProducts();
    }

    getCategories() {
        return this.categoryService.index()
            .subscribe(response => {
                console.log(response.data);
                this.categories = response.data;
            });
    }

    getProducts() {
        return this.productService.index()
            .subscribe(response => {
                console.log(response.data);
                this.products = response.data;
            });
    }

    productsByCategory() {

    }

    productDetail() {

    }

}
