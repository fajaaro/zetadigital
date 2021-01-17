@extends('backend.layouts.app')

@push('styles')
	<style type="text/css">
		.role-column:first-letter {
	        text-transform: capitalize;
		}
	</style>
@endpush

@section('content')

	@include('flash')

	<div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    <table class="table mb-2" id="users-table">
                        <thead>
                            <tr>
                                <th scope="col" width="10">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Role</th>
                                <th scope="col">Applied Jobs</th>                                
                                <th scope="col">Registered At</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach ($users as $user)
                                <tr>
                                    <th scope="row" width="10">{{ $loop->iteration }}</th>
                                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone_number }}</td>
                                    <td class="role-column">{{ $user->role_name }}</td>
                                    <td>{{ $user->appliedJobs()->count() }}</td>
                                    <td>{{ formatDate($user->created_at) }}</td>
                                    <td>
                                        <span class="badge badge-danger badge-action remove-user" data-toggle="tooltip" data-placement="top" title="Remove"> 
                                            <i class="far fa-trash-alt"></i>
                                        </span>

                                        <form action="{{ route('backend.users.destroy', ['id' => $user->id]) }}" class="d-none" method="post">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                        	@endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable()

            $('#users-table').on('click', '.remove-user', function() {
                $(this).next().submit()
            })
        })
    </script>

    <script src="{{ asset('js/my-datatables.js') }}"></script>
@endpush