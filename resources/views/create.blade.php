@extends('common.master')

@push('styles')
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-select.min.css') }}">
@endpush

@section('content')

<div class="mainbar content">
  <div class="page-head">
    <h2 class="pull-left">
      {{ $pageData['title'] or '' }}
    </h2>

    <div class="bread-crumb pull-right">
      <a href="{{ URL::route('dashboard') }}"><i class="fa fa-home"></i> Home</a>
      <span class="divider">/</span>
      <a href="{{ URL::route('sales.commission.incoming.list') }}">Customers</a>
      <span class="divider">/</span>
      <a class="bread-current" href="#">{{ $pageData['title'] or '' }}</a>
    </div>

    <div class="clearfix"></div>
  </div>

  <div class="matter">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="aggregator-create-content">
            <form class="creation-form" role="form" method="POST" action="{{ url('/customers/individual/create') }}">
              {!! csrf_field() !!}

              <div class="row form tools">
                <div class="col-md-12">
                  <a id="cancel" class="btn btn-default" href="{{ url('/customers/individual/list') }}">Cancel</a>
                </div>
              </div>

              @if (session()->has('success'))

              <div class="row push-down-20">
                <div class="col-md-12">
                  <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                    <p>{{ Session::get('success') }}</p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                  <div>
                    <p><a class="btn btn-default btn-lg" href="{{ url('customers/individual/details') . '/' . Session::get('farmer_id') }}">View Farmer</a></p>
                  </div>
                </div>
              </div>

              @else

              @if (session()->has('fail'))

              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                    <p>{{ Session::get('fail') }}</p>
                  </div>
                </div>
              </div>

              @endif

              <div class="form-group row first">
                <label class="col-sm-4 form-control-label text-right">First Name</label>

                <div class="col-sm-6">
                  <input name="first_name" type="text" class="form-control" id="first_name" value="{{ old('first_name') }}">

                  @if ($errors->has('first_name'))
                  <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('first_name') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-4 form-control-label text-right">Middle Name</label>

                <div class="col-sm-6">
                  <input name="middle_name" type="text" class="form-control" id="middle_name" value="{{ old('middle_name') }}">

                  @if ($errors->has('middle_name'))
                  <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('middle_name') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-4 form-control-label text-right">Last Name</label>

                <div class="col-sm-6">
                  <input name="last_name" type="text" class="form-control" id="last_name" value="{{ old('last_name') }}">

                  @if ($errors->has('last_name'))
                  <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('last_name') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                  <label class="col-sm-4 form-control-label text-right">Mobile Money Phone Number</label>

                  <div class="col-sm-6">
                    <input name="mobile_money_phone_number" type="text" class="form-control" id="mobile_money_phone_number" value="{{ old('mobile_money_phone_number') }}">

                    @if ($errors->has('mobile_money_phone_number'))
                      <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('mobile_money_phone_number') }}</strong>
                  </span>
                    @endif
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 form-control-label text-right">Alternate Phone Number</label>

                <div class="col-sm-6">
                  <input name="mobile_number" type="text" class="form-control" id="mobile_number" value="{{ old('mobile_number') }}">

                  @if ($errors->has('mobile_number'))
                  <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('mobile_number') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                  <label class="col-sm-4 form-control-label text-right">Country</label>

                  <div class="col-sm-6">
                    <select id="country" name="country" class="show-tick selectpicker"
                            data-width="100%" data-size="10" data-style="btn-default"></select>

                    @if ($errors->has('country'))
                      <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('country') }}</strong>
                  </span>
                    @endif
                  </div>
                </div>


                <div class="form-group row">
                  <label class="col-sm-4 form-control-label text-right">PIN Number</label>

                  <div class="col-sm-6">
                    <input name="pin_number" type="text" class="form-control" id="pin_number" value="{{ old('pin_number') }}">

                    @if ($errors->has('pin_number'))
                      <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('pin_number') }}</strong>
                  </span>
                    @endif
                  </div>
                </div>


                <div class="form-group row">
                <label class="col-sm-4 form-control-label text-right">Membership Number</label>

                <div class="col-sm-6">
                  <input name="membership_number" type="text" class="form-control" id="membership_number" value="{{ old('membership_number') }}">

                  @if ($errors->has('membership_number'))
                  <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('membership_number') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-4 form-control-label text-right">Crop</label>

                <div class="col-sm-6">
                  <select id="farmer_crop" name="farmer_crop" class="show-tick selectpicker" data-width="100%" data-size="10" data-style="btn-default"></select>

                  @if ($errors->has('farmer_crop'))
                  <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('farmer_crop') }}</strong>
                  </span>
                  @endif
                </div>
              </div>


                <div class="form-group row">
                <label class="col-sm-4 form-control-label text-right">E-Mail Address</label>

                <div class="col-sm-6">
                  <input name="email_address" type="text" class="form-control" id="email_address" value="{{ old('email_address') }}">

                  @if ($errors->has('email_address'))
                  <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('email_address') }}</strong>
                  </span>
                  @endif
                </div>
              </div>


                <div class="form-group row">
                  <label class="col-sm-4 form-control-label text-right">Postal Address</label>

                  <div class="col-sm-6">
                    <input name="postal_address" type="text" class="form-control" id="postal_address" value="{{ old('postal_address') }}">

                    @if ($errors->has('postal_address'))
                      <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('postal_address') }}</strong>
                  </span>
                    @endif
                  </div>
                </div>


                <div class="form-group row">
                  <label class="col-sm-4 form-control-label text-right">Bank Name</label>

                  <div class="col-sm-6">
                    <input name="bank_name" type="text" class="form-control" id="bank_name" value="{{ old('bank_name') }}">

                    @if ($errors->has('bank_name'))
                      <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('bank_name') }}</strong>
                  </span>
                    @endif
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 form-control-label text-right">Bank Branch</label>

                  <div class="col-sm-6">
                    <input name="bank_branch" type="text" class="form-control" id="bank_branch" value="{{ old('bank_branch') }}">

                    @if ($errors->has('bank_branch'))
                      <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('bank_branch') }}</strong>
                  </span>
                    @endif
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 form-control-label text-right">Bank Account Number</label>

                  <div class="col-sm-6">
                    <input name="bank_account_number" type="text" class="form-control" id="bank_account_number" value="{{ old('bank_account_number') }}">

                    @if ($errors->has('bank_account_number'))
                      <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('bank_account_number') }}</strong>
                  </span>
                    @endif
                  </div>
                </div>


                <div class="form-group row">
                  <label class="col-sm-4 form-control-label text-right">Bank Currency</label>

                  <div class="col-sm-6">
                    <select id="bank_currency" name="bank_currency" class="show-tick selectpicker" data-width="100%" data-size="10" data-style="btn-default"></select>

                    @if ($errors->has('bank_currency'))
                      <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('bank_currency') }}</strong>
                  </span>
                    @endif
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 form-control-label text-right">Next of Kin First Name</label>

                  <div class="col-sm-6">
                    <input name="next_of_kin_first_name" type="text" class="form-control" id="next_of_kin_first_name" value="{{ old('next_of_kin_first_name') }}">

                    @if ($errors->has('next_of_kin_first_name'))
                      <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('next_of_kin_first_name') }}</strong>
                  </span>
                    @endif
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 form-control-label text-right">Next of Kin Middle Name</label>

                  <div class="col-sm-6">
                    <input name="next_of_kin_middle_name" type="text" class="form-control" id="next_of_kin_middle_name" value="{{ old('next_of_kin_middle_name') }}">

                    @if ($errors->has('next_of_kin_middle_name'))
                      <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('next_of_kin_middle_name') }}</strong>
                  </span>
                    @endif
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 form-control-label text-right">Next of Kin Last Name</label>

                  <div class="col-sm-6">
                    <input name="next_of_kin_last_name" type="text" class="form-control" id="next_of_kin_last_name" value="{{ old('next_of_kin_last_name') }}">

                    @if ($errors->has('next_of_kin_last_name'))
                      <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('next_of_kin_last_name') }}</strong>
                  </span>
                    @endif
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 form-control-label text-right">Next of Kin Phone Number</label>

                  <div class="col-sm-6">
                    <input name="next_of_kin_contact_phone_number" type="text" class="form-control" id="next_of_kin_contact_phone_number" value="{{ old('next_of_kin_contact_phone_number') }}">

                    @if ($errors->has('next_of_kin_contact_phone_number'))
                      <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('next_of_kin_contact_phone_number') }}</strong>
                  </span>
                    @endif
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 form-control-label text-right">Next of Kin Relation</label>

                  <div class="col-sm-6">
                    <select id="next_of_kin_relation" name="next_of_kin_relation" class="show-tick selectpicker" data-width="100%" data-size="10" data-style="btn-default"></select>

                    @if ($errors->has('next_of_kin_relation'))
                      <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('next_of_kin_relation') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group row push-up-20">
                <div class="col-sm-6 col-sm-offset-4">
                  <button id="save-details" type="submit" class="btn btn-primary btn-lg">Save Farmer</button>
                </div>
              </div>
            </form>

            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="clearfix"></div>

@endsection

@push('scripts')
<script src="{{ URL::asset('js/currencies.js') }}"></script>
<script src="{{ URL::asset('js/livestock.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ URL::asset('js/nok_relation.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    getCropList(null);
  });
  var country_list = ["","Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antigua &amp; Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas"
    , "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia &amp; Herzegovina", "Botswana", "Brazil", "British Virgin Islands"
    , "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Cape Verde", "Cayman Islands", "Chad", "Chile", "China", "Colombia", "Congo", "Cook Islands", "Costa Rica"
    , "Cote D Ivoire", "Croatia", "Cruise Ship", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea"
    , "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Polynesia", "French West Indies", "Gabon", "Gambia", "Georgia", "Germany", "Ghana"
    , "Gibraltar", "Greece", "Greenland", "Grenada", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India"
    , "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kuwait", "Kyrgyz Republic", "Laos", "Latvia"
    , "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Mauritania"
    , "Mauritius", "Mexico", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Namibia", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia"
    , "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal"
    , "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Saint Pierre &amp; Miquelon", "Samoa", "San Marino", "Satellite", "Saudi Arabia", "Senegal", "Serbia", "Seychelles"
    , "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "South Africa", "South Korea", "Spain", "Sri Lanka", "St Kitts &amp; Nevis", "St Lucia", "St Vincent", "St. Lucia", "Sudan"
    , "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor L'Este", "Togo", "Tonga", "Trinidad &amp; Tobago", "Tunisia"
    , "Turkey", "Turkmenistan", "Turks &amp; Caicos", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "Uruguay", "Uzbekistan", "Venezuela", "Vietnam", "Virgin Islands (US)"
    , "Yemen", "Zambia", "Zimbabwe"];
  var seloption = "";
  $.each(country_list, function (i) {
    seloption += '<option value="' + country_list[i] + '">' + country_list[i] + '</option>';
  });
  $('#country').append(seloption);



</script>

@endpush
