@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-primary text-uppercase">
        {{ trans('messages.multiple-search.header') }}
    </div>

    <div class="card-body">
        <form method="get" action="{{ route('multiple-search-detail') }}" id="multiple-search">
            @csrf

            <div class="form-group col">
                <div class="form-group row">
                    <!-- Name -->
                    <label class="col-3 col-form-label text-md-right">
                        {{ trans('messages.multiple-search.name') }}
                    </label>

                    <div class="col-6">
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>

                <div class="form-group row">
                    <!-- Degree -->
                    <label class="col-3 col-form-label text-md-right">
                        {{ trans('messages.register.degree') }}
                    </label>

                    <div class="col-6">
                        <select class="btn btn-outline border border-primary" name="degree" form="multiple-search">
                            <option value="bachelor">{{ trans('messages.degree.bachelor') }}</option>
                            <option value="engineer">{{ trans('messages.degree.engineer') }}</option>
                            <option value="master">{{ trans('messages.degree.master') }}</option>
                            <option value="post-doctor">{{ trans('messages.degree.post-doctor') }}</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <!-- Work unit -->
                    <label class="col-3 col-form-label text-md-right">
                        {{ trans('messages.register.unit') }}
                    </label>

                    <div class="col-6">
                        <select class="btn btn-outline border border-primary" name="unit" form="multiple-search">
                            @foreach($units as $unit)
                            <option value="{{ $unit->unit }}">
                                {{ trans('messages.branchs.'.$unit->branch) }} / {{ trans('messages.units.'.$unit->unit) }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ trans('messages.multiple-search.button') }}
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="card-body">
        <section>
            @yield('search-detail')
        </section>
    </div>
</div>
@endsection