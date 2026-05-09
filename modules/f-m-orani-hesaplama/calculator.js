function hcFMOraniHesapla() {
    const q = parseFloat(document.getElementById('hc-fm-q').value);
    const s0 = parseFloat(document.getElementById('hc-fm-s0').value);
    const v = parseFloat(document.getElementById('hc-fm-v').value);
    const mlvss = parseFloat(document.getElementById('hc-fm-mlvss').value);

    if (isNaN(q) || isNaN(s0) || isNaN(v) || isNaN(mlvss) || q <= 0 || s0 <= 0 || v <= 0 || mlvss <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    // F/M = (Q * S0) / (V * MLVSS)
    const fm = (q * s0) / (v * mlvss);

    document.getElementById('hc-fm-val').innerText = fm.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kg BOİ / kg MLVSS·gün';
    
    let comment = "";
    if (fm < 0.05) comment = "Düşük yükleme (Uzatılmış Havalandırma).";
    else if (fm <= 0.2) comment = "Düşük - Orta yükleme.";
    else if (fm <= 0.5) comment = "Standart aktif çamur yüklemesi.";
    else comment = "Yüksek yükleme.";

    document.getElementById('hc-fm-note').innerText = comment;
    document.getElementById('hc-fm-result').classList.add('visible');
}
