function hcMetabolikSendromHesapla() {
    const gender = document.getElementById('hc-ms-gender').value;
    const waist = parseFloat(document.getElementById('hc-ms-waist').value);
    const tg = parseFloat(document.getElementById('hc-ms-tg').value);
    const hdl = parseFloat(document.getElementById('hc-ms-hdl').value);
    const bp = parseFloat(document.getElementById('hc-ms-bp').value);
    const glu = parseFloat(document.getElementById('hc-ms-glu').value);

    let criteriaCount = 0;

    // 1. Bel çevresi
    if (gender === 'male' && waist > 102) criteriaCount++;
    if (gender === 'female' && waist > 88) criteriaCount++;

    // 2. Trigliserid
    if (tg >= 150) criteriaCount++;

    // 3. HDL
    if (gender === 'male' && hdl < 40) criteriaCount++;
    if (gender === 'female' && hdl < 50) criteriaCount++;

    // 4. Kan Basıncı
    if (bp >= 130) criteriaCount++;

    // 5. Kan Şekeri
    if (glu >= 100) criteriaCount++;

    let resultMsg = "";
    if (criteriaCount >= 3) {
        resultMsg = "⚠️ <strong>Metabolik Sendrom Tanısı:</strong> Kriterlerin en az 3'ü karşılanıyor. (Klinik tanı için doktorunuza başvurun)";
    } else {
        resultMsg = "✅ <strong>Düşük Risk:</strong> Metabolik sendrom kriterleri tam olarak karşılanmıyor.";
    }

    document.getElementById('hc-ms-stats').innerHTML = `
        Kriter Karşılama: <strong>${criteriaCount} / 5</strong><br>
        ${resultMsg}
    `;
    document.getElementById('hc-ms-result').classList.add('visible');
}
