function showFront() {
    document.getElementById("productImage").src = "img/frente.webp";
    document.getElementById("productImage").alt = "Producto Frente";
}

function showLeft() {
    document.getElementById("productImage").src = "img/izquierda.webp";
    document.getElementById("productImage").alt = "Producto Izquierda";
}

function showRight() {
    document.getElementById("productImage").src = "img/derecha.webp";
    document.getElementById("productImage").alt = "Producto Derecha";
}

function showBack() {
    document.getElementById("productImage").src = "img/atras.webp";
    document.getElementById("productImage").alt = "Producto Detrás";
}

function showInfo() {
    document.getElementById("productInfo").classList.remove("d-none");
    document.getElementById("hideInfoBtn").classList.remove("d-none");
    document.getElementById("productPrice").classList.add("d-none");
}

function hideInfo() {
    document.getElementById("productInfo").classList.add("d-none");
    document.getElementById("hideInfoBtn").classList.add("d-none");
}

function showPrice() {
    document.getElementById("productPrice").classList.remove("d-none");
    document.getElementById("productInfo").classList.add("d-none");
    document.getElementById("hideInfoBtn").classList.add("d-none");
}