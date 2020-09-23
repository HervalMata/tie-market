export interface Category {
    readonly id: number;
    readonly category_name: string;
    readonly slug?: string;
    readonly description: string;
    readonly photo_url: string;
    readonly active: boolean;
    readonly created_at?: {date: string};
    readonly updated_at?: {date: string};
}

export interface Product {
    readonly id: number;
    readonly product_name: string;
    readonly product_code: string;
    readonly description: string;
    readonly stock: number;
    readonly price: number;
    readonly category: Category;
    readonly slug?: string;
    readonly active: boolean;
    readonly featured: boolean;
    readonly photo_url: string;
    readonly created_at?: { date: string };
    readonly updated_at?: { date: string };
}
