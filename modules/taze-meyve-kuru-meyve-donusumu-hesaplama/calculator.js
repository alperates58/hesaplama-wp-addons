function hcFruitDryConvHesapla() {
    const type = document.getElementById('hc-fc-type').value;
    const val = parseFloat(document.getElementById('hc-fc-val').value);

    if (isNaN(val) || val <= 0) {
        alert('Lütfen miktar giriniz.');
        return;
    }

    let result = 0;
    let info = '';

    if (type === 'fresh-to-dry') {
        // Genel oran 4:1 (Kuru meyve 4 kat daha konsantredir)
        result = val / 4;
        info = 'Taze meyve yerine yaklaşık 1/4 oranında kuru meyve kullanabilirsiniz (örneğin 400g taze çilek yerine 100g kuru çilek).';
    } else {
        result = val * 4;
        info = 'Kuru meyve yerine yaklaşık 4 katı kadar taze meyve kullanabilirsiniz.';
    }

    document.getElementById('hc-fc-res').innerText = Math.round(result) + ' g';
    document.getElementById('hc-fc-info').innerText = info;
    
    document.getElementById('hc-fruit-dry-conv-result').classList.add('visible');
}
