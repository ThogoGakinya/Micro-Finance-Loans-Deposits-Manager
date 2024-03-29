@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6" align="left">
                    <h5><a href="{{route('admin.users.index')}}" class="btn btn-success btn-xs" id="edit_goal"><i
                                class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Back</a>
                        Edit User
                    </h5>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="border-bottom: 0px solid;">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid winbox-white">
            <div class="tab-content" style="margin-top:16px;">
                <!--------------------------------- Page content begins here ------------------------->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h6><i class="fa fa-edit"></i> Edit User</h6>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form method="POST" action="{{ route("admin.users.update", [$user->id]) }}"
                                      enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label class="required" for="name">Name</label>
                                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                               type="text" name="name"
                                               id="name" value="{{ old('name', $user->name) }}" required>
                                        @if($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="required" for="email">Email</label>
                                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                               type="email"
                                               name="email" id="email" value="{{ old('email', $user->email) }}"
                                               required>
                                        @if($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="required" for="password">Password</label>
                                        <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                               type="password"
                                               name="password" id="password">
                                        @if($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Account</label>
                                        <select class="form-control" name="account_id">
                                            @if(empty($user->account_id))
                                                <option value="">Please assign an Account</option>
                                            @else
                                                <option
                                                    value="{{$user->account_id}}">{{$user->account->account_name}}</option>
                                            @endif
                                            @foreach($accounts as $account)
                                                <option value="{{$account->id}}">{{$account->account_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                {{--<div class="form-group">
                                    <label for="photo">Profile Photo</label>
                                    <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                                    </div>
                                    @if($errors->has('photo'))
                                        <span class="text-danger">{{ $errors->first('photo') }}</span>
                                    @endif
                                </div>--}}
                                <div class="form-group">
                                    <label for="mobile_number">Mobile Number</label>
                                    <input class="form-control {{ $errors->has('mobile_number') ? 'is-invalid' : '' }}"
                                           type="text" name="mobile_number" id="mobile_number"
                                           value="{{ old('mobile_number', $user->mobile_number) }}">
                                    @if($errors->has('mobile_number'))
                                        <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="national">National ID</label>
                                    <input class="form-control {{ $errors->has('national') ? 'is-invalid' : '' }}"
                                           type="text" name="national" id="national"
                                           value="{{ old('national', $user->national) }}">
                                    @if($errors->has('national'))
                                        <span class="text-danger">{{ $errors->first('national') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="required" for="roles">Roles</label>
                                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                              style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                        <span class="btn btn-info btn-xs deselect-all"
                                              style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                                    </div>
                                    <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}"
                                            name="roles[]"
                                            id="roles" multiple required>
                                        @foreach($roles as $id => $roles)
                                            <option
                                                value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('roles'))
                                        <span class="text-danger">{{ $errors->first('roles') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-secondary" type="submit">
                                        {{ trans('global.save') }}
                                    </button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!--------------------------------- Page content ends here---------------------------->
                </div> <!-- end of tab-content-->
            </div><!--container-fluid -->
    </section>
@endsection

@section('scripts')
    <script>
        Dropzone.options.photoDropzone = {
            url: '{{ route('admin.users.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
                width: 4096,
                height: 4096
            },
            success: function (file, response) {
                $('form').find('input[name="photo"]').remove()
                $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="photo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($user) && $user->photo)
                var file = {!! json_encode($user->photo) !!}
                    this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.preview)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection
