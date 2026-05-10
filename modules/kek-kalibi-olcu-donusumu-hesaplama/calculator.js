function hcCakePanConvHesapla() {
    const orig = parseFloat(document.getElementById('hc-pan-orig').value);
    const newVal = parseFloat(document.getElementById('hc-pan-new').value);

    if (isNaN(orig) || isNaN(newVal) || orig <= 0) {
        alert('Lütfen kalıp ölçülerini giriniz.');
        return;
    }

    // Alan oranına göre katsayı: (Yeni Yarıçap^2) / (Eski Yarıçap^2)
    // Çaplar üzerinden de aynı sonucu verir: (Yeni Çap^2) / (Eski Çap^2)
    const factor = Math.pow(newVal, 2) / Math.pow(orig, 2);

    document.getElementById('hc-pan-factor').innerText = 'x ' + factor.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-pan-desc').innerText = `Tüm malzemeleri ${factor.toFixed(2)} ile çarparak yeni kalıbınıza göre ayarlayabilirsiniz.`;
    
    document.getElementById('hc-cake-pan-conv-result').classList.add('visible');
}
