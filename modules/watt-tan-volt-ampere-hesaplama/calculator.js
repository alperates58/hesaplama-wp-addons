function hcWattTanVoltAmpereHesapla() {
    var W = parseFloat(document.getElementById('hc-wtv-power').value);
    var pf = parseFloat(document.getElementById('hc-wtv-pf').value);

    if (isNaN(W) || W < 0) {
        alert('Lütfen geçerli bir aktif güç değeri (Watt) girin.');
        return;
    }
    if (isNaN(pf) || pf < 0.1 || pf > 1.0) {
        alert('Lütfen 0.1 ile 1.0 arasında geçerli bir güç faktörü (cosφ) girin.');
        return;
    }

    // VA = Watts / PF
    var va = W / pf;
    var kva = va / 1000;

    document.getElementById('hc-wtv-res-va').innerText = va.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' VA';
    document.getElementById('hc-wtv-res-kva').innerText = kva.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kVA';

    var desc = W.toLocaleString('tr-TR') + ' Watt aktif gücündeki cihaz, ' + pf.toLocaleString('tr-TR') + ' güç faktöründe (cosφ) şebekeden ' + va.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Volt-Amper (VA) görünür güç çeker. Bu hesap özellikle UPS (kesintisiz güç kaynağı) ve küçük güçteki bilgisayar/elektronik ekipmanlarının besleme ünitelerinin boyutlandırılmasında kullanılır.';
    document.getElementById('hc-wtv-desc').innerText = desc;

    document.getElementById('hc-watt-tan-volt-ampere-hesaplama-result').classList.add('visible');
}
