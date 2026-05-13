function hcMaksHataHesapla() {
    const z = parseFloat(document.getElementById('hc-mhp-conf').value);
    const sigma = parseFloat(document.getElementById('hc-mhp-sigma').value);
    const n = parseInt(document.getElementById('hc-mhp-n').value);
    const resultDiv = document.getElementById('hc-maksimum-hata-payi-hesaplama-result');

    if (isNaN(sigma) || isNaN(n) || n <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const moe = z * (sigma / Math.sqrt(n));

    document.getElementById('hc-mhp-res-val').innerText = `± ${moe.toLocaleString('tr-TR', {maximumFractionDigits: 4})}`;
    document.getElementById('hc-mhp-res-desc').innerText = `Verilen parametrelerle %${document.getElementById('hc-mhp-conf').selectedOptions[0].text.replace('%','')} güven düzeyinde hata payı ±${moe.toLocaleString('tr-TR', {maximumFractionDigits: 4})} birimdir.`;

    resultDiv.classList.add('visible');
}
