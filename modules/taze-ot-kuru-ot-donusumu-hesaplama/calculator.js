function hcHerbConvHesapla() {
    const type = document.getElementById('hc-hc-type').value;
    const val = parseFloat(document.getElementById('hc-hc-val').value);

    if (isNaN(val) || val <= 0) {
        alert('Lütfen miktar giriniz.');
        return;
    }

    let result = 0;
    let info = '';

    if (type === 'taze-to-kuru') {
        // Genel oran 3:1 (Kuru ot daha aromatiktir)
        result = val / 3;
        info = 'Taze otlar yerine 1/3 oranında kuru ot kullanabilirsiniz (Örn: 3 kaşık taze nane = 1 kaşık kuru nane).';
    } else {
        result = val * 3;
        info = 'Kuru ot yerine 3 katı kadar taze ot kullanabilirsiniz.';
    }

    document.getElementById('hc-hc-res').innerText = result.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Yemek Kaşığı';
    document.getElementById('hc-hc-info').innerText = info;
    
    document.getElementById('hc-herb-conv-result').classList.add('visible');
}
