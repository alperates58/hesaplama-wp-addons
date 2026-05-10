function hcOilConvHesapla() {
    const type = document.getElementById('hc-oc-type').value;
    const val = parseFloat(document.getElementById('hc-oc-val').value);

    if (isNaN(val) || val <= 0) {
        alert('Lütfen miktar giriniz.');
        return;
    }

    let result = 0;
    let unit = '';
    let info = '';

    if (type === 'solid-to-liquid') {
        // 100g tereyağı ~ 80-85ml sıvı yağ (su payı çıktığında)
        result = val * 0.82;
        unit = ' ml';
        info = '100g katı yağ yerine yaklaşık 82ml (3/4 su bardağından biraz az) sıvı yağ kullanabilirsiniz.';
    } else {
        // 100ml sıvı yağ ~ 120g katı yağ
        result = val * 1.22;
        unit = ' g';
        info = 'Sıvı yağ yerine katı yağ kullanırken miktarı yaklaşık %22 oranında artırmanız önerilir.';
    }

    document.getElementById('hc-oc-res').innerText = Math.round(result) + unit;
    document.getElementById('hc-oc-info').innerText = info;
    
    document.getElementById('hc-oil-conv-result').classList.add('visible');
}
