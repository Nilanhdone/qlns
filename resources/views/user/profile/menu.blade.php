<div class="row">
    <div class="col-3">
        <div class="text-center mb-2">
            <img src="{{asset('img/avatar').'/'.$user->avatar}}" class="img-thumbnail" width="150px" height="150px">
        </div>
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pill-basic-tab" data-toggle="pill" href="#basic" role="tab" aria-controls="v-pill-basic" aria-selected="true">
            {{ trans('messages.profile.menu.basic') }}</a>
            <a class="nav-link" id="v-pill-work-tab" data-toggle="pill" href="#work" role="tab" aria-controls="v-pill-work" aria-selected="false">
            {{ trans('messages.profile.menu.work') }}</a>
        </div>
    </div>
    <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="v-pill-basic-tab">
                @include('user.profile.basic')
            </div>
            <div class="tab-pane fade" id="work" role="tabpanel" aria-labelledby="v-pill-work-tab">
                @include('user.profile.work')
            </div>
        </div>
    </div>
</div>