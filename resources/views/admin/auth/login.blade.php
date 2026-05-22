<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم CMAC - تسجيل الدخول</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Tajawal', sans-serif !important; }
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0d2137 0%, #1a5490 50%, #2166A9 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: #fff;
            border-radius: 1.5rem;
            padding: 2.5rem 2rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 30px 80px rgba(0,0,0,0.35);
        }
        .logo-wrap {
            width: 80px; height: 80px;
            background: linear-gradient(135deg, #1a5490, #2166A9);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1.25rem;
            box-shadow: 0 8px 25px rgba(33,102,169,0.4);
        }
        .field-wrap {
            position: relative;
            margin-bottom: 1.25rem;
        }
        .field-wrap label {
            display: block;
            font-size: 0.82rem;
            font-weight: 700;
            color: #555;
            margin-bottom: 0.4rem;
        }
        .field-wrap input {
            width: 100%;
            padding: 0.75rem 2.75rem 0.75rem 1rem;
            border: 2px solid #e9ecef;
            border-radius: 0.75rem;
            font-size: 0.95rem;
            font-family: 'Tajawal', sans-serif !important;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
            direction: ltr;
            text-align: right;
        }
        .field-wrap input:focus {
            border-color: #2166A9;
            box-shadow: 0 0 0 3px rgba(33,102,169,0.12);
        }
        .input-wrap {
            position: relative;
        }
        .field-wrap .field-icon {
            position: absolute;
            top: 50%; right: 0.9rem;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 1rem;
            pointer-events: none;
        }
        .btn-login {
            background: linear-gradient(135deg, #1a5490, #2166A9);
            border: none;
            border-radius: 0.75rem;
            padding: 0.85rem;
            font-weight: 700;
            font-size: 1rem;
            width: 100%;
            color: #fff;
            cursor: pointer;
            transition: opacity 0.2s, transform 0.1s;
            margin-top: 0.5rem;
        }
        .btn-login:hover { opacity: 0.92; transform: translateY(-1px); }
        .btn-login:active { transform: translateY(0); }
        .bg-pattern {
            position: fixed; top: 0; left: 0; right: 0; bottom: 0;
            background-image: radial-gradient(rgba(255,255,255,0.04) 1px, transparent 1px);
            background-size: 28px 28px;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="bg-pattern"></div>
    <div class="login-card position-relative">
        <div class="text-center mb-4">
            <div class="logo-wrap">
                <i class="bi bi-shield-lock-fill text-white fs-2"></i>
            </div>
            <h1 class="h4 fw-bold mb-1" style="color:#2166A9;">لوحة التحكم</h1>
            <p class="text-muted small mb-0">الاتحاد العالمي الأكاديمي للتزيين</p>
        </div>

        @if(session('error'))
        <div class="alert alert-danger rounded-3 mb-4 d-flex align-items-center gap-2">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <span>{{ session('error') }}</span>
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger rounded-3 mb-4">
            @foreach($errors->all() as $error)
            <div class="d-flex align-items-center gap-2"><i class="bi bi-x-circle"></i> {{ $error }}</div>
            @endforeach
        </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf
            <div class="field-wrap">
                <label>البريد الإلكتروني</label>
                <div class="input-wrap">
                    <i class="bi bi-envelope field-icon"></i>
                    <input type="email" name="email" placeholder="admin@example.com"
                        value="{{ old('email') }}" required autofocus>
                </div>
            </div>
            <div class="field-wrap">
                <label>كلمة المرور</label>
                <div class="input-wrap">
                    <i class="bi bi-lock field-icon"></i>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>
            </div>
            <div class="d-flex align-items-center mb-3">
                <input class="form-check-input mt-0 me-2" type="checkbox" name="remember" id="remember">
                <label class="small text-muted mb-0" for="remember">تذكرني</label>
            </div>
            <button type="submit" class="btn-login">
                <i class="bi bi-box-arrow-in-right me-1"></i> دخول
            </button>
        </form>

        <p class="text-center text-muted small mt-4 mb-0">
            &copy; {{ date('Y') }} CMAC — جميع الحقوق محفوظة
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
