function hcDIHesapla() {
    const fCm = parseFloat(document.getElementById('hc-di-f').value);

    if (isNaN(fCm) || fCm === 0) {
        alert('Lütfen geçerli bir odak uzaklığı giriniz.');
        return;
    }

    const fM = fCm / 100;
    const dioptri = 1 / fM;

    document.getElementById('hc-di-val').innerText = dioptri.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' dpt';
    document.getElementById('hc-di-result').classList.add('visible');
}
