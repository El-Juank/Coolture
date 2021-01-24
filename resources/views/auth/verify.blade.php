@extends('layouts.base')

@section('seoTitle')
    | {{ __('lang.header_verify') }}
@endsection

@section('content')
    <div class="container login-container">
        <div class="row justify-content-center" data-aos="fade-up">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('lang.verify_email') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('lang.verification_link') }}
                            </div>
                        @endif

                        {{ __('lang.check_email') }}
                        {{ __('lang.email_not_recived') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('lang.send_another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        setTimeout(function() {
            $("#header").addClass("header-fixed");
        }, 1);

    </script>
@endsection
