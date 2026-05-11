function hcCpuUsageHesapla() {
    const active = parseFloat(document.getElementById('hc-cpu-active').value);
    const idle = parseFloat(document.getElementById('hc-cpu-idle').value);

    if (isNaN(active) || isNaN(idle)) {
        alert('Lütfen her iki süreyi de girin.');
        return;
    }

    const total = active + idle;
    if (total <= 0) {
        alert('Toplam süre 0 olamaz.');
        return;
    }

    const usage = (active / total) * 100;

    document.getElementById('hc-cpu-res-val').innerText = '%' + usage.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-cpu-res-info').innerText = 'Toplam Gözlem Süresi: ' + total.toLocaleString('tr-TR') + ' ms';
    
    document.getElementById('hc-cpu-result').classList.add('visible');
}
