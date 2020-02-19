@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/pc" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="row">
                        <h1>New Postcard</h1>
                    </div>

                    <div class="form-group row">
                        <label for="recipient_name" class="col-md-4 col-form-label">Recipient Name</label>

                        <input id="recipient_name"
                               type="text"
                               class="form-control{{ $errors->has('recipient_name') ? 'is-invalid' : '' }}"
                               name="recipient_name"
                               value="{{ old('recipient_name') }}"
                               autocomplete="recipient_name" autofocus>
                    </div>

                    <div class="form-group row">
                        <label for="recipient_address" class="col-md-4 col-form-label">Recipient Address</label>

                        <input id="recipient_address"
                               type="text"
                               class="form-control{{ $errors->has('recipient_address') ? 'is-invalid' : '' }}"
                               name="recipient_address"
                               value="{{ old('recipient_address') }}"
                               autocomplete="recipient_address" autofocus>
                    </div>

                    <div class="form-group row">
                        <label for="body" class="col-md-4 col-form-label">Recipient Address</label>

                        <input id="body"
                               type="text"
                               class="form-control{{ $errors->has('body') ? 'is-invalid' : '' }}"
                               name="body"
                               value="{{ old('body') }}"
                               autocomplete="body" autofocus>
                    </div>

                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label">Photo</label>
                        <input type="file" class="form-control-file" id="image" name="image">

                        @if ($errors->has('image'))
                            <strong>{{ $errors->first('image') }}</strong>
                        @endif
                    </div>

                    <div class="row pt-4">
                        <button class="btn btn-outline-primary">Add</button>
                    </div>

                </div>
            </div>
        </form>

    </div>
@endsection

