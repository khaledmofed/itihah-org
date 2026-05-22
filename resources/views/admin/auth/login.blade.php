<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم CMAC - تسجيل الدخول</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Tajawal', sans-serif; }
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #1a5490 0%, #2166A9 50%, #5a9fd4 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: #fff;
            border-radius: 1.5rem;
            padding: 3rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.25);
        }
        .logo-wrap {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #2166A9, #5a9fd4);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }
        .form-control {
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            border: 2px solid #e9ecef;
            transition: border-color 0.2s;
        }
        .form-control:focus {
            border-color: #2166A9;
            box-shadow: 0 0 0 0.25rem rgba(33,102,169,0.15);
        }
        .btn-login {
            background: linear-gradient(135deg, #2166A9, #5a9fd4);
            border: none;
            border-radius: 0.75rem;
            padding: 0.85rem;
            font-weight: 700;
            font-size: 1.05rem;
            letter-spacing: 0.5px;
            transition: opacity 0.2s;
        }
        .btn-login:hover { opacity: 0.9; }
        .bg-pattern {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: radial-gradient(rgba(255,255,255,0.05) 2px, transparent 2px);
            background-size: 30px 30px;
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
            <div class="mb-4">
                <label class="form-label fw-bold small text-muted">البريد الإلكتروني</label>
                <div class="input-group">
                    <span class="input-group-text border-2 border-end-0 bg-white" style="border-radius: 0.75rem 0 0 0.75rem; border-color:#e9ecef;">
                        <i class="bi bi-envelope text-muted"></i>
                    </span>
                    <input type="email" name="email" class="form-control border-start-0 @error('email') is-invalid @enderror"
                        placeholder="admin@example.com" value="{{ old('email') }}"
                        style="border-radius: 0 0.75rem 0.75rem 0;" required dir="ltr" autofocus>
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label fw-bold small text-muted">كلمة المرور</label>
                <div class="input-group">
                    <span class="input-group-text border-2 border-end-0 bg-white" style="border-radius: 0.75rem 0 0 0.75rem; border-color:#e9ecef;">
                        <i class="bi bi-lock text-muted"></i>
                    </span>
                    <input type="password" name="password" class="form-control border-start-0"
                        placeholder="••••••••" style="border-radius: 0 0.75rem 0.75rem 0;" required>
                </div>
            </div>
            <div class="mb-4 d-flex align-items-center justify-content-between">
                <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label small text-muted" for="remember">تذكرني</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-login w-100 text-white">
                <i class="bi bi-box-arrow-in-right me-2"></i> دخول
            </button>
        </form>

        <p class="text-center text-muted small mt-4 mb-0">
            &copy; {{ date('Y') }} CMAC — جميع الحقوق محفوظة
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
