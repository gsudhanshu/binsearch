@extends('layouts.app')

@section('content')
<div class="container">
    @isset($message)
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
    @endisset
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Binary Search</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('search') }}">
                    @csrf

                        <div class="form-group row">
                            <label for="arr" class="col-md-4 col-form-label text-md-right">{{ __('Comma Separated Values') }}</label>

                            <div class="col-md-6">
                                <input id="arr" type="text" class="form-control @error('arr') is-invalid @enderror" name="arr" value="{{ old('arr') }}" placeholder="1,2,3" autofocus>

                                @error('arr')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="srch_element" class="col-md-4 col-form-label text-md-right">{{ __('Search Element') }}</label>

                            <div class="col-md-6">
                                <input id="srch_element" type="text" class="form-control @error('srch_element') is-invalid @enderror" name="srch_element" value="{{ old('srch_element') }}" placeholder="1">

                                @error('srch_element')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Search') }}
                                </button>
                            </div>
                        </div>
                    </form>             
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
