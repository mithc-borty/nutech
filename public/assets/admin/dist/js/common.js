(function($) {
    window.showMessage = function(type, message, duration = 3000) {
        if (!$('#toastContainer').length) {
            $('body').append('<div id="toastContainer"></div>');
        }

        let toastId = 'toast-' + Date.now();
        let toastHtml = `
            <div id="${toastId}" class="toast-msg ${type}">
                ${message}
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