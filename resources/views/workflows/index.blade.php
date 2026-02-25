@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-project-diagram me-2"></i>
        گردش کارها
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('workflows.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>
            گردش کار جدید
        </a>
    </div>
</div>

<div class="card shadow">
    <div class="card-body">
        @if($workflows->count() > 0)
            <div class="table-responsive">
                <table class="table table-professional">
                    <thead>
                        <tr>
                            <th>عنوان</th>
                            <th>دپارتمان</th>
                            <th>ایجادکننده</th>
                            <th>وضعیت</th>
                            <th>اولویت</th>
                            <th>تاریخ شروع</th>
                            <th>تاریخ پایان</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($workflows as $workflow)
                        <tr>
                            <td>
                                <strong>{{ $workflow->title }}</strong>
                                @if($workflow->description)
                                    <br><small class="text-muted">{{ Str::limit($workflow->description, 50) }}</small>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-info">{{ $workflow->department->name }}</span>
                            </td>
                            <td>{{ $workflow->creator->name }}</td>
                            <td>
                                <span class="status-badge status-{{ $workflow->status }}">
                                    @switch($workflow->status)
                                        @case('active') فعال @break
                                        @case('inactive') غیرفعال @break
                                        @case('archived') آرشیو شده @break
                                    @endswitch
                                </span>
                            </td>
                            <td>
                                <span class="priority-badge priority-{{ $workflow->priority }}">
                                    @switch($workflow->priority)
                                        @case(1) پایین @break
                                        @case(2) متوسط @break
                                        @case(3) بالا @break
                                        @case(4) بحرانی @break
                                    @endswitch
                                </span>
                            </td>
                            <td>
                                @if($workflow->start_date)
                                    {{ $workflow->start_date->format('Y/m/d') }}
                                @else
                                    <span class="text-muted">تعیین نشده</span>
                                @endif
                            </td>
                            <td>
                                @if($workflow->due_date)
                                    {{ $workflow->due_date->format('Y/m/d') }}
                                @else
                                    <span class="text-muted">تعیین نشده</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('workflows.show', $workflow) }}" class="btn btn-info" title="مشاهده">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('workflows.edit', $workflow) }}" class="btn btn-warning" title="ویرایش">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('workflows.destroy', $workflow) }}" method="POST" class="d-inline">
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
                {{ $workflows->links() }}
            </div>
        @else
            <div class="text-center py-4">
                <i class="fas fa-project-diagram fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">هیچ گردش کاری یافت نشد</h5>
                <p class="text-muted">برای شروع، اولین گردش کار را ایجاد کنید.</p>
                <a href="{{ route('workflows.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>
                    ایجاد گردش کار
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
