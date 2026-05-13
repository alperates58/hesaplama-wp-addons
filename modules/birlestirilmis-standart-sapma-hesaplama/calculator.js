function hcPooledSDHesapla() {
    const n1 = parseInt(document.getElementById('hc-psd-n1').value);
    const s1 = parseFloat(document.getElementById('hc-psd-s1').value);
    const n2 = parseInt(document.getElementById('hc-psd-n2').value);
    const s2 = parseFloat(document.getElementById('hc-psd-s2').value);

    if (isNaN(n1) || isNaN(s1) || isNaN(n2) || isNaN(s2) || n1 <= 1 || n2 <= 1) {
        alert('Lütfen geçerli değerler girin (n1 ve n2 > 1 olmalıdır).');
        return;
    }

    const pooledVariance = ((n1 - 1) * Math.pow(s1, 2) + (n2 - 1) * Math.pow(s2, 2)) / (n1 + n2 - 2);
    const pooledSD = Math.sqrt(pooledVariance);

    document.getElementById('hc-res-psd-val').innerText = pooledSD.toLocaleString('tr-TR', { minimumFractionDigits: 3, maximumFractionDigits: 4 });
    document.getElementById('hc-birlestirilmis-standart-sapma-hesaplama-result').classList.add('visible');
}
