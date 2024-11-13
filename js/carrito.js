let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

function agregarAlCarrito(producto, precio) {
    const item = carrito.find(i => i.producto === producto);
    if (item) {
        item.cantidad++;
    } else {
        carrito.push({ producto, precio, cantidad: 1 });
    }
    localStorage.setItem('carrito', JSON.stringify(carrito));
}

function eliminarDelCarrito(producto) {
    carrito = carrito.filter(item => item.producto !== producto);
    localStorage.setItem('carrito', JSON.stringify(carrito));
    mostrarCarrito();
}

function mostrarCarrito() {
    const tablaCarrito = document.querySelector("#tabla-carrito tbody");
    tablaCarrito.innerHTML = '';
    let total = 0;

    carrito.forEach(item => {
        const totalItem = item.precio * item.cantidad;
        total += totalItem;
        tablaCarrito.innerHTML += `
            <tr>
                <td>${item.producto}</td>
                <td>$${item.precio}</td>
                <td>${item.cantidad}</td>
                <td>$${totalItem}</td>
                <td><button class="btn btn-danger" onclick="eliminarDelCarrito('${item.producto}')">Eliminar</button></td>            
                </tr>
        `;
    });

    
    document.getElementById('total-compra').innerText = `Total: $${total}`;
}

function comprar() {
    if (carrito.length > 0) {
        alert('Gracias por tu compra');
        carrito = [];
        localStorage.removeItem('carrito');
        mostrarCarrito();
    } else {
        alert('El carrito está vacío');
    }
}

document.addEventListener('DOMContentLoaded', mostrarCarrito);
