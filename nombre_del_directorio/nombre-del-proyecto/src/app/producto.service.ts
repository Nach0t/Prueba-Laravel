import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ProductoService {

  private apiUrl = 'http://localhost:8000/api/productos';  // Cambia esta URL a la URL de tu API Laravel

  constructor(private http: HttpClient) { }

  // Obtener productos
  getProductos(): Observable<any[]> {
    return this.http.get<any[]>(this.apiUrl);  // Petición GET a la API
  }

  // Crear un producto
  createProducto(producto: any): Observable<any> {
    return this.http.post<any>(this.apiUrl, producto);  // Petición POST a la API
  }

  // Eliminar un producto
  deleteProducto(id: number): Observable<any> {
    return this.http.delete<any>(`${this.apiUrl}/${id}`);  // Petición DELETE a la API
  }
}
