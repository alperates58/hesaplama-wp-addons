function hcParaAreaHesapla() {
    const base = parseFloat(document.getElementById('hc-pa-base').value);
    const height = parseFloat(document.getElementById('hc-pa-height').value);

    if (isNaN(base) || isNaN(height) || base <= 0 || height <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const area = base * height;

    document.getElementById('hc-pa-res-val').innerText = area.toLocaleString('tr-TR');
    document.getElementById('hc-para-area-result').classList.add('visible');
}
