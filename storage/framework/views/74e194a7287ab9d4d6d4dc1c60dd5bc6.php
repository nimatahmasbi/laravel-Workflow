<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'سیستم گردش کار')); ?></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Vazirmatn', sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 20px 0;
        }

        .container {
            max-width: 1200px;
        }

        .hero-section {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .hero-section h1 {
            color: #2c3e50;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .hero-section p {
            color: #6c757d;
            font-size: 1.1rem;
            font-weight: 400;
            margin-bottom: 0;
        }

        .card {
            border: 1px solid #dee2e6;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            background: white;
            overflow: hidden;
        }

        .card-header {
            background: #2c3e50;
            color: white;
            border-radius: 12px 12px 0 0 !important;
            font-weight: 600;
            text-align: center;
            padding: 1.25rem;
            font-size: 1.2rem;
            border: none;
        }

        .card-body {
            padding: 2rem;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 1rem;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: #2c3e50;
            box-shadow: 0 0 0 0.2rem rgba(44, 62, 80, 0.15);
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.5rem;
        }

        .btn-primary {
            background: #2c3e50;
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background: #34495e;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(44, 62, 80, 0.2);
        }

        .btn-link {
            color: #2c3e50;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-link:hover {
            color: #34495e;
            text-decoration: underline;
        }

        .form-check-input:checked {
            background-color: #2c3e50;
            border-color: #2c3e50;
        }

        .form-check-input:focus {
            box-shadow: 0 0 0 0.2rem rgba(44, 62, 80, 0.15);
        }

        .alert {
            border-radius: 8px;
            border: none;
            font-weight: 500;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
        }

        .invalid-feedback {
            font-weight: 500;
            color: #dc3545;
        }

        hr {
            border-color: #dee2e6;
            opacity: 0.5;
        }

        .text-muted {
            color: #6c757d !important;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                padding: 10px 0;
            }

            .hero-section h1 {
                font-size: 2rem;
            }

            .hero-section p {
                font-size: 1rem;
            }

            .card-body {
                padding: 1.5rem;
            }

            .form-label {
                text-align: right !important;
                margin-bottom: 0.5rem;
            }

            .col-md-3.col-form-label {
                text-align: right !important;
            }

            .btn-primary {
                width: 100%;
                margin-bottom: 1rem;
            }

            .btn-link {
                display: block;
                text-align: center;
            }
        }

        @media (max-width: 576px) {
            .hero-section h1 {
                font-size: 1.75rem;
            }

            .card-body {
                padding: 1.25rem;
            }

            .form-control {
                font-size: 16px; /* Prevents zoom on iOS */
            }
        }

        /* Print styles */
        @media print {
            body {
                background: white;
            }

            .card {
                box-shadow: none;
                border: 1px solid #dee2e6;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="hero-section">
                    <h1>
                        <i class="fas fa-project-diagram me-3"></i>
                        <?php echo e(config('app.name', 'سیستم گردش کار')); ?>

                    </h1>
                    <p>مدیریت فرآیندها و گردش کارهای سازمانی</p>
                </div>

                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH /Users/hassankhosrojerdi/Desktop/workflow/workflow-system/resources/views/auth/layouts/app.blade.php ENDPATH**/ ?>