@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Kamu telah masuk!

                    <iframe width="100%" height="520" frameborder="0" src="https://akhmadali5.carto.com/builder/9621eb25-6995-443c-8219-4f32a0ac1d7d/embed" allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
