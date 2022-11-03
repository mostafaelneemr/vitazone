@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6 ">{{ translate('Paypal Credential') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                        <input type="hidden" name="payment_method" value="paypal">
                        @csrf
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="PAYPAL_CLIENT_ID">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('Paypal Client Id') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="PAYPAL_CLIENT_ID"
                                    value="{{ env('PAYPAL_CLIENT_ID') }}" placeholder="{{ translate('Paypal Client ID') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="PAYPAL_CLIENT_SECRET">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('Paypal Client Secret') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="PAYPAL_CLIENT_SECRET"
                                    value="{{ env('PAYPAL_CLIENT_SECRET') }}"
                                    placeholder="{{ translate('Paypal Client Secret') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('Paypal Sandbox Mode') }}</label>
                            </div>
                            <div class="col-md-8">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input value="1" name="paypal_sandbox" type="checkbox"
                                        @if (\App\BusinessSetting::where('type', 'paypal_sandbox')->first()->value == 1) checked @endif>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6 ">{{ translate('Stripe Credential') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="payment_method" value="stripe">
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="STRIPE_KEY">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('Stripe Key') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="STRIPE_KEY"
                                    value="{{ env('STRIPE_KEY') }}" placeholder="{{ translate('STRIPE KEY') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="STRIPE_SECRET">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('Stripe Secret') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="STRIPE_SECRET"
                                    value="{{ env('STRIPE_SECRET') }}" placeholder="{{ translate('STRIPE SECRET') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header ">
                    <h5 class="mb-0 h6">{{ translate('Sslcommerz Credential') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="payment_method" value="sslcommerz">
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="SSLCZ_STORE_ID">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('Sslcz Store Id') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="SSLCZ_STORE_ID"
                                    value="{{ env('SSLCZ_STORE_ID') }}" placeholder="{{ translate('Sslcz Store Id') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="SSLCZ_STORE_PASSWD">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('Sslcz store password') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="SSLCZ_STORE_PASSWD"
                                    value="{{ env('SSLCZ_STORE_PASSWD') }}"
                                    placeholder="{{ translate('Sslcz store password') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('Sslcommerz Sandbox Mode') }}</label>
                            </div>
                            <div class="col-md-8">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input value="1" name="sslcommerz_sandbox" type="checkbox"
                                        @if (\App\BusinessSetting::where('type', 'sslcommerz_sandbox')->first()->value == 1) checked @endif>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6 ">{{ translate('RazorPay Credential') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="payment_method" value="razorpay">
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="RAZOR_KEY">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('RAZOR KEY') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="RAZOR_KEY"
                                    value="{{ env('RAZOR_KEY') }}" placeholder="{{ translate('RAZOR KEY') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="RAZOR_SECRET">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('RAZOR SECRET') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="RAZOR_SECRET"
                                    value="{{ env('RAZOR_SECRET') }}" placeholder="{{ translate('RAZOR SECRET') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6 ">{{ translate('Instamojo Credential') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="payment_method" value="instamojo">
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="IM_API_KEY">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('API KEY') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="IM_API_KEY"
                                    value="{{ env('IM_API_KEY') }}" placeholder="{{ translate('IM API KEY') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="IM_AUTH_TOKEN">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('AUTH TOKEN') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="IM_AUTH_TOKEN"
                                    value="{{ env('IM_AUTH_TOKEN') }}" placeholder="{{ translate('IM AUTH TOKEN') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('Instamojo Sandbox Mode') }}</label>
                            </div>
                            <div class="col-md-8">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input value="1" name="instamojo_sandbox" type="checkbox"
                                        @if (\App\BusinessSetting::where('type', 'instamojo_sandbox')->first()->value == 1) checked @endif>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6 ">{{ translate('PayStack Credential') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="payment_method" value="paystack">
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="PAYSTACK_PUBLIC_KEY">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('PUBLIC KEY') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="PAYSTACK_PUBLIC_KEY"
                                    value="{{ env('PAYSTACK_PUBLIC_KEY') }}" placeholder="{{ translate('PUBLIC KEY') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="PAYSTACK_SECRET_KEY">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('SECRET KEY') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="PAYSTACK_SECRET_KEY"
                                    value="{{ env('PAYSTACK_SECRET_KEY') }}" placeholder="{{ translate('SECRET KEY') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MERCHANT_EMAIL">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('MERCHANT EMAIL') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="MERCHANT_EMAIL"
                                    value="{{ env('MERCHANT_EMAIL') }}" placeholder="{{ translate('MERCHANT EMAIL') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6 ">{{ translate('Payhere Credential') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="payment_method" value="payhere">
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="PAYHERE_MERCHANT_ID">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('PAYHERE MERCHANT ID') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="PAYHERE_MERCHANT_ID"
                                    value="{{ env('PAYHERE_MERCHANT_ID') }}"
                                    placeholder="{{ translate('PAYHERE MERCHANT ID') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="PAYHERE_SECRET">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('PAYHERE SECRET') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="PAYHERE_SECRET"
                                    value="{{ env('PAYHERE_SECRET') }}" placeholder="{{ translate('PAYHERE SECRET') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="PAYHERE_CURRENCY">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('PAYHERE CURRENCY') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="PAYHERE_CURRENCY"
                                    value="{{ env('PAYHERE_CURRENCY') }}"
                                    placeholder="{{ translate('PAYHERE CURRENCY') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('Payhere Sandbox Mode') }}</label>
                            </div>
                            <div class="col-md-8">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input value="1" name="payhere_sandbox" type="checkbox"
                                        @if (\App\BusinessSetting::where('type', 'payhere_sandbox')->first()->value == 1) checked @endif>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Ngenius Credential') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="payment_method" value="ngenius">
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="NGENIUS_OUTLET_ID">
                            <div class="col-lg-4">
                                <label class="col-from-label">{{ translate('NGENIUS OUTLET ID') }}</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="NGENIUS_OUTLET_ID"
                                    value="{{ env('NGENIUS_OUTLET_ID') }}"
                                    placeholder="{{ translate('NGENIUS OUTLET ID') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="NGENIUS_API_KEY">
                            <div class="col-lg-4">
                                <label class="col-from-label">{{ translate('NGENIUS API KEY') }}</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="NGENIUS_API_KEY"
                                    value="{{ env('NGENIUS_API_KEY') }}"
                                    placeholder="{{ translate('NGENIUS API KEY') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="NGENIUS_CURRENCY">
                            <div class="col-lg-4">
                                <label class="col-from-label">{{ translate('NGENIUS CURRENCY') }}</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="NGENIUS_CURRENCY"
                                    value="{{ env('NGENIUS_CURRENCY') }}"
                                    placeholder="{{ translate('NGENIUS CURRENCY') }}" required>
                                <br>
                                <div class="alert alert-primary" role="alert">
                                    Currency must be <b>AED</b> or <b>USD</b> or <b>EUR</b><br>
                                    If kept empty, <b>AED</b> will be used automatically
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6 ">{{ translate('VoguePay Credential') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="payment_method" value="voguepay">
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="VOGUE_MERCHANT_ID">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('MERCHANT ID') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="VOGUE_MERCHANT_ID"
                                    value="{{ env('VOGUE_MERCHANT_ID') }}" placeholder="{{ translate('MERCHANT ID') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('Sandbox Mode') }}</label>
                            </div>
                            <div class="col-md-8">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input value="1" name="voguepay_sandbox" type="checkbox"
                                        @if (\App\BusinessSetting::where('type', 'voguepay_sandbox')->first()->value == 1) checked @endif>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6 ">{{ translate('PaySky Credential') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="payment_method" value="paysky">
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="PAYSKY_MID">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('MID') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="PAYSKY_MID"
                                    value="{{ env('PAYSKY_MID') }}" placeholder="{{ translate('MID') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="PAYSKY_TID">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('SECRET KEY') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="PAYSKY_TID"
                                    value="{{ env('PAYSKY_TID') }}" placeholder="{{ translate('TID') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="PAYSKY_HASH">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('Secure Hash') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="PAYSKY_HASH"
                                    value="{{ env('PAYSKY_HASH') }}" placeholder="{{ translate('Secure Hash') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6 ">{{ translate('Fawry Credential') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="payment_method" value="fawry">
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="FAWRY_MERCHANTCODE">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('MERCHANTCODE') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="FAWRY_MERCHANTCODE"
                                    value="{{ env('FAWRY_MERCHANTCODE') }}"
                                    placeholder="{{ translate('MERCHANTCODE') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="FAWRY_SIGNATURE">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('SIGNATURE') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="FAWRY_SIGNATURE"
                                    value="{{ env('FAWRY_SIGNATURE') }}" placeholder="{{ translate('SIGNATURE') }}"
                                    required>
                            </div>
                        </div>

                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6 ">{{ translate('PayMob Credential') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="payment_method" value="paymob">
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MOB_API_KEY">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('MOB_API_KEY') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="MOB_API_KEY"
                                    value="{{ env('MOB_API_KEY') }}" placeholder="{{ translate('MOB_API_KEY') }}"
                                    required>
                            </div>
                        </div>
                        <hr>
                        <h5 class="mb-0 h6 ">{{ translate('Card iframe') }}</h5>
                        <hr>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="PAYMOB_CARD_INTEGRATION_ID">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('PAYMOB_CARD_INTEGRATION_ID') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="PAYMOB_CARD_INTEGRATION_ID"
                                    value="{{ env('PAYMOB_CARD_INTEGRATION_ID') }}"
                                    placeholder="{{ translate('PAYMOB_CARD_INTEGRATION_ID') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="PAYMOB_IFRAME_ID_EN">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('PAYMOB_IFRAME_ID_EN') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="PAYMOB_IFRAME_ID_EN"
                                    value="{{ env('PAYMOB_IFRAME_ID_EN') }}"
                                    placeholder="{{ translate('PAYMOB_IFRAME_ID_EN') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="PAYMOB_IFRAME_ID_AR">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('PAYMOB_IFRAME_ID_AR') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="PAYMOB_IFRAME_ID_AR"
                                    value="{{ env('PAYMOB_IFRAME_ID_AR') }}"
                                    placeholder="{{ translate('PAYMOB_IFRAME_ID_AR') }}">
                            </div>
                        </div>
                        <hr>
                        <h5 class="mb-0 h6 ">{{ translate('Bank instalment iframe') }}</h5>
                        <hr>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="PAYMOB_BANK_INTEGRATION_ID">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('PAYMOB_BANK_INTEGRATION_ID') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="PAYMOB_BANK_INTEGRATION_ID"
                                    value="{{ env('PAYMOB_BANK_INTEGRATION_ID') }}"
                                    placeholder="{{ translate('PAYMOB_BANK_INTEGRATION_ID') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="BANK_INSTALLMENTS_IFRAME_ID_EN">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('BANK_INSTALLMENTS_IFRAME_ID_EN') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="BANK_INSTALLMENTS_IFRAME_ID_EN"
                                    value="{{ env('BANK_INSTALLMENTS_IFRAME_ID_EN') }}"
                                    placeholder="{{ translate('BANK_INSTALLMENTS_IFRAME_ID_EN') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="BANK_INSTALLMENTS_IFRAME_ID_AR">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('BANK_INSTALLMENTS_IFRAME_ID_AR') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="BANK_INSTALLMENTS_IFRAME_ID_AR"
                                    value="{{ env('BANK_INSTALLMENTS_IFRAME_ID_AR') }}"
                                    placeholder="{{ translate('BANK_INSTALLMENTS_IFRAME_ID_AR') }}">
                            </div>
                        </div>
                        <hr>
                        <h5 class="mb-0 h6 ">{{ translate('Value iframe') }}</h5>
                        <hr>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="PAYMOB_VALU_INTEGRATION_ID">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('PAYMOB_VALU_INTEGRATION_ID') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="PAYMOB_VALU_INTEGRATION_ID"
                                    value="{{ env('PAYMOB_VALU_INTEGRATION_ID') }}"
                                    placeholder="{{ translate('PAYMOB_VALU_INTEGRATION_ID') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="VALU_IFRAME_ID_EN">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('VALU_IFRAME_ID_EN') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="VALU_IFRAME_ID_EN"
                                    value="{{ env('VALU_IFRAME_ID_EN') }}"
                                    placeholder="{{ translate('VALU_IFRAME_ID_EN') }}">
                            </div>
                        </div>
                        <hr>
                        <h5 class="mb-0 h6 ">{{ translate('Wallet iframe') }}</h5>
                        <hr>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="WALLET_INTEGRATION_ID">
                            <div class="col-md-4">
                                <label class="col-from-label">{{ translate('WALLET_INTEGRATION_ID') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="WALLET_INTEGRATION_ID"
                                    value="{{ env('WALLET_INTEGRATION_ID') }}"
                                    placeholder="{{ translate('WALLET_INTEGRATION_ID') }}">
                            </div>
                        </div>


                </div>
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
