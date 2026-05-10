function hcStdNotHesapla() {
    let input = document.getElementById('hc-sn-val').value.trim().replace(',', '.');
    let val = parseFloat(input);

    if (isNaN(val) || val === 0) {
        alert('Lütfen sıfırdan farklı geçerli bir sayı giriniz.');
        return;
    }

    let exponent = Math.floor(Math.log10(Math.abs(val)));
    let mantissa = val / Math.pow(10, exponent);

    // Format: a x 10^n
    let res = `${mantissa.toLocaleString('tr-TR', { maximumFractionDigits: 4 })} × 10<sup>${exponent}</sup>`;

    document.getElementById('hc-sn-res-val').innerHTML = res;
    document.getElementById('hc-standart-gosterim-result').classList.add('visible');
}
