@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
           Edit Minutes
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.minutes.update", [$minute->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="minutes_date">Minutes Date</label>
                    <input class="form-control date {{ $errors->has('minutes_date') ? 'is-invalid' : '' }}" type="text" name="minutes_date" id="minutes_date" value="{{ old('minutes_date', $minute->minutes_date) }}" required>
                    @if($errors->has('minutes_date'))
                        <span class="text-danger">{{ $errors->first('minutes_date') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required" for="minutes_document">Minutes Document</label>
                    <div class="needsclick dropzone {{ $errors->has('minutes_document') ? 'is-invalid' : '' }}" id="minutes_document-dropzone">
                    </div>
                    @if($errors->has('minutes_document'))
                        <span class="text-danger">{{ $errors->first('minutes_document') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <button class="btn btn-secondary" type="submit">
                        Upload
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection

@section('scripts')
    <script>
        Dropzone.options.minutesDocumentDropzone = {
            url: '{{ route('admin.minutes.storeMedia') }}',
            maxFilesize: 5, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5
            },
            success: function (file, response) {
                $('form').find('input[name="minutes_document"]').remove()
                $('form').append('<input type="hidden" name="minutes_document" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="minutes_document"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($minute) && $minute->minutes_document)
                var file = {!! json_encode($minute->minutes_document) !!}
                    this.options.addedfile.call(this, file)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="minutes_document" value="' + file.file_name + '">')
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
