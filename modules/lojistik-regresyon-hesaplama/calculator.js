function hcLojistikRegHesapla() {
    const b0 = parseFloat(document.getElementById('hc-lr-b0').value);
    const b1 = parseFloat(document.getElementById('hc-lr-b1').value);
    const x = parseFloat(document.getElementById('hc-lr-x').value);
    const resultDiv = document.getElementById('hc-lojistik-regresyon-hesaplama-result');

    if (isNaN(b0) || isNaN(b1) || isNaN(x)) {
        alert('Lütfen tüm katsayıları ve X değerini giriniz.');
        return;
    }

    const z = b0 + (b1 * x);
    const prob = 1 / (1 + Math.exp(-z));

    document.getElementById('hc-lr-res-val').innerText = `%${(prob * 100).toLocaleString('tr-TR', {maximumFractionDigits: 4})}`;
    document.getElementById('hc-lr-res-z').innerText = `Lineer Kombinasyon (z): ${z.toLocaleString('tr-TR', {maximumFractionDigits: 4})}`;

    resultDiv.classList.add('visible');
}
