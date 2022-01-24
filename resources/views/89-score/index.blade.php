@extends('layouts.default')

{{-- Page title --}}
@section('title') 89 Score
    @parent
@stop

{{-- Page content --}}
@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">89-Score</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">2 tests for IEL.</li>
            </ol>
        </div>
    </main>

    <div class="container">
        <div class="card">
            <div class="card-header">The 89 Score Card</div>
            <div class="card-body">
                <p><strong>Problem:</strong> How many starting numbers below one hundred thousand (100,000) will arrive at 89?

                    <br><strong>Answer:</strong> {{ $obj->numChainScore(100000) }} .</p>

                <hr>

                <p>To help you check the solution, the default starting here is 1,000 which will render 857. </br>But, feel free to enter any number to see the 89 Scorecard.</p>

                <p>
                    <form action="" method="POST">
                        @csrf
                        <label for="custom_start_number"><span>Starting Numbers:</span> <input type="number" name="custom_start_number" id="custom_start_number" value="<?php echo ((isset($_POST["custom_start_number"])) ? ($_POST["custom_start_number"]) : ($default)); ?>" required></label><button type="submit">Try</button>
                    </form>
                </p>

                <p><strong>Answer:</strong> {{ $answer ?? $obj->numChainScore($default) }}</p>
            </div>
        </div>
    </div>



@stop
