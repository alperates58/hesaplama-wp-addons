function hcLDLHesapla() {
    const tc = parseFloat(document.getElementById('hc-ldl-tc').value);
    const hdl = parseFloat(document.getElementById('hc-ldl-hdl').value);
    const tg = parseFloat(document.getElementById('hc-ldl-tg').value);

    if (!tc || !hdl || !tg) { alert('Lütfen tüm alanları doldurun.'); return; }

    if (tg >= 400) {
        alert('Trigliserid değeri 400 mg/dL üzerinde olduğunda Friedewald formülü güvenilir sonuç vermez.');
        return;
    }

    // LDL = TC - HDL - (TG / 5)
    const ldl = tc - hdl - (tg / 5);

    document.getElementById('hc-ldl-val').innerText = Math.round(ldl) + ' mg/dL';
    
    let desc = "";
    if (ldl < 100) desc = "İdeal Seviye";
    else if (ldl < 130) desc = "İdeale Yakın";
    else if (ldl < 160) desc = "Sınırda Yüksek";
    else if (ldl < 190) desc = "Yüksek";
    else desc = "Çok Yüksek";

    document.getElementById('hc-ldl-desc').innerText = desc;
    document.getElementById('hc-ldl-result').classList.add('visible');
}
