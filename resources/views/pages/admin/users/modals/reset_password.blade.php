<!-- users/modals/reset_password.blade.php -->

<div class="modal fade" id="resetPasswordModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="resetPasswordModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resetPasswordModalLabel{{ $user->id }}">Reset Password: {{ $user->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add your form fields for resetting the password here -->
                <!-- For example, you can have an input field for the new password -->
                <form action="{{ route('users.resetPassword', $user->id) }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>

                    <button type="submit" class="btn btn-warning">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
