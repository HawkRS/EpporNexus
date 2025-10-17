<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Ingresos extends Model
{
  use SoftDeletes;
  protected $dates = ['created_at', 'updated_at','fecha'];
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ingresos';
  /**
    * The model's default values for attributes.
    *
    * @var array
    */
  protected $fillable = [
      'fecha',
      'clientes_id',
      'folio',
      'test',
      'subtotal',
      'iva',
      'total',
      'rfc',
      'status',
    ];

    /* RELACIONES */
    public function cliente() {
      //dd('hola');
      return $this->BelongsTo('App\Models\Clientes', 'clientes_id', 'id')->first();
    }

    /* HELPER */
    public function IngresosBimestre($rfc, $year, $month)
    {
      //dd($month);
      $Facturado=0;$PublicoGral=0;$IvaTrans=0;$Conteo=0;
      switch ($month) {
        case 1:{
          $ini = $year.'-01-01'; $fin = $year.'-02-28';
          //dd($fin);
          $IngresosList = Ingresos::where('rfc',$rfc)->whereBetween('fecha', [$ini, $fin])->get();
          foreach ($IngresosList as $key => $Ingreso) {
            if($Ingreso->test == 0){$Facturado += $Ingreso->subtotal;}
            if($Ingreso->test == 1){$PublicoGral += $Ingreso->subtotal;}
            $IvaTrans += $Ingreso->iva;$Conteo+=1;
          }
          break;
        }
        case 2:{
          $ini = $year.'-03-01'; $fin = $year.'-04-30';
          $IngresosList = Ingresos::where('rfc',$rfc)->whereBetween('fecha', [$ini, $fin])->get();
          foreach ($IngresosList as $key => $Ingreso) {
            if($Ingreso->test == 0){$Facturado += $Ingreso->subtotal;}
            if($Ingreso->test == 1){$PublicoGral += $Ingreso->subtotal;}
            $IvaTrans += $Ingreso->iva;$Conteo+=1;
          }
          break;
        }
        case 3:{
          $ini = $year.'-05-01'; $fin = $year.'-06-30';
          $IngresosList = Ingresos::where('rfc',$rfc)->whereBetween('fecha', [$ini, $fin])->get();
          foreach ($IngresosList as $key => $Ingreso) {
            if($Ingreso->test == 0){$Facturado += $Ingreso->subtotal;}
            if($Ingreso->test == 1){$PublicoGral += $Ingreso->subtotal;}
            $IvaTrans += $Ingreso->iva;$Conteo+=1;
          }
          break;
        }
        case 4:{
          $ini = $year.'-07-01'; $fin = $year.'-08-31';
          $IngresosList = Ingresos::where('rfc',$rfc)->whereBetween('fecha', [$ini, $fin])->get();
          foreach ($IngresosList as $key => $Ingreso) {
            if($Ingreso->test == 0){$Facturado += $Ingreso->subtotal;}
            if($Ingreso->test == 1){$PublicoGral += $Ingreso->subtotal;}
            $IvaTrans += $Ingreso->iva;$Conteo+=1;
          }
          break;
        }
        case 5:{
          $ini = $year.'-09-01'; $fin = $year.'-10-31';
          $IngresosList = Ingresos::where('rfc',$rfc)->whereBetween('fecha', [$ini, $fin])->get();
          foreach ($IngresosList as $key => $Ingreso) {
            if($Ingreso->test == 0){$Facturado += $Ingreso->subtotal;}
            if($Ingreso->test == 1){$PublicoGral += $Ingreso->subtotal;}
            $IvaTrans += $Ingreso->iva;$Conteo+=1;
          }
          break;
        }
        case 6:{
          $ini = $year.'-11-01'; $fin = $year.'-12-31';
          $IngresosList = Ingresos::where('rfc',$rfc)->whereBetween('fecha', [$ini, $fin])->get();
          foreach ($IngresosList as $key => $Ingreso) {
            if($Ingreso->test == 0){$Facturado += $Ingreso->subtotal;}
            if($Ingreso->test == 1){$PublicoGral += $Ingreso->subtotal;}
            $IvaTrans += $Ingreso->iva;$Conteo+=1;
          }
          break;
        }
        default:
          // code...
          break;
      }
      $total = $PublicoGral+$Facturado;
      $Ingresos = array('publico'=>$PublicoGral, 'facturado'=>$Facturado, 'ivatrasladado'=>$IvaTrans, 'total'=>$total, 'conteo'=>$Conteo);
      return $Ingresos;
      dd($PublicoGral);
    }

    public function IngresoMensual($rfc, $year, $month)
    {
      $date = $year."-".$month."-01";
      $fecha = Carbon::parse($date);
      $fechafin = $year."-".$month."-".$fecha->daysInMonth;

      $IngresosMenusual = array('total' => 0, 'ivatrasladado' => 0, 'publicogral' => 0, 'facturados' => 0, 'conteo'=>0);

      $IngresoList = Ingresos::where('rfc',$rfc)->whereBetween('fecha', [$date, $fechafin])->get();

      foreach ($IngresoList as $key => $Ingreso) {
        if ($Ingreso->test == 1) { $IngresosMenusual['publicogral'] += $Ingreso->subtotal; }
        else { $IngresosMenusual['facturados'] += $Ingreso->subtotal;  }
        $IngresosMenusual['ivatrasladado'] += $Ingreso->iva;$IngresosMenusual['total'] += $Ingreso->subtotal;
        $IngresosMenusual['conteo'] +=1;
      }
      //dd($IngresosMenusual);
      return $IngresosMenusual;
    }

    public function YearlyIncome($rfc, $year)
    {
      //dd('hola');
      /* VARIABLES */
      $ene=0;$feb=0;$mar=0;$abr=0;$jun=0;$jul=0;$ago=0;$sep=0;$oct=0;$nov=0;$dic=0;
      $ene = Ingresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-01-01', $year.'-01-31'])->sum('subtotal');
      $feb = Ingresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-02-01', $year.'-02-29'])->sum('subtotal');
      $mar = Ingresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-03-01', $year.'-03-31'])->sum('subtotal');
      $abr = Ingresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-04-01', $year.'-04-30'])->sum('subtotal');
      $may = Ingresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-05-01', $year.'-05-31'])->sum('subtotal');
      $jun = Ingresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-06-01', $year.'-06-30'])->sum('subtotal');
      $jul = Ingresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-07-01', $year.'-07-30'])->sum('subtotal');
      $ago = Ingresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-08-01', $year.'-08-31'])->sum('subtotal');
      $sep = Ingresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-09-01', $year.'-09-30'])->sum('subtotal');
      $oct = Ingresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-10-01', $year.'-10-31'])->sum('subtotal');
      $nov = Ingresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-11-01', $year.'-11-30'])->sum('subtotal');
      $dic = Ingresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-12-01', $year.'-12-31'])->sum('subtotal');
      //dd($ene);
      $YearlyIncome= array(
        'ene' => $ene, 'feb' => $feb, 'mar' => $mar,
        'abr' => $abr, 'may' => $may, 'jun' => $jun,
        'jul' => $jul, 'ago' => $ago, 'sep' => $sep,
        'oct' => $oct, 'nov' => $nov, 'dic' => $dic,
      );
      //dd($YearlyIncome);
      return $YearlyIncome;
    }

    public function YearIncome($rfc, $year)
    {
      return $YearIncome = Ingresos::where('rfc',$rfc)->whereBetween('fecha', [$year.'-01-01', $year.'-12-31'])->sum('subtotal');
    }

}
