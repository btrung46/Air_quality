@if (session('success'))
    <div class="toast align-items-center bg-success text-white position-fixed start-50 translate-middle-x shadow-lg fade show"
         role="alert" aria-live="assertive" aria-atomic="true"
         style="z-index: 1055; border-radius: 0.75rem; min-width: 320px; top: 40px;"> <!-- 👈 khoảng cách cụ thể -->
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center gap-2 py-3">
                <i class="bi bi-check-circle-fill fs-4"></i>
                <span>{{ session('success') }}</span>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto"
                    data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toastEl = document.querySelector('.toast');
            if (toastEl) {
                const toast = new bootstrap.Toast(toastEl, { delay: 4000 });
                toast.show();
            }
        });
    </script>
@endif
