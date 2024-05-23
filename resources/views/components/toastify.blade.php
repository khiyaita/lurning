@props(['type'])
<div class="Toastify">
    <div class="Toastify_toast-container Toastify_toast-container--top-center">
        <div id="5"
            class="Toastify_toast Toastifytoast-theme--light Toastifytoast--{{ $type }} Toastify_toast--close-on-click"
            style="--nth: 1; --len: 1">
            <div role="alert" class="Toastify__toast-body" style="display: flex;align-items: center;">
                <div class="Toastify_toast-icon Toastify--animate-icon Toastify_zoom-enter">
                    <svg viewBox="0 0 24 24" width="100%" height="100%"
                        fill="var(--toastify-icon-color-{{ $type }})">
                        <path
                            d="M11.983 0a12.206 12.206 0 00-8.51 3.653A11.8 11.8 0 000 12.207 11.779 11.779 0 0011.8 24h.214A12.111 12.111 0 0024 11.791 11.766 11.766 0 0011.983 0zM10.5 16.542a1.476 1.476 0 011.449-1.53h.027a1.527 1.527 0 011.523 1.47 1.475 1.475 0 01-1.449 1.53h-.027a1.529 1.529 0 01-1.523-1.47zM11 12.5v-6a1 1 0 012 0v6a1 1 0 11-2 0z">
                        </path>
                    </svg>
                </div>
                <div>{{ $slot }}</div>
            </div>
            <button onclick="handleClick()" class="Toastify_close-button Toastify_close-button--light" type="button"
                aria-label="close">
                <svg aria-hidden="true" viewBox="0 0 14 16">
                    <path fill-rule="evenodd"
                        d="M7.71 8.23l3.75 3.75-1.48 1.48-3.75-3.75-3.75 3.75L1 11.98l3.75-3.75L1 4.48 2.48 3l3.75 3.75L9.98 3l1.48 1.48-3.75 3.75z">
                    </path>
                </svg>
            </button>
            <div role="progressbar" aria-hidden="false" aria-label="notification timer"
                class="Toastify_progress-bar Toastify_progress-bar--{{ $type }}"></div>
        </div>
    </div>
</div>
<script>
    const handleClick = () => {
        document.querySelector(".Toastify_toast-container").className =
            "hidden";
    };

     setTimeout(() => {
       document.querySelector(".Toastify_toast-container").className =
         "hidden";
     }, 5000);
</script>
