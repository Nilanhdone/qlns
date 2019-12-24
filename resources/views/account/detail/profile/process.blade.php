@extends('account.detail.profile.profile')

@section('custom_css')
<style type="text/css">
</style>
@endsection

@section('component')
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{ trans('bank.create.from') }}</th>
                    <th scope="col">{{ trans('bank.create.to') }}</th>
                    <th scope="col">{{ trans('messages.register.branch') }}</th>
                    <th scope="col">{{ trans('messages.register.unit') }}</th>
                    <th scope="col">{{ trans('messages.register.position') }}</th>
                    <th scope="col">{{ trans('messages.register.salary') }}</th>
                    <th scope="col">{{ trans('messages.register.insurance') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($processs as $process)
                <tr>
                    <td>{{ $process->start_day }}</td>
                    <td>{{ $process->end_day }}</td>
                    <td>{{ trans('messages.branchs.'.$process->branch) }}</td>
                    <td>{{ trans('messages.units.'.$process->unit) }}</td>
                    <td>{{ trans('messages.positions.'.$process->position) }}</td>
                    <td>{{ $process->salary }}</td>
                    <td>{{ $process->insurance }}</td>
                    <td>
                        <a href="edit-{{ $process->id }}" class="badge badge-primary text-uppercase">
                            {{ trans('bank.create.edit') }}
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('custom_js')
<script type="text/javascript">
$("#menuList").find(".nav-link:eq(1)").attr("class", "nav-link active");
</script>
@endsection
