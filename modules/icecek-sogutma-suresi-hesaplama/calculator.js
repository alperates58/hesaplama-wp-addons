function hcDrinkCoolHesapla() {
    const start = parseFloat(document.getElementById('hc-cool-start').value);
    const target = parseFloat(document.getElementById('hc-cool-target').value);
    const ambient = parseFloat(document.getElementById('hc-cool-method').value);

    if (isNaN(start) || isNaN(target)) {
        alert('Lütfen sıcaklık değerlerini giriniz.');
        return;
    }

    if (target >= start) {
        alert('Hedef sıcaklık mevcut sıcaklıktan düşük olmalıdır.');
        return;
    }

    // Newton'un Soğuma Yasası basitleştirilmiş modeli
    // t = ln((T - Ta) / (T0 - Ta)) / -k
    // k katsayısı: Buzdolabı için ~0.02, Dondurucu için ~0.04, Buzlu su için ~0.15
    let k = 0.02;
    if (ambient === -18) k = 0.05;
    if (ambient === 0) k = 0.15;

    // ln((target - ambient) / (start - ambient)) / -k
    const time = Math.log((target - ambient) / (start - ambient)) / -k;

    document.getElementById('hc-cool-time').innerText = Math.round(time) + ' Dakika';
    
    let tip = 'İpucu: İçeceği ıslak kağıt havluya sarıp dondurucuya koymak soğumayı hızlandırır.';
    document.getElementById('hc-cool-tip').innerText = tip;
    
    document.getElementById('hc-drink-cool-result').classList.add('visible');
}
