function hcTransferrinHesapla() {
    const iron = parseFloat(document.getElementById('hc-ts-iron').value);
    const tibc = parseFloat(document.getElementById('hc-ts-tibc').value);

    if (!iron || !tibc) return;

    // Sat = Iron / TIBC * 100
    const sat = (iron / tibc) * 100;

    document.getElementById('hc-ts-val').innerText = '% ' + sat.toFixed(1);
    
    let desc = "";
    if (sat < 15) desc = "⚠️ Düşük (Olası Demir Eksikliği)";
    else if (sat > 45) desc = "⚠️ Yüksek (Olası Demir Yüklenmesi)";
    else desc = "Normal Aralık (%15 - %45)";

    document.getElementById('hc-ts-desc').innerText = desc;
    document.getElementById('hc-ts-result').classList.add('visible');
}
