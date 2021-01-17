@extends('backend.layouts.app')

@section('content')

	@include('flash')

	<div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Companies</div>

                <div class="card-body">
                    <table class="table mb-2" id="companies-table">
                        <thead>
                            <tr>
                                <th scope="col" width="10">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Status</th>
                                <th scope="col">Jobs Posted</th>                                
                                <th scope="col">Total Recruiter</th>                                
                                <th scope="col">Registered At</th>
                                <th scope="col">Registered By</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach ($companies as $company)
                                <tr>
                                    <th scope="row" width="10">{{ $loop->iteration }}</th>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->address }}</td>
                                    <td>{{ $company->confirmed ? 'Confirmed' : 'Unconfirmed' }}</td>
                                    <td>{{ $company->jobs()->count() }}</td>
                                    <td>{{ $company->recruiters()->count() }}</td>
                                    <td>{{ formatDate($company->created_at) }}</td>
                                    <td>{{ $company->registrant ? $company->registrant->name : '' }}</td>
                                    <td>
                                        @if ($company->confirmed)
                                            <span class="badge badge-danger badge-action confirm-company" data-toggle="tooltip" data-placement="top" title="Unconfirm"> 
                                                <i class="fa fa-times"></i>
                                            </span>

                                            <form action="{{ route('backend.companies.unconfirmCompany', ['id' => $company->id]) }}" class="d-none" method="post">
                                                @csrf
                                            </form>
                                        @else
                                            <span class="badge badge-primary badge-action confirm-company" data-toggle="tooltip" data-placement="top" title="Confirm"> 
                                                <i class="fas fa-check"></i>
                                            </span>

                                            <form action="{{ route('backend.companies.confirmCompany', ['id' => $company->id]) }}" class="d-none" method="post">
                                                @csrf
                                            </form>                                        
                                        @endif
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
            $('#companies-table').DataTable()

            $('#companies-table').on('click', '.confirm-company', function() {
                $(this).next().submit()
            })
        })
    </script>

    <script src="{{ asset('js/my-datatables.js') }}"></script>
@endpush