// index functions
function userIconButton() {
    var div = document.getElementById("user-menu");
      if (div.style.height === "0px") {
        div.style.height = "100px";
      } else {
        div.style.height = "0px";
      }
}

//rupiah format
const rupiahjs = (number)=>{
  return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR"
  }).format(number);
}

// product functions
function backButton() {
  window.history.back();
}
function increment() {
  let quantity = document.getElementById("quantity");
  quantity.value++;
  calculateSubtotal();
}
function decrement() {
  let quantity = document.getElementById("quantity");
  quantity.value = Math.max(1, quantity.value - 1);
  calculateSubtotal();
}
function calculateSubtotal() {
  let quantity = document.getElementById("quantity").value;
  let price = document.getElementById("harga").value;
  let subtotal = quantity * price;
  document.getElementById("subtotal").textContent = rupiahjs(subtotal);
}
