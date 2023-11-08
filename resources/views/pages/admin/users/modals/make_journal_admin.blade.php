<!-- users/modals/make_journal_admin.blade.php -->

<div class="modal fade" id="makeJournalAdminModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="makeJournalAdminModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="makeJournalAdminModalLabel{{ $user->id }}">Make Admin: {{ $user->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add your form fields or confirmation message for making the user a journal admin here -->
                <p>Are you sure you want to make {{ $user->name }} a admin?</p>
                <form action="{{ route('users.makeJournalAdmin', $user->id) }}" method="post">
                    @csrf

                    <button type="submit" class="btn btn-success">Make Admin</button>
                </form>
            </div>
        </div>
    </div>
</div>
