@extends('layouts.vertical', ['title' => 'Todo'])


@section('css')
@vite(['node_modules/sweetalert2/dist/sweetalert2.min.css'])
@endsection

@section('content')
@include('layouts.partials.page-title', ['subtitle' => 'Apps', 'title' => 'Todo'])
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h5 id="todo-message" class="mt-0 fw-semibold"><span id="todo-remaining"></span> of <span
                                id="todo-total"></span> remaining</h5>
                    </div>
                    <div class="col-sm-6">
                        <a href="" class="float-end btn btn-primary btn-sm waves-effect waves-light"
                            id="btn-archive">Archive</a>
                    </div>
                </div>

                <form name="todo-form" id="todo-form" class="mt-4">
                    <div class="row">
                        <div class="col-sm-9 todo-inputbar">
                            <input type="text" id="todo-input-text" name="todo-input-text" class="form-control"
                                placeholder="Add new todo">
                        </div>
                        <div class="col-sm-3 todo-send">
                            <button class="btn-primary btn-md btn-block btn waves-effect waves-light w-100"
                                type="button" id="todo-btn-submit">Add</button>
                        </div>
                    </div>
                </form>

                <ul class="list-group mt-4 todo-list mb-0" id="todo-list"></ul>
            </div>
        </div>
    </div><!-- end col -->
</div>
<!-- end row -->
@endsection

@section('scripts')
@vite(['resources/js/pages/jquery.todo.js'])
@endsection