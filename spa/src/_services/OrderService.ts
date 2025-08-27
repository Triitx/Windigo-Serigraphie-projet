import Axios from "./CallerService";

export async function checkoutFromCart(userId: number) {
  const res = await Axios.post(`/orders/checkout/${userId}`);
  return res.data;
}

export async function getOrders() {
  const res = await Axios.get('/orders');
  return res.data;
}
