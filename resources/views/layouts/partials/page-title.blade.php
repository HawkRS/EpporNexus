<div class="card page-title-box rounded-0">
    <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2">
        <div class="flex-grow-1">
            <h4 class="font-18 fw-semibold mb-0">{{ $title }} </h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Eppor Nexus</a></li>
                @if ($subtitle)
                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $subtitle }}</a></li>
                @endif
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </div>
    </div>
</div>