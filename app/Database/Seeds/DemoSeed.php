<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DemoSeed extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        if ($this->db->table('categoria')->countAllResults() > 0) {
            return;
        }

        $this->db->table('categoria')->insertBatch([
            ['nombre' => 'Abarrotes', 'descripcion' => 'Productos de consumo diario', 'created_at' => $now],
            ['nombre' => 'Bebidas', 'descripcion' => 'Bebidas frías y calientes', 'created_at' => $now],
            ['nombre' => 'Limpieza', 'descripcion' => 'Higiene del hogar y oficina', 'created_at' => $now],
            ['nombre' => 'Cuidado personal', 'descripcion' => 'Cuidado e higiene personal', 'created_at' => $now],
            ['nombre' => 'Papelería', 'descripcion' => 'Artículos para oficina', 'created_at' => $now],
        ]);

        $this->db->table('persona')->insertBatch([
            ['nombre' => 'María', 'apellido' => 'Gómez', 'empresa' => null, 'direccion' => 'Av. Central 120', 'telefono' => '5551001001', 'email' => 'maria.gomez@correo.test', 'tipo' => 1, 'created_at' => $now],
            ['nombre' => 'Carlos', 'apellido' => 'Ramírez', 'empresa' => null, 'direccion' => 'Calle Norte 45', 'telefono' => '5551001002', 'email' => 'carlos.ramirez@correo.test', 'tipo' => 1, 'created_at' => $now],
            ['nombre' => 'Lucía', 'apellido' => 'Torres', 'empresa' => null, 'direccion' => 'Col. Centro 18', 'telefono' => '5551001003', 'email' => 'lucia.torres@correo.test', 'tipo' => 1, 'created_at' => $now],
            ['nombre' => 'Distribuidora', 'apellido' => 'La Unión', 'empresa' => 'Distribuidora La Unión', 'direccion' => 'Zona Industrial 22', 'telefono' => '5552002001', 'email' => 'ventas@launion.test', 'tipo' => 0, 'created_at' => $now],
            ['nombre' => 'Comercial', 'apellido' => 'Andina', 'empresa' => 'Comercial Andina', 'direccion' => 'Parque Empresarial 7', 'telefono' => '5552002002', 'email' => 'contacto@andina.test', 'tipo' => 0, 'created_at' => $now],
        ]);

        $productos = [
            [101001, 'Arroz premium 1 kg', 'Abarrotes', 18, 28, 24, 8],
            [101002, 'Frijol negro 900 g', 'Abarrotes', 20, 32, 7, 10],
            [101003, 'Aceite vegetal 1 L', 'Abarrotes', 25, 39, 18, 6],
            [202001, 'Café molido 250 g', 'Bebidas', 42, 65, 5, 8],
            [202002, 'Jugo de naranja 1 L', 'Bebidas', 22, 35, 16, 5],
            [303001, 'Jabón líquido 500 ml', 'Limpieza', 30, 49, 3, 6],
            [303002, 'Detergente en polvo 1 kg', 'Limpieza', 38, 59, 14, 5],
            [404001, 'Shampoo familiar 750 ml', 'Cuidado personal', 55, 82, 9, 4],
            [505001, 'Cuaderno profesional', 'Papelería', 28, 45, 21, 7],
            [505002, 'Paquete de bolígrafos', 'Papelería', 16, 27, 2, 5],
        ];

        foreach ($productos as $producto) {
            $categoria = $this->db->table('categoria')->where('nombre', $producto[2])->get()->getRowArray();
            $this->db->table('producto')->insert([
                'codigo' => $producto[0],
                'nombre_producto' => $producto[1],
                'descripcion' => 'Producto de demostración para el catálogo.',
                'precio_in' => $producto[3],
                'precio_out' => $producto[4],
                'stock' => $producto[5],
                'stock_critico' => $producto[6],
                'usuario_id' => 1,
                'categoria_id' => $categoria['id'],
                'created_at' => $now,
            ]);
        }

        $clientes = $this->db->table('persona')->where('tipo', 1)->orderBy('id')->get()->getResultArray();
        $productosVenta = $this->db->table('producto')->orderBy('id')->get()->getResultArray();
        $ventas = [
            [$clientes[0]['id'], 0, 2, 101],
            [$clientes[1]['id'], 1, 4, 202],
            [$clientes[2]['id'], 2, 1, 303],
            [$clientes[0]['id'], 4, 3, 404],
        ];

        foreach ($ventas as $indice => $venta) {
            $producto = $productosVenta[$venta[1]];
            $total = $producto['precio_out'] * $venta[2];
            $fecha = date('Y-m-d H:i:s', strtotime('-' . ($indice + 1) . ' days'));
            $this->db->table('venta')->insert([
                'caja_id' => 1,
                'usuario_id' => 1,
                'persona_id' => $venta[0],
                'total' => $total,
                'cash' => $total,
                'descuento' => 0,
                'tipo_operacion_id' => 2,
                'created_at' => $fecha,
            ]);
            $ventaId = $this->db->insertID();
            $this->db->table('operacion')->insert([
                'producto_id' => $producto['id'],
                'cantidad' => $venta[2],
                'venta_id' => $ventaId,
                'tipo_operacion_id' => 2,
                'created_at' => $fecha,
            ]);
        }
    }
}
