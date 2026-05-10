function hcEritrositİndeksleriHesapla() {
    const hb = parseFloat(document.getElementById('hc-ri-hb').value);
    const hct = parseFloat(document.getElementById('hc-ri-hct').value);
    const rbc = parseFloat(document.getElementById('hc-ri-rbc').value);

    if (!hb || !hct || !rbc) return;

    // MCV = (Hct / RBC) * 10
    const mcv = (hct / rbc) * 10;
    // MCH = (Hb / RBC) * 10
    const mch = (hb / rbc) * 10;
    // MCHC = (Hb / Hct) * 100
    const mchc = (hb / hct) * 100;

    document.getElementById('hc-ri-stats').innerHTML = `
        🔵 <strong>MCV:</strong> ${mcv.toFixed(1)} fL (N: 80-100)<br>
        🔴 <strong>MCH:</strong> ${mch.toFixed(1)} pg (N: 27-33)<br>
        ⚪ <strong>MCHC:</strong> % ${mchc.toFixed(1)} (N: 32-36)
    `;
    document.getElementById('hc-ri-result').classList.add('visible');
}
