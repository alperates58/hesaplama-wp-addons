function hcDLDHesapla() {
    const vol = parseFloat(document.getElementById('hc-dld-vol').value);
    const min = parseFloat(document.getElementById('hc-dld-min').value) || 0;
    const sec = parseFloat(document.getElementById('hc-dld-sec').value) || 0;

    if (isNaN(vol) || vol <= 0 || (min === 0 && sec === 0)) {
        alert('Lütfen geçerli bir hacim ve süre giriniz.');
        return;
    }

    const totalMinutes = min + (sec / 60);
    const flowRate = vol / totalMinutes;

    document.getElementById('hc-dld-val').innerText = flowRate.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' L/dk';
    document.getElementById('hc-dld-result').classList.add('visible');
}
