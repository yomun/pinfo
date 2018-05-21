@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Contact') }}</div>

                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">

                <div class="card-body">
                    <form id="contact_form" method="POST" action="{{ route('contact') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">{{ Auth::user()->name }}</div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">{{ Auth::user()->email }}</div>
                        </div>

                        <div class="form-group row">
                            <label for="addr" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <textarea id="addr" name="addr" class="form-control{{ $errors->has('addr') ? ' is-invalid' : '' }}" rows="3">{{ $contact->addr }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postcode" class="col-md-4 col-form-label text-md-right">{{ __('Postcode') }}</label>

                            <div class="col-md-6">
                                <input id="postcode" type="text" class="form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}" name="postcode" value="{{ $contact->postcode }}" maxlength=5 required> Example: 43300
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{ $contact->state }}" required> Example: Kuala Lumpur
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-primary" onClick="javascript:formValidator();">
                                    {{ __('Save') }}
                                </button>
                                &nbsp;&nbsp;&nbsp;
                                @if (count($errors) > 0)
                                <strong>{!! implode('<br>', $errors->all()) !!}</strong>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script language="JavaScript">
function formValidator() {
    var addr_val = document.forms["contact_form"]["addr"].value.trim();
    var stat_val = document.forms["contact_form"]["state"].value.trim();

    document.forms["contact_form"]["addr"].value = addr_val;
    document.forms["contact_form"]["state"].value = stat_val;

    var pcode_val = document.forms["contact_form"]["postcode"].value.trim();
    var isnum = /^\d+$/.test(pcode_val);
    if (isnum) {
        if (pcode_val.length == 5) {
            document.forms["contact_form"]["postcode"].value = pcode_val;
            return true;
        }
    } else {
        document.forms["contact_form"]["postcode"].value = "";
    }
    return false;
}
</script>

@endsection
