function hcBulaniklikHesapla() {
    const raw = parseFloat(document.getElementById('hc-bl-raw').value);
    const dil = parseFloat(document.getElementById('hc-bl-dil').value);

    if (isNaN(raw) || isNaN(dil)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    if (dil <= 0) {
        alert('Seyreltme oranı 0 olamaz.');
        return;
    }

    const normalized = raw / dil;

    document.getElementById('hc-bl-val').innerText = normalized.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' NTU';
    document.getElementById('hc-bl-result').classList.add('visible');
}
