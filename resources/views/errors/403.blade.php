<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دسترسی غیرمجاز - {{ config('app.name', 'سیستم گردش کار') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }

        .error-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 3rem;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            max-width: 600px;
            width: 100%;
        }

        .error-icon {
            font-size: 8rem;
            color: #dc2626;
            margin-bottom: 2rem;
            animation: pulse 2s infinite;
        }

        .error-code {
            font-size: 4rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .error-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 1rem;
        }

        .error-message {
            font-size: 1.1rem;
            color: #6b7280;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-custom {
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
        }

        .btn-primary-custom:hover {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
        }

        .btn-secondary-custom {
            background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
            color: white;
        }

        .btn-secondary-custom:hover {
            background: linear-gradient(135deg, #4b5563 0%, #374151 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(107, 114, 128, 0.3);
        }

        .security-info {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 15px;
            padding: 1.5rem;
            margin-top: 2rem;
            text-align: right;
        }

        .security-info h6 {
            color: #475569;
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .security-info ul {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: right;
        }

        .security-info li {
            color: #64748b;
            margin-bottom: 0.5rem;
            padding-right: 1.5rem;
            position: relative;
        }

        .security-info li:before {
            content: "🔒";
            position: absolute;
            right: 0;
            top: 0;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        @media (max-width: 768px) {
            .error-container {
                padding: 2rem;
                margin: 1rem;
            }

            .error-icon {
                font-size: 6rem;
            }

            .error-code {
                font-size: 3rem;
            }

            .action-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn-custom {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-icon">
            <i class="fas fa-shield-alt"></i>
        </div>

        <div class="error-code">403</div>

        <div class="error-title">
            دسترسی غیرمجاز
        </div>

        <div class="error-message">
            متأسفانه شما دسترسی لازم برای مشاهده این صفحه را ندارید.
            این ممکن است به دلیل محدودیت‌های امنیتی یا عدم احراز هویت باشد.
        </div>

        <div class="action-buttons">
            <a href="{{ route('dashboard') }}" class="btn-custom btn-primary-custom">
                <i class="fas fa-home"></i>
                بازگشت به داشبورد
            </a>

            <a href="{{ url()->previous() }}" class="btn-custom btn-secondary-custom">
                <i class="fas fa-arrow-right"></i>
                صفحه قبلی
            </a>
        </div>

        <div class="security-info">
            <h6>
                <i class="fas fa-info-circle"></i>
                اطلاعات امنیتی
            </h6>
            <ul>
                <li>دسترسی شما بر اساس نقش کاربری تعیین شده است</li>
                <li>برای دسترسی بیشتر با مدیر سیستم تماس بگیرید</li>
                <li>تمام فعالیت‌های شما ثبت و بررسی می‌شود</li>
            </ul>
        </div>
    </div>
</body>
</html>
