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
