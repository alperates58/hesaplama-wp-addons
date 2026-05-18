function hcWattTankVaHesapla() {
    var W = parseFloat(document.getElementById('hc-wtk-power').value);
    var pf = parseFloat(document.getElementById('hc-wtk-pf').value);

    if (isNaN(W) || W < 0) {
        alert('Lütfen geçerli bir aktif güç değeri (Watt) girin.');
        return;
    }
    if (isNaN(pf) || pf < 0.1 || pf > 1.0) {
        alert('Lütfen 0.1 ile 1.0 arasında geçerli bir güç faktörü (cosφ) girin.');
        return;
    }

    // kVA = Watts / (1000 * PF)
    var kva = W / (1000 * pf);
    var va = W / pf;

    document.getElementById('hc-wtk-res-kva').innerText = kva.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kVA';
    document.getElementById('hc-wtk-res-va').innerText = va.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' VA';

    var desc = W.toLocaleString('tr-TR') + ' Watt aktif güce ve ' + pf.toLocaleString('tr-TR') + ' güç faktörüne (cosφ) sahip bir sistemin toplam görünür gücü ' + kva.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kVA\'dır. Regülatör, kesintisiz güç kaynağı (UPS) veya jeneratör seçimi yaparken bu kVA değerinin en az %20-25 fazlasını tercih etmeniz tavsiye edilir.';
    document.getElementById('hc-wtk-desc').innerText = desc;

    document.getElementById('hc-watt-tan-kva-ye-hesaplama-result').classList.add('visible');
}
