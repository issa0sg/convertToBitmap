document.addEventListener('DOMContentLoaded', function() {
    const downloadButtons = document.querySelectorAll('.downloadBtn');

    downloadButtons.forEach((button) => {
        button.addEventListener('click', function() {
            const fileUrl = button.getAttribute('data-file');
            downloadFile(fileUrl);
        });
    });
});

function downloadFile(url) {
    const link = document.createElement('a');
    link.href = url;
    link.download = url.split('/').pop();
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
