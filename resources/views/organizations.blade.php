@extends('layouts.app')

@section('content')
<script>
$(document).ready(function() {
    $('#organizations').DataTable({
    "aoColumnDefs": [
            { "bSortable": false, "aTargets": [5]},
     ],
    });
});
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Organizations</div>
                <div class="card-body">
                    <table id="organizations" class="display">
                        <thead>
                            <tr>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Valid till</th>
                            <th>Subdomain</th>
                            <th>Database</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($orgs as $org)
                        <tr>
                            <td>{{ $org->name }}</td>
                            <td>{{ $org->contact }}</td>
                            <td>{{ $org->valid_till }}</td>
                            <td>{{ $org->subdomain }}</td>
                            <td>{{ $org->db }}</td>
                            <td>
                            <a href="/org/{{ $org->id }}/edit"><img class="icon" src="/i/pencil-edit-button.png" /></a>
                            <a href="/org/{{ $org->id }}/delete"><img class="icon" src="/i/trash.png" /></a>
                            </td>    
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
