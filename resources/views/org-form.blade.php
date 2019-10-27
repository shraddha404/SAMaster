@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/">Home</a> :: <a href="/organizations">Organizations</a> :: Organization form</div>
                <div class="card-body">
                    <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                        @endif
                    @endforeach
                    </div>

                   <form method="post" action="/org/save">
                    @csrf()
                    <input type="hidden" name="org_id" value="{{ $org->id }}" />
                   <div class="form-group row">
                   <label for="org_name" class="col-md-4 col-form-label text-md-right">Name</label> 
                    <div class="col-md-6">
                    <input type="text" name="org_name" id="org_name" class="form-control" placeholder="Name of the entity/organization" value="{{ $org->name }}" />
                    </div>
                   </div>
                   <div class="form-group row">
                   <label for="email" class="col-md-4 col-form-label text-md-right">Contact email</label> 
                    <div class="col-md-6">
                    <input type="text" name="email" id="email" class="form-control" placeholder="Contact email" value="{{ $org->email }}" />
                    </div>
                   </div>
                   <div class="form-group row">
                   <label for="valid_till" class="col-md-4 col-form-label text-md-right">Valid Till</label> 
                    <div class="col-md-6">
                    <input type="date" name="valid_till" id="valid_till" class="form-control" placeholder="Valid Till" value="{{ $org->valid_till }}" />
                    </div>
                   </div>
                   <div class="form-group row">
                   <label for="subdomain" class="col-md-4 col-form-label text-md-right">Subdomain</label> 
                    <div class="col-md-6">
                    <input type="text" name="subdomain" id="subdomain" class="form-control" placeholder="Subdomain" value="{{ $org->subdomain }}" />
                    </div>
                   </div>
                   <div class="form-group row">
                   <label for="db" class="col-md-4 col-form-label text-md-right">Database</label> 
                    <div class="col-md-6">
                    <input type="text" name="db" id="db" class="form-control" placeholder="Database name" value="{{ $org->db }}" @if($org->id) disabled @endif/>
                    </div>
                   </div>
                
                   <div class="form-group row mb-0"><div class="col-md-8 offset-md-4"><button type="submit" class="btn btn-primary">
                                    Save
                                </button> 
                     </div></div> 
                   </form> 
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
