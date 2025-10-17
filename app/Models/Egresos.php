<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Egresos extends Model
{
  use SoftDeletes;
  protected $dates = ['created_at', 'updated_at','fecha'];
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'egresos';

  /**
    * The model's default values for attributes.
    *
    * @var array
    */
  protected $fillable = [
      'fecha',
      'proveedores_id',
      'folio',
      'test',
      'subtotal',
      'iva',
      'total',
      'rfc',
      'status',
    ];

    /* RELACIONES */
    public function proveedor() {
      //dd('hola');
      //dd($this->BelongsTo('App\Models\Proveedores', 'proveedores_id', 'id')->first());
      return $this->BelongsTo('App\Models\Proveedores', 'proveedores_id', 'id')->first();
    }

    /* HELPERS */
    public function EgresosMensuales($rfc, $year, $month)
    {
      $date = $year."-".$month."-01";
      $fecha = Carbon::parse($date);
      $fechafin = $year."-".$month."-".$fecha->daysInMonth;

      $EgresosMenusual = array('total' => 0, 'ivaacreeditable' => 0, 'conteo' => 0);
      $EgresoList = Egresos::where('rfc',$rfc)->whereBetween('fecha', [$date, $fechafin])->get();

      foreach ($EgresoList as $key => $Egreso) {
        $EgresosMenusual['ivaacreeditable'] += $Egreso->iva;
        $EgresosMenusual['total'] += $Egreso->subtotal;
        $EgresosMenusual['conteo'] +=1;
      }
      //dd($IngresosMenusual);
      return $EgresosMenusual;
    }

    public function EgresosBimestre($rfc, $year, $month)
    {
      $Total=0;$IvaAcree=0;$Conteo=0;
      switch ($month) {
        case 1:{
          $ini = $year.'-01-01'; $fin = $year.'-02-28';
          $EgresoList = Egresos::where('rfc',$rfc)->whereBetween('fecha', [$ini, $fin])->get();
          foreach ($EgresoList as $key => $Egreso) { $Total += $Egreso->subtotal; $IvaAcree += $Egreso->iva; $Conteo+=1; }
          break;
        }
        case 2:{
          $ini = $year.'-03-01'; $fin = $year.'-04-30';
          $EgresoList = Egresos::where('rfc',$rfc)->whereBetween('fecha', [$ini, $fin])->get();
          foreach ($EgresoList as $key => $Egreso) { $Total += $Egreso->subtotal; $IvaAcree += $Egreso->iva; $Conteo+=1; }
          break;
        }
        case 3:{
          $ini = $year.'-05-01'; $fin = $year.'-06-30';
          $EgresoList = Egresos::where('rfc',$rfc)->whereBetween('fecha', [$ini, $fin])->get();
          foreach ($EgresoList as $key => $Egreso) { $Total += $Egreso->subtotal; $IvaAcree += $Egreso->iva; $Conteo+=1; }
          break;
        }
        case 4:{
          $ini = $year.'-07-01'; $fin = $year.'-08-31';
          $EgresoList = Egresos::where('rfc',$rfc)->whereBetween('fecha', [$ini, $fin])->get();
          foreach ($EgresoList as $key => $Egreso) { $Total += $Egreso->subtotal; $IvaAcree += $Egreso->iva; $Conteo+=1; }
          break;
        }
        case 5:{
          $ini = $year.'-09-01'; $fin = $year.'-10-31';
          $EgresoList = Egresos::where('rfc',$rfc)->whereBetween('fecha', [$ini, $fin])->get();
          foreach ($EgresoList as $key => $Egreso) { $Total += $Egreso->subtotal; $IvaAcree += $Egreso->iva; $Conteo+=1; }
          break;
        }
        case 6:{
          $ini = $year.'-11-01'; $fin = $year.'-12-31';
          $EgresoList = Egresos::where('rfc',$rfc)->whereBetween('fecha', [$ini, $fin])->get();
          foreach ($EgresoList as $key => $Egreso) { $Total += $Egreso->subtotal; $IvaAcree += $Egreso->iva; $Conteo+=1; }
          break;
        }
        default:
          // code...
          break;
      }
      $Egresos = array('ivaacreditado'=>$IvaAcree, 'total'=>$Total, 'conteo'=>$Conteo);
      return $Egresos;
    }

    public function YearlyOutcome($rfc, $year)
    {
      //dd('hola');
      /* VARIABLES */
      $ene=0;$feb=0;$mar=0;$abr=0;$jun=0;$jul=0;$ago=0;$sep=0;$oct=0;$nov=0;$dic=0;
      $ene = Egresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-01-01', $year.'-01-31'])->sum('subtotal');
      $feb = Egresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-02-01', $year.'-02-29'])->sum('subtotal');
      $mar = Egresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-03-01', $year.'-03-31'])->sum('subtotal');
      $abr = Egresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-04-01', $year.'-04-30'])->sum('subtotal');
      $may = Egresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-05-01', $year.'-05-31'])->sum('subtotal');
      $jun = Egresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-06-01', $year.'-06-30'])->sum('subtotal');
      $jul = Egresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-07-01', $year.'-07-30'])->sum('subtotal');
      $ago = Egresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-08-01', $year.'-08-31'])->sum('subtotal');
      $sep = Egresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-09-01', $year.'-09-30'])->sum('subtotal');
      $oct = Egresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-10-01', $year.'-10-31'])->sum('subtotal');
      $nov = Egresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-11-01', $year.'-11-30'])->sum('subtotal');
      $dic = Egresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-12-01', $year.'-12-31'])->sum('subtotal');
      //dd($feb);
      $YearlyOutcome= array(
        'ene' => $ene, 'feb' => $feb, 'mar' => $mar,
        'abr' => $abr, 'may' => $may, 'jun' => $jun,
        'jul' => $jul, 'ago' => $ago, 'sep' => $sep,
        'oct' => $oct, 'nov' => $nov, 'dic' => $dic,
      );

      return $YearlyOutcome;
    }

    public function YearOutcome($rfc, $year)
    {
      return $YearOutcome = Egresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-01-01', $year.'-12-31'])->sum('subtotal');
    }

}
