<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FerreteriaSeeder extends Seeder
{
  protected function generarCodigo(string $categoria, int $id): string
  {
    // 1. Obtener las primeras letras de la categoría (ej. 'Herramienta Manual' -> 'HM')
    $partes = explode(' ', $categoria);
    $sigla = '';
    foreach ($partes as $parte) {
      $sigla .= Str::substr($parte, 0, 1);
    }

    // 2. Usar un hash corto o un identificador único basado en el tiempo para asegurar unicidad
    // Usamos el índice y 3 caracteres alfanuméricos aleatorios.
    $randomPart = Str::upper(Str::random(3));

    // Formato final: SIGLA-ID-RANDOM (ej. HM-001-XYZ)
    $codigo = Str::upper($sigla) . '-' . str_pad($id, 3, '0', STR_PAD_LEFT) . '-' . $randomPart;

    return $codigo;
  }
  /**
  * Run the database seeds.
  */
  public function run(): void
  {

    // Define las categorías disponibles
    $categorias = ['Seguridad', 'Abrasivos', 'Soldadura', 'Miscelaneos', 'Limpieza', 'Consumibles'];
    $unidades = ['unidad', 'metro', 'litro', 'kilogramo', 'caja', 'pieza'];

    $articulos_a_insertar = [

      [
      'codigo' => 'AB-DC45', // Deja el código como null para que se autogenere
      'nombre' => 'Disco de corte fino 4.5"',
      'categoria' => 'Abrasivos',
      'cantidad' => 45,
      'costo_unitario' => 7.50,
      'precio_venta' => 7.50,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'AB-DC14', // Deja el código como null para que se autogenere
      'nombre' => 'Disco de corte 14"',
      'categoria' => 'Abrasivos',
      'cantidad' => 7,
      'costo_unitario' => 60.00,
      'precio_venta' => 60.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'AB-DD45', // Deja el código como null para que se autogenere
      'nombre' => 'Disco de desbaste 4.5"',
      'categoria' => 'Abrasivos',
      'cantidad' => 5,
      'costo_unitario' => 30.00,
      'precio_venta' => 30.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'AB-DL45', // Deja el código como null para que se autogenere
      'nombre' => 'Disco de lija laminado 4.5"',
      'categoria' => 'Abrasivos',
      'cantidad' => 0,
      'costo_unitario' => 60.83,
      'precio_venta' => 60.83,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'AB-DLL6', // Deja el código como null para que se autogenere
      'nombre' => 'Disco de lija laminado 6"',
      'categoria' => 'Abrasivos',
      'cantidad' => 0,
      'costo_unitario' => 176.00,
      'precio_venta' => 176.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'AB-DFAZ', // Deja el código como null para que se autogenere
      'nombre' => 'Disco de fibra azul',
      'categoria' => 'Abrasivos',
      'cantidad' => 5,
      'costo_unitario' => 198,
      'precio_venta' => 198,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'AB-RUFL', // Deja el código como null para que se autogenere
      'nombre' => 'Rueda flap lija',
      'categoria' => 'Abrasivos',
      'cantidad' => .2,
      'costo_unitario' => 866.00,
      'precio_venta' => 866.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'AB-FISB', // Deja el código como null para que se autogenere
      'nombre' => 'Fibra Scotchbrite',
      'categoria' => 'Abrasivos',
      'cantidad' => 5,
      'costo_unitario' => 18.55,
      'precio_venta' => 18.55,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'SE-GUOP', // Deja el código como null para que se autogenere
      'nombre' => 'Guantes Operador',
      'categoria' => 'Seguridad',
      'cantidad' => 2,
      'costo_unitario' => 58.00,
      'precio_venta' => 58.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'SE-GUCR', // Deja el código como null para que se autogenere
      'nombre' => 'Guantes Carnaza Rojos',
      'categoria' => 'Seguridad',
      'cantidad' => 2,
      'costo_unitario' => 70.00,
      'precio_venta' => 70.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'SE-GUCN', // Deja el código como null para que se autogenere
      'nombre' => 'Guantes Carnaza Naranjas',
      'categoria' => 'Seguridad',
      'cantidad' => 0,
      'costo_unitario' => 50.00,
      'precio_venta' => 50.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'SE-GUNN', // Deja el código como null para que se autogenere
      'nombre' => 'Guantes Nitrilo Negros',
      'categoria' => 'Seguridad',
      'cantidad' => 2,
      'costo_unitario' => 50.00,
      'precio_venta' => 50.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'SE-GULA', // Deja el código como null para que se autogenere
      'nombre' => 'Guantes Latex Antiderrapante',
      'categoria' => 'Seguridad',
      'cantidad' => 1,
      'costo_unitario' => 60.00,
      'precio_venta' => 60.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'SE-PTCA', // Deja el código como null para que se autogenere
      'nombre' => 'Peto de Carnaza',
      'categoria' => 'Seguridad',
      'cantidad' => 0,
      'costo_unitario' => 65.00,
      'precio_venta' => 65.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'SE-PCFA', // Deja el código como null para que se autogenere
      'nombre' => 'Plastico Careta Facial',
      'categoria' => 'Seguridad',
      'cantidad' => 0,
      'costo_unitario' => 50.00,
      'precio_venta' => 50.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'SE-MASC', // Deja el código como null para que se autogenere
      'nombre' => 'Mascarillas',
      'categoria' => 'Seguridad',
      'cantidad' => 0,
      'costo_unitario' => 60.00,
      'precio_venta' => 60.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'SE-CRCL', // Deja el código como null para que se autogenere
      'nombre' => 'Cristal Claro',
      'categoria' => 'Seguridad',
      'cantidad' => 0,
      'costo_unitario' => 3.50,
      'precio_venta' => 3.50,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'SE-CS11', // Deja el código como null para que se autogenere
      'nombre' => 'Cristal Sombra 11',
      'categoria' => 'Seguridad',
      'cantidad' => 0,
      'costo_unitario' => 6.00,
      'precio_venta' => 6.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'SE-TAOD', // Deja el código como null para que se autogenere
      'nombre' => 'Tapones Oido Desechables',
      'categoria' => 'Seguridad',
      'cantidad' => 0,
      'costo_unitario' => 6.80,
      'precio_venta' => 6.80,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'SE-LEPC', // Deja el código como null para que se autogenere
      'nombre' => 'Lentes Protectores Claros',
      'categoria' => 'Seguridad',
      'cantidad' => 0,
      'costo_unitario' => 25.50,
      'precio_venta' => 25.50,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'SE-LEPO', // Deja el código como null para que se autogenere
      'nombre' => 'Lentes Protectores Oscuros',
      'categoria' => 'Seguridad',
      'cantidad' => 0,
      'costo_unitario' => 30.00,
      'precio_venta' => 30.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'SO-I332', // Deja el código como null para que se autogenere
      'nombre' => 'Electrodo Inoxidable 3/32',
      'categoria' => 'Soldadura',
      'cantidad' => 0,
      'costo_unitario' => 267.32,
      'precio_venta' => 267.32,
      'unidad_medida' => 'kilogramo',
      ],
      [
      'codigo' => 'SO-CA18', // Deja el código como null para que se autogenere
      'nombre' => 'Electrodo Negra 1/8',
      'categoria' => 'Soldadura',
      'cantidad' => 7,
      'costo_unitario' => 80.00,
      'precio_venta' => 80.00,
      'unidad_medida' => 'kilogramo',
      ],
      [
      'codigo' => 'SO-MI35', // Deja el código como null para que se autogenere
      'nombre' => 'Microalambre Inoxidable 35mm',
      'categoria' => 'Soldadura',
      'cantidad' => 30,
      'costo_unitario' => 250.53,
      'precio_venta' => 250.53,
      'unidad_medida' => 'kilogramo',
      ],
      [
      'codigo' => 'SO-MI45', // Deja el código como null para que se autogenere
      'nombre' => 'Microalambre Inoxidable 45mm',
      'categoria' => 'Soldadura',
      'cantidad' => 10.5,
      'costo_unitario' => 300.00,
      'precio_venta' => 300.00,
      'unidad_medida' => 'kilogramo',
      ],
      [
      'codigo' => 'SO-MC35', // Deja el código como null para que se autogenere
      'nombre' => 'Microalambre Negro 35mm',
      'categoria' => 'Soldadura',
      'cantidad' => 30,
      'costo_unitario' => 70.00,
      'precio_venta' => 70.00,
      'unidad_medida' => 'kilogramo',
      ],
      [
      'codigo' => 'CO-PT35', // Deja el código como null para que se autogenere
      'nombre' => 'Puntilla de Contacto 35mm',
      'categoria' => 'Consumibles',
      'cantidad' => 4,
      'costo_unitario' => 13.50,
      'precio_venta' => 13.50,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'CO-BOPA', // Deja el código como null para que se autogenere
      'nombre' => 'Boquilla Plasma Antorcha SL-60 8210',
      'categoria' => 'Consumibles',
      'cantidad' => 2,
      'costo_unitario' => 200.00,
      'precio_venta' => 200.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'CO-EPSL', // Deja el código como null para que se autogenere
      'nombre' => 'Electrodo Plasma Antorcha SL-60',
      'categoria' => 'Consumibles',
      'cantidad' => 2,
      'costo_unitario' => 360.00,
      'precio_venta' => 360.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'CO-CIMK', // Deja el código como null para que se autogenere
      'nombre' => 'Cinta Masking',
      'categoria' => 'Consumibles',
      'cantidad' => 2,
      'costo_unitario' => 30.00,
      'precio_venta' => 30.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'CO-CIAS', // Deja el código como null para que se autogenere
      'nombre' => 'Cinta Aislante',
      'categoria' => 'Consumibles',
      'cantidad' => 9,
      'costo_unitario' => 25.00,
      'precio_venta' => 25.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'CO-CITE', // Deja el código como null para que se autogenere
      'nombre' => 'Cinta Teflon',
      'categoria' => 'Consumibles',
      'cantidad' => 8,
      'costo_unitario' => 9.00,
      'precio_venta' => 9.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'CO-GISJ', // Deja el código como null para que se autogenere
      'nombre' => 'Gises Jabon',
      'categoria' => 'Consumibles',
      'cantidad' => 10,
      'costo_unitario' => 5.00,
      'precio_venta' => 5.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'CO-FLEX', // Deja el código como null para que se autogenere
      'nombre' => 'Flexometro Cadena',
      'categoria' => 'Consumibles',
      'cantidad' => 2,
      'costo_unitario' => 70.00,
      'precio_venta' => 70.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'CO-CPIX', // Deja el código como null para que se autogenere
      'nombre' => 'Carda Plana Taladro Inox',
      'categoria' => 'Consumibles',
      'cantidad' => 1,
      'costo_unitario' => 120.00,
      'precio_venta' => 120.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'CO-CMIX', // Deja el código como null para que se autogenere
      'nombre' => 'Cepillo de Mano Inox',
      'categoria' => 'Consumibles',
      'cantidad' => 0,
      'costo_unitario' => 100.00,
      'precio_venta' => 100.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'CO-LSAT', // Deja el código como null para que se autogenere
      'nombre' => 'Lata Spray Aflojatodo',
      'categoria' => 'Consumibles',
      'cantidad' => 4,
      'costo_unitario' => 80.00,
      'precio_venta' => 80.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'CO-LSAS', // Deja el código como null para que se autogenere
      'nombre' => 'Lata Spray Antisalpicaduras',
      'categoria' => 'Consumibles',
      'cantidad' => 0,
      'costo_unitario' => 150.00,
      'precio_venta' => 150.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'CO-LSGA', // Deja el código como null para que se autogenere
      'nombre' => 'Lata Spray Galvanizado',
      'categoria' => 'Consumibles',
      'cantidad' => 0,
      'costo_unitario' => 150.00,
      'precio_venta' => 150.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'MI-PAGD', // Deja el código como null para que se autogenere
      'nombre' => 'Playera Grande',
      'categoria' => 'Miscelaneos',
      'cantidad' => 0,
      'costo_unitario' => 210.00,
      'precio_venta' => 210.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'MI-PAEX', // Deja el código como null para que se autogenere
      'nombre' => 'Playera Extra Grande',
      'categoria' => 'Miscelaneos',
      'cantidad' => 0,
      'costo_unitario' => 210.00,
      'precio_venta' => 210.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'MI-T516', // Deja el código como null para que se autogenere
      'nombre' => 'Troquel 5/16',
      'categoria' => 'Miscelaneos',
      'cantidad' => 3,
      'costo_unitario' => 900.00,
      'precio_venta' => 900.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'MI-T916', // Deja el código como null para que se autogenere
      'nombre' => 'Troquel 9/16',
      'categoria' => 'Miscelaneos',
      'cantidad' => 2,
      'costo_unitario' => 900.00,
      'precio_venta' => 900.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'MI-ANTG', // Deja el código como null para que se autogenere
      'nombre' => 'Antorcha TIG',
      'categoria' => 'Miscelaneos',
      'cantidad' => 1,
      'costo_unitario' => 0.00,
      'precio_venta' => 0.00,
      'unidad_medida' => 'unidad',
      ],
      [
      'codigo' => 'MI-ASTD', // Deja el código como null para que se autogenere
      'nombre' => 'Juego Llaves Allan STD',
      'categoria' => 'Miscelaneos',
      'cantidad' => 1,
      'costo_unitario' => 240.35,
      'precio_venta' => 240.35,
      'unidad_medida' => 'unidad',
      ],


      ];
      $articulos_finales = [];
      $i = 1;

      foreach ($articulos_a_insertar as $articulo) {

        // Si el código no está definido o es vacío, lo generamos.
        if (empty($articulo['codigo'])) {
          $articulo['codigo'] = $this->generarCodigo($articulo['categoria'], $i);
        }

        // Aseguramos que los campos obligatorios existan y tienen fechas
        $articulos_finales[] = array_merge($articulo, [
        'created_at' => now(),
        'updated_at' => now(),
        ]);
        $i++;
      }

      // Inserta todos los registros en la tabla 'ferreteria'
      if (!empty($articulos_finales)) {
        DB::table('ferreteria')->insert($articulos_finales);
        $this->command->info(count($articulos_finales) . ' artículos de ferretería insertados exitosamente.');
      } else {
        $this->command->warn('No se encontraron artículos para insertar en la tabla ferreteria.');
      }

    }

  }


