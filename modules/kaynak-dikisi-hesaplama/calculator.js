function hcWeldHesapla() {
    const p = parseFloat(document.getElementById('hc-wd-p').value);
    const a = parseFloat(document.getElementById('hc-wd-a').value);
    const l = parseFloat(document.getElementById('hc-wd-l').value);

    if (isNaN(p) || isNaN(a) || isNaN(l) || a <= 0 || l <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Stress tau = P / (a * L)
    const tau = p / (a * l);

    document.getElementById('hc-wd-res-val').innerText = tau.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' MPa (N/mm²)';
    
    let desc = "";
    if (tau < 100) desc = "Düşük gerilme.";
    else if (tau < 140) desc = "S235 çelik için emniyetli sınır civarı.";
    else desc = "Yüksek gerilme! Malzeme dayanımı kontrol edilmeli.";

    document.getElementById('hc-wd-res-status').innerText = desc;
    document.getElementById('hc-wd-result').classList.add('visible');
}
