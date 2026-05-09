function hcSaatHesapla() {
    const time = document.getElementById('hc-sc-time').value;
    const hours = parseInt(document.getElementById('hc-sc-hours').value) || 0;
    const mins = parseInt(document.getElementById('hc-sc-mins').value) || 0;
    const op = document.getElementById('hc-sc-op').value;

    if (!time) {
        alert('Lütfen başlangıç saatini seçin.');
        return;
    }

    const [h, m] = time.split(':').map(Number);
    let totalMinutes = h * 60 + m;
    const durationMinutes = hours * 60 + mins;

    if (op === 'add') {
        totalMinutes += durationMinutes;
    } else {
        totalMinutes -= durationMinutes;
    }

    // Normalize to 0-1439
    totalMinutes = ((totalMinutes % 1440) + 1440) % 1440;

    const resH = Math.floor(totalMinutes / 60);
    const resM = totalMinutes % 60;

    const formatted = (resH < 10 ? '0' + resH : resH) + ":" + (resM < 10 ? '0' + resM : resM);

    document.getElementById('hc-sc-val').innerText = formatted;
    document.getElementById('hc-sc-result').classList.add('visible');
}
