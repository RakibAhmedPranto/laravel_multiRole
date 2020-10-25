@extends('backend.layouts.master')

@section('title')
Role Edit - Admin Panel
@endsection

@section('styles')

@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Role Edit - {{ $role->name}}</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                    <li><span>Edit Role</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Edit Role</h4>
                    @include('backend.layouts.partials.messages')

                    <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">Role Name</label>
                        <input type="text" class="form-control" value="{{ $role->name}}" id="name" name="name" placeholder="Enter a Role Name">
                        </div>

                        <div class="form-group">
                            <label for="name">Permissions</label>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input"  id="checkPermissionAll" value="">
                                    <label class="form-check-label" for="checkPermissionAll">All</label>
                                </div>
                                <hr>
                            @foreach ($permissions as $permission)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="permissions[]" {{ $role->hasPermissionTo($permission->name) ? 'checked' : ''}} id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                            @endforeach
                        </div>


                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Role</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->

    </div>
</div>
@endsection


@section('scripts')
     <script>
         $("#checkPermissionAll").click(function(){
             if($(this).is(':checked')){
                $('input[type=checkbox]').prop('checked',true);
             }
             else{
                $('input[type=checkbox]').prop('checked',false);
             }
         })
     </script>
@endsection
