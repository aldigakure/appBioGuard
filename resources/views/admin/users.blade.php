@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
@endpush

@section('content')
<main class="dashboard-main" style="padding-top: 6rem;">
    <div class="dashboard-container">
        <div class="dashboard-title-section">
            <div>
                <h1 class="dashboard-title">Manajemen Pengguna</h1>
                <p class="dashboard-subtitle">Kelola peran dan otorisasi akses pengguna platform BioGuard.</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline btn-sm">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
                Kembali
            </a>
        </div>

        <div class="table-section">
            <div class="table-card card-hover">
                <div class="table-header">
                    <h3 class="table-title">Daftar Pengguna</h3>
                </div>
                <div class="table-wrapper">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Peran Saat Ini</th>
                                <th>Ubah Peran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    <div class="observer-cell">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=10b981&color=fff&size=32" alt="">
                                        {{ $user->name }}
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="role-badge role-{{ $user->role->role_name }}">
                                        {{ ucfirst($user->role->role_name) }}
                                    </span>
                                </td>
                                <td>
                                    @if($user->role->role_name !== 'admin')
                                    <form action="{{ route('admin.users.update-role', $user->user_id) }}" 
                                          method="POST" 
                                          class="d-flex gap-2 role-update-form"
                                          data-user-name="{{ $user->name }}">
                                        @csrf
                                        <select name="role_id" class="select-role">
                                            @foreach($roles as $role)
                                                <option value="{{ $role->role_id }}" {{ $user->role_id == $role->role_id ? 'selected' : '' }}>
                                                    {{ ucfirst($role->role_name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <span class="text-muted small">Admin Utama Protected</span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->role->role_name !== 'admin')
                                        <button type="submit" class="btn-save-role">Simpan</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-pagination">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</main>

@push('scripts')
<script>
    document.querySelectorAll('.role-update-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const userName = this.getAttribute('data-user-name');
            const newRoleName = this.querySelector('select[name="role_id"] option:checked').text;

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: `Anda akan mengubah peran ${userName} menjadi ${newRoleName}.`,
                icon: 'warning',
                iconColor: '#f59e0b',
                showCancelButton: true,
                confirmButtonText: 'Ya, Ubah Peran!',
                cancelButtonText: 'Batal',
                background: 'transparent',
                customClass: {
                    popup: 'premium-swal-popup',
                    title: 'premium-swal-title',
                    htmlContainer: 'premium-swal-html',
                    actions: 'premium-swal-actions',
                    confirmButton: 'premium-swal-confirm btn-primary',
                    cancelButton: 'premium-swal-cancel'
                },
                buttonsStyling: false // Important to use our own CSS
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });
</script>
@endpush
@endsection
