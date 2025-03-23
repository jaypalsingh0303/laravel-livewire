<div>
    <div class="card card-body mt-4 w-50 m-auto" wire:poll>

        <input type="search" name="search" wire:model='search' wire:keyup="set('search', $event.target.value)"
            placeholder="Search" class="form-control w-50 mb-1" />

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($users && count($users) > 0)

                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm" wire:click='delete("{{ $user->id }}")'
                                        wire:confirm='Are you sure do you want to delete?'>
                                        Delete
                                    </button>
                                    <button class="btn btn-primary btn-sm" wire:click='download("{{ $user->id }}")'>
                                        Download
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>No data found...</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div>
            {{ $users->links() }}
        </div>
    </div>
</div>
