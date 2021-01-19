@extends('backend.layouts.app')

@section('content')

	@include('flash')

	<div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Applied Jobs</div>

                <div class="card-body">
                    <table class="table mb-2" id="applied-jobs-table">
                        <thead>
                            <tr>
                                <th scope="col" width="10">#</th>
                                <th scope="col">Company</th>
                                <th scope="col">Job Name</th>
                                <th scope="col">Recruiter Name</th>
                                <th scope="col">Recruiter Phone</th>
                                <th scope="col">Applicant Name</th>
                                <th scope="col">Applicant Phone</th>
                                <th scope="col">Applied At</th>                                
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach ($appliedJobs as $appliedJob)
                                <tr>
                                    <th scope="row" width="10">{{ $loop->iteration }}</th>
                                    <td>{{ $appliedJob->job->company->name }}</td>
                                    <td>{{ $appliedJob->job->name }}</td>

                                    @php
                                        $recruiter = $appliedJob->job->recruiter->user;
                                    @endphp

                                    <td>{{ $recruiter->getFullName() }}</td>
                                    <td>{{ $recruiter->phone_number }}</td>
                                    <td>{{ $appliedJob->user->getFullName() }}</td>
                                    <td>{{ $appliedJob->user->phone_number }}</td>
                                    <td>{{ formatDate($appliedJob->created_at) }}</td>
                                    <td>
                                        <a href="{{ Storage::url($appliedJob->cv_path) }}" target="_blank">
                                            <span class="badge badge-info badge-action" data-toggle="tooltip" data-placement="top" title="View Applicant CV"> 
                                                <i class="fas fa-eye"></i>
                                            </span>                                            
                                        </a>

                                        <span class="badge badge-danger badge-action remove-applied-job" data-toggle="tooltip" data-placement="top" title="Remove"> 
                                            <i class="far fa-trash-alt"></i>
                                        </span>

                                        <form action="{{ route('backend.appliedJobs.destroy', ['id' => $appliedJob->id]) }}" class="d-none" method="post">
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
            $('#applied-jobs-table').DataTable()

            $('#applied-jobs-table').on('click', '.remove-applied-job', function() {
                $(this).next().submit()
            })
        })
    </script>

    <script src="{{ asset('js/my-datatables.js') }}"></script>
@endpush