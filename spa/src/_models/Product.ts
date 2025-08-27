export interface Product {
  id: number;
  name: string;
  price: number;
  stock?: number;
  description?: string | null;
  archived?: number | boolean;
  option_id?: number | null;
  category_id?: number | null;
  picture?: string | null;
}
