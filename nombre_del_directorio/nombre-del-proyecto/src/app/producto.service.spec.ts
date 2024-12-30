import { Component, OnInit } from '@angular/core';
import { ProductoService } from './producto.service';

@Component({
  selector: 'app-productos',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class ProductosComponent implements OnInit {
  productos: any[] = [];

  constructor(private productoService: ProductoService) {}

  ngOnInit(): void {
    this.getProductos();
  }

  getProductos(): void {
    this.productoService.getProductos().subscribe(
      (data) => {
        this.productos = data;  // Asignar los productos obtenidos a la variable productos
      },
      (error) => {
        console.error('Error al obtener productos', error);
      }
    );
  }

  createProducto(): void {
    const nuevoProducto = {
      nombre: 'Nuevo Producto',
      descripcion: 'Descripción del nuevo producto',
      precio: 1000
    };
    this.productoService.createProducto(nuevoProducto).subscribe(
      () => {
        this.getProductos();  // Refrescar la lista de productos después de agregar uno nuevo
      },
      (error) => {
        console.error('Error al crear el producto', error);
      }
    );
  }

  deleteProducto(id: number): void {
    this.productoService.deleteProducto(id).subscribe(
      () => {
        this.getProductos();  // Refrescar la lista después de eliminar un producto
      },
      (error) => {
        console.error('Error al eliminar el producto', error);
      }
    );
  }
}
