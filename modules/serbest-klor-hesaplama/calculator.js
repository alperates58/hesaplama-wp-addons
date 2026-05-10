function hcSerbestKlorHesapla() {
    const val = parseFloat(document.getElementById('hc-sk-val').value);
    const ph = parseFloat(document.getElementById('hc-sk-ph').value);

    if (isNaN(val)) return;

    // HOCl fraction depends on pH
    // %HOCl = 100 / (1 + 10^(pH - pKa)) where pKa of HOCl is ~7.53
    const pKa = 7.53;
    const hoclPercent = 100 / (1 + Math.pow(10, ph - pKa));
    const hoclAmount = val * (hoclPercent / 100);

    let status = "";
    if (ph > 8.0) status = "<span style='color:#e67e22;'>Zayıf Dezenfeksiyon (Yüksek pH)</span>";
    else if (ph < 7.0) status = "<span style='color:#c0392b;'>Aşındırıcı Su (Düşük pH)</span>";
    else status = "<span style='color:#27ae60;'>İdeal Dezenfeksiyon Aralığı</span>";

    document.getElementById('hc-sk-stats').innerHTML = `
        ⚡ <strong>Aktif HOCl Oranı:</strong> % ${hoclPercent.toFixed(1)}<br>
        🧪 <strong>Aktif HOCl Miktarı:</strong> ${hoclAmount.toFixed(3)} mg/L<br>
        🛡️ <strong>Durum:</strong> ${status}
    `;
    document.getElementById('hc-sk-result').classList.add('visible');
}
