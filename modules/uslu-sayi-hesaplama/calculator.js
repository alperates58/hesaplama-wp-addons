function hcUsluHesapla() {
    const base = parseFloat(document.getElementById('hc-expo-base').value);
    const pow = parseFloat(document.getElementById('hc-expo-pow').value);

    if (isNaN(base) || isNaN(pow)) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const result = Math.pow(base, pow);

    if (isNaN(result) || !isFinite(result)) {
        document.getElementById('hc-res-expo-val').innerText = 'Hesaplanamıyor';
    } else {
        document.getElementById('hc-res-expo-val').innerText = result.toLocaleString('tr-TR', { 
            maximumFractionDigits: 4 
        });
    }

    document.getElementById('hc-expo-result').classList.add('visible');
}
