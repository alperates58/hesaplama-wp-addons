document.addEventListener('DOMContentLoaded', function() {
    var calculateBtn = document.getElementById('hc-calculate');
    if (calculateBtn) {
        calculateBtn.addEventListener('click', hcHesapla);
    }
});

function hcFormatTrNumber(value, decimals) {
    return Number(value).toLocaleString('tr-TR', {
        minimumFractionDigits: decimals,
        maximumFractionDigits: decimals
    });
}

function hcHesapla() {
    var mode = document.getElementById('hc-mode').value;
    var timeStr = document.getElementById('hc-time').value;
    var resultsDiv = document.getElementById('hc-results');
    if (!timeStr) {
        alert('Lütfen bir saat girin.');
        return;
    }
    var now = new Date();
    var parts = timeStr.split(':');
    var hours = parseInt(parts[0], 10);
    var minutes = parseInt(parts[1], 10);
    var target = new Date(now.getFullYear(), now.getMonth(), now.getDate(), hours, minutes, 0);
    var fallAsleep = 15;
    var cycle = 90;
    var cycles = [5, 6];
    var html = '';
    if (mode === 'wake') {
        html = '<h4>Önerilen yatma saatleri (uyanma: ' + timeStr + '):</h4><ul>';
        cycles.forEach(function(c) {
            var totalMinutes = fallAsleep + c * cycle;
            var bedTime = new Date(target.getTime() - totalMinutes * 60000);
            var bedStr = ('0' + bedTime.getHours()).slice(-2) + ':' + ('0' + bedTime.getMinutes()).slice(-2);
            var hoursFormatted = hcFormatTrNumber(c * 1.5, 1);
            html += '<li>' + c + ' döngü (' + hoursFormatted + ' saat): ' + bedStr + '</li>';
        });
        html += '</ul>';
    } else {
        html = '<h4>Önerilen uyanma saatleri (yatma: ' + timeStr + '):</h4><ul>';
        cycles.forEach(function(c) {
            var totalMinutes = fallAsleep + c * cycle;
            var wakeTime = new Date(target.getTime() + totalMinutes * 60000);
            var wakeStr = ('0' + wakeTime.getHours()).slice(-2) + ':' + ('0' + wakeTime.getMinutes()).slice(-2);
            var hoursFormatted = hcFormatTrNumber(c * 1.5, 1);
            html += '<li>' + c + ' döngü (' + hoursFormatted + ' saat): ' + wakeStr + '</li>';
        });
        html += '</ul>';
    }
    resultsDiv.innerHTML = html;
    resultsDiv.classList.add('visible');
}
