@extends('layouts.dashboard')

@section('page-pretitle', 'Your Information')
@section('page-title', 'Edit Your Profile')

@section('content')
<div class="content">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update Profile Settings</h3>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first() }}
                        </div>
                        @endif

                        @if(session('status') == 'two-factor-authentication-enabled')
                        {{-- Show SVG QR Code, After Enabling 2FA --}}
                        <div class="alert alert-success" id="enable2fa">
                            <p class="mb-2">
                                {{ __('Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application.') }}
                            </p>
                            <div>{!! auth()->user()->twoFactorQrCodeSvg() !!}</div>
                        </div>
                        <style>
                            #enable2fa svg {
                                border: 10px solid #fff;
                            }
                        </style>
                        @endif

                        <div class="row mb-3">
                            <div class="col-2 text-center m-auto">
                                <span
                                    style="--tblr-avatar-size: 8rem; background-image: url(@if (Auth::user()->avatar) {{ asset('storage/avatars/'.Auth::user()->avatar) }} @else https://api.proxeuse.com/avatars/api/?name={{ urlencode(Auth::user()->name) }}&color=fff&background={{ substr(md5(Auth::user()->name), 0, 6) }}&size=500 @endif)"
                                    class="avatar avatar-xl"></span>
                            </div>
                            <div class="col-10">
                                <form enctype="multipart/form-data" action="{{ route('profile.avatar') }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <div class="form-label">Upload your own Profile Picture</div>
                                        <input type="file" name="avatar" class="form-control"
                                            accept=".png,.jpg,.jpeg,.gif,.webp">
                                        <small class="form-hint">We recommend uploading a image with a min width of
                                            200px and a max width of 1000px. Only png, jpg, gif and webp files are
                                            allowed.</small>
                                    </div>
                                    <input type="submit" class="btn btn-primary">
                                    <button class="btn btn-danger"
                                        onclick="event.preventDefault(); $('#deleteAvatarForm').submit()">Delete Profile
                                        Picture</button>

                                </form>
                            </div>
                            <form action="{{ route('profile.deleteavatar') }}" method="post" id="deleteAvatarForm">
                                @csrf
                                @method('DELETE')
                            </form>

                        </div>

                        <hr>

                        <form method="POST" action="{{ route('user-profile-information.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name') ?? auth()->user()->name }}" required autofocus
                                    autocomplete="name" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('Email') }}</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email') ?? auth()->user()->email }}" required autofocus />
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">
                                    Update Profile
                                </button>
                            </div>
                        </form>

                        <hr>

                        <h2>{{ __('Active Sessions') }}</h2>

                        <div class="table-responsive">
                            <table class="table table-vcenter datatable">
                                <thead>
                                    <tr>
                                        <th>User Agent</th>
                                        <th>IP Address</th>
                                        <th>Last Activity</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($devices as $device)
                                    <tr>
                                        <td>{{ $device->user_agent }}</td>
                                        <td>
                                            {{ $device->ip_address }}
                                        </td>
                                        <td>
                                            {{ Carbon\Carbon::createFromTimestamp($device->last_activity)->locale(str_replace('_', '-', app()->getLocale()))->diffForHumans() }}
                                        </td>
                                        <td>
                                            @if(\Session::getId() == $device->id)
                                            <button disabled="disabled" class="btn btn-primary">Current Device</button>
                                            @else
                                            <form action="{{ route('profile.deletedevice', ['id' => $device->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger" value="Remove" />
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <hr>

                        <form method="POST" action="{{ route('user-password.update') }}">
                            @csrf
                            @method('PUT')

                            <h2>{{ __('Change Password') }}</h2>

                            <div class="mb-3">
                                <label class="form-label">{{ __('Current Password') }}</label>
                                <input type="password" name="current_password" class="form-control" required
                                    autocomplete="current-password" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('New Password') }}</label>
                                <input type="password" name="password" class="form-control" required
                                    autocomplete="new-password" />
                            </div>

                            <div class="mb-3">
                                <label>{{ __('Confirm New Password') }}</label>
                                <input type="password" name="password_confirmation" class="form-control" required
                                    autocomplete="new-password" />
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </form>

                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::twoFactorAuthentication()))
                        <hr>
                        <h2>{{ __('Two Factor Authentication') }}</h2>
                        @include('profile.two-factor-authentication-form')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
