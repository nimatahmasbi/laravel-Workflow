@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-building me-2"></i>
        دپارتمان‌ها
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('departments.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>
            دپارتمان جدید
        </a>
    </div>
</div>

<div class="card shadow">
    <div class="card-body">
        @if($departments->count() > 0)
            <div class="table-responsive">
                <table class="table table-professional">
                    <thead>
                        <tr>
                            <th>نام دپارتمان</th>
                            <th>توضیحات</th>
                            <th>مدیر</th>
                            <th>تماس</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($departments as $department)
                        <tr>
                            <td>
                                <strong>{{ $department->name }}</strong>
                            </td>
                            <td>{{ Str::limit($department->description, 50) }}</td>
                            <td>{{ $department->manager_name }}</td>
                            <td>
                                @if($department->phone)
                                    <div><i class="fas fa-phone me-1"></i>{{ $department->phone }}</div>
                                @endif
                                @if($department->email)
                                    <div><i class="fas fa-envelope me-1"></i>{{ $department->email }}</div>
                                @endif
                            </td>
                            <td>
                                @if($department->is_active)
                                    <span class="badge bg-success">فعال</span>
                                @else
                                    <span class="badge bg-danger">غیرفعال</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('departments.show', $department) }}" class="btn btn-info" title="مشاهده">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('departments.edit', $department) }}" class="btn btn-warning" title="ویرایش">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('departments.destroy', $department) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" title="حذف" onclick="return confirm('آیا مطمئن هستید؟')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-3">
                {{ $departments->links() }}
            </div>
        @else
            <div class="text-center py-4">
                <i class="fas fa-building fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">هیچ دپارتمانی یافت نشد</h5>
                <p class="text-muted">برای شروع، اولین دپارتمان را ایجاد کنید.</p>
                <a href="{{ route('departments.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>
                    ایجاد دپارتمان
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
