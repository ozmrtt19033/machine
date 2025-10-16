import React from 'react';
import { Head, Link } from '@inertiajs/inertia-react';

export default function Welcome({ auth, canLogin, canRegister }) {
    return (
        <>
            <Head title="Hoş Geldiniz" />
            <div>
                <h1>Makine Yedek Parça Platformu</h1>

                {canLogin && (
                    <Link href="/login">
                        Giriş Yap
                    </Link>
                )}

                {canRegister && (
                    <Link href="/register">
                        Kayıt Ol
                    </Link>
                )}
            </div>
        </>
    );
}
