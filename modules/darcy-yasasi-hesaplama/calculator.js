function hcDarcyHesapla() {
    const k = parseFloat(document.getElementById('hc-dar-k').value);
    const A = parseFloat(document.getElementById('hc-dar-a').value);
    const i = parseFloat(document.getElementById('hc-dar-i').value);

    if (isNaN(k) || isNaN(A) || isNaN(i)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Q = k * A * i
    const Q = k * A * i;
    const Qh = Q * 3600;

    document.getElementById('hc-dar-res-m3s').innerText = Q.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' m³/sn';
    document.getElementById('hc-dar-res-m3h').innerText = Qh.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' m³/saat';
    
    document.getElementById('hc-dar-result').classList.add('visible');
}
