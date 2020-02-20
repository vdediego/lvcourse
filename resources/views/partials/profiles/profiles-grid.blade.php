<div class="pr-body">
    <div class="app">
        <ul class="hs">
            @foreach($profiles as $profile)
                <li class="item">
                    <a href="{{ route('profile.show', $profile->user) }}"><img src="{{ $profile->profileImage() }}" class="profile-image" ></a>
                    <follow-button class="pt-2 mr-4" user-id="{{ $profile->user()->getResults()['id'] }}"
                                   follows="{{ (auth()->user()) ? auth()->user()->following->contains($profile->user->id) : false }}"></follow-button>
                </li>
            @endforeach
        </ul>
    </div>
</div>
