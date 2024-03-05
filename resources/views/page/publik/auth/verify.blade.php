<x-landing-layout>

    <section class="content">
        <div class="container">
            <div class="row justify-content-center pt-md-5">
                <div class="col-8">
                    <div class="card card-outline card-primary">
                        <div class="card-header text-center">
                            Verifikasi Email
                        </div>
                        <div class="card-body">
                            <p class="login-box-msg">
                                Terima kasih telah mendaftar! Sebuah email verifikasi telah dikirimkan ke alamat email Anda. Silakan klik tautan dalam email untuk memverifikasi akun Anda
                            </p>
                            <a href="{{ route('verification.resend') }}" class="btn btn-primary text-center">Kirim ulang email</a>.
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-landing-layout>