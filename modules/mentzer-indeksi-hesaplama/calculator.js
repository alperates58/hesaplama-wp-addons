function hcMentzerHesapla() {
    const mcv = parseFloat(document.getElementById('hc-mi-mcv').value);
    const rbc = parseFloat(document.getElementById('hc-mi-rbc').value);

    if (!mcv || !rbc) return;

    // Index = MCV / RBC
    const index = mcv / rbc;

    document.getElementById('hc-mi-val').innerText = index.toFixed(1);
    
    let desc = "";
    if (index < 13) desc = "⚠️ Talasemi (Akdeniz Anemisi) Taşıyıcılığı Olası";
    else desc = "ℹ️ Demir Eksikliği Anemisi Olası";

    document.getElementById('hc-mi-desc').innerText = desc;
    document.getElementById('hc-mi-result').classList.add('visible');
}
