@extends('layouts.vertical')
@section('title', 'Tareas')
@section('section', 'tareasindex')

@section('content')

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title fnt26 text-uppercase fntB">Tareas</h4>
                {{--
                <div class="state-information d-none d-sm-block">
                    <div class="state-graph">
                        <div id="header-chart-1"></div>
                        <div class="info">Balance $ 2,317</div>
                    </div>
                    <div class="state-graph">
                        <div id="header-chart-2"></div>
                        <div class="info">Item Sold 1230</div>
                    </div>
                </div>
                --}}
            </div>
        </div>
      </div>
      <!-- end row -->
      <div class="page-content-wrapper">
        <div class="card p-4">
          <div class="row">
            <div class="col-6 col-md-4 col-xl-3">
              <span class="fntB fnt26 fnt_blue"> <strong>VISTA: </strong></span>
              <a data-toggle="collapse" class="btn btn-primary" id="cardbtn" data-toggle="tooltip" title="Vista en bloques">
                <i class="fas fa-2x fa-th"></i>
              </a>
              <a data-toggle="collapse" class="btn btn-primary" id="listbtn" data-toggle="tooltip" title="Vista en lista">
                <i class="fas fa-2x fa-th-list"></i>
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2 align-middle">
              <a href="{{ route('tareas.create') }}" class="btn btn-block btn-sm btn-primary align-middle">AGREGAR TAREA</a>
            </div>
          </div>
        </div>
        <div class="" id="CollapseList">
          <div class="card p-3 table-responsive">
            <table id="TareaTable" class="table table-sm table-striped">
              <thead class="bg-primary fnt_white">
                <tr>
                  <th class="text-uppercase fntB fnt16">SECCION</th>
                  <th class="text-uppercase fntB fnt16">PRIORIDAD</th>
                  <th class="text-uppercase fntB fnt16">TAREA</th>
                  <th class="text-uppercase fntB fnt16">ASIGNACION</th>
                  <th class="text-uppercase fntB fnt16">FECHA LIMITE</th>
                  <th class="text-uppercase fntB fnt16">CREADA POR</th>
                  <th class="text-uppercase fntB fnt16">ACCIONES</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tareas as $tarea)
                <?php
                $creador = $tarea->Creador();
                $asignado = $tarea->Asignado();
                 ?>
                 <tr>
                   @switch($tarea->departamento)
                     @case(1)
                     <td><span class="fnt14 badge badge-pill task-type-1">ENTREGA</span></td>
                     @break
                     @case(2)
                     <td><span class="fnt14 badge badge-pill task-type-2">CONTABILIDAD</span></td>
                     @break
                     @case(3)
                     <td><span class="fnt14 badge badge-pill task-type-3">RECURSOS HUMANOS</span></td>
                     @break
                     @case(4)
                     <td><span class="fnt14 badge badge-pill task-type-4">PAGOS</span></td>
                     @break
                     @case(5)
                     <td><span class="fnt14 badge badge-pill task-type-5">COBRANZA</span></td>
                     @break
                     @case(6)
                     <td><span class="fnt14 badge badge-pill task-type-6">VENTAS</span></td>
                     @break
                     @case(7)
                     <td><span class="fnt14 badge badge-pill task-type-7">MATERIALES</span></td>
                     @break
                     @case(8)
                     <td><span class="fnt14 badge badge-pill task-type-8">MARKETING</span></td>
                     @break
                     @case(9)
                     <td><span class="fnt14 badge badge-pill task-type-9">MISCELANEO</span></td>
                     @break
                     @default
                     Default case...
                   @endswitch
                   @switch($tarea->importancia)
                       @case(1)
                           <td><span class="fnt14 badge circle-priority-1">1</span></td>
                           @break
                       @case(2)
                           <td><span class="fnt14 badge circle-priority-2">2</span></td>
                           @break
                       @case(3)
                           <td><span class="fnt14 badge circle-priority-3">3</span></td>
                           @break
                       @case(4)
                           <td><span class="fnt14 badge circle-priority-4">4</span></td>
                           @break
                       @case(5)
                           <td><span class="fnt14 badge circle-priority-5">5</span></td>
                           @break
                       @default
                           Default case...
                   @endswitch
                   <td class="text-uppercase fnt14 fnt_dgrey">{{ $tarea->tarea }}</td>
                   <td class="text-uppercase fnt14 fnt_dgrey">{{ $asignado }}</td>
                   @if($tarea->fechalimite != null)
                   <td class="text-uppercase fnt14 fnt_dgrey">{{ date_format($tarea->fechalimite,"d/m/Y") }}</td>
                   @else
                   <td class="text-uppercase fnt14 fnt_dgrey">--</td>
                   @endif
                    <td class="text-uppercase fnt14 fnt_dgrey">{{ $creador }}</td>
                    <td>
                      <a href="{{  route('tareas.edit', ['id' => $tarea->id]) }}" class="btn btn-sm  btn-outline-warning fnt14"><i class="fas fa-pencil-alt"></i></a>
                      <a href="" class="btn btn-sm  btn-outline-danger fnt14"  data-toggle="modal" data-target="#Delete{{$loop->index}}Modal"><i class="fas fa-trash-alt"></i></a>
                    </td>
                 </tr>
                 {{-- DELETE GROUP MODAL --}}
                 <div class="modal fade" id="Delete{{$loop->index}}Modal" tabindex="-1" role="dialog" aria-labelledby="Delete{{$loop->index}}ModalLabel" aria-hidden="false">
                   <div class="modal-dialog" role="document">
                     <div class="modal-content">
                       <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel text-success">Marcar tarea como terminada?</h5>
                         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">×</span>
                         </button>
                       </div>
                       <div class="modal-body text-danger">Esto marcara la tarea como terminada</div>
                       <div class="modal-footer">
                         <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                         <a href="{{ route('tareas.clear', ['id' => $tarea->id]) }}" class="btn btn-danger"> Terminar</a>
                       </div>
                     </div>
                   </div>
                 </div>
                 {{-- END MODAL --}}
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
        <div class="collapse" id="CollapseCard">
          <?php $i=0; ?>
          @foreach($tareas as $tarea)

          <?php
          $creador = $tarea->Creador();
          $asignado = $tarea->Asignado();
           ?>


              @if ($i == 0)
              <div class="card-deck">
              @endif

                <div class="card mb-3">
                  @switch($tarea->departamento)
                      @case(1)
                          <div class="card-header task-type-1 tarea-hwl">
                          @break
                      @case(2)
                          <div class="card-header task-type-2 tarea-hwl">
                          @break
                      @case(3)
                          <div class="card-header task-type-3 tarea-hwl">
                          @break
                      @case(4)
                          <div class="card-header task-type-4 tarea-hwl">
                          @break
                      @case(5)
                          <div class="card-header task-type-5 tarea-hwl">
                          @break
                      @case(6)
                          <div class="card-header task-type-6 tarea-hwl">
                          @break
                      @case(7)
                          <div class="card-header task-type-7 tarea-hwl">
                          @break
                      @case(8)
                          <div class="card-header task-type-8 tarea-hwl">
                          @break
                      @case(9)
                          <div class="card-header task-type-9 tarea-hwl">
                          @break

                      @default
                          Default case...
                  @endswitch

                  </div>
                  <div class="card-title p-2">
                    <div class="row ">
                      <div class="col-8">
                        @switch($tarea->departamento)
                          @case(1)
                          <span class="mt-2 fnt14 badge badge-pill task-type-1">ENTREGA</span>
                          @break
                          @case(2)
                          <span class="mt-2 fnt14 badge badge-pill task-type-2">CONTABILIDAD</span>
                          @break
                          @case(3)
                          <span class="mt-2 fnt14 badge badge-pill task-type-3">RECURSOS HUMANOS</span>
                          @break
                          @case(4)
                          <span class="mt-2 fnt14 badge badge-pill task-type-4">PAGOS</span>
                          @break
                          @case(5)
                          <span class="mt-2 fnt14 badge badge-pill task-type-5">COBRANZA</span>
                          @break
                          @case(6)
                          <span class="mt-2 fnt14 badge badge-pill task-type-6">VENTAS</span>
                          @break
                          @case(7)
                          <span class="mt-2 fnt14 badge badge-pill task-type-7">MATERIALES</span>
                          @break
                          @case(8)
                          <span class="mt-2 fnt14 badge badge-pill task-type-8">MARKETING</span>
                          @break
                          @case(9)
                          <span class="mt-2 fnt14 badge badge-pill task-type-9">MISCELANEO</span>
                          @break
                          @default
                          Default case...
                        @endswitch
                      </div>
                      <div class="col-4 circle">
                        <span class="text-muted align-middle">Prioridad:</span>
                        @switch($tarea->importancia)
                            @case(1)
                                <span class="align-middle fnt18 circle circle-priority-1">1</span>
                                @break
                            @case(2)
                                <span class="align-middle fnt18 circle circle-priority-2">2</span>
                                @break
                            @case(3)
                                <span class="align-middle fnt18 circle circle-priority-3">3</span>
                                @break
                            @case(4)
                                <span class="align-middle fnt18 circle circle-priority-4">4</span>
                                @break
                            @case(5)
                                <span class="align-middle fnt18 circle circle-priority-5">5</span>
                                @break
                            @default
                                Default case...
                        @endswitch
                      </div>
                    </div>
                  </div>
                  <div class="card-body fnt_black">
                    {{ $tarea->tarea }}
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-6">
                        <p>Fecha limite</p>
                        @if($tarea->fechalimite != null)
                        <p><span class="badge badge-pill badge-dark"> {{ date_format($tarea->fechalimite,"d/m/Y") }} </span></p>
                        @else
                        <p><span class="badge badge-pill badge-dark"> -- </span></p>
                        @endif
                      </div>
                      <div class="col-6">
                        <p><span class="text-muted">ASIGNADA A: </span> </p>
                        <p><span>{{ $asignado }}</span></p>

                      </div>

                    </div>
                    {{-- $tarea->estatus --}}
                  </div>
                  <div class="card-footer footer-hwk">
                    <div class="row">
                      <div class="col-12 col-lg-8">
                        <span class="text-muted">CREADA POR: </span> <span>{{ $creador }}</span>
                      </div>
                      <div class="col-6 col-lg-2">
                        <a href="{{  route('tareas.edit', ['id' => $tarea->id]) }}" class="btn btn-sm btn-block btn-outline-warning fnt14"><i class="fas fa-pencil-alt"></i></a>
                      </div>
                      <div class="col-6 col-lg-2">
                        <a href="" class="btn btn-sm btn-block btn-outline-danger fnt14"  data-toggle="modal" data-target="#Delete{{$loop->index}}CardModal"><i class="fas fa-trash-alt"></i></a>
                      </div>
                    </div>
                  </div>
                </div>

              @if ($i == 2)
              </div>
              @endif

              <?php
              if ($i == 2) { $i=0;}
              else {
                $i += 1;
              }
              ?>
              {{-- DELETE GROUP MODAL --}}
              <div class="modal fade" id="Delete{{$loop->index}}CardModal" tabindex="-1" role="dialog" aria-labelledby="Delete{{$loop->index}}CardModalLabel" aria-hidden="false">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel text-success">Marcar tarea como terminada?</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body text-danger">Esto marcara la tarea como terminada</div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                      <a href="{{ route('tareas.clear', ['id' => $tarea->id]) }}" class="btn btn-danger"> Terminar</a>
                    </div>
                  </div>
                </div>
              </div>
              {{-- END MODAL --}}
          @endforeach
        </div>



      </div>

    </div>
  </div>
</div>

@endsection
