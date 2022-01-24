@extends('layouts.default')

{{-- Page title --}}
@section('title') Dashboard
    @parent
@stop

{{-- Page content --}}
@section('content')


    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">2 tests for IEL.</li>
            </ol>
        </div>
    </main>


@stop
