(function($) {
    window.showMessage = function(type, message, duration = 3000) {
        if (!$('#toastContainer').length) {
            $('body').append('<div id="toastContainer"></div>');
        }

        let icons = {
            success: 'fas fa-check-circle',
            error: 'fas fa-exclamation-triangle',
            warning: 'fas fa-exclamation-triangle',
            info: 'fas fa-info-circle'
        };

        let iconClass = icons[type] || icons.info;

        let toastId = 'toast-' + Date.now();

        let toastHtml = `
            <div id="${toastId}" class="toast-msg ${type}">
                <div class="toast-body">
                    <i class="${iconClass} toast-icon ${type}-icon"></i>
                    <span>${message}</span>
                </div>
                <button class="close-btn">&times;</button>
            </div>
        `;

        $('#toastContainer').append(toastHtml);

        let $toast = $('#' + toastId);

        setTimeout(() => $toast.addClass('show'), 50);

        $toast.find('.close-btn').on('click', function() {
            $toast.remove();
        });

        setTimeout(() => $toast.remove(), duration);
    };
})(jQuery);