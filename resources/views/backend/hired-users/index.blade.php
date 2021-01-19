@extends('backend.layouts.app')

@section('content')

	@include('flash')

	<div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Hired Users</div>

                <div class="card-body">
                    <table class="table mb-2" id="hired-users-table">
                        <thead>
                            <tr>
                                <th scope="col" width="10">#</th>
                                <th scope="col">Recruiter Name</th>
                                <th scope="col">Recruiter Phone</th>
                                <th scope="col">Applicant Name</th>
                                <th scope="col">Applicant Phone</th>
                                <th scope="col">Hired At</th>                                
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach ($hiredUsers as $hiredUser)
                                <tr>
                                    <th scope="row" width="10">{{ $loop->iteration }}</th>
                                    <td>{{ $hiredUser->recruiter->user->getFullName() }}</td>
                                    <td>{{ $hiredUser->recruiter->user->phone_number }}</td>
                                    <td>{{ $hiredUser->user->getFullName() }}</td>
                                    <td>{{ $hiredUser->user->phone_number }}</td>
                                    <td>{{ formatDate($hiredUser->created_at) }}</td>
                                    <td>
                                        <span class="badge badge-danger badge-action remove-hired-user" data-toggle="tooltip" data-placement="top" title="Remove"> 
                                            <i class="far fa-trash-alt"></i>
                                        </span>

                                        <form action="{{ route('backend.hiredUsers.destroy', ['id' => $hiredUser->id]) }}" class="d-none" method="post">
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
            $('#hired-users-table').DataTable()

            $('#hired-users-table').on('click', '.remove-hired-user', function() {
                $(this).next().submit()
            })
        })
    </script>

    <script src="{{ asset('js/my-datatables.js') }}"></script>
@endpush