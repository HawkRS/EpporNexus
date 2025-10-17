@extends('layouts.vertical')
@section('title', 'Contabilidad')
@section('section', 'editingreso')

@section('content')
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="pt-5">

        <form class="col-12" method="POST" action="{{ route('conta.update.ingreso', ['rfc' => $rfc,'id' => $ingreso->id]) }}">

          @include('nexus.conta.partials.add_ingreso')
        </form>

      </div>

    </div>
  </div>
</div>
@endsection
