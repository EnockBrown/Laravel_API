@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Please Verify') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('verify') }}">
                        @csrf


                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('code') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control @error('code') is-invalid @enderror" name="code" required autocomplete="current-code">

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $code }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Verify') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="#">Resend Code</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
