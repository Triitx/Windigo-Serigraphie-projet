// _models/Product.ts
export interface Product {
  id?: number;
  name:string;
  price: number;
  stock: number;
  description: string;
  archived: boolean;
  option_id: number;
  category_id: number;
};