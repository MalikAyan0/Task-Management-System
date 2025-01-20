@extends('layouts.app')
@section('title', 'Change Password')
@section('header')
    Change Password
@endsection
@section('content')

    <div class="content">
        <h2>Change Your Password</h2>
        <div class="task-list">
            <form id="updatePasswordForm" class="task-form" action="{{ route('password.update') }}" method="POST">
                @csrf
                @method('POST')

                <div class="task">
                    <div class="task-info">
                        <label for="email"><strong>Email</strong></label>
                        <input type="email" id="email" name="email"
                            value="{{ auth()->check() ? auth()->user()->email : '' }}" readonly class="form-control"><br>

                        <label for="new-password"><strong>New Password</strong></label>
                        <input type="password" name="new-password" class="form-control">
                        @error('new-password')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <br>

                        <label for="confirm-password"><strong>Confirm Password</strong></label>
                        <input type="password" id="confirm-password" name="new-password_confirmation" class="form-control">
                        @error('new-password_confirmation')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <br>

                        <button type="submit" class="add-task-btn">Update Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
