@extends('layouts.vertical')
@section('title', 'Contabilidad')
@section('section', 'editegreso')

@section('content')
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="pt-5">

        <form class="col-12" method="POST" action="{{ route('conta.update.egreso', ['rfc' => $rfc,'id' => $egreso->id]) }}">

          @include('nexus.conta.partials.add_egreso')
        </form>

      </div>

    </div>
  </div>
</div>
@endsection
